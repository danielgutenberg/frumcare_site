<?php 
	if($detail){
		$fn  			= $detail[0]['first_name'].' '.$detail[0]['last_name'];
		$availability 	= explode(',', $detail[0]['availability']);
		$language 		= explode(',',$detail[0]['language']);
		$exp 			= $detail[0]['experience'];
	}
?>
<div class="form-group">
	<label class="control-label">Name of organization</label>
	 <div class="ad-manager-full-input"><input type="text" name="organization_name" value="<?php echo $detail[0]['organiztion_name'];?>" class="required"></div>
</div>
<div class="form-group">
	<label class="control-label">Contact name</label>
	 <div class="ad-manager-full-input">
		<input type="text" name="first_name" placeholder="Contact name" class="required" value="<?php if(isset($fn)) echo $fn;?>"  readonly/>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Address/ Location</label>
	 <div class="ad-manager-full-input"><input type="text" name="location" class="required" value="<?php echo $detail[0]['location'];?>"/></div>
</div>
<div class="form-group">
	<label class="control-label">Phone</label>
	 <div class="ad-manager-full-input"><input type="text" name="contact_number" class="required" value="<?php echo $detail[0]['contact_number'];?>"/></div>
</div>
<div class="form-group">
	<label class="control-label">Position you are looking to fill</label>
	 <div class="ad-manager-full-input">
		 <select name="job_postion" class="required">
            <option value="">Select position</option>
            <option value="Babysitter" <?php if($detail[0]['job_position'] == 'Babysitter'){?> checked="checked" <?php }?> >Babysitter</option>
            <option value="Nanny" <?php if($detail[0]['job_position'] == 'Nanny'){?> checked="checked" <?php }?> >Nanny</option>
            <option value="Tutor" <?php if($detail[0]['job_position'] == 'Tutor'){?> checked="checked" <?php }?> >Tutor</option>
        </select> 
	</div>
</div>
<div class="form-group">
	<label class="control-label">Wage</label>
	 <div class="ad-manager-full-input">
		<input type="text" value="<?php echo $detail[0]['hourly_rate'];?>" name="hourly_rate" id="wage" class="required">
	    <select name="" onchange="change_wage(this.value)">
	        <option value="1">per hour</option>
	        <option value="2">per month</option>
	    </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Availability (check one or more)</label>
	 <div class="ad-manager-checkbox">
		<input type="checkbox" value="Occ./ reg./ one time" name="availability[]" <?php if(in_array('Occ./ reg./ one time',$availability)){?> checked="checked" <?php }?> > Occ./ reg./ one time
	    <input type="checkbox" value="Part Time" name="availability[]" <?php if(in_array('Part Time',$availability)){?> checked="checked" <?php }?> > Part Time
	    <input type="checkbox" value="Full Time" name="availability[]" <?php if(in_array('Full Time',$availability)){?> checked="checked" <?php }?> > Full Time
	    <input type="checkbox" value="Days/ hours" name="availability[]" <?php if(in_array('Days/ hours',$availability)){?> checked="checked" <?php }?> > Days/ hours
	    <input type="checkbox" value="Asap/ start date" name="availability[]" <?php if(in_array('Asap/ start date',$availability)){?> checked="checked" <?php }?> > Asap/ start date
	</div>
</div>
<div class="form-group">
	<label class="control-label">Details</label>
	 <div class="ad-manager-full-input">
		<textarea name="profile_description" class="required"><?php echo $detail[0]['profile_description'];?></textarea>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Encouraged but not mandatory fields</td>
</div>
<div class="form-group">
	<label class="control-label">Languages necesary</label>
	<div class="ad-manager-checkbox">
		<input type="checkbox" name="language[]" value="English" <?php if(in_array('English', $language)){?> checked <?php } ?> >English
        <input type="checkbox" name="language[]" value="Spanish" <?php if(in_array('Spanish', $language)){?> checked <?php } ?> >Spanish
        <input type="checkbox" name="language[]" value="Sign language" <?php if(in_array('Sign language', $language)){?> checked <?php } ?> >Sign language
	</div>
</div>
<div class="form-group">
	<label class="control-label">Minimum years of experience</label>
	 <div class="ad-manager-full-input">
	<select name="experience">
        <option value="">Select minimum years of experience</option>
        <option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
        <option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
        <option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
        <option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
        <option value="5+" <?php echo isset($exp) && $exp == '5+' ? 'selected' : '' ?>>5+ years</option>
    </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Level of observance necessary</label>
	 <div class="ad-manager-full-input">
	<select name="religious_observance">
        <option value="">Select</option>
        <option value="Orthodox" <?php if($detail[0]['religious_observance'] == 'Orthodox'){?> selected="selected" <?php }?> >Orthodox</option>
        <option value="Modern Orthodox" <?php if($detail[0]['religious_observance'] == 'Modern Orthodox'){?> selected="selected" <?php }?> >Modern orthodox</option>
        <option value="Other" <?php if($detail[0]['religious_observance'] == 'Other'){?> selected="selected" <?php }?> >Other</option>
        <option value="Not Jewish" <?php if($detail[0]['religious_observance'] == 'Not Jewish'){?> selected="selected" <?php }?> >Not necessary</option>
    </select>
	</div>
</div>
<div class="form-group">
	<label class="control-label">Smoking acceptable</label>
	<div class="ad-manager-checkbox">
		<input type="radio" name="smoker" value="1" <?php if($detail[0]['smoker'] == 1){?> checked="checked" <?php }?> > Yes
    	<input type="radio" name="smoker" value="2" <?php if($detail[0]['smoker'] == 2){?> checked="checked" <?php }?> > No
	</div>
</div>
