<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\CreateNewsForm;
/**
 * Description of CreateController
 *
 * @author User
 */
class CreateController extends Controller{
    
    public function actionNew() {
        $model = new CreateNewsForm();
        return $this->render('new', [
            'model' => $model,
        ]);
    }
    
}
