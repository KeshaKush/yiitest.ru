<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

  <head>
    
    <!-- Meta Tag -->
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- SEO -->
    <meta name="description" content="150 words">
    <meta name="author" content="uipasta">
    <meta name="url" content="http://www.yourdomainname.com">
    <meta name="copyright" content="company name">
    <meta name="robots" content="index,follow">
    <?php $this->registerCsrfMetaTags() ?>
    
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" type="image/x-icon" href="images/favicon/apple-touch-icon.png">
    
   
    <!-- Google Web Fonts  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">
    
</head>

<body>
 	<?php $this->beginBody() ?>
	
     
	 <!-- Preloader Start -->
     <div class="preloader">
	   <div class="rounder"></div>
      </div>
      <!-- Preloader End -->
<div class="wrap">
      <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Главная', 'url' => ['/site/index']],
                ['label' => 'Лента', 'url' => ['/feed/index']],
                Yii::$app->user->isGuest ? (
                    ['label' => 'Войти', 'url' => ['/auth/index']]
                ):(
                '<li>'
                    . Html::beginForm(['/auth/logout'], 'post')
                    . Html::submitButton(
                        'Выйти (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout',
                        'style' => 'padding-top:15px; padding-bottom:15px;'
                        ]
                    )
                    . Html::endForm()
                    . '</li>'
                ),
            ],
        ]);
        NavBar::end();
    ?>
</div>    
    
    
    <div id="main">
        <div class="container">
            <div class="row">

                 <!-- Content block -->
                 <div class="col-md-12">
                    <div class="col-md-12 page-body">
                    	
                    		                            
                            
                            	<!-- Content Start -->
                                
                                <?= $content ?>
                                <!-- Content End -->
                             
                              
                         
                         
                        
                           
                         </div>
                     
                     
                       <!-- Footer Start -->
                       <div class="col-md-12 page-body margin-top-50 footer">
                          <footer>
                          <ul class="menu-link">
                               <li><a href="index.html">Home</a></li>
                               <li><a href="about.html">About</a></li>
                               <li><a href="work.html">Work</a></li>
                               <li><a href="contact.html">Contact</a></li>
                            </ul>
                            
                          <p>© Copyright 2016 DevBlog. All rights reserved</p>
						  
						  
						  <!-- UiPasta Credit Start -->
                          <div class="uipasta-credit">Design By <a href="http://www.uipasta.com" target="_blank">UiPasta</a></div>
                          <!-- UiPasta Credit End -->

                           
                         </footer>
                       </div>
                       <!-- Footer End -->
                     
                     
                  </div>
                  <!-- Content Block -->
                
            </div>
         </div>
      </div>
    
    
    
    <!-- Back to Top Start -->
    <a href="#" class="scroll-to-top"><i class="fa fa-long-arrow-up"></i></a>
    <!-- Back to Top End -->

   <?php $this->endBody() ?>
   </body>
 </html>
<?php $this->endPage() ?>