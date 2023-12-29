<?php

namespace app\controllers;

use Yii;
use app\models\Images;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\Attachments;

class FilesController extends Controller
{
    public function actionIndex()
    {
        $images = Images::find()->all();
        return $this->render('index', [
            'images' => $images
        ]);
    }

    public function actionUploads()
    {

        $model = new Attachments();
        if (Yii::$app->request->post()) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $res = $model->upload();
            if ($res['status']) {
                return $this->redirect(['/files']);
            }
        }
        return $this->render('uploads', [
            'model' => $model
        ]);
    }
}