<?php

namespace app\models;

use yii\base\Model;
use Yii;
class CreateNewsForm extends Model{
    
    public $title;
    public $text;
    public $images;
    
    private $news;
    
    public function rules(){
        return [
            // username and password are both required
            [['title','text','images'], 'required'],
            //[['images'], 'file', 'skipOnEmpty' => false, 'extensions' => ['png', 'jpg', 'JPG']],
        ];
    }
    public function saveNews() {
        $this -> news = new News();
        $this -> news -> text = $this -> text;
        $this -> news -> title = $this -> title;
        $this -> news -> author = Yii::$app->user->getId();
        $this -> news -> preview = 'upload/' . $this->images[0]->baseName . '.' . $this->images[0]->extension;
        return $this -> news -> save() ? true : false;        
    }
    
    public function saveImages() {  
        $i = 1;
        foreach ($this->images as $file) {
                $image = new Images();
                $image -> author = Yii::$app->user->getId();
                $image -> post = $this -> news -> getId();
                $image -> src = 'upload/' . $file->baseName . '.' . $file->extension;
                $image -> title = $i.' фото в  '. $this -> news -> getId() . ' записи';
                $image -> save();
            }
            return true;
    }
    
    public function upload(){
        if ($this->validate()) {  
            foreach ($this->images as $file) {
                $file->saveAs('upload/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return $this->addError('Что-то не так');
        }
    }
}
