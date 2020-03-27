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

use App\Repositories\ProfessionsRepository;
use Auth;
use App\Handlers\ImageUploadHandler;
use Illuminate\Support\Facades\Hash;

class ProfessionsService
{
    protected $uploader;

    protected $professionsRepository;

    protected $actionLogsService;

    /**
     * AdminsService constructor.
     * @param ProfessionsRepository $professionsRepository
     * @param ImageUploadHandler $imageUploadHandler
     * @param ActionLogsService $actionLogsService
     */
    public function __construct(ProfessionsRepository $professionsRepository, ImageUploadHandler $imageUploadHandler,ActionLogsService $actionLogsService)
    {
        $this->uploader = $imageUploadHandler;
        $this->professionsRepository = $professionsRepository;
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
        $platform = $this->professionsRepository->create($datas);
        return $platform;
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

        $platform = $this->professionsRepository->ById($id);

        $platform->update($datas);

        return $platform;
    }

    /**
     * 获取详细资料
     * @param $id
     * @return mixed
     */
    public function ById($id)
    {
        return $this->professionsRepository->ById($id);
    }

    /**
     * 获取列表
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getProfessionsList()
    {
        return $this->professionsRepository->getProfessionsList();
    }

}