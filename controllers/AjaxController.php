<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class AjaxController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index', 't1'],
                        'allow' => true,
                        'roles' => ['@', '?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['GET', 'POST'],
                    't1' => ['POST', 'GET']
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        Yii::$app->request->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionT1()
    {
        if (Yii::$app->request->post()) {
            $request = Yii::$app->request;
            $x = $request->post('min');
            $y = $request->post('max');
            return $this->asJson(array(
                'a' => $x,
                'b' => $y,
                'rand' => rand($x, $y)
            ));
        } else {
            throw new \yii\web\HttpException(404, 'Page not found.');
        }
    }
}
