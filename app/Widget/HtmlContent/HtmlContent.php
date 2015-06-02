<?php

namespace cs\Widget\HtmlContent;

use cs\services\Security;
use Yii;
use yii\helpers\Html;
use cs\base\BaseForm;
use cs\services\UploadFolderDispatcher;
use cs\services\SitePath;
use yii\jui\InputWidget;

/**
 * Класс FileUploadMany
 *
 * Виджет который загружает файлы по несколько штук
 *
 * Максимальный размер загружаемого файла по умолчанию устанавливается равный тому который указан в параметре ini.php upload_max_filesize
 *
 *
 * $field->widget('cs\Widget\FileUploadMany\FileUploadMany', [
 *
 * ]);
 *
 * $options = [
 * 'serverName'
 * ];
 *
 * $model->$fieldName = [
 * ['file_path', 'file_name'],
 * ];
 */
class HtmlContent extends InputWidget
{
    /**
     * @var array the HTML attributes for the input tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];

    public $uploadUrl = '/upload/HtmlContent';

    private $fieldId;
    private $fieldName;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();

        $this->fieldId = strtolower($this->model->formName() . '-' . $this->attribute);
        $this->fieldName = $this->model->formName() . '[' . $this->attribute . ']';
    }

    /**
     * рисует виджет
     */
    public function run()
    {
        $this->registerClientScript();
        $attribute = $this->attribute;
        $value = $this->model->$attribute;

        return Html::textarea($this->fieldName, $value, ['id' => $this->fieldId]);
    }

    /**
     * Registers the needed JavaScript.
     */
    public function registerClientScript()
    {
        \cs\Widget\HtmlContent\Asset::register($this->view);
        $js = <<<JS
        CKEDITOR.config.filebrowserUploadUrl = '{$this->uploadUrl}';
        CKEDITOR.replace( '{$this->fieldId}' );
JS;
        $this->getView()->registerJs($js);
    }


    /**
     * Возвращает опции для виджета
     *
     * @return array the options
     */
    protected function getClientOptions()
    {
        return [
        ];
    }

    /**
     * @param array             $field
     * @param \cs\base\BaseForm $model
     *
     * @return array поля для обновления в БД
     */
    public static function onUpdate($field, $model)
    {
        $fieldName = $field[ BaseForm::POS_DB_NAME ];

        return [
            $fieldName => $model->$fieldName,
        ];
    }

    /**
     * Удаляет
     *
     * @param \cs\base\BaseForm | \cs\base\DbRecord $model
     * @param array                                 $field
     *
     * @return string
     */
    public static function onDelete($field, $model)
    {
        self::getContentPath($field, $model)->delete();
    }


    /**
     * @param \cs\base\BaseForm | \cs\base\DbRecord $model
     * @param array                                 $field
     *
     * @return SitePath
     */
    private static function getContentPath($field, $model)
    {
        $fieldName = $field[ BaseForm::POS_DB_NAME ];

        return UploadFolderDispatcher::createFolder($model->getTableName(), $model->id, $fieldName);
    }

    /**
     * загружает картинки в CKEDITOR
     */
    public function upload()
    {
        $fileInfo = pathinfo($_FILES['upload']['name']);
        $path = UploadFolderDispatcher::createFolder('HtmlContent', '_temp');
        $path->add(time() . '_' . Security::generateRandomString(10) . '.' . $fileInfo['extension']);

        if (($_FILES['upload'] == 'none') OR (empty($_FILES['upload']['name']))) {
            $message = 'No file uploaded';
        }
        else if ($_FILES['upload']['size'] == 0) {
            $message = 'The file is of zero length';
        }
        else if (($_FILES['upload']['type'] != 'image/jpeg') AND ($_FILES['upload']['type'] != 'image/png')) {
            $message = 'The image must be in either JPG or PNG format. Please upload a JPG or PNG instead';
        }
        else if (!is_uploaded_file($_FILES['upload']['tmp_name'])) {
            $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon";
        }
        else {
            $message = '';
            $move = @move_uploaded_file($_FILES['upload']['tmp_name'], $path->getPathFull());
            if (!$move) {
                $message = 'Error moving uploaded file. Check the script is granted Read/Write/Modify permissions';
            }
        }
        $funcNum = $_GET['CKEditorFuncNum'];

        return Html::script("window.parent.CKEDITOR.tools.callFunction({$funcNum}, '{$path->getPath()}', '{$message}');");
    }

}
