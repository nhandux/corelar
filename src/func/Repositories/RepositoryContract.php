<?php

namespace Nhanduc\Core\Func\Repositories;

/** :: Nhanduc ::
***********************************************************************************************************************
* @source  : RepositoryContract.php
* @project :
*----------------------------------------------------------------------------------------------------------------------
* VER  DATE           AUTHOR          DESCRIPTION
* ---  -------------  --------------  ---------------------------------------------------------------------------------
* 1.0  2020/11/12     Name_0070
* ---  -------------  --------------  ---------------------------------------------------------------------------------
* Project Description
* Copyright(c) 2020 Nhanduc Ltd. ,All rights reserved.
**********************************************************************************************************************/
interface RepositoryContract
{
    public function all();

    public function count();

    public function create(array $data);

    public function createMultiple(array $data);

    public function deleteById($id);

    public function delete();

    public function deleteMultipleById(array $ids);

    public function first();

    public function get();

    public function getById($id);

    public function updateById($id, array $data);

    public function getByColumn($item, $column, array $columns = ['*']);

    public function limit($limit);

    public function orderBy($column, $value);

    public function paginate($limit = 25, array $columns = ['*'], $pageName = 'page', $page = null);

    public function where($column, $value, $operator = '=');

    public function whereIn($column, $value);

    public function with($relations);
}
