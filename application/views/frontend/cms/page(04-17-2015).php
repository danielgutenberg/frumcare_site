<div class="clearfix"></div>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul>
                <li>Safety guide
                    <ul>
                        <li><a href="#!">For Families</a></li>
                        <li><a href="#!">For Caregivers</a></li>
                    </ul>
                </li>
                <li>Advice and Tips
                    <ul>                        
                        <li><a href="#!">For Families</a></li>
                        <li><a href="#!">For Caregivers</a></li>
                        <li><a href="#!">For Employers</a></li>
                    </ul>
                </li>
                <li><a href="#!">FAQ</a></li>
                <li><a href="#!">Rate Caculator</a></li>
                <li><a href="#!">Backround Check</a></li>                                 
            </ul>
        </div>        
        <div class="col-md-9">
            <?php if($content_data){?> 
                <h2> <?php echo $content_data['title'];?></h2>
                 	<?php echo $this->breadcrumbs->show();?>
                <p> <?php echo nl2br($content_data['content']);?>
            <?php }?>
        </div>
    </div>    
</div>