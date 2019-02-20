<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\vova07\imperavi\Widget;
use yii\bootstrap\ActiveForm;

$this->title = 'Создание новости';
?>

<div class="col-md-12 content-page">
  <div class="col-md-12 blog-post">
    
    <!-- Post Headline Start -->
    <div class="post-title">
      <h1><?php echo $this -> title; ?></h1> 
    </div>
        <!-- Post Headline End -->
        
        <!-- Post Text Start -->
        <?php
        $form = ActiveForm::begin([
            'id' => 'create-news-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]);
        
        echo $form->field($model, 'title')->textInput()->label("Заголовок");
        echo $form->field($model, 'text')->widget(Widget::className(), [
            'settings' => [
                'lang' => 'ru',
                'minHeight' => 200,
                'plugins' => [
                    'clips',
                    'fullscreen'
                ]
            ]
        ])->label("Содержимое");
        ?>
        <!-- Post Text End -->
        
        <!-- Post Images Start -->
        <h1>Картинки</h1> 
        <!-- Post Images End -->
       
       
  </div>
</div>
