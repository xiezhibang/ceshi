<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AddressUpgradeRequest;
use App\Http\Requests\Api\BlackUpgradeRequest;
use App\Http\Requests\Api\FeedbackImageAddRequest;
use App\Http\Requests\Api\FeedbackRequest;
use App\Http\Requests\Api\ForgetPasswordRequest;
use App\Http\Requests\Api\HelpDetailShowRequest;
use App\Http\Requests\Api\IndustrySonCateRequest;
use App\Http\Requests\Api\MerchantAddRequest;
use App\Http\Requests\Api\MessageDetailRequest;
use App\Http\Requests\Api\OrderJiaoYIDetailRequest;
use App\Http\Requests\Api\PageLimitRequest;
use App\Http\Requests\Api\PartnerDetailRequest;
use App\Http\Requests\Api\ReadMessageRequest;
use App\Http\Requests\Api\RealNameRequest;
use App\Http\Requests\Api\SetMoneyRequest;
use App\Http\Requests\Api\UpdateMobileRequest;
use App\Http\Requests\Api\UpdatePasswordRequest;
use App\Http\Requests\Api\WxCodeRequest;
use App\Services\WebService\MemberAuthService;
use App\Services\WebService\MemberService;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /*
     * 注册协议
     *
     * */
    public function registerInfo(MemberAuthService $memberAuthService)
    {
        $result = $memberAuthService->registerInfo();
        return $result;
    }

    /*
     * 会员升级--金卡
     *
     * */
    public function goldInfo(MemberService $memberService)
    {
        $result = $memberService->goldInfo();
        return $result;
    }

    /*
     * 会员升级--黑金卡
     *
     * */
    public function blackInfo(MemberService $memberService)
    {
        $result = $memberService->blackInfo();
        return $result;
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
    public function realNameAuthentication(RealNameRequest $request,MemberService $memberService)
    {
        $result = $memberService->realNameAuthentication($request->name,$request->card_code,$request->address,$request->card_front,$request->card_back);
        return $result;
    }

    /*
    * 修改会员头像
    *
    * @param string $avatar 头像
    *
    * */
    public function updateAvatar(Request $request,MemberService $memberService)
    {
        $result = $memberService->updateAvatar($request->avatar);
        return $result;
    }

    /*
    * 修改会员信息
    * @param string $nick_name 会员昵称
    * @param string $member_sign 会员个性签名
    * @param string $gender 会员性别 1-男 2-女
    * @param string $province 省份
    * @param string $city 城市
    * @param string $district 区县
    * @param string $address_detail 详细地址
    *
    * */
    public function updateMemberInfo(Request $request,MemberService $memberService)
    {
        $result = $memberService->updateMemberInfo($request->nick_name,$request->member_sign,$request->gender,$request->province,$request->city,$request->district,$request->address_detail);
        return $result;
    }

    /*
    * 设置金额
    * @param number $money 金额
    * @param string $remark 收钱理由
    *
    * */
    public function setPayMoney(SetMoneyRequest $request,MemberService $memberService)
    {
        $result = $memberService->setPayMoney($request->money,$request->remark);
        return $result;
    }

    /*
    * 帮助中心列表
    *
    * */
    public function helpCategoryList(MemberService $memberService)
    {
        $result = $memberService->helpCategoryList();
        return $result;
    }

    /*
   * 帮助中心详情
   * @param number $cate_id 分类ID
   *
   * */
    public function helpDetailShow(HelpDetailShowRequest $request,MemberService $memberService)
    {
        $result = $memberService->helpDetailShow($request->cate_id);
        return $result;
    }

    /*
    * 关于我们
    *
    * */
    public function aboutOurInfo(MemberService $memberService)
    {
        $result = $memberService->aboutOurInfo();
        return $result;
    }

    /*
    * 俱乐部说明
    *
    * */
    public function clubRemark(MemberService $memberService)
    {
        $result = $memberService->clubRemark();
        return $result;
    }

    /*
    * 俱乐部会员章程
    *
    * */
    public function clubContent(MemberService $memberService)
    {
        $result = $memberService->clubContent();
        return $result;
    }

    /*
    * 版本信息
    *
    *
    * */
    public function versionInfo(MemberService $memberService)
    {
        $result = $memberService->versionInfo();
        return $result;
    }


    /*
   * 用户反馈
   * @param string $content 反馈内容
   * $param $string $image 反馈图片，可选
   *
   * */
    public function addFeedback(FeedbackRequest $request,MemberService $memberService)
    {
        $result = $memberService->addFeedback($request->feedback_content,$request->image);
        return $result;
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
    public function partnerRecodeList(Request $request,MemberService $memberService)
    {
        $result = $memberService->partnerRecodeList($request->page,$request->limit,$request);
        return $result;
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
    public function memberClubList(Request $request,MemberService $memberService)
    {
        $result = $memberService->memberClubList($request->page,$request->limit,$request);
        return $result;
    }

    /*
     * 我的合伙
     *
     * */
    public function myPartnerList(PageLimitRequest $request,MemberService $memberService)
    {
        $result = $memberService->myPartnerList($request->page,$request->limit);
        return $result;
    }

    /*
     * 合伙详情
     * @param int $partner_id 合伙ID
     *
     *
     * */
    public function partnerDetail(PartnerDetailRequest $request,MemberService $memberService)
    {
        $result = $memberService->partnerDetail($request->partner_id);
        return $result;
    }

    /*
     * 我的零钱
     *
     * */
    public function myMoneyBag(MemberService $memberService)
    {
        $result = $memberService->myMoneyBag();
        return $result;
    }

    /*
     * 解绑微信号
     * @param string $wx_code 微信号
     *
     * */
    public function cancelWxCode(WxCodeRequest $request,MemberService $memberService)
    {
        $result = $memberService->cancelWxCode($request->wx_code);
        return $result;
    }

    /*
     * 更换手机号
     * @param string $mobile 手机号
     * @param string $checkCode 验证码
     *
     * */
    public function updateMobile(UpdateMobileRequest $request,MemberService $memberService)
    {
        $result = $memberService->updateMobile($request->mobile,$request->checkCode);
        return $result;
    }

    /*
     * 修改密码
     * @param string $mobile 手机号
     * @param string $checkCode 验证码
     * @param string $password 密码
     * @param string $confirm_password 确认密码
     *
     * */
    public function updatePassword(UpdatePasswordRequest $request,MemberService $memberService)
    {
        $result = $memberService->updatePassword($request->mobile,$request->checkCode,$request->password,$request->confirm_password);
        return $result;
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
    public function upgradeBackAdd(BlackUpgradeRequest $request,MemberService $memberService)
    {
        $result = $memberService->upgradeBackAdd($request->company_name,$request->social_code,$request->province,$request->city,$request->district,$request->address,$request->username,$request->mobile,$request->license_image,$request->front_identity_card,$request->side_identity_card);
        return $result;
    }

    /*
    * 选择根据地，即店铺列表
    * @param int $upgrade_id 黑金卡升级ID
    * @param string $address 地区
    *
    *
    * */
    public function upgradeAddress(Request $request,MemberService $memberService)
    {
        $result = $memberService->upgradeAddress($request->keywords);
        return $result;
    }

    /*
     * 确认选择根据地
     * @param int $upgrade_id 黑金卡升级ID
     * @param int $shop_id 根据地ID
     * */
    public function getAddressUpgrade(AddressUpgradeRequest $request,MemberService $memberService)
    {
        $result = $memberService->getAddressUpgrade($request->upgrade_id,$request->shop_id);
        return $result;
    }

    /*
     * 商家入驻，行业分类（一级）
     *
     * */
    public function industryPidCategory(MemberService $memberService)
    {
        $result = $memberService->industryPidCategory();
        return $result;
    }

    /*
    * 商家入驻，行业分类（二级）
    * @param number $industry_id 行业ID
    *
    * */
    public function industrySonCategory(IndustrySonCateRequest $request,MemberService $memberService)
    {
        $result = $memberService->industrySonCategory($request->industry_id);
        return $result;
    }

    /*
     * 商家入驻，项目列表
     *
     *
     * */
    public function leagueEngineerList(IndustrySonCateRequest $request,MemberService $memberService)
    {
        $result = $memberService->leagueEngineerList($request->industry_id);
        return $result;
    }

    /*
     * 商家入驻--用户升级的信息
     *
     *
     * */
    public function blackUpgradeDetail(MemberService $memberService)
    {
        $result = $memberService->blackUpgradeDetail();
        return $result;
    }

    /*
     * 商家入驻
     *
     * */
    public function merchantEngineerAdd(MerchantAddRequest $request,MemberService $memberService)
    {
        $result = $memberService->merchantEngineerAdd($request->type,$request->industry_pid,$request->industry_son_id,$request->shop_name,$request->desc,$request->shop_province,$request->shop_city,$request->shop_district,$request->shop_address,$request->shop_mobile,$request->longitude,$request->latitude,$request->company_name,$request->social_code,$request->company_province,$request->company_city,$request->company_district,$request->company_address,$request->username,$request->phone,$request->license_image,$request->front_identity_card,$request->side_identity_card,$request->league_id,$request->engineer_image,$request->shop_image);
        return $result;
    }

    /*
     *
     * 营业报表
     * @param int $page 分页数
     * @param int $limit 每页几条
     * @param datetime $start_time 开始时间
     * @param datetime $end_time 结束时间
     *
     * */
    public function businessRecodeList(Request $request,MemberService $memberService)
    {
        $result = $memberService->businessRecodeList($request->page,$request->limit,$request->start_time,$request->end_time,$request->default);
        return $result;
    }

    /*
     * 营业款
     *
     * */
    public function businessCount(MemberService $memberService)
    {
        $result = $memberService->businessCount();
        return $result;
    }

    /*
     * 系统通知列表
     *
     *
     * */
    public function messageList(MemberService $memberService)
    {
        $result = $memberService->messageList();
        return $result;
    }

    /*
     * 系统通知详情
     * @param int $message_id 消息ID
     *
     * */
    public function messageDetail(MessageDetailRequest $request,MemberService $memberService)
    {
        $result = $memberService->messageDetail($request->message_id);
        return $result;
    }

    /*
    * 交易通知
    * @param int $page 分页数
    * @param int $limit 每页几条
    * */
    public function orderMessageList(PageLimitRequest $request,MemberService $memberService)
    {
        $result = $memberService->orderMessageList($request->page,$request->limit);
        return $result;
    }

    /*
     * 交易详情
     * @param number $order_id 交易ID，即订单ID
     *
     * */
    public function orderItem(OrderJiaoYIDetailRequest $request,MemberService $memberService)
    {
        $result = $memberService->orderItem($request->order_id);
        return $result;
    }

    /*
    *
    * 实名认证信息页面 --审核不通过
    *
    * */
    public function shiMingInfo(MemberService $memberService)
    {
        $result = $memberService->shiMingInfo();
        return $result;
    }

    /*
    * 我的店铺--数据统计
    *
    *
    * */
    public function myShopCountInfo(MemberService $memberService)
    {
        $result = $memberService->myShopCountInfo();
        return $result;
    }

    /*
    *
    * 忘记密码
    * @param string $mobile 手机号
    * @param string $checkCode 验证码
    * @param string $new_password 新密码
    * */
    public function forgetPassword(ForgetPasswordRequest $request,MemberService $memberService)
    {
        $result = $memberService->forgetPassword($request->mobile,$request->checkCode,$request->new_password);
        return $result;
    }

    /*
     * 会员信息
     *
     * */
    public function memberForDetail(MemberService $memberService)
    {
        $result = $memberService->memberForDetail();
        return $result;
    }

    /*
   * 提交反馈图片
   * @param $string $image 反馈图片
   * */
    public function feedBackImageAdd(FeedbackImageAddRequest $request,MemberService $memberService)
    {
        $result = $memberService->feedBackImageAdd($request->image);
        return $result;
    }

    /*
    * 邀请好友
    *
    * */
    public function inviteUser(MemberService $memberService)
    {
        $result = $memberService->inviteUser();
        return $result;
    }

    /*
    * 会员背景图
    *
    * */
    public function backgroundImage(MemberService $memberService)
    {
        $result = $memberService->backgroundImage();
        return $result;
    }

    /*
     * 读取消息
     * @param int $message_id 消息ID
     *
     * */
    public function readMessage(ReadMessageRequest $request,MemberService $memberService)
    {
        $result = $memberService->readMessage($request->message_id);
        return $result;
    }

}
