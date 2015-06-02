<?php

namespace cs\models;

use app\models\BaseModel;
use cs\models\DbRecord;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use app\models\PriceList;
use yii\helpers\Html;

class OrderToBankСonsumer extends OrderToBank
{
    const TABLE_FIELDS   = 'cs_orders_consumer';
    const KEY_FIELD_NAME = 'order_id';

    private $fields2;

    public function getField2($name)
    {
        if (!is_null($this->fields2)) {
            $row = (new Query())->select('*')->from(static::TABLE_FIELDS)->where([self::KEY_FIELD_NAME => $this->getId()])->one();
            if ($row === false) {
                $this->fields2 = [];
            } else {
                $this->fields2 = $row;
            }
        }

        return $this->fields2[ $name ];
    }

    public function update($fieldsInput)
    {
        $keys1 = array_keys($this->fields);
        $keysInput = array_keys($fieldsInput);
        $keys2 = array_diff($keysInput, $keys1);
        $fields1 = [];
        foreach ($keys1 as $key1) {
            $fields1[ $key1 ] = $fieldsInput[ $key1 ];
        }
        $fields2 = [];
        foreach ($keys2 as $key2) {
            $fields2[ $key2 ] = $fieldsInput[ $key2 ];
        }
        $this->update1($fields1);
        $this->update2($fields2);
    }

    public function update1($fields)
    {
        return parent::update($fields);
    }

    public function update2($fields)
    {
        return ((new Query())->createCommand()->update(self::TABLE_FIELDS, $fields, [self::KEY_FIELD_NAME => $this->getId()])->execute() > 0);
    }

    public function delete($id)
    {
        parent::delete($id);

        return ((new Query())->createCommand()->delete(static::TABLE_FIELDS, [self::KEY_FIELD_NAME => $this->getId()])->execute() > 0);
    }
}
