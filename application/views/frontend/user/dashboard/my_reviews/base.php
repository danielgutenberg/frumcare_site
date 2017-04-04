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
		    <div class="alert alert-success alert-dismissible invite_response" role="alert" style="display:none">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            </div>
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
     							echo $dt->format('m/d/Y');
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
            }
      		else{ 
      		 echo '<p>You have no reviews</p><br>';
      		    
      		}
      		    if($account_category == 1) { ?>
      		    <div>
      		        <?php echo anchor('',"Invite employers to write a review",'class="btn btn-success invite_review"');?>
      		    </div>
      		<?php }
        	?>
        	
     </div>
</div>


<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Invite Employers to Write a Review</h4>
                                </div>
                                <div class="modal-body">
                        <form class="usersreviewform">
                            <table>
                       
                                <tbody class="rows">
                                <tr>
                                    <td><label>Name:</label></td>
                                    <td style="padding:3px;padding-top: 0px;">
                                        <input type="email" name="names[]" class="required" multiple></input>
                                    </td>
                                    <td style="padding-left:20px"><label>Email:</label></td>
                                    <td style="padding:3px;padding-top: 0px;">
                                        <input type="email" name="emails[]" class="required" multiple></input>
                                    </td>
                                </tr>
                                </tbody>
                               </table>
                               <table style="margin-left:-10px; margin-top:12px">
                                <tr><td class="addrow" style="cursor: pointer;font-size: 13px;color: blue;">Add Name</td></tr>

                    
                                <tr>
                                    <td>
                                        <input type="hidden" name="current_user" value="<?php echo @$this->session->userdata['current_user'];?>"/>
                                    </td>
                                </tr>
                                </table>

                            <div class="modal-footer">
                              <button style="float:left" type="button" class="btn btn-primary save_review">Request Review</button>
                          </div>
                                </div>

                            </div>
                        </div>
                        </form>
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
<script>
    $(document).ready(function() {
    	$('.invite_review').click(function(e) {
    		e.preventDefault()
        	$('#myModal3').modal('show');
    	})
    	
    	
	    $('.save_review').on('click',function(){
			
			$.ajax( {
				type: "POST",
				url: '<?php echo site_url();?>invite_review',
				data: $('form.usersreviewform').serializeArray(),
				success: function( msg ) {
	    			$('#myModal3').modal('hide');
	                $('.invite_response').html(msg);
	                $('.invite_response').show();
                    html = '<tr><td><label>Name:</label></td><td style="padding:3px;padding-top: 0px;"><input type="text" name="names[]" class="required" multiple></input></td><td style="padding-left:20px"><label>Email:</label></td><td style="padding:3px;padding-top: 0px;"><input type="email" name="emails[]" class="required" multiple></input></td></tr>'
        
        			$('.rows').html(html)
	            }
	        });
		});
        
    
    })
</script>
