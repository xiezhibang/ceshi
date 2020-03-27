<?php

namespace App\Services\WebService;
use App\Model\ConfigRate;
use App\Model\IntegralConverOrder;
use App\Model\Member;
use App\Model\MemberBind;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class IntegralOrderService extends BaseService
{

    /*
     * 我的积分
     *
     * */
    public function memberIntegral()
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //积分
        $integral = $user->total_credits;
        //用户信息
        $avatar = MemberBind::where('user_id',$uid)->value('avatar');
        $data = ['integral'=>$integral,'avatar'=>$avatar];
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);

    }

    /*
     * 积分明细
     * @param int $page 分页数
     * @param int $limit 每页几条
     * */
    public function integralOrderList($page,$limit)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        $list = IntegralConverOrder::where('user_id',$uid)
            ->where('status',1)
            ->latest('id')
            ->get(['id','user_id','name','integral','payment','status','created_at'])
            ->toArray();
        //每页条数
        $perPage = $limit ? $limit : 200;
        //分页数
        if ($page) {
            $current_page = $page;
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }

        $item = array_slice($list, ($current_page-1)*$perPage, $perPage); //注释1
        $total = count($list);

        $paginator = new LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),  //注释2
            'pageName' => 'page',
        ]);

        $data = $paginator->toArray()['data'];

        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 积分转换为零钱
     * @param number $integral 积分
     *
     * */
    public function makeIntegralMoney($integral)
    {
        //查积分换零钱的费率
        $rates = ConfigRate::where('type',3)->value('rate');
        $rates = $rates / 100 ;
        //零钱
        $money = $integral * $rates;
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //会员等级
        $type = $user->type;
        //会员账号
        $mobile = $user->mobile;
        //会员昵称
        $name = MemberBind::where('user_id',$uid)->value('nick_name');
        //判断积分
        if ($integral < 10){
            return $this->fail(210019);
        }
        //添加转换记录
        $data = IntegralConverOrder::create([
            'user_id' => $uid,
            'username' => $name,
            'account' => $mobile,
            'order_no' => $this->makeOrderNo(),
            'name' => '积分转换零钱',
            'integral' => $integral,
            'money' => $money,
            'commission_price' => 0,
            'type' => $type == 40 ? 2 : 1,
            'status' => 1,
        ]);
        //返回结果
        if ($data){
            //更新会员零钱和积分
            $moneyBag = Member::where('id',$uid)->increment('money_bag',$money);//加零钱
            $credits = Member::where('id',$uid)->decrement('total_credits',$integral);//减积分
            return $this->success($data);
        }
        return $this->fail(210020);
    }

    //生成唯一订单号
    public function makeOrderNo()
    {
        //订单号码主体（YYYYMMDDHHIISSNNNNNNNN）
        $order_id_main = date('YmdHis') . rand(10000000,99999999);
        //订单号码主体长度
        $order_id_len = strlen($order_id_main);
        $order_id_sum = 0;

        for($i=0; $i<$order_id_len; $i++){
            $order_id_sum += (int)(substr($order_id_main,$i,1));
        }
        //唯一订单号码（YYYYMMDDHHIISSNNNNNNNNCC）
        $order_id = $order_id_main . str_pad((100 - $order_id_sum % 100) % 100,2,'0',STR_PAD_LEFT);
        return $order_id;
    }

}