<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

class TestController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['mypage'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // $this->layout = 'template_01';
        $this->layout = 'template_02';
        return $this->render('index', [
            'text' => 'Написание текстов для главных страниц сайта – дело непростое. Проблема в том, что существует сразу несколько подходов к подготовке таких материалов.'
        ]);
    }

    public function actionMypage()
    {
        return $this->render('mypage');
    }

}
