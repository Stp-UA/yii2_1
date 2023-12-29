<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

class SignupForm extends Model
{
    public $email;
    public $password;
    public $password_repeat;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['email', 'password', 'password_repeat'], 'required'],
            ['email', 'trim'],
            ['email', 'string', 'max' => 255],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            ['email', 'filter', 'filter' => function ($value) {
                return strtolower($value);
            }],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => Yii::t('app', 'Такій користувач вже існує')],
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return false;
        }
        $user = new User();
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save();
    }
}
