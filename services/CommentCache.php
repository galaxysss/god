<?php

namespace app\services;

use Yii;
use yii\db\Query;
use yii\helpers\FileHelper;

/**
 * Class CommentCache
 *
 * Сервис для организации кеширования комментариев
 *
 * @package app\services
 */

class CommentCache extends \yii\base\Object
{
    public $typeId;
    public $rowId;

    const TABLE = 'gs_comments_cache';

    /**
     * Закеширована страница?
     */
    public function isCached()
    {
        return ((new Query())->select('is_cached')->from(self::TABLE)->where([
                'type_id' => $this->typeId,
                'row_id'  => $this->rowId,
            ])->scalar() == 1);
    }

    /**
     * Получает закешированные данные
     */
    public function get()
    {
        $path = $this->getPath();
        if (!file_exists($path)) return '';

        return file_get_contents($path);
    }

    /**
     * Сохраняет закешированные данные
     */
    public function set($data)
    {
        $this->createFolder();
        $path = $this->getPath();
        $this->update(1);

        return file_put_contents($path, $data);
    }

    /**
     * Очищает кеш
     */
    public function clear()
    {
        $this->update(0);
    }

    /**
     * Возвращает полный путь к кешируемому файлу
     * @return string
     */
    private function getPath()
    {
        $typeIdString = self::getFolderName($this->typeId, 3);
        $rowIdString = self::getFolderName($this->rowId);
        $fileName = "@runtime/CommentCache/{$typeIdString}/{$rowIdString}.html";

        return Yii::getAlias($fileName);
    }

    private function update($isCached)
    {
        $this->save(['is_cached' => $isCached], [
            'type_id' => $this->typeId,
            'row_id'  => $this->rowId,
        ]);
    }

    private function save($set, $where)
    {
        if ((new Query())->select('*')->from(self::TABLE)->where($where)->exists()) {
            (new Query())->createCommand()->update(self::TABLE, $set, $where)->execute();
        }
        else {
            foreach ($set as $k => $v) {
                $where[ $k ] = $v;
            }
            (new Query())->createCommand()->insert(self::TABLE, $where)->execute();
        }
    }

    /**
     * Возвращает полный путь к кешируемому файлу
     * @return string
     */
    private function createFolder()
    {
        $typeIdString = self::getFolderName($this->typeId, 3);
        $fileName = "@runtime/CommentCache/{$typeIdString}";
        $path = Yii::getAlias($fileName);
        FileHelper::createDirectory($path);
    }

    /**
     * Создает имя папки
     * Если эти число то возвратит строку с числом и ведущими нулями длинной в общем = 8
     * Если это строка то она и будет возвращена
     *
     * @param int | string $id
     * @param int          $idLength
     *
     * @return string
     */
    private static function getFolderName($id, $idLength = 8)
    {
        $name = $id;
        if (is_numeric($id)) {
            $name = str_repeat('0', $idLength - strlen($id)) . $id;
        }

        return $name;
    }
}