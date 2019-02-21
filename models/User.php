<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class User extends ActiveRecord implements \yii\web\IdentityInterface{
    

    public static function tableName(){
		return 'users';
	}

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $result =  static::find()->where(['username' => $username])->one();
        var_dump($result);
        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    
    public function generateAccessToken() {
        $this -> accessToken = Yii::$app -> security -> generateRandomString();
    }
    public function generateAuthKey() {
        $this -> authKey = Yii::$app -> security -> generateRandomString();
    }
    public function setPassword($param) {
        $this -> password =  Yii::$app -> security -> generatePasswordHash($param);
    }
    
    public function validatePassword($pass_hash, $password){
        return Yii::$app->getSecurity()->validatePassword($password, $pass_hash);
    }
}
