
<?php
if(check_user()) {
	$u = get_user(check_user());
	$fn = $u['name'];
     $user_detail = get_user(check_user());
	$address = $user_detail['location'];
    $phone = $user_detail['contact_number'];
    $age = $user_detail['age'];
    $neighbour = $user_detail['neighbour'];
    $zip = $user_detail['zip'];
}
?>
<?php
if(($this->uri->segment(2) != 'new_profile')){?>
<ol class="progtrckr" data-progtrckr-steps="3">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-done">Job Details</li>
    <li class="progtrckr-todo">Start Getting Calls</li>
</ol>
<?php } ?>
<div class="container">
	<?php if(($this->uri->segment(2) != 'new_profile')){?>
	<form action="<?php echo site_url();?>ad/add_careseeker_step2" method="post" id="personal-details-form">
		<?php }else{
			$attributes = array('id' => 'personal-details-form');
            echo form_open('user/addprofileconfirm', $attributes);
			if(!empty($record)){
				echo form_hidden('account_category',$record['ac_type']);
				echo form_hidden('care_type',$record['submit_id']);
				echo form_hidden('account_type',$record['account_type']);
                echo form_hidden('organization_care',$record['organization_care']);
			}} ?>
			<div class="ad-form-container">
				<?php if($this->uri->segment(2) != 'new_profile'){?>
				<div>
					<h1 class="step2">Step 2: Job Details</h1>
				</div>
				<?php } ?>

                <input type="hidden" name="account_type1" value="<?php echo $this->uri->segment(3);?>"/>
                <input type="hidden" name="account_type2" value="<?php echo $this->uri->segment(4);?>"/>


				<div>
					<label>Name of Organization</label>
					<div class="form-field">
						<input type="text" name="organization_name" value="<?php if(isset($fn)) echo $fn;?>" class="txt">
					</div>
				</div>
				<div>
                <label>Contact name</label>
                <div class="form-field">
                <input type="text" name="first_name" placeholder="First name" class="txt"/>
                <?php /* <input type="text" name="last_name" placeholder="Last name" class="required" value="<?php if(isset($ln)) echo $ln;?>"/> */?>
                </div>
            </div>
            <?php 
                $this->load->view('frontend/care/giver/fields/location', array('location' => $location)); 
                $this->load->view('frontend/care/giver/fields/neighborhood'); 
                $this->load->view('frontend/care/giver/fields/phone'); 
             ?>
				<div>
					<label>Position you are looking to fill</label>
					<div class="form-field">
						<input type="text" name="job_position" class="required"/>
					</div>
				</div>

				<?php $this->load->view('frontend/care/seeker/fields/wage'); ?>

				<div>
                <label>Job Type</label>
                <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="Full Time" name="availability[]"> Full Time</div>
                <div class="checkbox"><input type="checkbox" value="Part Time" name="availability[]"> Part Time</div>
                <div class="checkbox"><input type="checkbox" value="Substitute" name="availability[]"> Substitute</div>
                <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]"/> Asap</div>
                <div class="checkbox"><input type="checkbox" value="Start Date" name="availability[]" id="ckbox1"/>Start Date
                 <input  type="text" name="start_date" id="textbox1" autocomplete="off"/></div>
                <label>Days / Hours</label>
                <br>
                 <label style="width:25%">Sun</label><input type="text" name="sunday_from" class="time" style="width:25%"> to  <input type="text" name="sunday_to" class="time" style="width:25%">
                 <br>
                 <br>
                 <label style="width:25%">Mon-Thu</label><input type="text" name="mid_days_from" class="time" style="width:25%"> to  <input type="text" name="mid_days_to" class="time" style="width:25%">
                 <br>
                 <br>
                 <label style="width:25%">Fri</label><input type="text" name="friday_from" style="width:25%" class="time"> to <input type="text" name="friday_to" class="time" style="width:25%">
                 <?php /*
                 <br>
                 Vacation Days (Please specify vacation days)
                 <br>
                 <input type="text" name="vacation_days" value="" placeholder="Vacation Days">

                <br>
                */ ?>
                </div>
            </div>
            <div>
                <label>Details</label>
                <div class="form-field">
                    <textarea name="profile_description" class="txt"></textarea>
                </div>
            </div>


				<h2>Additional Requirements</h2>
				<div>
                <label>Languages necesary</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" name="language[]" value="English"> English</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Yiddish"> Yiddish</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Hebrew"> Hebrew</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Russian"> Russian</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="French"> French</div>
                    <div class="checkbox"><input type="checkbox" name="language[]" value="Other"> Other</div>
                </div>
            </div>
				<div>
                <label>Minimum experience</label>
                <div class="form-field">
                <select name="experience">
                    <option value="">Select minimum experience</option>
                    <option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
                    <option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
                    <option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
                    <option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
                    <option value="6" <?php echo isset($exp) && $exp == 6 ? 'selected' : '' ?>>5+ years</option>
                </select>
                </div>
            </div>

			<div>
            <label>Level of observance necessary</label>
            <div class="form-field">
            <select name="religious_observance" class="religious_observance">
               <option value="">Select</option>
				<option value="Yeshivish/Chasidish">Yeshivish / Chasidish</option>
				<option value="Orthodox/Modern Orthodox">Orthodox / Modern orthodox</option>
				<option value="Other">Other</option>
                <option value="Familiar With Jewish Tradition">Familiar With Jewish Tradition</option>
				<option value="Not Necessary">Not necessary</option>
            </select>
            </div>

            <div style="display:none" class="not_jewish">
                <input type="checkbox" name="familarwithjewish" value="familarwithjewish">Familiar with Jewish Tradition
            </div>
        </div>
				<div>
					<label>Smoking acceptable</label>
					<div class="form-field">
						<div class="radio"><input type="radio" name="smoker" value="1"> Yes</div>
						<div class="radio"><input type="radio" name="smoker" value="2" checked> No</div>
					</div>
				</div>
				<div>
					<input id="careseekerButton" type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
				</div>
			</div>
		</form>
	</div>


	<script type="text/javascript">
		function change_wage(val){
			if(val==1){
				$('#wage').removeAttr('name');
				$('#wage').attr('name', 'hourly_rate');
			}
			else if(val=2){
				$('#wage').removeAttr('name');
				$('#wage').attr('name', 'monthly_rate');
			}
		}
	</script>
