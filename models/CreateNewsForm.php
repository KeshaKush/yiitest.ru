<?php

namespace app\models;

use yii\base\Model;

class CreateNewsForm extends Model{
    
    public $title;
    public $text;
    
    public function rules()
    {
        return [
            // username and password are both required
            [['title','text'], 'required'],

        ];
    }
}
