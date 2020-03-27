<?php

namespace App\Services\WebService;
use App\Model\Member;
use App\Model\MemberBind;
use App\Model\RelationTeam;
use App\Model\SmsCode;
use App\Model\Website;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class MemberAuthService extends BaseService
{

    /*
    *  用户手机号注册
    *
    *  @param string $mobile 手机号
    *  @param string $password 密码
    *  @param string $checkCode 验证码
    *  @param int $status 注册协议 10-否 20-是
    *  @param int $uid 推荐人ID
    * */
    public function getMemberRegister($mobile,$checkCode,$uid)
    {
        //定义一个空数组
       // $user = [];
        //昵称
        $nickname = '测试_'.$mobile;
        //邀请码
        $invite_code = $this->createInviteCode();
        //邀请二维码
        $invite_img = $this->myInviter($invite_code);
        //ip地址
        $ip = $_SERVER["REMOTE_ADDR"];
        //查询手机验证码
        $smsCode = SmsCode::where('mobile',$mobile)->where('type',10)->first();
        $code = $smsCode['code'];
        //判断是否有推荐人推荐注册
        if (isset($uid) && $uid > 0){
            //查询推荐人信息
            $inviteUserInfo = Member::where('id',$uid)->first();
            //推荐人层级水平
            $inviteLevel = $inviteUserInfo['level'];
            //关系路径
            $invitePath = $inviteUserInfo['path'];
            //推荐人用户名
            $inviteUserName = $inviteUserInfo->memberBind->nick_name;

            //判断推荐人是否有父级信息
            $invite_grand_info = RelationTeam::where('user_id',$uid)->first();
            $inviteGrandUserName = '';
            $invite_grand_uid = 0;
            $invite_relation_path = '';
            //如果存在
            if ($invite_grand_info){
                //父级用户ID
                $invite_grand_uid = $invite_grand_info['invite_uid'];
                //父级用户信息
                $inviteGrandUserInfo = Member::where('id',$invite_grand_uid)->first();
                //父级用户名
                $inviteGrandUserName = $inviteGrandUserInfo->memberBind->nick_name;
                //推荐用户路径
                $invite_relation_path = $invite_grand_info['relation_path'];
            }

            //是否存在用户认证的手机号码
            //判断验证码是否正确
            if( $code != $checkCode ) {
                return $this->fail(200002);

            }else{
                //根据手机号查询是否已经存在用户
                $minProgramUser = Member::where('mobile',$mobile)->first();
                //用户推荐状态
                $invite_status = $minProgramUser['invite_status'];
                //如果存在
                if ($minProgramUser){
                    //根据手机号判断该注册用户是否被他人推荐的
                    if ($invite_status == 10){

                        //更新用户
                        $updateUser = Member::where('id',$minProgramUser['id'])->update([
                            'invite_status' => 20,//更新为推荐状态
                            'pid'      => $uid,//父级ID
                            'level'    => $inviteLevel + 1,//水平层级
                            'path'     => $invitePath.','.$minProgramUser['id'],//用户路径关系
                        ]);

                        //如果存在推荐人父级用户
                        if ($invite_grand_uid > 0){

                            //记录推荐团队关系
                            $user_relation_team = RelationTeam::create([
                                'user_id' => $minProgramUser['id'],
                                'invite_uid' => $uid,
                                'grand_uid' => $invite_grand_uid,
                                'invite_name' => $inviteUserName,
                                'grand_name' => $inviteGrandUserName,
                                'relation_path' => $invite_relation_path.','.$minProgramUser['id'],
                            ]);

                        }else{
                            //记录推荐团队关系
                            $user_relation_team = RelationTeam::create([
                                'user_id' => $minProgramUser['id'],
                                'invite_uid' => $uid,
                                'grand_uid' => 0,
                                'invite_name' => $inviteUserName,
                                'grand_name' => '暂无',
                                'relation_path' => $uid.','.$minProgramUser['id'],
                            ]);
                        }

                        //更新推荐人的直接推荐用户数量
                        $updateInviteUserNum = MemberBind::where('user_id',$uid)->increment('num');

                    }else{
                        //已被推荐
                        return $this->fail(210012);
                    }

                }else{
                    //创建新的注册用户
                    //是否存在用户认证的手机号码
                    //判断验证码是否正确
                    if( $code != $checkCode ) {
                        return $this->fail(200002);
                    }else{
                        //新注册
                        $user = new Member([
                            'mobile'   => $mobile,
                            'name'     => $nickname,
                            'password' => bcrypt('123456'),
                            'invite_status' => 20,//更新为推荐状态
                            'pid'      => $uid,//父级ID
                            'level'    => $inviteLevel + 1,//水平层级
                            'created_at' => date('Y-m-d H:i:s'),
                        ]);

                        //保存数据库
                        $user->save();

                        //更新注册用户路径关系
                        $updateNewUserPath = Member::where('id',$user->id)->update([
                            'path'     => $invitePath.','.$user->id,//用户路径关系
                        ]);

                        //创建用户详情信息
                        $userBind = $user->memberBind()->make([
                            'nick_name'=> $nickname,
                            'invite_code' => $invite_code,
                            'qr_code_image' => $invite_img,
                            'avatar'   => 'http://img3.imgtn.bdimg.com/it/u=3527936276,4134359723&fm=11&gp=0.jpg',
                            'login_ip' => $ip,
                            'created_at' => date('Y-m-d H:i:s'),
                        ]);
                        //保存到数据库
                        $userBind->save();

                        //如果存在推荐人父级用户
                        if ($invite_grand_uid > 0){

                            //记录推荐团队关系
                            $user_relation_team = RelationTeam::create([
                                'user_id' => $minProgramUser['id'],
                                'invite_uid' => $uid,
                                'grand_uid' => $invite_grand_uid,
                                'invite_name' => $inviteUserName,
                                'grand_name' => $inviteGrandUserName,
                                'relation_path' => $invite_relation_path.','.$minProgramUser['id'],
                            ]);

                        }else{
                            //记录推荐团队关系
                            $user_relation_team = RelationTeam::create([
                                'user_id' => $minProgramUser['id'],
                                'invite_uid' => $uid,
                                'grand_uid' => 0,
                                'invite_name' => $inviteUserName,
                                'grand_name' => '暂无',
                                'relation_path' => $uid.','.$minProgramUser['id'],
                            ]);
                        }

                        //更新推荐人的直接推荐用户数量
                        $updateInviteUserNum = MemberBind::where('user_id',$uid)->increment('num');

                    }


                }

            }

        }else{
            //如果不存在推荐关系的

            //是否存在用户认证的手机号码
            //判断验证码是否正确
            if( $code != $checkCode ) {
                return $this->fail(200002);

            }else{
                //根据手机号查询是否已经存在用户
                $minProgramUser = Member::where('mobile',$mobile)->first();

                if ($minProgramUser){
                    //更新登陆信息
                    $updateBindUser = MemberBind::where('user_id',$minProgramUser['id'])->update([
                        'login_ip' => $ip,
                    ]);

                    return $this->fail(210035);
                }else{
                    //创建用户
                    $user = new Member([
                        'mobile'   => $mobile,
                        'name'     => $nickname,
                        'password' => bcrypt('123456'),
                        'created_at' => date('Y-m-d H:i:s'),
                    ]);

                    //保存数据库
                    $user->save();

                    //创建用户详情信息
                    $userBind = $user->memberBind()->make([
                        'nick_name'=> $nickname,
                        'invite_code' => $invite_code,
                        'avatar'   => 'http://img3.imgtn.bdimg.com/it/u=3527936276,4134359723&fm=11&gp=0.jpg',
                        'qr_code_image' => $invite_img,
                        'login_ip' => $ip,
                        'created_at' => date('Y-m-d H:i:s'),
                    ]);
                    //保存到数据库
                    $userBind->save();

                    return $this->success($user);
                }

            }

        }

        return $this->fail(210001);

    }

    //生成邀请码
    public function createInviteCode()
    {
        $code = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $rand = $code[rand(0,25)]
            .strtoupper(dechex(date('m')))
            .date('d')
            .substr(time(),-5)
            .substr(microtime(),2,5)
            .sprintf('%02d',rand(0,99));
        for(
            $a = md5( $rand, true ),
            $s = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            $s = strtolower($s),
            $d = '',
            $f = 0;
            $f < 6;
            $g = ord( $a[ $f ] ),
            $d .= $s[ ( $g ^ ord( $a[ $f + 8 ] ) ) - $g & 0x1F ],
            $f++
        );
        return $d;
    }

    // 生成我的邀请海报
    public function myInviter($invite_code)
    {
        //获取当前域名
        $host_url = 'http://'.$_SERVER["HTTP_HOST"];
        $url = $host_url.'api/V1/auth/register?invite_code='.$invite_code;
        $qrcode = QrCode::size(100)->errorCorrection('H');
        $content = $qrcode->format('png')->size(300)->encoding('UTF-8')->generate($url);
        $filename = md5($content).'.png';
        //图片存放路径
        $path = public_path('uploads/qrcode/img');
        if(!is_dir($path)){
            mkdir($path,0777,true);
        }
        //图片路径
        $filepath = public_path('uploads/qrcode/img').'/'.$filename;
        //图片url
        file_put_contents($filepath, $content);
        $bg_url  = $host_url.'/'.'uploads/qrcode/img'.'/'.$filename;
        return $bg_url;
    }

    /*
     * 注册协议
     *
     * */
    public function registerInfo()
    {
        $result = Website::where('type',10)->select('id','website_content')->first();
        //返回结果
        if ($result){
            return $this->success($result);
        }
        return $this->fail(900009);
    }

}