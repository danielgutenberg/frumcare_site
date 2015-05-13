<div class="container">
	<?php echo $this->breadcrumbs->show(); ?>

	<div class="help-title" style="text-align: center;color:#2AACE0;font-size:40px;">
		<strong>How can we help you?</strong>
	</div>

	<div class="help-search">
		<input type="text" placeholder="What do you need help with?" size="50"/>
	</div>

	<div class="help-links">
		<!--<span class="watch-video"><a href="#" class="btn btn-primary">Watch Video Tutorials</a></span>-->
		<span class="tickets-modals"><a href='#' id='ticketModal' data-toggle='modal' data-target='#ticketModal' class="btn btn-primary">Submit a Ticket</a></span>
		<span class="tickets-modals"><a href="<?php echo site_url();?>blog/resources/faq" class="btn btn-primary">FAQ's</a></span>
	</div>
<div class="clearfix"></div>
	<div class="help-form clearfix">
		<div class="help-form-left">
			<div class="get-in-touch"><strong>Get in Touch</strong></div>
			<br/>
			</div>
			<div class="toll-info-chat">
				<span class="toll-num">Toll:111-222-333</span>
			<br/>
			<span class="info-com">info@frumcare.com</span>
			<br/>
			<span class="chats-wrap">Chat</span>
		</div>
<div class="contact-form-help">
		<span>Contact Form </span>
		
		<form action="<?php echo site_url();?>help/send_message" method="post" name="contact" id="contact-form">
			<div><span class="contact-form-name"><input type="text" name="name" placeholder="Name"></span>
			
			<span class="contact-form-email"><input type="text" name="email" placeholder="Email"></span>
	</div>			<span class="contact-form-message"><textarea name="message" placeholder="Write a message"></textarea></span>
		<div class="clearfix"></div>
			<span class="contact-submit-btn"><input type="submit" name="submit_now" value="Submit Now" /></span>
		</form>

</div>
	</div>
</div>
	<!--<section class="safety-first">-->
 <!--       <div class="container">-->
 <!--           <h2 class="title">Post a new question to forum</h2>-->
 <!--           <div class="row">-->
 <!--                   <article>-->
 <!--                       <div class="help-content">-->
 <!--                       	<a herf="#" class="btn btn-primary btn-lg" id="ticket">Ask Our Community</a>-->
 <!--                       </div>-->
 <!--                   </article>-->
 <!--           </div>-->
 <!--       </div>-->
        <!--end .container-->
 <!--   </section>-->

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

<script type="text/javascript">
 // jquery form-validation goes here
    $(function() {
        $("#contact-form").validate({
            // Specify the validation rules
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true
                },
            },
            // Specify the validation error messages
            messages: {
                name: "Please enter your name",
                email: "Please enter a valid email address",
            },
            submitHandler: function(form) {
                form.submit();
            }
        });


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
						url: "<?php echo site_url();?>help/submit_ticket",
						data: $('form.ticket').serializeArray(),
		        		success: function(data){
		         			$("form.ticket").get(0).reset();
		         			jQuery('#success').show().html('<p class="success">Ticket has been submitted.</p>');
							jQuery('.ticket').hide();
							$('#output').text('');
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
   				$('#output').text('');	
        	}else{
        		window.location.href='<?php echo site_url();?>login';
        	}
        		
		});

		// ask our community

		  $('#ticket').on('click', function(e){
        	e.preventDefault();
        	var current_user = "<?php if(isset($this->session->userdata['current_user'])) echo $this->session->userdata['current_user'] ;?>";
        	if(current_user!= ''){
        		$('#success').hide();
        		$('.ticket').show();
   				$('#reportModal').modal();	
   				$('#output').text('');
        	}else{
        		window.location.href='<?php echo site_url();?>login';
        	}
       
		});

		$('#reportModal').modal({
  			backdrop: 'static',
  			show: false
		});


		
		$(".close").on("click", null, null, function(){
    		$('.modal-backdrop').hide();
    		$('.title error').removeClass('.title error');
    		$('.output').text('');
    		var validator = $('.ticket').validate();
    		validator.resetForm();
		});

		$(".closeform").on("click", null, null, function(){
    		$('.modal-backdrop').hide();
    		$('.output').text('');
    		var validator = $('.ticket').validate();
    		validator.resetForm();
		});	
    });
</script>

<!-- FILE UPLOAD -->
<script type="text/javascript">
	var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
	var link = '<?php echo site_url("help/uploadfile?files")?>';
	$('#select_file').click(function(e){
		e.preventDefault();
		$('#file_upload').trigger('click');
	});
</script>

<script type="text/javascript" src="<?php echo site_url("js/fileuploader.js")?>"></script>
<!-- FILE UPLOAD -->