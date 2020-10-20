<?php
namespace models;

use base\BaseForm;

class UploadForm extends BaseForm
{

    public function getRules()
    {
        return [
            'image' => ['requaired'],
        ];
    }

    /** Загружает изображение на сервер с указаным именем
     * @param resourse $file
     * @param string $name
     */
    public static function uploadImage($file, $name)
    {
        $finalePath = __DIR__ . '/../../assets/img/';
        move_uploaded_file($file['tmp_name'], $finalePath . $name);
    }
}