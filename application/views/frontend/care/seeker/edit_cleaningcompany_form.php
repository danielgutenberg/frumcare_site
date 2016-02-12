
<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php 
$user_detail = get_user(check_user());
if($detail){
    $organization_name = $user_detail['organization_name'];
    $name = $user_detail['name'];
    $address = $user_detail['location'];
    $neighbour = $user_detail['neighbour'];
    $phone = $user_detail['contact_number'];
    $job_postion = explode(',', $detail[0]['job_position']);
    $hourly_rate = $detail[0]['hourly_rate'];
    $trainingtemp = explode(',',$detail[0]['availability']);
    $training = explode(',',$detail[0]['training']);
    $religious_observance = $detail[0]['religious_observance'];   
    $desc 			 = $detail[0]['profile_description']; 
    $langtemp = explode(',', $detail[0]['language']);
    $exp = $detail[0]['experience'];
    $smoker = explode(',', $detail[0]['smoker']);
    $date = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
     $rate = $detail[0]['rate'];
     $contact_name = $detail[0]['contact_name'];
    $rate_type = explode(',',$detail[0]['rate_type']);
    $job_position = $detail[0]['job_position'];
    $lat = $user_detail['lat'];
    $lng = $user_detail['lng'];
    $city = $user_detail['city'];
    $state = $user_detail['state'];
    $country = $user_detail['country'];
    $currency = $detail[0]['currency'];
}
?>
<?php $care_type = $this->uri->segment(4);?>
<div class="container">

<?php echo $this->breadcrumbs->show();?>

    <div class="dashboard-left float-left">
         <?php $this->load->view('frontend/user/dashboard/nav');?>
    </div>
    <div class="dashboard-right float-right">

    <?php    
        $attributes = array('id' => 'personal-details-form');
        echo form_open('ad/update_job_details/'.$care_type, $attributes);
    ?>
    <div class="ad-form-container float-left">
<div class="top-welcome">
    <h2>Edit Job Details</h2>
</div>
<div>
    <label>Name of Organization</label>
    <div class="form-field">
        <input type="text" name="organization_name" value="<?php echo isset($organization_name) ? $organization_name : '' ?>" class="txt">
    </div>
</div>
<div>
                <label>Contact name</label>
                <div class="form-field">
                <input type="text" name="name" placeholder="Full Name" class="txt" value="<?php echo isset($contact_name) ? $contact_name : '' ?>"/>
                <?php /* <input type="text" name="last_name" placeholder="Last name" class="required" value="<?php if(isset($ln)) echo $ln;?>"/> */?>
                </div>
            </div>
        <?php 
            $location = [
                'location' => $address,
                'lat' => $lat,
                'lng' => $lng,
                'city' => $city,
                'state' => $state,
                'country' => $country
            ];
            $this->load->view('frontend/care/giver/fields/location', array('location' => $location)); 
            $this->load->view('frontend/care/giver/fields/neighborhood', ['neighbour' => $neighbour]); 
            $this->load->view('frontend/care/giver/fields/phone', ['phone' => $phone]); 
         ?>
<div>
    <label>Position you are looking to fill</label>
    <div class="form-field">
        <input type="text" name="job_position" class="" value="<?php echo isset($job_position)?$job_position:''?>"/>
    </div>
</div>

<?php $this->load->view('frontend/care/seeker/fields/wage', ['rate' => $rate, 'currency' => $currency]); ?>
                <label>Job Type</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Full Time" name="availability[]" <?php if(in_array("Full Time",$trainingtemp)){?> checked="checked"<?php }?>> Full Time</div>
                    <div class="checkbox"><input type="checkbox" value="Part Time" name="availability[]" <?php if(in_array("Part Time",$trainingtemp)){?> checked="checked"<?php }?>> Part Time</div>
                    <div class="checkbox"><input type="checkbox" value="Substitute" name="availability[]" <?php if(in_array("Substitute",$trainingtemp)){?> checked="checked"<?php }?>> Substitute</div>
                    <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]" <?php if(in_array("Asap",$trainingtemp)){?> checked="checked"<?php }?>> Asap</div>
                    <div class="checkbox"><input type="checkbox" id="ckbox1" value="Start Date" name="availability[]" <?php if(in_array("Start Date",$trainingtemp)){?> checked="checked"<?php }?>>Start Date<input type="text" name="start_date" <?php if($date!='0000-00-00'){ echo 'value='.$date;}?> id="dateTextbox"/></div>                    
                </div>
            </div>
<div>
    <label>Details</label>
    <div class="form-field">
    <textarea name="profile_description" class="txt"><?php echo isset($desc) ? $desc : '' ?></textarea>
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
            <select name="religious_observance">
                <option value="">Select</option>
                <option value="Yeshivish/Chasidish" <?php echo isset($religious_observance) && $religious_observance == 'Yeshivish/Chasidish' ? 'selected' : '' ?>>Yeshivish / Chasidish</option>
                <option value="Orthodox/Modern Orthodox" <?php echo isset($religious_observance) && $religious_observance == 'Orthodox/Modern Orthodox' ? 'selected' : '' ?>>Orthodox / Modern orthodox</option>
                <option value="Other" <?php echo isset($religious_observance) && $religious_observance == 'Other' ? 'selected' : '' ?>>Other</option>
                <option value="Familiar With Jewish Tradition" <?php echo isset($religious_observance) && $religious_observance == 'Familiar With Jewish Tradition' ? 'selected' : '' ?>>Familiar With Jewish Tradition</option>
                <option value="Not Necessary" <?php echo isset($religious_observance) && $religious_observance == 'Not Necessary' ? 'selected' : '' ?>>Not Necessary</option>
            </select>
            </div>
        </div>
<div>
    <label>Smoking acceptable</label>
    <div class="form-field">
    <div class="radio"><input type="radio" name="smoker" value="1" <?php if(in_array('1',$smoker)){?> checked="checked" <?php } ?>> Yes</div>
    <div class="radio"><input type="radio" name="smoker" value="2" <?php if(in_array('2',$smoker)){?> checked="checked" <?php } ?>> No</div>
    </div>
</div>
 <div>
        <input id="careseekerButton" type="submit" class="btn btn-success" value="Update"/>
        </div>
</div>
</form>
</div>
</div>
