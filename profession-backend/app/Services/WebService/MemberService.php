<?php

namespace App\Services\WebService;
use App\Model\BackgroundImage;
use App\Model\Banner;
use App\Model\BlackUpgrade;
use App\Model\BusinessRecode;
use App\Model\FeedBack;
use App\Model\FeedBackImage;
use App\Model\Good;
use App\Model\HelpArtcile;
use App\Model\HelpCate;
use App\Model\IndustryCategory;
use App\Model\LeagueEngineer;
use App\Model\Member;
use App\Model\MemberBind;
use App\Model\MemberClub;
use App\Model\MemberDiscount;
use App\Model\MemberEquity;
use App\Model\MemberUpgradeMoney;
use App\Model\MerchantEnter;
use App\Model\Message;
use App\Model\Order;
use App\Model\PartnerRecode;
use App\Model\SetAmount;
use App\Model\ShopImage;
use App\Model\SmsCode;
use App\Model\Website;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use App\Handlers\ImageUploadHandler;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class MemberService extends BaseService
{

    protected $uploader;

    public function __construct(ImageUploadHandler $imageUploadHandler)
    {
        $this->uploader = $imageUploadHandler;

    }

   /*
    * 会员升级--金卡
    *
    * */
   public function goldInfo()
   {
       //图片
       $banner = Banner::where('type',30)->select('id','banner_image')->first();
       //权益介绍
       $memberEquity = MemberEquity::where('type',10)->select('id','name')->get();
       //价格
       $money = MemberUpgradeMoney::where('upgrade_type',1)->select('id','money')->first();
       $result = ['banner'=>$banner,'memberEquity'=>$memberEquity,'money'=>$money];
       if ($result){
           return $this->success($result);
       }
       return $this->fail(900009);
   }

   /*
    * 会员升级--黑金卡
    *
    * */
   public function blackInfo()
   {
       //图片
       $banner = Banner::where('type',40)->select('id','banner_image')->first();
       //权益介绍
       $memberEquity = MemberEquity::where('type',20)->select('id','name')->get();
       //价格
       $money = MemberUpgradeMoney::where('upgrade_type',2)->select('id','money')->first();
       $result = ['banner'=>$banner,'memberEquity'=>$memberEquity,'money'=>$money];
       if ($result){
           return $this->success($result);
       }
       return $this->fail(900009);
   }

   /*
    * 实名认证
    * @param string $name 姓名
    * @param string $card_code 身份证
    * @param string $address 出生所在地
    * @param string $card_front 身份证正面
    * @param string $card_back 身份证反面
    *
    * */
   public function realNameAuthentication($name,$card_code,$address,$card_front,$card_back)
   {
       //用户信息
       $user = Auth::guard('member')->user();
       //用户ID
       $uid = $user->id;
       //判断是否已经认证
       $member = MemberBind::where('user_id',$uid)->first();
       if ($member['bind_card_status'] == 20){
           return $this->fail(210015);
       }
       //获取当前域名
       $url = 'http://'.$_SERVER["HTTP_HOST"];
       $cardFrontImage = '';
       $cardBackImage  = '';
       //上传身份证正面
       if ($card_front) {
           $result = $this->uploader->save($card_front, 'idcard');
           if ($result) {
               $cardFrontImage = $url.$result['path'];
           }
       }
       //上传身份证反面
       if ($card_back) {
           $result = $this->uploader->save($card_back, 'idcard');
           if ($result) {
               $cardBackImage = $url.$result['path'];
           }
       }
       //更新实名认证数据
       $data = MemberBind::where('user_id',$uid)->update([
           'username' => $name,
           'code_sn' => $card_code,
           'address' => $address,
           'front_card_image' => $cardFrontImage,
           'back_card_image' => $cardBackImage,
       ]);

       if ($data){
           return $this->success($data);
       }
       return $this->fail(210013);
   }

   /*
    * 修改会员头像
    *
    * @param string $avatar 头像
    *
    * */
   public function updateAvatar($avatar)
   {
       //用户信息
       $user = Auth::guard('member')->user();
       //用户ID
       $uid = $user->id;
       //获取当前域名
       $url = 'http://'.$_SERVER["HTTP_HOST"];
//       $avatarImage  = '';
//       //上传会员头像
//       if ($avatar) {
//           $result = $this->uploader->save($avatar, 'avatar');
//           if ($result) {
//               $avatarImage = $url.$result['path'];
//           }
//       }

       //获取当前域名
       $url_img = 'http://'.$_SERVER["HTTP_HOST"];

       //获取图片流
       $url = explode(',',$avatar);
       $filename = md5(time().Str::random(10)).'.png';
       //自定义图片名
       $filepath = public_path('uploads/images').'/'.$filename;
       //图片存储路径
       $bgurl = '/uploads/images/'.$filename;
       //图片url ，具体看自己后台环境，我用的是
       file_put_contents($filepath, base64_decode($url[1]));//保存图片到自定义的路径

      // $result = $this->base($avatar);

       //更新会员头像
       $data = MemberBind::where('user_id',$uid)->update([
           'avatar' => $url_img.$bgurl,
       ]);
       if ($data){
           return $this->success($data);
       }
       return $this->fail(210016);
   }


   /*
    * 图片上传
    *
    * */
    public function base($url)
    {
        $curl='data:image/jpg/png/gif;base64,'. $url;

        $imageName = date("His",time()).rand(1111,9999).'.jpg';
        if (strstr($curl,",")){
            $image = explode(',',$curl);
            $image = $image[1];
        }

        $path = public_path('uploads/picture');
        if(!is_dir($path)){
            mkdir($path,0777,true);
        }

        //获取当前域名
        $url_img = 'http://'.$_SERVER["HTTP_HOST"];
        $imageSrc= $path."/". $imageName;
        $r = file_put_contents($imageSrc, base64_decode($image));
        if (!$r) {
            return $this->fail(600006);
        }else{
            $data = $url_img."/uploads/image/".date('Y-m-d').'/'.$imageName;
            return $data;

        }
    }


   /*
    * 修改会员信息
    * @param string $nick_name 会员昵称
    * @param string $member_sign 会员个性签名
    * @param number $gender 会员性别 1-男 2-女
    * @param string $province 省份
    * @param string $city 城市
    * @param string $district 区县
    * @param string $address_detail 详细地址
    *
    * */
   public function updateMemberInfo($nick_name,$member_sign,$gender,$province,$city,$district,$address_detail)
   {
       //用户信息
       $user = Auth::guard('member')->user();
       //用户ID
       $uid = $user->id;
       //更新会员信息
       $data = MemberBind::where('user_id',$uid)->update([
           'nick_name'      => $nick_name,
           'user_signature' => $member_sign,
           'sex'            => $gender,
           'province'       => $province,
           'city'           => $city,
           'district'       => $district,
           'address_detail' => $address_detail,
       ]);
       if ($data){
           return $this->success($data);
       }
       return $this->fail(210011);
   }

   /*
    * 设置金额
    * @param number $money 金额
    * @param string $remark 收钱理由
    *
    * */
   public function setPayMoney($money,$remark)
   {
       //用户信息
       $user = Auth::guard('member')->user();
       //用户ID
       $uid = $user->id;
       //判断是否已设置过
       $setMoney = SetAmount::where('user_id',$uid)->first();
       if ($setMoney){
           //更新设置金额
           $setMoney->update(['money' => $money]);
       }
       //添加设置金额数据
       $data = SetAmount::create([
           'user_id' => $uid,
           'money'   => $money,
           'note'    => $remark ? $remark : '',
       ]);
       if ($data){
           return $this->success($data);
       }
       return $this->fail(210017);
   }

   /*
    * 帮助中心列表
    *
    * */
   public function helpCategoryList()
   {
       $data = HelpCate::latest()->get();
       if ($data){
           return $this->success($data);
       }
       return $this->fail(900009);
   }

   /*
    * 帮助中心详情
    * @param number $cate_id 分类ID
    *
    * */
   public function helpDetailShow($cate_id)
   {
       $data = HelpArtcile::where('cate_id',$cate_id)->where('status',1)->first();
       if ($data){
           return $this->success($data);
       }
       return $this->fail(900009);
   }

   /*
    * 关于我们
    *
    * */
   public function aboutOurInfo()
   {
       $data = Website::where('type',20)->first();
       if ($data){
           return $this->success($data);
       }
       return $this->fail(900009);
   }

   /*
    * 俱乐部说明
    *
    * */
   public function clubRemark()
   {
       $data = Website::where('type',30)->first();
       if ($data){
           return $this->success($data);
       }
       return $this->fail(900009);
   }

   /*
    * 俱乐部会员章程
    *
    * */
   public function clubContent()
   {
       $data = Website::where('type',40)->first();
       if ($data){
           return $this->success($data);
       }
       return $this->fail(900009);
   }

   /*
    * 版本信息
    *
    *
    * */
   public function versionInfo()
   {
       $data = Website::where('type',50)->first();
       if ($data){
           return $this->success($data);
       }
       return $this->fail(900009);
   }

   /*
    * 用户反馈
    * @param string $feedback_content 反馈内容
    * @param $string $image 反馈图片，可选
    *
    * */
   public function addFeedback($feedback_content,$image)
   {
       //用户信息
       $user = Auth::guard('member')->user();
       //用户ID
       $uid = $user->id;
       //手机号
       $mobile = $user->mobile;
       //昵称
       $nick_name = MemberBind::where('user_id',$uid)->value('nick_name');
       //反馈ID
       $feedbackId = FeedBack::insertGetId([
           'user_id' => $uid,
           'username'=> $nick_name,
           'account' => $mobile,
           'content' => $feedback_content,
           'created_at' => date('Y-m-d H:i:s'),
           'updated_at' => date('Y-m-d H:i:s'),
       ]);

       $arr = [];
       //拆分字符串
       $imgs = explode(',',$image);
       foreach ($imgs as $img){
           //添加图片数据到数据库
           $arr = FeedBackImage::create([
               'feed_back_id' => $feedbackId,
               'feed_image'   => $img,
           ]);
       }
       $data = ['feedbackId'=>$feedbackId,'imageInfo'=>$arr];

       if ($data){
           return $this->success($data);
       }
       return $this->fail(210018);

   }

   /*
    * 提交图片
    * @param $string $image
    * */
   public function feedBackImageAdd($image)
   {
       //获取当前域名
       $url = 'http://'.$_SERVER["HTTP_HOST"];
       $feedbackImage  = '';
       //上传反馈图片
       if ($image) {
           $result = $this->uploader->save($image, 'imgs');
           if ($result) {
               $feedbackImage = $url.$result['path'];
               //$feedbackImage = $result['path'];
           }
       }

       $data = [
           'status'  => true,
           'code'    => 200,
           'message' => '图片上传成功',
           'data'    => $feedbackImage,
       ];

       return $data;

//       if ($feedbackImage){
//           return $this->success($feedbackImage);
//       }
//       return $this->fail(210032);
   }

   /*
    * 反馈图片
    *
    * */
   public function uploadFeedbackImage(Request $request,$id)
   {
       //上传文件最大大小,单位M
       $maxSize = 10;
       $file = $request->file("image");
       if (!is_array($file)) {
           $file = [$file];
       }
       $len = 0;
       $newFileName = '';
       $data = [];
       if (!empty($file)) {
           foreach ($file as $key => $value) {
               $len = $key;
           }
           if ($len > 9) {
               return $this->fail(600001);
           }
           $m = 0;
           $k = 0;
           for ($i = 0; $i <= $len; $i++) {
               // $n 表示第几张图片
               $n = $i + 1;
               if ($file[$i]->isValid()) {
                   if (in_array(strtolower($file[$i]->extension()), ['jpeg', 'jpg', 'gif', 'gpeg', 'png'])) {
                       $picname = $file[$i]->getClientOriginalName();//获取上传原文件名
                       $ext = $file[$i]->getClientOriginalExtension();//获取上传文件的后缀名
                       // 重命名
                       $filename = time() . Str::random(6) . "." . $ext;
                       if ($file[$i]->move("uploads/images", $filename)) {
                           $newFileName = '/' . "uploads/images" . '/' . $filename;
                           $m = $m + 1;

                       } else {
                           $k = $k + 1;
                       }

                       $msg = $m . "张图片上传成功 " . $k . "张图片上传失败<br>";
                       //获取当前域名
                       $url = 'http://'.$_SERVER["HTTP_HOST"];
                       //添加图片数据到数据库
                       $insert = FeedBackImage::create([
                           'feed_back_id' => $id,
                           'feed_image'   => $url.$newFileName,
                       ]);

                       $data = ['info' => $msg, 'newFileName' => $newFileName];

                   } else {
                       return response()->json([
                           "status"  =>false,
                           "code"    => 600002,
                           "message" => '第' . $n . '张图片后缀名不合法!<br/>' . '只支持jpeg/jpg/png/gif格式',
                           'data'=>[]
                       ]);

                   }
               } else {
                   return response()->json([
                       "status"  =>false,
                       "code"    => 600003,
                       "message" => '第' . $n . '张图片超过最大限制!<br/>' . '图片最大支持10M',
                       'data'=>[]
                   ]);
               }
           }

       } else {
           return $this->fail(600005);
       }

       return $data;
   }

   /*
    * 合伙人管理列表
    * @param int $page 分页数
    * @param int $limit 每页几条
    * @param string $company_name 公司名称
    * @param string $username 会员昵称
    * @param string $phone 手机号
    *
    * */
   public function partnerRecodeList($page,$limit,$request)
   {
       $where = function ($query) use ($request) {
           if ($request->has('keywords') and $request->keywords != '') {
               $search = "%" . $request->keywords . "%";
               $query->where('company_name', 'like', $search);
               $query->orWhere('username', 'like', $search);
               $query->orWhere('account', 'like', $search);
           }
       };
       $query = PartnerRecode::query();
       $query = $query->where($where)->latest('id')->get(['id','username','account','image','shop_name','shop_address','company_name'])->toArray();
       //每页条数
       $perPage = $limit ? $limit : 200;
       //分页数
       if ($page) {
           $current_page = $page;
           $current_page = $current_page <= 0 ? 1 :$current_page;
       } else {
           $current_page = 1;
       }
       $item = array_slice($query, ($current_page-1)*$perPage, $perPage); //注释1
       $total = count($query);
       $paginator = new LengthAwarePaginator($item, $total, $perPage, $current_page, [
           'path' => Paginator::resolveCurrentPath(),  //注释2
           'pageName' => 'page',
       ]);
       $data = $paginator->toArray()['data'];
       //返回结果
       if ($data){
           return $this->success($data);
       }
       return $this->fail(900009);
   }

    /*
    * 俱乐部会员列表
    * @param int $page 分页数
    * @param int $limit 每页几条
    * @param string $company_name 公司名称
    * @param string $username 会员昵称
    * @param string $phone 手机号
    *
    * */
    public function memberClubList($page,$limit,$request)
    {
        $where = function ($query) use ($request) {
            if ($request->has('keywords') and $request->keywords != '') {
                $search = "%" . $request->keywords . "%";
                $query->where('company_name', 'like', $search);
                $query->orWhere('username', 'like', $search);
                $query->orWhere('phone', 'like', $search);
            }
        };
        $query = MemberClub::query();
        $query = $query->where($where)->latest('id')->get(['id','username','phone','member_head_image','shop_name','shop_address','company_name'])->toArray();
        //每页条数
        $perPage = $limit ? $limit : 200;
        //分页数
        if ($page) {
            $current_page = $page;
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }
        $item = array_slice($query, ($current_page-1)*$perPage, $perPage); //注释1
        $total = count($query);
        $paginator = new LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),  //注释2
            'pageName' => 'page',
        ]);
        $data = $paginator->toArray()['data'];
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 我的合伙
     * @param int $page 分页数
    *  @param int $limit 每页几条
     *
     * */
    public function myPartnerList($page,$limit)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        $query = PartnerRecode::query()->where('upper_id',$uid);
        $query = $query->latest('id')->get(['id','username','account','shop_image','shop_name','shop_address'])->toArray();
        //每页条数
        $perPage = $limit ? $limit : 200;
        //分页数
        if ($page) {
            $current_page = $page;
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }
        $item = array_slice($query, ($current_page-1)*$perPage, $perPage); //注释1
        $total = count($query);
        $paginator = new LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),  //注释2
            'pageName' => 'page',
        ]);
        $data = $paginator->toArray()['data'];
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 合伙详情
     * @param int $partner_id 合伙ID
     *
     *
     * */
    public function partnerDetail($partner_id)
    {
        $data = PartnerRecode::with('shop:id,desc,phone')
            ->with('shopImage:id,shop_id,image')
            ->where('id',$partner_id)
            ->select('id','shop_id','shop_name','shop_image','shop_address','add_time','expire_time')
            ->first();
        //用户Id
        $partner = PartnerRecode::find($partner_id);
        $userId = $partner['upper_id'];
        //积分和总收益
        $member = Member::find($userId);
        $result = ['revenue_money'=>$member['revenue_money'],'total_credits'=>$member['total_credits'],'partnerInfo'=>$data];
        //返回结果
        if ($data){
            return $this->success($result);
        }
        return $this->fail(900009);
    }

    /*
     * 我的零钱
     *
     *
     * */
    public function myMoneyBag()
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //零钱
        $money = $user->money_bag ? $user->money_bag : 0;
        $data = ['moneyBag'=>$money];
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 解绑微信号
     * @param string $wx_code 微信号
     *
     * */
    public function cancelWxCode($wx_code)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        $member = Member::find($uid);
        //解绑
        $data = $member->where('wx_name',$wx_code)->update(['unbind_wx_status'=>20]);
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(210025);
    }

    /*
     * 更换手机号
     * @param string $mobile 手机号
     * @param string $checkCode 验证码
     *
     * */
    public function updateMobile($mobile,$checkCode)
    {
        //查询手机验证码
        $smsCode = SmsCode::where('mobile',$mobile)->where('type',20)->first();
        $code = $smsCode['code'];
        //判断验证码是否正确
        if( $code != $checkCode ) {
            return $this->fail(200002);
        }
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        $member = Member::find($uid);
        //更换手机号
        $data = $member->update(['mobile'=>$mobile]);
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(210007);
    }

    /*
     * 修改密码
     * @param string $mobile 手机号
     * @param string $checkCode 验证码
     * @param string $password 密码
     * @param string $confirm_password 确认密码
     *
     * */
    public function updatePassword($mobile,$checkCode,$password,$confirm_password)
    {
        //查询手机验证码
        $smsCode = SmsCode::where('mobile',$mobile)->where('type',20)->first();
        $code = $smsCode['code'];
        //判断验证码是否正确
        if( $code != $checkCode ) {
            return $this->fail(200002);
        }
        if( $password != $confirm_password ) {
            return $this->fail(210026);
        }
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        $member = Member::find($uid);
        //更换密码
        $data = $member->update(['password'=>bcrypt($password)]);
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(210009);
    }

    /*
     * 黑金卡升级--信息填写
     * @param string $company_name 公司名称
     * @param string $social_code 社会信用代码
     * @param string $province 省份
     * @param string $city 城市
     * @param string $district 区/县
     * @param string $address 注册地址
     * @param string $username 姓名
     * @param number $mobile 电话
     * @param string $license_image 营业执照
     * @param string $front_identity_card 身份证正面
     * @param string $side_identity_card 身份证反面
     *
     *
     * */
    public function upgradeBackAdd($company_name,$social_code,$province,$city,$district,$address,$username,$mobile,$license_image,$front_identity_card,$side_identity_card)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //判断是否已申请过
        $upgrade = BlackUpgrade::where('user_id',$uid)->first();
        if ($upgrade){
            //更新升级信息
            $bool = $upgrade->update([
                'user_id' => $uid,
                'company_name' => $company_name,
                'social_code' => $social_code,
                'province' => $province,
                'city' => $city,
                'district' => $district,
                'address' => $address,
                'username' => $username,
                'phone' => $mobile,
                'license_image' => $license_image,
                'front_identity_card' => $front_identity_card,
                'side_identity_card' => $side_identity_card,
            ]);
            $data[] = [
                'upgrade_id' => $upgrade['id'],
                'company_name' => $company_name,
                'social_code' => $social_code,
                'province' => $province,
                'city' => $city,
                'district' => $district,
                'address' => $address,
                'username' => $username,
                'phone' => $mobile,
                'license_image' => $license_image,
                'front_identity_card' => $front_identity_card,
                'side_identity_card' => $side_identity_card,
                ];
        }else{
            //添加升级信息
            $upgradeId = BlackUpgrade::insertGetId([
                'user_id' => $uid,
                'company_name' => $company_name,
                'social_code' => $social_code,
                'province' => $province,
                'city' => $city,
                'district' => $district,
                'address' => $address,
                'username' => $username,
                'phone' => $mobile,
                'license_image' => $license_image,
                'front_identity_card' => $front_identity_card,
                'side_identity_card' => $side_identity_card,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $data[] = [
                'upgrade_id' => $upgradeId,
                'company_name' => $company_name,
                'social_code' => $social_code,
                'province' => $province,
                'city' => $city,
                'district' => $district,
                'address' => $address,
                'username' => $username,
                'phone' => $mobile,
                'license_image' => $license_image,
                'front_identity_card' => $front_identity_card,
                'side_identity_card' => $side_identity_card,
            ];
        }

        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(210027);
    }


    /*
     * 选择根据地，即店铺列表
     * @param int $upgrade_id 黑金卡升级ID
     * @param string $address 地区
     *
     *
     * */
    public function upgradeAddress($request)
    {
        $where = function ($query) use ($request) {
            if ($request->has('keywords') and $request->keywords != '') {
                $search = "%" . $request->keywords . "%";
                $query->where('address', 'like', $search);
            }
        };
        //总店铺列表
        $query = MerchantEnter::query();
        $shopList = $query->where($where)
            ->orderBy('id', 'desc')
            ->get(['id','shop_name','address','privilege_type','overall_evaluate','shop_image']);

        //返回结果
        if ($shopList){
            return $this->success($shopList);
        }
        return $this->fail(900009);

    }

    /*
     * 确认选择根据地
     * @param int $upgrade_id 黑金卡升级ID
     * @param int $shop_id 根据地ID
     * */
    public function getAddressUpgrade($upgrade_id,$shop_id)
    {
        //店铺名称
        $shop_name = MerchantEnter::where('id',$shop_id)->value('shop_name');
        //更新黑金卡信息
        $grade = BlackUpgrade::find($upgrade_id);
        $data = $grade->update([
            'shop_id' => $shop_id,
            'shop_name' => $shop_name,
        ]);
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(210037);
    }

    /*
    * 商家入驻，行业分类（一级）
    *
    *
    * */
    public function industryPidCategory()
    {
        $data = IndustryCategory::where('cate_pid','<',1)->get();
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 商家入驻，行业分类（二级）
     * @param number $industry_id 行业ID
     *
     * */
    public function industrySonCategory($industry_id)
    {
        $data = IndustryCategory::where('cate_pid',$industry_id)->get();
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 商家入驻，项目列表
     * @param number $industry_id 二级行业分类ID
     *
     * */
    public function leagueEngineerList($industry_id)
    {
        $data = LeagueEngineer::where('cate_industry_id',$industry_id)->latest('id')->get(['id','engineer_name']);
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 商家入驻--用户升级的信息
     *
     *
     * */
    public function blackUpgradeDetail()
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //黑金卡升级信息
        $data = BlackUpgrade::where('user_id',$uid)
            ->select('id','company_name','social_code','province','city','district','address','username','phone','license_image','front_identity_card','side_identity_card')
            ->first();
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 商家入驻
     * @param number $type 入驻类型 1-普通商家入驻 2-共享项目入驻
     * @param number $industry_pid 一级行业分类ID
     * @param number $industry_son_id 二级行业分类ID
     * @param string $shop_name 店铺名称
     * @param string $desc 简介
     * @param string $shop_province 店铺省份
     * @param string $shop_city 店铺城市
     * @param string $shop_district 店铺区/县
     * @param string $shop_address 店铺地址
     * @param number $shop_mobile 店铺电话
     * @param number $longitude 店铺的经度
     * @param number $latitude 店铺的纬度
     * @param string $company_name 公司名称
     * @param string $social_code 社会信用代码
     * @param string $company_province 公司省份
     * @param string $company_city 公司城市
     * @param string $company_district 公司区/县
     * @param string $company_address 公司注册地址
     * @param number $upgrade_id 会有升级ID
     * @param string $username 用户名称
     * @param number $phone 用户电话
     * @param string $license_image 营业执照
     * @param string $front_identity_card 身份证正面
     * @param string $side_identity_card 身份证反面
     * @param number $league_id 项目ID
     * @param string $engineer_image 中资联加盟凭证
     * @param string $shop_image 店铺图片
     * */
    public function merchantEngineerAdd($type,$industry_pid,$industry_son_id,$shop_name,$desc,$shop_province, $shop_city,$shop_district,$shop_address,$shop_mobile,$longitude,$latitude,$company_name, $social_code,$company_province,$company_city,$company_district,$company_address,$upgrade_id,$username, $phone,$license_image,$front_identity_card,$side_identity_card,$league_id,$engineer_image,$shop_image)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //获取当前域名
        //$url = 'http://'.$_SERVER["HTTP_HOST"];
//        $engineers  = '';
//        $shops  = '';
//        //上传中资联加盟凭证
//        if (!empty($engineer_image)) {
//            $result = $this->uploader->save($engineer_image, 'engineer');
//            if ($result) {
//                $engineers = $url.$result['path'];
//            }
//        }
       // $arr = [];
        //拆分字符串
        $imgs = explode(',',$shop_image);
        //上传店铺图片
//        if ($shop_image) {
//            $result = $this->uploader->save($shop_image, 'shop_image');
//            if ($result) {
//                $shops = $url.$result['path'];
//            }
//        }
        //判断是否已填写入驻信息
        $merchant = MerchantEnter::where('user_id',$uid)->first();
        if ($merchant){
            //更新入驻资料
            $data= $merchant->update([
                'user_id' => $uid,
                'username' => $username,
                'user_phone' => $phone,
                'upgrade_id' => $upgrade_id,
                'type' => $type,
                'industry_id' => $industry_pid,
                'cate_industry_id' => $industry_son_id,
                'industry_name' => IndustryCategory::where('id',$industry_pid)->value('cate_name'),
                'cate_industry_name' => IndustryCategory::where('id',$industry_son_id)->value('cate_name'),
                'shop_name' => $shop_name,
                'desc' => $desc,
                'province' => $shop_province,
                'city' => $shop_city,
                'district' => $shop_district,
                'address' => $shop_address,
                'phone' => $shop_mobile,
                'longitude' => $longitude,
                'latitude' => $latitude,
                'company_name' => $company_name,
                'social_code' => $social_code,
                'company_province' => $company_province,
                'company_city' => $company_city,
                'company_district' => $company_district,
                'company_address' => $company_address,
                'license_image' => $license_image,
                'front_identity_card' => $front_identity_card,
                'side_identity_card' => $side_identity_card,
                'shop_image' => $imgs[0],
                'engineer_id' => $league_id,
                'engineer_name' => LeagueEngineer::where('id',$league_id)->value('engineer_name'),
                'league_image' => $engineer_image,
            ]);

            //添加店铺主图
            foreach ($imgs as $img){
                //添加图片数据到数据库
                $arr = ShopImage::where('shop_id',$merchant['id'])->update([
                    'shop_id' => $merchant['id'],
                    'image'   => $img,
                ]);
            }

            //返回结果
            if ($data){
                return $this->success($data);
            }
            return $this->fail(300007);

        }else{
            //新增入驻资料
            $shop_id = MerchantEnter::insertGetId([
                'user_id' => $uid,
                'username' => $username,
                'user_phone' => $phone,
                'upgrade_id' => $upgrade_id,
                'type' => $type,
                'industry_id' => $industry_pid,
                'cate_industry_id' => $industry_son_id,
                'industry_name' => IndustryCategory::where('id',$industry_pid)->value('cate_name'),
                'cate_industry_name' => IndustryCategory::where('id',$industry_son_id)->value('cate_name'),
                'shop_name' => $shop_name,
                'desc' => $desc,
                'province' => $shop_province,
                'city' => $shop_city,
                'district' => $shop_district,
                'address' => $shop_address,
                'phone' => $shop_mobile,
                'longitude' => $longitude,
                'latitude' => $latitude,
                'company_name' => $company_name,
                'social_code' => $social_code,
                'company_province' => $company_province,
                'company_city' => $company_city,
                'company_district' => $company_district,
                'company_address' => $company_address,
                'license_image' => $license_image,
                'front_identity_card' => $front_identity_card,
                'side_identity_card' => $side_identity_card,
                'shop_image' => $imgs[0],
                'engineer_id' => $league_id,
                'engineer_name' => LeagueEngineer::where('id',$league_id)->value('engineer_name'),
                'league_image' => $engineer_image,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            //更新会员升级信息
            $upgrade_update = BlackUpgrade::where('id',$upgrade_id)->update([
                'shop_id' => $shop_id,
                'shop_name' => $shop_name,
            ]);
            //添加店铺主图
            foreach ($imgs as $img){
                //添加图片数据到数据库
                $arr = ShopImage::create([
                    'shop_id' => $shop_id,
                    'image'   => $img,
                ]);
            }

            //返回结果
            if ($shop_id){
                return $this->success($shop_id);
            }
            return $this->fail(300007);
        }

    }

    /*
     *
     * 营业报表
     * @param int $page 分页数
     * @param int $limit 每页几条
     * @param datetime $start_time 开始时间
     * @param datetime $end_time 结束时间
     * @param datetime $default 默认全部
     *
     * */
    public function businessRecodeList($page,$limit,$start_time,$end_time,$default)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;

        $query = BusinessRecode::query()->where('user_id',$uid);
//        $where = function ($query) use ($start_time,$end_time,$default) {
//            if ( !empty($start_time) && !empty($end_time)) {
//                $query->where('created_at', '>=', $start_time);
//                $query->where('created_at', '<=', $end_time);
//            }
//        };

        if (!empty($start_time) && !empty($end_time)) {
            $query = $query->whereBetween('created_at', [$start_time, $end_time]);
        }
        if ($default == 6){
            //全部
            $query = $query->latest('id')->get()->toArray();
        }elseif ($default == 3){
            //积分
            $query = $query->where('type',3)->latest('id')->get()->toArray();
        }else{
            //现金
            $query = $query->where('type',1)->latest('id')->get()->toArray();
        }
        //每页条数
        $perPage = $limit ? $limit : 200;
        //分页数
        if ($page) {
            $current_page = $page;
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }
        $item = array_slice($query, ($current_page-1)*$perPage, $perPage); //注释1
        $total = count($query);
        $paginator = new LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),  //注释2
            'pageName' => 'page',
        ]);
        $data = $paginator->toArray()['data'];

        //现金
        $totalMoney = BusinessRecode::where('type',1)->where('user_id',$uid)->sum('money');
        //积分
        $totalIntegral = BusinessRecode::where('type',3)->where('user_id',$uid)->sum('integral');

        $result = [
            'recodeList' => $data,
            'totalMoney' => $totalMoney,
            'totalIntegral' => $totalIntegral,
        ];
        //返回结果
        if ($data){
            return $this->success($result);
        }
        return $this->fail(900009);
    }

    /*
     * 营业款
     *
     * */
    public function businessCount()
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //余额
        $moneyBag = $user->money_bag;
        //积分
        $integral = $user->total_credits;
        //今天时间
        $s_date = date('Y-m-d 00:00:00');
        $e_date = date('Y-m-d 23:59:59');
        //今日收益
        $todayMoney = BusinessRecode::where('user_id', $uid)
            ->whereBetween('created_at', [$s_date,$e_date])
            ->whereIn('type', [1,2])
            ->sum('money');
        $todayIntegral = BusinessRecode::where('user_id', $uid)
            ->whereBetween('created_at', [$s_date,$e_date])
            ->where('type', 3)
            ->sum('integral');
        //昨天时间
        $s_data_2 = date("Y-m-d 00:00:00",strtotime("-1 day"));
        $e_data_2 = date("Y-m-d 23:59:59",strtotime("-1 day"));
        //昨日收益
        $yesterdayMoney = BusinessRecode::where('user_id', $uid)
            ->whereBetween('created_at', [$s_data_2,$e_data_2])
            ->whereIn('type', [1,2])
            ->sum('money');
        $yesterdayIntegral = BusinessRecode::where('user_id', $uid)
            ->whereBetween('created_at', [$s_data_2,$e_data_2])
            ->where('type', 3)
            ->sum('integral');

        $data = [
            'moneyBag' => $moneyBag,
            'integral' => $integral,
            'todayMoney' => $todayMoney,
            'todayIntegral' => $todayIntegral,
            'yesterdayMoney' => $yesterdayMoney,
            'yesterdayIntegral' => $yesterdayIntegral,
        ];
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 系统通知列表
     *
     *
     * */
    public function messageList()
    {
        $data = Message::where('status',1)->latest()->get(['id','message_content','name','created_at','read_status']);
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 系统通知详情
     * @param int $message_id 消息ID
     *
     * */
    public function messageDetail($message_id)
    {
        $data = Message::find($message_id);
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 交易通知
     * @param int $page 分页数
     * @param int $limit 每页几条
     * */
    public function orderMessageList($page,$limit)
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        $query = Order::with('item:id,order_id,good_type')
            ->whereIn('status',[2,3,4])
            ->where('user_id',$uid);
        $query = $query->select('id','username','status','paid_at','pay_money','shop_name')
            ->latest('id')->get()->toArray();
        //每页条数
        $perPage = $limit ? $limit : 200;
        //分页数
        if ($page) {
            $current_page = $page;
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }
        $item = array_slice($query, ($current_page-1)*$perPage, $perPage); //注释1
        $total = count($query);
        $paginator = new LengthAwarePaginator($item, $total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),  //注释2
            'pageName' => 'page',
        ]);
        $data = $paginator->toArray()['data'];
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 交易详情
     * @param number $order_id 交易ID，即订单ID
     *
     * */
    public function orderItem($order_id)
    {
        $data = Order::where('id',$order_id)
            ->select('id','shop_name','shop_image','pay_money','payment','order_sn','created_at')
            ->first();
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     *
     * 实名认证信息页面 --审核不通过
     *
     * */
    public function shiMingInfo()
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        $data = MemberBind::where('user_id',$uid)
            ->select('id','username','code_sn','front_card_image','back_card_image','check_status','refuse_review','address')
            ->first();
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 我的店铺--数据统计
     *
     *
     * */
    public function myShopCountInfo()
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //店铺ID
        $shopId = MerchantEnter::where('user_id',$uid)->value('id');
        //合伙人数量
        $partner_num = MerchantEnter::where('user_id',$uid)->value('partner_num');
        //俱乐部会员
        $club_num = MerchantEnter::where('user_id',$uid)->value('club_num');
        //商品数量
        $good_num = Good::where('shop_id',$shopId)->where('state',1)->count();
        //店员数量
        $shop_manner_num = MerchantEnter::where('user_id',$uid)->value('shop_manner_num');
        //订单数量
        $order_num = Order::where('shop_id',$shopId)->whereIn('status',[2,3,4])->count();
        //会员折扣信息
        $discountInfo = MemberDiscount::get(['id','discount','name']);
        //数据
        $data = [
            'shopId'      => $shopId,
            'partner_num' => $partner_num,
            'club_num'    => $club_num,
            'good_num'    => $good_num,
            'shop_manner_num' => $shop_manner_num,
            'order_num' => $order_num,
            'discountInfo' => $discountInfo,
        ];
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     *
     * 忘记密码
     * @param string $mobile 手机号
     * @param string $checkCode 验证码
     * @param string $new_password 新密码
     * */
    public function forgetPassword($mobile,$checkCode,$new_password)
    {
        //查询手机验证码
        $smsCode = SmsCode::where('mobile',$mobile)->where('type',40)->first();
        $code = $smsCode['code'];
        //判断验证码是否正确
        if( $code != $checkCode ) {
            return $this->fail(200002);
        }

        $member = Member::where('mobile',$mobile)->first();
        //修改密码
        $data = $member->update(['password'=>bcrypt($new_password)]);
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(210008);
    }


    /*
     * 会员信息
     *
     *
     * */
    public function memberForDetail()
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        $data = Member::with('memberBind')->find($uid);
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 邀请好友
     *
     * */
    public function inviteUser()
    {
        //用户信息
        $user = Auth::guard('member')->user();
        //用户ID
        $uid = $user->id;
        //邀请码信息
        $data = MemberBind::where('user_id',$uid)
            ->select('id','invite_code','qr_code_image')
            ->first();
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 会员背景图
     *
     * */
    public function backgroundImage()
    {
        $data = BackgroundImage::get(['id','type','background_image']);
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(900009);
    }

    /*
     * 读取消息
     * @param int $message_id 消息ID
     *
     * */
    public function readMessage($message_id)
    {
        $data = Message::where('id',$message_id)->update(['read_status'=>2]);
        //返回结果
        if ($data){
            return $this->success($data);
        }
        return $this->fail(210036);
    }

}