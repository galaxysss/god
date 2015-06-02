<?php

namespace app\models\Form;

use app\models\NewsItem;
use app\models\User;
use cs\services\Str;
use cs\services\VarDumper;
use Yii;
use yii\base\Model;
use cs\Widget\FileUpload2\FileUpload;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * ContactForm is the model behind the contact form.
 */
class Comment extends \cs\base\BaseForm
{
    const TABLE = 'gs_comments';

    public $id;
    public $type_id;
    public $row_id;
    public $content;
    public $date_insert;
    public $user_id;
    public $verifyCode;

    function __construct($fields = [])
    {
        static::$fields = [
            [
                'content',
                'Название',
                1,
                'string'
            ],
        ];
        parent::__construct($fields);
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Проверочный код',
        ];
    }

    public function rules()
    {
        return ArrayHelper::merge([
            ['verifyCode', 'captcha', 'message' => 'Неверный код'],
        ], parent::rules());
    }

    public function insert($fieldsCols = null)
    {
        return parent::insert([
            'beforeInsert' => function ($fields) {
                if (Str::pos('<', $fields['content']) === false) {
                    $rows = explode("\r", $fields['content']);
                    $rows2 = [];
                    foreach ($rows as $row) {
                        if (trim($row) != '') $rows2[] = Html::tag('p', trim($row));
                    }
                    $fields['content'] = join("\r\r", $rows2);
                }

                $fields['date_insert'] = gmdate('YmdHis');
                $fields['id_string'] = Str::rus2translit($fields['header']);
                $fields['date'] = gmdate('Y-m-d');

                return $fields;
            }
        ]);
    }

    public function update($fieldsCols = null)
    {
        return parent::update([
            'beforeUpdate' => function ($fields) {
                if (Str::pos('<', $fields['content']) === false) {
                    $rows = explode("\r", $fields['content']);
                    $rows2 = [];
                    foreach ($rows as $row) {
                        if (trim($row) != '') $rows2[] = Html::tag('p', trim($row));
                    }
                    $fields['content'] = join("\r\r", $rows2);
                }

                return $fields;
            }
        ]);
    }

}
