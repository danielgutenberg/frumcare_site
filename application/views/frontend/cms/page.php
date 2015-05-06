<div class="container">
    <?php if($content_data){?> 
        <h2> <?php echo $content_data['title'];?></h2>
         	<?php echo $this->breadcrumbs->show();?>
        <p> <?php echo nl2br($content_data['content']);?>
    <?php }?>

</div>