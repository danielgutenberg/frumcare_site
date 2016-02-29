<?php
if(($this->uri->segment(2) != 'new_profile')){?>
<ol class="progtrckr" data-progtrckr-steps="4">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Personal Details</li>
    <li class="progtrckr-done">Job Details</li>
    <li class="progtrckr-todo">Start Getting Calls</li>
</ol>
<?php } ?>
<div class="container">
<?php if(($this->uri->segment(2) != 'new_profile')) {
        $attributes = array('id' => 'personal-details-form');
        echo form_open('ad/savejobdetails', $attributes);
}else{
    $this->load->helper('form');
    $attributes = array('id' => 'newJob');
    echo form_open('ad/addprofileconfirm', $attributes);
    if(!empty($record)){
    echo form_hidden('account_category',$record['ac_type']);
    echo form_hidden('care_type',$record['submit_id']);
    echo form_hidden('account_type',$record['account_type']);
    echo form_hidden('organization_care',$record['organization_care']);
   }} ?>
<div class="ad-form-container">
	 <?php if($this->uri->segment(2) != 'new_profile'){?>
       <div>
            <h1 class="step3">Step 3: Job Details</h1>
        </div>

	<?php } ?>
        <?php $this->load->view('frontend/care/giver/fields/number_of_children'); ?>
        <div>
            <label>Ages of children willing to care for</label>
            <div class="form-field">
                <div class="checkbox"><input type="checkbox" name="age_group[]" value="0-3"> 0-3 months</div>
                <div class="checkbox"><input type="checkbox" name="age_group[]" value="3-6"> 3-6 months</div>
                <div class="checkbox"><input type="checkbox" name="age_group[]" value="6-12"> 6-12 months</div>
                <div class="checkbox"><input type="checkbox" name="age_group[]" value="1-3"> 1 to 3 years</div>
                <div class="checkbox"><input type="checkbox" name="age_group[]" value="3-5"> 3 to 5 years</div>
                <div class="checkbox"><input type="checkbox" name="age_group[]" value="6-11"> 6 to 11 years</div>
                <div class="checkbox"><input type="checkbox" name="age_group[]" value="13"> 12+ years</div>
            </div>
        </div>
        
        <div>
            <label>Years in Practice</label>
            <div class="form-field">
            <select name="experience" class="txt">
                <option value="">Select years in practice</option>
                <option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
                <option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
                <option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
                <option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
                <option value="6" <?php echo isset($exp) && $exp == 6 ? 'selected' : '' ?>>5+ years</option>
            </select>
            </div>
        </div>
        <div>
            <label>Certification / License information</label>
            <div class="form-field">
            <input type="text" value="" name="certification" class="txt">
            </div>
        </div>
        <?php $this->load->view('frontend/care/giver/fields/rate'); ?>
        <div>
            <label>Availability</label>
            <div class="form-field">
				<?php 
				$this->load->view('frontend/care/giver/fields/availability/immediate');
				$this->load->view('frontend/care/giver/fields/availability/start_date');
				$this->load->view('frontend/care/giver/fields/availability/occasional');
				$this->load->view('frontend/care/giver/fields/availability/regular');
				$this->load->view('frontend/care/giver/fields/availability/morning');
				$this->load->view('frontend/care/giver/fields/availability/afternoon');
				$this->load->view('frontend/care/giver/fields/availability/evening');
				$this->load->view('frontend/care/giver/fields/availability/weekend');
				$this->load->view('frontend/care/giver/fields/availability/shabbos');
				$this->load->view('frontend/care/giver/fields/availability/night_nurse');
				?>
	       </div>
        </div>
        
        <?php
            $this->load->view('frontend/care/giver/fields/about_yourself');
            $this->load->view('frontend/care/giver/fields/references');
            $this->load->view('frontend/care/giver/fields/background'); 
        ?>


    <input type="hidden" name="account_type1" value="<?php echo $this->uri->segment(3);?>"/>
    <input type="hidden" name="account_type2" value="<?php echo $this->uri->segment(4);?>"/>

        <div class="checkbox">
            <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
        </div>
        </div>
</form>
</div>