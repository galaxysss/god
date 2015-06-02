<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 05.05.2015
 * Time: 23:41
 */

namespace app\models;


class Comment extends \cs\base\DbRecord
{
    const TABLE = 'gs_comments';

    const TYPE_CHENNELING = 1;
    const TYPE_NEWS       = 2;

    public static function insert($fields)
    {
        $fields['date_insert'] = gmdate('YmdHis');
        return parent::insert($fields);
    }
}