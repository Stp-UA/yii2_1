<?php

namespace app\models;

use yii\base\Model;

class Attachments extends Model
{
    public $file;

    public function rules()
    {
        return [
            [['file'], 'file', 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function upload()
    {
        $filename = $this->file->name;
        if (trim($filename) !== '.') {
            if ($this->validate()) {
                $this->file->saveAs(dirname(__DIR__) . '\web\uploads\\' . $filename);
                $images = new Images();
                $images->filename = $this->file->name;
                $images->extension = $this->file->extension;
                if ($images->save()) {
                    return ['status' => 1, 'file' => $images];
                } else {
                    return ['status' => 0];
                }
            }
        } else
            return ['status' => 0];
    }
}
