<div class="container reviews-wrappers">
	<div class="reviews-wrappers">
<?php
    $reviewCount = 0; 
	if(!empty($recordData)){
		foreach($recordData as $data){
            if(!empty($data['description'])){
                ?>
            	<div class="review_details">
            		<p><?php echo nl2br($data['description']);?></p>
            		<span class="name"><?php echo $data['name'];?></span>
            		<br />
            		<span class="date">
            		    <?php 
            		        $dt = new DateTime($data['created_date']);
     						echo $dt->format('m/d/Y');
            		    ?>
            		    </span>
            	</div>
                <?php
                $reviewCount++;
             } 
		}
        if($reviewCount == 0){
            echo "There are no reviews yet";    
        }
	}
    else{
	   echo "There are no reviews yet";
	}
?>
</div>
</div>