<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<div class='container'>
    <?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
    <?php $this->load->view('frontend/user/dashboard/nav');?>
    </div>
        <div class="dashboard-right float-right"> 
        <?php  
       	    $account_category = $this->session->userdata('account_category');
       	    if($account_category == 1){
  		        $reviewlink =  site_url().'user/reviews/#';
           	}
            else{
  		        $reviewlink =  site_url().'user/writereview';
           	}
        ?>
        <div class="top-welcome">
            <h2>My Reviews</h2>
            <?php 
		        if(user_flash()){
		            echo user_flash();
		        }
    		    
		    ?>
        </div>
        <div class="seperator"></div>
        <?php 	
        if($myreview != FALSE){ 
            ?>                
            <table class="table table-condensed table-striped">
            	<tr>
            		<th>Date</th>
            		<th>Name</th>
            		<th>Category</th>
            		<th>Care Type</th>
            		<th>Rating</th>
            		<th>Review</th>
            
            	</tr>
            	<?php 
            		$acc = $this->session->userdata('account_category');
            		if($acc == 1){
                        $field = "user_profile_id";
                    }
            
                    if($acc  == 2){
                        $field = "user_id";
                    }
            
                    if($acc  == 3){
                        $field = "user_id";
                    }
            	?>
            	<?php 
              	foreach($myreview as $row){
       	            ?>
    				<tr>
   					    <td style="width:100px">
      						<?php 
     							$dt = new DateTime($row['created_date']);
     							echo $dt->format('Y-m-d');
      						?>
       					</td>
       					<td>
                            <?php
                                echo  $row['name'];?></td>
       					<td>
      						<?php 		
                                if($acc   == 1){
				                    echo "Caregiver";
                                }
            					if($acc   == 2){
								    echo "Careseeker";
     							}
     							if($acc  == 3){
    								echo "Organization";
     							}
      						?>
       					</td>
       					<td>
      						<?php 
                                $care = get_care_detail($row['care_type']);
      						    echo $care['service_name'];
                                    /*	
                                    foreach($care as $caredata):
       									if($details['care_type'] == $caredata['id'])
								        echo $caredata['service_name'];
            
     							    endforeach;
                                     */
 							?>
            
       					</td>
       					<td style="width:100px" class="rating-score rating-table" id="<?php echo number_format($row['review_rating'])?>"></td>
       					<td><?php echo $row['description']?></td>
        				</tr>
                        <?php
                }
                ?>
                </table>
                <?php
                    echo $links;
            }
      		else{ 
      		 echo '<p>You have no reviews</p><br>';
      		    
      		}
      		    if($account_category == 1) { ?>
      		    <a href="<?php echo site_url('caregivers/review/' . get_user2(check_user())[0]['uri'] . '/' . get_user2(check_user())[0]['care_type'])?>" type="submit" class="btn btn-success" value="Sign In" style="min-width:330px; margin-left:-15px">Click here to invite employers to write a review</a>
      		<?php }
        	?>
        	
     </div>
</div>

<link rel="stylesheet" href="<?php echo base_url();?>css/jquery.raty.css">
<script src="<?php echo base_url();?>js/jquery.raty.js"></script>
<script src="<?php echo base_url();?>js/labs.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.rating-score').each(function() {
		$(this).raty({
			path : '<?php echo site_url();?>img/',
			starHalf   : 'star-half.png',
			starOff    : 'star-off.png',
			starOn     : 'star-on.png',
			score	   : $(this).attr('id'),
			readOnly : true,
			half  : true,
			space : false
		}); 
	});
});
</script>
