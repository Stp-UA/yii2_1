<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Category;
use app\models\SignupForm;
use app\models\ResetPasswordForm;
use app\models\NewPasswordForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
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
        return $this->render('index', [
            'cats' => Category::find()->all()
        ]);
    }

    public function actionSignup()
    {
        Yii::$app->user->logout();

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->signup()) {
                return $this->redirect(['/login']);
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about', [
            'isGuest' => Yii::$app->user->isGuest,
            'data' => 'личный телефон заместителя директора'
        ]);
    }
    public function actionResetPassword()
    {
        $model = new ResetPasswordForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Перевірте вашу пошту'));
                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', Yii::t('app', 'Щось пішло не так. Спробуйте ще раз'));
            }
        }
        return $this->render('reset_password', [
            'model' => $model,
        ]);
    }
    public function actionNewPassword($token)
    {
        if (empty($token) || !is_string($token)) {
            Yii::$app->session->setFlash('error', Yii::t('app', 'Щось пішло не так. Спробуйте ще раз'));
        }
        $model = new NewPasswordForm($token);
        if ($model->error_token) {
            Yii::$app->session->setFlash('error', Yii::t('app', 'Ви перевищили час на зміну пароля'));
            return $this->goHome();
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Новий пароль успішно збережено'));
            return $this->goHome();
        }
        return $this->render('new_password', [
            'model' => $model,
        ]);
    }
}
