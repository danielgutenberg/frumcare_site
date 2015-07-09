<div class="container">
	<div class="add-refrences">
	<h2>Add Refrences</h2>
		<div class="sign-in-form">
			<form role="form"action="<?php echo site_url();?>user/addrefrences/<?php echo sha1(check_user());?>" method="post" id="addrefrences">
					<div><label>Refrence Name:</label>
					<input type="text" name="ref_name" id="ref_name" class="required" />
				</div>
					<div><label>Relationship:</label>
					<input type="text" name="ref_relationship" id="ref_relationship" class="required" />
				</div>
				<div><label>Phone Number:</label>
					<input type="text" name="contact_number" id="contact_number" class="required" />
				</div>
				<div><label>Email address:</label>
					<input type="text" name="contact_email" id="contact_numer" class="required email" />
				</div>
				<div>	<label>Short Description about Refrence:</label>
					<textarea name="ref_desc"></textarea>
				</div>
				<div class="add-reference-btn">
				<input type="hidden" name="user_id" value="<?php echo check_user();?>">
				<input type="submit" name="save_ref" class="btn btn-success" value="Add Refrence">
				</div>
			</form>
		</div>
		</div>
</div>
<script type="text/javascript" src="<?php echo site_url();?>js/jquery.ui.maskinput.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#contact_number').mask('(999) 999-999-9999');
	});
</script>
