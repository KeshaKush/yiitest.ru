<?php

use slavkovrn\imagegalary\ImageGalaryWidget;

$this->title = 'Страница новости';
?>
<div class="col-md-12 content-page">
  <div class="col-md-12 blog-post">
    
    <!-- Post Headline Start -->
    <div class="post-title">
      <h1><?php echo $data -> title; ?></h1> 
    </div>
       <!-- Post Headline End -->
        
        
    <!-- Post Detail Start -->
    <div class="post-info">
      <span><?php echo $data -> date.' / by '.$auth -> username; ?></span>
    </div>
       <!-- Post Detail End -->
        
        
    <p>
      
      <?php echo $data -> text; ?>

    </p>
        
    
    <!-- Post Gallery -->
    <div class="post-image margin-top-40 margin-bottom-40">
      <?php
      if($images != []){
        echo ImageGalaryWidget::widget([
          'id' =>'imagegalary',       // id of plugin should be unique at page
          'class' =>'imagegalary',    // class of div to define style
          'css' => 'border:white;',   // css commands of class (for example - border-radius:5px;)
          'image_width' => '640px',       // height of image visible in pixels
          'image_height' => '400px',      // width of image visible in pixels
          'thumb_width' => 160,        // height of thumb images in pixels
          'thumb_height' => 100,       // width of thumb images in pixels
          'items' => 5,               // number of thumb items
          'images' => $images         // images of galary

        ]);    
    }
      ?>                                  
    </div>
      <!-- Post Gallery -->
  </div>
</div>