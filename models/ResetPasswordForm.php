<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ResetPasswordForm extends Model
{
    public $email;
    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'filter', 'filter' => function ($value) {
                return strtolower($value);
            }],
            ['email', 'exist',
                'targetClass' => '\app\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => Yii::t('app', 'Такого користувача не існує'),
            ],
        ];
    }
    public function sendEmail()
    {
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);
        if (!$user) {
            return false;
        }
        if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        }
        return Yii::$app
            ->mailer
            ->compose(
                [
                    'html' => 'passwordResetToken-html',
                    'text' => 'passwordResetToken-text'
                ],
                ['user' => $user]
            )
            ->setFrom(['example_mail@mail_ua.ua' => Yii::$app->name . ' robot'])
            ->setTo([$this->email, 'example_mail@mail_ua.ua'])
            ->setSubject('Password reset for ' . $user->email)
            ->send();
    }
}
