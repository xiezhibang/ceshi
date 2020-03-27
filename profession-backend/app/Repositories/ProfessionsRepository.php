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
 * Time: 上午9:54
 */
namespace App\Repositories;

use App\Models\FaOccupation;

class ProfessionsRepository
{
    /**
     * 创建
     * @param array $params
     * @return mixed
     */
    public function create(array $params)
    {
        return FaOccupation::create($params);
    }

    /**
     * 根据id获取资料
     * @param $id
     * @return mixed
     */
    public function ById($id)
    {
        return FaOccupation::find($id);
    }

    /**
     * 获取列表 with ('roles')
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getProfessionsList()
    {
        return FaOccupation::query()->latest('id')->paginate('20');
    }

    /**
     * 根据name查询资料
     * @param $name
     * @return mixed
     */
    public function ByName($name)
    {
        return FaOccupation::where('name',$name)->first();
    }
}