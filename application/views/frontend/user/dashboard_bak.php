<div class="container">
<?php 
    $user = (get_user(check_user()));
    if($user){
        if($user['account_category'] == 1)
                $category = "caregiver";
            else 
                $category = "careseeker";

        if($user['account_type'] == 1)
               $type = "individual";
            else
                $type = "organization";
    }
?>
    <div class="dashboard-wrappers">
    <h3>
        Welcome to <span class="dark-blue">Frum</span><span class="light-blue">Care</span><span class="greens">.com</span>
    </h3>
    <?php 
        if(user_flash()){
            echo user_flash();
        }
    ?>
    <?php 
        //echo $this->session->flashdata('msg');
        //echo $this->session->flashdata('success');
          //echo $this->session->flashdata('error');
        ?>

    <p class="style-dashboard">
        <a href="<?php echo base_url();?>user/profile/">Click here</a> to view your profile

        <br />
    
        <a href="<?php echo base_url();?>user/upload/<?php echo sha1(check_user());?>">Click here</a> to upload your photo

        <br />
        <a href="<?php echo base_url('user/edit/'.sha1(check_user())) ?>">
            Click Here
        </a> to update your profile.

        <br />

        <a href="<?php echo site_url();?>ad/add_step2/<?php echo $category;?>/<?php echo $type;?>/<?php echo sha1(check_user());?>">Click Here</a> to post an ad.

        <br />
        <a href="<?php echo base_url('user/edit_availability_time/'.sha1(check_user())) ?>">
            Click Here
        </a> to update your availability time.

        <br/>

        <a href="<?php echo base_url('user/addrefrences/'.sha1(check_user())) ?>">
            Click Here
        </a> to add your refrences.

        <br />
         <a href="<?php echo base_url('user/addtestimonials/'.sha1(check_user())) ?>">
            Click Here
        </a> to add your testimonials.

        <br />

         <a href="<?php echo base_url('user/delete_account/'.sha1(check_user()));?>">Click Here </a>to delete your account.</a>

         <br />

        <a href="javascript:void(0);" class="verifyphn" id="<?php echo check_user();?>">Click Here</a> to verify your phone number.
        <br>
        <a href="<?php echo base_url();?>user/writereview/<?php echo sha1(check_user());?>">Click here</a> to write review
        <br />
        <a href="<?php echo base_url();?>user/myreview/<?php echo sha1(check_user());?>">Click here</a> to view your reviews
        <br />
        
        <a href='#' id='ticketModal' data-toggle='modal' data-target='#ticketModal'>Click Here</a> to submit ticket<span class="tickets-modals"></span>
        
        <br />
        
        <a href="<?php echo base_url().'user/ticket_view';?>">Click Here </a>to view your tickets.</a>
        
        <br />
        
        <!-- <a href="<?php echo base_url('user/edit_nutshell/'.sha1(check_user())) ?>">
            Click Here
        </a> to update your nutshell. -->
    </p>
     <div id="smserror"></div>

        <div class="verifications">
            <p>Verifications</p>
                <ul style="list-style-type: none;">
                    <li><label>Basic Background Check</label> <span><img src="<?php echo site_url();?>img/cross.png"></span></li>
                    <li><label>Motor Vehicle Records Check</label> <span><img src="<?php echo site_url();?>img/cross.png"></span></li>
                    <li>
                        <label>Phone number Verification</label> 
                        <?php if($verificationdata['contact_number_status'] == 0){ ?>
                            <span><img src="<?php echo site_url();?>img/cross.png" /></span>
                        <?php }else{ ?>
                            <span><img src="<?php echo site_url();?>img/tick.png" /></span>
                        <?php } ?>
                    </li>
                    <li>
                        <label>Email address Verification</label>
                        <?php if($verificationdata['email_status'] == 0){ ?>
                            <span><img src="<?php echo site_url();?>img/cross.png" /></span>
                        <?php }else{ ?>
                            <span><img src="<?php echo site_url();?>img/tick.png" /></span>
                        <?php } ?>
                    </li>
                    <li>
                        <label>Facebook Verification</label>
                        <?php if($verificationdata['facebook_contact_status'] == 0){ ?>
                            <span><img src="<?php echo site_url();?>img/cross.png" /></span>
                        <?php }else{ ?>
                            <span><img src="<?php echo site_url();?>img/tick.png" /></span>
                        <?php } ?>
                    </li>
                    <li>
                        <label>Twitter Verification</label>
                        <?php if($verificationdata['twitter_contact_status'] == 0){ ?>
                            <span><img src="<?php echo site_url();?>img/cross.png" /></span>
                        <?php }else{ ?>
                            <span><img src="<?php echo site_url();?>img/tick.png" /></span>
                        <?php } ?>
                    </li>
                    <li>
                        <label>Google+ Verification</label>
                        <?php if($verificationdata['google_contact_status'] == 0){ ?>
                            <span><img src="<?php echo site_url();?>img/cross.png" /></span>
                        <?php }else{ ?>
                            <span><img src="<?php echo site_url();?>img/tick.png" /></span>
                        <?php } ?>
                    </li>
                    <li>
                        <label>Profile Picture Verification</label>
                         <?php if($verificationdata['profile_picture_status'] == 0){ ?>
                            <span><img src="<?php echo site_url();?>img/cross.png" /></span>
                        <?php }else{ ?>
                            <span><img src="<?php echo site_url();?>img/tick.png" /></span>
                        <?php } ?>
                    </li>
                </ul>   
        </div>
        
        <!------Submit Ticket Form----->
        
    <div class="modal fade help-page" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">Submit a Ticket <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></div>
			<div class="modal-body">
				<form class="ticket" enctype="multipart/form-data" method="post">	
					<label>Ticket Title</label>
					<input type="text" name="ticket_title" class="title">
					<br/>
					<label>Ticket Description</label>
					<textarea name="ticket_description" class="desc"></textarea>
					<br/>
					<label>File</label>
					<input type="hidden" id="file-name" name="file">
					<button class="btn btn-default" id="select_file">Select File</button>
					<input type="file" name="file_upload" id="file_upload" style="display: none;"> 
					<div id="output" class="loader"></div>
					<br/>
					<label>Contact Email</label>
					<input type="text" name="contact_email" class="email">
					<br/>
					<label>Contact Number(Optional)</label>
					<input type="text" name="contact_number">
					<input type="hidden" name="date" value="<?php echo time();?>">
					<div class="modal-footer">
					 <button class="btn closeform" data-dismiss="modal" aria-hidden="true">Close</button>
					 <input type="submit" class="btn btn-primary save_ticket" value="Save Changes" />
					</div>
				</form>
				<div id="success"></div>
			</div>
		</div>

	</div>
</div>
        <!--------Submit Ticket Form Ends--------->
     

</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var user_id = $('.verifyphn').attr('id');
        $('.verifyphn').click(function(){
            $.ajax({
                type:"post",
                url:'<?php echo site_url();?>user/sendsms/',
                data:"user_id="+user_id,
                success:function(done){
                    if(done == 1){
                        window.location.href = "<?php echo site_url();?>user/smsverification/<?php echo sha1(check_user());?>";
                    }
                    if(done == 2){
                        $('#smserror').text('Your phone number is already verified.').show();
                    }
                    if(done == 0){
                         $('#smserror').text('Sorry sms not sent.').show();
                    }
                }
            });
        });
    });
</script>

<!---Submit Ticket JS------->
<script type="text/javascript">
    $(function(){
        
        $(".ticket").validate({
            // Specify the validation rules
            rules: {
                ticket_title: "required",
                contact_email: {
                    required: true,
                    email: true
                },
            },
            // Specify the validation error messages
            messages: {
                ticket_title: "Please enter ticket title",
                contact_email: "Please enter a valid email address",
            },
            submitHandler: function(form) {
                     $.ajax({
		    		   	type: "POST",
						url: "<?php echo site_url();?>user/submit_ticket",
						data: $('form.ticket').serializeArray(),
		        		success: function(data){
		         			$("form.ticket").get(0).reset();
		         			jQuery('#success').show().html('<p class="success">Ticket has been submitted.</p>');
							jQuery('.ticket').hide();
		 		        },
					error: function(){
						alert("failure");
						}
		      		});
		      return true;
            }
        });



        // modal box section goes here 
        $('#ticketModal').on('click', function(e){
        	e.preventDefault();
        	var current_user = "<?php if(isset($this->session->userdata['current_user'])) echo $this->session->userdata['current_user'] ;?>";
        	if(current_user!=''){
        		$('#success').hide();
        		$('.ticket').show();
   				$('#reportModal').modal();	
        	}else{
        		window.location.href='<?php echo site_url();?>login';
        	}
        		
		});
		
		$(".close").on("click", null, null, function(){
    		$('.modal-backdrop').hide();
    		$('.title error').removeclass('.title error');
		});

		$(".closeform").on("click", null, null, function(){
    		$('.modal-backdrop').hide();
		});
        
    });//CODE BY CHAND
</script>
<!---Submit Ticket JS END------->

<!-- FILE UPLOAD -->
<script type="text/javascript">
	var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
	var link = '<?php echo site_url("user/uploadfile?files")?>';
	$('#select_file').click(function(e){
		e.preventDefault();
		$('#file_upload').trigger('click');
	});//CODE BY CHAND
</script>

<script type="text/javascript" src="<?php echo site_url("js/fileuploader.js")?>"></script>
<!-- FILE UPLOAD -->