<?php namespace Nhanduc\Core\Func\Traits;
/** :: Nhanduc ::
***********************************************************************************************************************
* @source  : SearchTrait.php
* @project :
*----------------------------------------------------------------------------------------------------------------------
* VER  DATE           AUTHOR          DESCRIPTION
* ---  -------------  --------------  ---------------------------------------------------------------------------------
* 1.0  2020/11/12     Name_0070
* ---  -------------  --------------  ---------------------------------------------------------------------------------
* Project Description
* Copyright(c) 2020 Nhanduc Ltd. ,All rights reserved.
**********************************************************************************************************************/

use Illuminate\Support\Facades\Schema;

trait SearchTrait
{
    /**
     * @param \Illuminate\Database\Eloquent\Builder|static $query
     * @param string $keyword
     * @param boolean $matchAllFields
     */
    public static function scopeSearch($query, $keyword, $matchAllFields = false, $record = null)
    {
        return static::where(function ($query) use ($keyword, $matchAllFields, $record) {

            foreach (static::getSearchFields($record) as $field) {
                if ($matchAllFields) {
                    $query->where($field, 'LIKE', "%$keyword%");
                } else {
                    $query->orWhere($field, 'LIKE', "%$keyword%");
                }
            }
        });
    }

    /**
     * Get all searchable fields
     *
     * @return array
     */
    public static function getSearchFields($record)
    {
        $model = new static;

        $fields = !empty($record) ? $model->$record : $model->search;
        if (empty($fields)) {
            $fields = Schema::getColumnListing($model->getTable());

            $others[] = $model->primaryKey;

            $others[] = $model->getUpdatedAtColumn() ?: 'created_at';
            $others[] = $model->getCreatedAtColumn() ?: 'updated_at';

            $others[] = method_exists($model, 'getDeletedAtColumn')
                ? $model->getDeletedAtColumn()
                : 'deleted_at';

            $fields = array_diff($fields, $model->getHidden(), $others);
        }

        return $fields;
    }
}
