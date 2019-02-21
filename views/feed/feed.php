<?php

/* @var $this yii\web\View */
namespace app\models;

use yii\helpers\Html; 
use yii\helpers\Url;
use yii\widgets\LinkPager;
use Yii;

$this->title = 'Лента новостей';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="col-md-12 blog-post">-->
<div class="row">
    <div class="sub-title">
        <h2><?= Html::encode($this->title) ?></h2>
        <?php if (Yii::$app->user->can('createPost')) { ?>
            <a href=<?php echo Url::to(['create/new']);?>><i class="icon-pencil"></i></a>
        <?php  } ?>
    </div>

<!--    <h1><?= Html::encode($this->title) ?></h1>
    <a href="contact.html"><i class="icon-pencil"></i></a>-->
<!--</div>-->
<div class="col-md-12 content-page">
<!-- Blog Post Start -->
<?php   foreach ($data as $news){ ?>
	<div class="col-md-12 blog-post">
		<?php if($news -> preview != null){ ?>
			<div class="post-image">
            	<img src=<?php echo "\"".$news -> preview."\"" ?> alt="">                                 
        	</div> 
    	<?php } ?>
	    <div class="post-title">
	      <a href=<?php echo Url::to(['site/single', 'id' => $news -> id]);?>><h1><?php echo $news -> title; ?></h1></a>
	    </div>  
	    <div class="post-info">
	    	<span><?php echo $news -> date; ?></span>
	    </div>  
	    <p><?php echo substr( $news -> text , 0, 250) . '...'; ?></p>                          			
	    <a href=<?php echo Url::to(['feed/show', 'id' => $news -> id]);?> class="button button-style button-anim fa fa-long-arrow-right"><span>Читать далее</span></a>
	</div>

<?php
	}
        
    echo LinkPager::widget([
        'pagination' => $pages,
    ]);
?>
</div>
</div>