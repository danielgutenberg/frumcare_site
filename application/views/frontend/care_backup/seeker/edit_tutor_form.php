<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php 
$user_detail = get_user(check_user());
if($detail){
    $address = $user_detail['location'];
    $phone = $user_detail['contact_number'];
    $subjects       = explode(',', $detail[0]['subjects']);
    $langtemp = explode(',', $detail[0]['language']);
    $gender = $user_detail['gender'];
    $age = $user_detail['age'];
    $age_grp = $detail[0]['age_group'];
    $smoker = explode(',', $detail[0]['smoker']);
    $religious_observance = $detail[0]['religious_observance'];
    $exp = $detail[0]['experience'];
    $trainingtemp = explode(',',$detail[0]['training']);
    $gender_of_caregiver = $detail[0]['gender_of_caregiver'];
    $neighbour = $user_detail['neighbour'];
    $zip = $user_detail['zip'];
    $phone = $user_detail['contact_number'];
    $caregiverage_from = $detail[0]['caregiverage_from'];
    $caregiverage_to = $detail[0]['caregiverage_to'];
     $rate = $detail[0]['rate'];
    $rate_type = $detail[0]['rate_type'];
}
?>

<?php $care_type = $this->uri->segment(4);?>

<div class="container">
<?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
         <?php $this->load->view('frontend/user/dashboard_nav');?>
    </div>
    <div class="dashboard-right float-right">

<form action="<?php echo site_url().'user/update_job_details/'.$care_type;?>" method="post">
<div class="ad-form-container float-left">
        <div class="top-welcome">
            <h2>Edit Job Details</h2>
        </div>
        <div>
            <label>Location</label>
            <div>
            <input type="text" name="location" class="required" value="<?php echo isset($address) ? $address : '' ?>"/>
            </div>    
        </div>
         <div>
            <label>Neighborhood</label>
            <div>
            <input type="text" name="neighbour" class="required" value="<?php echo isset($neighbour) ? $neighbour : '' ?>"/>
            </div>    
        </div>
         <div>
            <label>Zip</label>
            <div>
            <input type="text" name="zip" class="required" value="<?php echo isset($zip) ? $zip : '' ?>"/>
            </div>    
        </div>
        <div>
            <label>Phone</label>
            <div class="form-field">
            <input type="text" name="contact_number" class="required" value="<?php echo isset($phone) ? $phone : '' ?>" id="contact_number"/>
            </div>
        </div>
        <div>
            <label>Ages of student</label>
            <div class="form-field">
            <input type="text" name="age" class="required number" value="<?php echo isset($age) ? $age : '' ?>"/>
            </div>
        </div>

        <div>
            <label>Gender of student</label>
            <div class="form-field">
                <div class="radio"><input type="radio" value="1" name="gender" <?php echo isset($gender) && $gender == '1' ? 'checked' : '' ?>> Male</div>
                <div class="radio"><input type="radio" value="2" name="gender" <?php echo isset($gender) && $gender == '2' ? 'checked' : '' ?>> Female</div>
                <div class="radio"><input type="radio" value="3" name="gender" <?php echo isset($gender) && $gender == '3' ? 'checked' : '' ?>> Both</div>
            </div>
        </div>
                

        <div>
            <div class="form-field">
                <label>Looking for help in following Subject(s) (check one or more)</label>
                <div class="first-block-checkbox">
                <div><input type="checkbox" value="Elementary school" name="subjects[]" <?php if(in_array('Elementary school',$subjects)){?> checked="checked" <?php } ?>> <span>Elementary school</span></div>
                <div><input type="checkbox" value="High school" name="subjects[]" <?php if(in_array('High school',$subjects)){?> checked="checked" <?php } ?>> <span>High school</span></div>
                </div>
                <div class="first-block-checkbox">
                <div><input type="checkbox" value="Post high school" name="subjects[]" <?php if(in_array('Post high school',$subjects)){?> checked="checked" <?php } ?>> <span>Post high school</span></div>
                <div><input type="checkbox" value="Special ed" name="subjects[]" <?php if(in_array('Special ed',$subjects)){?> checked="checked" <?php } ?>> <span>Special ed</span></div>
                </div>
                <div class="first-block-checkbox">
                <div><input type="checkbox" value="Music" name="subjects[]" <?php if(in_array('Music',$subjects)){?> checked="checked" <?php } ?>> <span>Music</span></div>
                <div><input type="checkbox" value="Art" name="subjects[]" <?php if(in_array('Art',$subjects)){?> checked="checked" <?php } ?>> <span>Art</span></div>
                </div>
                <div class="first-block-checkbox">
                <div><input type="checkbox" value="Ohter" name="subjects[]" <?php if(in_array('Ohter',$subjects)){?> checked="checked" <?php } ?>> <span>Other</span></div>
                </div>
                <div class="first-block-checkbox">
                <div><input type="checkbox" value="limudei kodesh" name="subjects[]" <?php if(in_array('limudei kodesh',$subjects)){ ?> checked="checked" <?php }?>/><span>Limudei Kodesh</span></div>
                </div>
                 <div class="first-block-checkbox">
                <div><input type="checkbox" value="general studies" name="subjects[]" <?php if(in_array('general studies',$subjects)){ ?> checked="checked" <?php }?>/><span>General Studies</span></div>
                </div>
            </div>
        </div>


        <h2>Additional Requirements</h2>

        <div>
            <label>Languages necessary</label>
            <div class="form-field">
            <div class="checkbox"><input type="checkbox" name="language[]" value="English" <?php if(in_array('English',$langtemp)){?> checked="checked"<?php } ?>> English</div>
                <div class="checkbox"><input type="checkbox" name="language[]" value="Yiddish" <?php if(in_array('Yiddish',$langtemp)){?> checked="checked"<?php } ?>> Yiddish</div>
                <div class="checkbox"><input type="checkbox" name="language[]" value="Hebrew" <?php if(in_array('Hebrew',$langtemp)){?> checked="checked"<?php } ?>> Hebrew</div>
                <div class="checkbox"><input type="checkbox" name="language[]" value="Russian" <?php if(in_array('Russian',$langtemp)){?> checked="checked"<?php } ?>> Russian</div>
                <div class="checkbox"><input type="checkbox" name="language[]" value="French" <?php if(in_array('French',$langtemp)){?> checked="checked"<?php } ?>> French</div>
                <div class="checkbox"><input type="checkbox" name="language[]" value="Other" <?php if(in_array('Other',$langtemp)){?> checked="checked"<?php } ?>> Other</div>
            </div>
        </div>

        <div>
            <label>Gender of tutor wanted</label>
            <div class="form-field">
            <div class="radio"><input type="radio" value="1" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '1' ? 'checked' : '' ?>> Male</div>
            <div class="radio"><input type="radio" value="2" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '2' ? 'checked' : '' ?>> Female</div>
            <div class="radio"><input type="radio" value="3" name="gender_of_caregiver" <?php echo isset($gender_of_caregiver) && $gender_of_caregiver == '3' ? 'checked' : '' ?>> Both</div>
            </div>
        </div>
        <div>
            <label>Tutor age from</label>
            <div class="form-field">
                <input type="text" name="caregiverage_from" value="<?php echo isset($caregiverage_from)?$caregiverage_from:'';?>" placeholder="Age From" style="width:25%" class="required"> to  <input type="text" name="caregiverage_to" value="<?php echo isset($caregiverage_to)?$caregiverage_to:'';?>" placeholder="Age To" style="width:25%" class="required">
            </div>
        </div>
        <div>
            <label>Smoking Acceptable</label>
            <div class="form-field">
                <div class="radio"><input type="radio" name="smoker" value="1" <?php if(in_array('1',$smoker)){?> checked="checked" <?php } ?>> Yes</div>
                <div class="radio"><input type="radio" name="smoker" value="2" <?php if(in_array('2',$smoker)){?> checked="checked" <?php } ?>> No</div>
            </div>
        </div>
        <div>
            <label>Level of observance necessary</label>
            <div class="form-field">
            <select name="religious_observance">
                <option value="">Select</option>
                <option value="Orthodox" <?php echo isset($religious_observance) && $religious_observance == 'Orthodox' ? 'selected' : '' ?>>Orthodox</option>
                <option value="Modern Orthodox" <?php echo isset($religious_observance) && $religious_observance == 'Modern Orthodox' ? 'selected' : '' ?>>Modern orthodox</option>
                <option value="Other" <?php echo isset($religious_observance) && $religious_observance == 'Other' ? 'selected' : '' ?>>Other</option>
                <option value="Not Jewish" <?php echo isset($religious_observance) && $religious_observance == 'Not Jewish' ? 'selected' : '' ?>>Not necessary</option>
            </select>
            </div>
        </div>
        <div>
            <label>Minimum years experience</label>
            <div class="form-field">
            <select name="experience" class="required">
                <option value="">Select Minimum years experience</option>
                <option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
                <option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
                <option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
                <option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
                <option value="5+" <?php echo isset($exp) && $exp == 5 ? 'selected' : '' ?>>5+ years</option>
            </select>
            </div>
        </div>

        <div>
            <label>Training necessary</label>
            <div class="form-field">
            <div class="checkbox"><input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$trainingtemp)){?> checked="checked"<?php } ?>> CPR</div>
            <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$trainingtemp)){?> checked="checked"<?php } ?>> First Aid</div>
            <div class="checkbox"><input type="checkbox" value="degree" name="training[]" <?php if(in_array('degree',$trainingtemp)){?> checked="checked"<?php } ?>> Degree</div>
            <div class="checkbox"><input type="checkbox" value="Not necessary" name="training[]" <?php if(in_array('Not necessary',$trainingtemp)){?> checked="checked"<?php } ?>> Not necessary</div>
            </div>
        </div>
        <div>
            <?php /* <input type="checkbox" value="1" name="photo_of_child"> <label>Photo</label> */?>
        </div>
        <div>
            <input type="submit" class="btn btn-success" value="Update"/>
        </div>
   </div>
</form>
</div>
</div>
