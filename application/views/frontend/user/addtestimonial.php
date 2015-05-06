<?php
$photo_url = site_url("images/plus.png");
if(check_user()) {
    $current_user = get_user(check_user());
    $name = $current_user['first_name'];

}
?>


<div class="container add-testimonials">
	<h2>Add Testimonial</h2>

	<form action="<?php echo site_url();?>user/addtestimonials/<?php echo sha1(check_user());?>" method="post" id="addtestimonail-form">
		<table>
			<tr>
				<td><label>Testimonial For</label></td>
				<td class="testimonials-for"><input type="text" name="testimonial_for" value="" class="required" /></td>
			</tr>
			<tr>
				<td><label>Testimonial Description</label></td>
				<td class="testimonial_description"><textarea name="testimonial_description" cols="40" rows="5" id="testimonial_description" class="required"></textarea></td>
			</tr>
			<tr>
	            <td><label>Testimonial Picture</label></td>
	            <td>
                   		<div id="output" class="add-img-testimonials"><img src="<?php echo $photo_url?>"></div>

    					<label>Browse your computer to select a file to upload</label>
    					<br />
    					<button class="btn btn-default" id="upload">Choose File</button>
    					<br />
    					<input type="file" name="ImageFile" id="ImageFile" style="display: none;">
    					<div class="loader"></div>
	            </td>
            </tr>

            <tr class="rating-star">
                <td class="space">Rating:</td>
                <td class="space-star"><div id="half" style="cursor: pointer;"></div></td>    
            </tr> 

            <tr>
            	<td>
            		<input type="hidden" name="testimonial_by" value="<?php echo $name;?>">
            		<input type="hidden" id="file-name" name="profile_picture" value="<?php if(isset($photo)) echo $photo;?>">
            		<input type="hidden" name="user_id" value="<?php echo check_user();?>">
            		<input type="hidden" name="testimonial_date" value="<?php echo time();?>">
            	</td>
            </tr>

            <tr>
            	<td colspan="2" align="center">
            		<input type="submit" name="add" value="Add Testimonial" class="btn btn-success" />		
            	</td>
            </tr>
		</table>
	</form>
</div>

<script type="text/javascript" src="<?php echo site_url("js/fileuploader.js")?>"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/jquery.raty.css">
<script src="<?php echo base_url();?>js/jquery.raty.js"></script>

<!-- FILE UPLOAD -->
<script type="text/javascript">
	var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
	var link = '<?php echo site_url("user/uploadtestimonialimage?files")?>';
	$('#upload').click(function(e){
		e.preventDefault();
		$('#ImageFile').trigger('click');
	});
	$('#addtestimonail-form').validate();

	$('#half').raty({
        path       : '<?php echo site_url();?>img/',
        starHalf   : 'star-half.png',
        starOff    : 'star-off.png',
        starOn     : 'star-on.png',
        half       :  true,
    });

</script>


<!-- FILE UPLOAD -->

