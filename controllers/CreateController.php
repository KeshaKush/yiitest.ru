<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\CreateNewsForm;
use yii\web\UploadedFile;
/**
 * Description of CreateController
 *
 * @author User
 */
class CreateController extends Controller{
    
    public function actionNew() {
        $model = new CreateNewsForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->images = UploadedFile::getInstances($model, 'images');
            if($model -> upload()){              
                if($model -> saveNews()){
                    if($model-> saveImages()){
                        return $this->goHome();
                    }
                }
            }
            //return $this->goHome();
        }
        
        return $this->render('new', [
            'model' => $model
        ]);
    }
    
}
