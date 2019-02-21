<?php

use yii\helpers\Html;
use mihaildev\ckeditor\CKEditor;
use yii\bootstrap\ActiveForm;

$this->title = 'Создание новости';

?>

<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php
        $form = ActiveForm::begin([
            'id' => 'create-news-form',
            'layout' => 'horizontal',
            'options' => [
                'enctype' => 'multipart/form-data'
                ],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-7\">{input}</div>\n<div class=\"col-lg-3\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-2 control-label'],
            ],
        ]);
        ?>
        <?= $form->field($model, 'title')->textInput()->label("Заголовок"); ?>
    
        <?= $form->field($model, 'text')
            ->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'basic',
                        'inline' => false,
                        'resize_enabled' => true
                    ],
                ])
            ->label("Содержимое");
        ?>
   
        <?php echo $form->field($model, 'images[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label("Изображения"); ?>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>