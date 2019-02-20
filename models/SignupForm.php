<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use Yii;
use \yii\base\Model;

/**
 * Description of SignupForm
 *
 * @author User
 */
class SignupForm extends Model{
    
    public $username;
    public $password;
    public $passwd;
    
    public function rules()
    {
        return [
            [['username', 'password', 'passwd'], 'required', 'message' => 'Заполните поле'],
            ['username', 'unique', 'targetClass' => User::className(),  'message' => 'Этот логин уже занят'],
        ];
    }
    
    public function signup(){
 
        if (!$this->validate()) {
            return null;
        }
 
        /**if (!$this -> password === $this -> passwd) {
            return null;
        }*/
        
        $user = new User();
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateAccessToken();
        
        $user->save() ? $user : null;
        
        $auth = Yii::$app->authManager;
        $authorRole = $auth->getRole('author');
        $auth->assign($authorRole, $user->getId());
        
        return $user;
    }
}
