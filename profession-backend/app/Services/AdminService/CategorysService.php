<?php
/**
 * YICMS
 * ============================================================================
 * 版权所有 2014-2017 YICMS，并保留所有权利。
 * 网站地址: http://www.yicms.vip
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Created by PhpStorm.
 * Author: kenuo
 * Date: 2017/11/13
 * Time: 上午9:50
 */

namespace App\Services;

use App\Repositories\CategorysRepository;
use Auth;
use App\Handlers\ImageUploadHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategorysService
{
    protected $uploader;

    protected $categorysRepository;

    protected $actionLogsService;

    /**
     * AdminsService constructor.
     * @param CategorysRepository $actitysRepository
     * @param ImageUploadHandler $imageUploadHandler
     * @param ActionLogsService $actionLogsService
     */
    public function __construct(CategorysRepository $categorysRepository, ImageUploadHandler $imageUploadHandler,ActionLogsService $actionLogsService)
    {
        $this->uploader = $imageUploadHandler;
        $this->categorysRepository = $categorysRepository;
        $this->actionLogsService = $actionLogsService;
    }

    /**
     * 创建数据
     * @param $request
     * @return mixed
     */
    public function create($request)
    {
        $datas = $request->all();
        //上传图片
        if ($request->cat_logourl) {
            $result = $this->uploader->save($request->cat_logourl, 'logourl');
            if ($result) {
                $datas['cat_logourl'] = $result['path'];
            }
        }
        if ($request->small_logourl) {
            $result = $this->uploader->save($request->small_logourl, 'small');
            if ($result) {
                $datas['small_logourl'] = $result['path'];
            }
        }
        $expert = $this->categorysRepository->create($datas);
        return $expert;
    }

    /**
     * 更新资料
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $datas = $request->all();
        //上传图片
        if ($request->cat_logourl) {
            $result = $this->uploader->save($request->cat_logourl, 'logourl');
            if ($result) {
                $datas['cat_logourl'] = $result['path'];
            }
        }
        if ($request->small_logourl) {
            $result = $this->uploader->save($request->small_logourl, 'small');
            if ($result) {
                $datas['small_logourl'] = $result['path'];
            }
        }
        $expert = $this->categorysRepository->ById($id);
        $expert->update($datas);

        return $expert;
    }

    /**
     * 获取详细资料
     * @param $id
     * @return mixed
     */
    public function ById($id)
    {
        return $this->categorysRepository->ById($id);
    }

    /**
     * 获取列表
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getCategorysList()
    {
        return $this->categorysRepository->getCategorysList();
    }

}