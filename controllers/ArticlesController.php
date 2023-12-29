<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\Articles;
use app\models\Attachments;
use app\models\Images;

class ArticlesController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', [
            'articles' => Articles::find()->all()
        ]);
    }

    public function actionView($url)
    {
        $article = Articles::findOne(['url' => $url]);
        $img = Images::find()->where(['art_id' => $article->id])->all();
        return $this->render('view', [
            'article' => $article,
            'img' => $img
        ]);
    }

    public function actionEdit($url)
    {
        $article = Articles::findOne(['url' => $url]);
        if ($article->load(Yii::$app->request->post()) && $article->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Статтю оновлено'));
            return $this->redirect(['/articles']);
        }
        return $this->render('edit', [
            'article' => $article
        ]);
    }

    public function actionCreate()
    {
        $article = new Articles();
        if ($article->load(Yii::$app->request->post()) && $article->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Стаття збережена'));
            return $this->redirect(['/articles']);
        }
        return $this->render('create', [
            'article' => $article
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
