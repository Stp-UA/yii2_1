<?php

namespace app\models;

use Yii;
use yii\base\Model;

class NewPasswordForm extends Model
{
    public $password;
    public $password_repeat;
    public $error_token;
    private $_user;
    const ERROR_DISABLE = 0;
    const ERROR_ANABLE = 1;

    public function __construct($token, $config = [])
    {
        $this->_user = User::findByPasswordResetToken($token);
        if (!$this->_user) {
            $this->error_token = self::ERROR_ANABLE;
        }
        parent::__construct($config);
    }
    public function rules()
    {
        return [
            [['password', 'password_repeat'], 'required'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            // ['error_token', 'default', 'value' => self::ERROR_DISABLE],
            // ['error_token', 'in', 'range' => [self::ERROR_DISABLE, self::ERROR_ANABLE]],
        ];
    }
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);
        $user->removePasswordResetToken();
        return $user->save(false);
    }
}
