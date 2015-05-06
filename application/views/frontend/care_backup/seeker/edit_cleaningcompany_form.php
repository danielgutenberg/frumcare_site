<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/><!--for datepicker-->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script><!--for datepicker-->
  <script>
  $(function() {
    $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
  });
  </script>
<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php 
$user_detail = get_user(check_user());
if($detail){
    $organization_name = $detail[0]['organiztion_name'];
    $fn = $user_detail['first_name'];
    $address = $user_detail['location'];
    $phone = $user_detail['contact_number'];
    $job_postion = explode(',', $detail[0]['job_position']);
    $hourly_rate = $detail[0]['hourly_rate'];
    $temp = explode(',',$detail[0]['availability']);
    $religious_observance = $detail[0]['religious_observance'];   
    $desc 			 = $detail[0]['profile_description']; 
    $langtemp = explode(',', $detail[0]['language']);
    $exp = $detail[0]['experience'];
    $smoker = explode(',', $detail[0]['smoker']);
    $date = isset($detail[0]['start_date']) ? $detail[0]['start_date'] : "0000-00-00";
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
    <label>Name of organization</label>
    <div class="form-field">
        <input type="text" name="organization_name" value="<?php echo isset($organization_name) ? $organization_name : '' ?>" class="required">
    </div>
</div>
<div>
                <label>Contact name</label>
                <div class="form-field">
                <input type="text" name="first_name" placeholder="First name" class="required" value="<?php echo isset($first_name) ? $first_name : '' ?>"/>
                <?php /* <input type="text" name="last_name" placeholder="Last name" class="required" value="<?php if(isset($ln)) echo $ln;?>"/> */?>
                </div>
            </div>
            <div>
                <label>Location</label>
                <div>
                <input type="text" name="location" class="required" value="<?php echo isset($address) ? $address : '' ?>"/>
                </div>    
            </div>
            <div>
                <label>Phone</label>
                <div class="form-field">
                <input type="text" name="contact_number" class="required" value="<?php echo isset($phone) ? $phone : '' ?>" id="contact_number"/>
                </div>
            </div>
<div>
    <label>Position you are looking to fill</label>
    <div class="form-field">
        <select name="job_postion" class="required">
            <option value="">Select position</option>
            <option value="Babysitter" <?php if(in_array('Babysitter',$job_postion)){?> selected="selected"<?php } ?>>Babysitter</option>
            <option value="Nanny" <?php if(in_array('Nanny',$job_postion)){?> selected="selected"<?php } ?>>Nanny</option>
            <option value="Tutor" <?php if(in_array('Tutor',$job_postion)){?> selected="selected"<?php } ?>>Tutor</option>
        </select> 
    </div>
</div>

<div>
            <label>Wage</label>
            <div class="form-field">
            <select name="rate" class="required">
            <option value="">Select rate</option>
            <option value="5-10" <?php echo isset($rate) && $rate == '5-10' ? 'selected' : '' ?>>$5-$10</option>
            <option value="10-15" <?php echo isset($rate) && $rate == '10-15' ? 'selected' : '' ?>>$10-$15</option>
            <option value="15-25" <?php echo isset($rate) && $rate == '15-25' ? 'selected' : '' ?>>$15-$25</option>
            <option value="25-35" <?php echo isset($rate) && $rate == '25-35' ? 'selected' : '' ?>>$25-$35</option>
            <option value="35-45" <?php echo isset($rate) && $rate == '35-45' ? 'selected' : '' ?>>$35-$45</option>
            <option value="45-55" <?php echo isset($rate) && $rate == '45-55' ? 'selected' : '' ?>>$45-$55</option>
            <option value="55+" <?php echo isset($rate) && $rate == '55+' ? 'selected' : '' ?>>$55+</option>
            </select>
            </div>
        </div>
        <select name="rate_type">
            <option value="1" <?php echo isset($rate_type) && $rate_type == '1'?'selected':'' ?>>Per Hour</option>
            <option value="2" <?php echo isset($rate_type) && $rate_type == '2'?'selected':'' ?>>Per Month</option>
        </select>

<div>
                <label>Availability (check one or more)</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Part Time" name="availability[]" <?php if(in_array("Part Time",$temp)){?> checked="checked"<?php }?>> Part Time</div>
                    <div class="checkbox"><input type="checkbox" value="Substitute" name="availability[]" <?php if(in_array("Substitute",$temp)){?> checked="checked"<?php }?>> Substitute</div>
                    <div class="checkbox"><input type="checkbox" value="Full Time" name="availability[]" <?php if(in_array("Full Time",$temp)){?> checked="checked"<?php }?>> Full Time</div>
                    <div class="checkbox"><input type="checkbox" value="Days/ hours" name="availability[]" <?php if(in_array("Days/ hours",$temp)){?> checked="checked"<?php }?>> Days/ hours</div>
                    <div class="checkbox"><input type="checkbox" value="Asap" name="availability[]" <?php if(in_array("Asap",$temp)){?> checked="checked"<?php }?>> Asap</div>
                    <div class="checkbox full"><input type="checkbox" id="ckbox1" value="Start Date" name="availability[]" <?php if(in_array("Start Date",$temp)){?> checked="checked"<?php }?>>Start Date <input type="text" name="start_date" <?php if($date!='0000-00-00'){ echo 'value='.$date;}?> id="textbox1"/></div>
                    Day Hours
                <br>
                 <label style="width:25%">Sun</label><input type="text" name="sunday_from" class="time" style="width:25%" value="<?php echo $detail[0]['sunday_from'];?>"> to  <input type="text" name="sunday_to" class="time" style="width:25%" value="<?php echo $detail[0]['sunday_to'];?>">
                 <br>
                 <br>
                 <label style="width:25%">Mon-Thu</label><input type="text" name="mid_days_from" class="time" style="width:25%" value="<?php echo $detail[0]['mid_days_from'];?>"> to  <input type="text" name="mid_days_to" class="time" style="width:25%" value="<?php echo $detail[0]['mid_days_to'];?>">
                 <br>
                 <br>
                 <label style="width:25%">Fri</label><input type="text" name="friday_from" style="width:25%" class="time" value="<?php echo $detail[0]['friday_from'];?>"> to <input type="text" name="friday_to" class="time" style="width:25%" value="<?php echo $detail[0]['friday_to'];?>">
                 <br>
                 Vacation Days (Please specify vacation days)
                 <br>
                 <input type="text" name="vacation_days" value="<?php echo $detail[0]['vacation_days'];?>" placeholder="Vacation Days">

                <br>
                <br>
                </div>
            </div>
<div>
    <label>Details</label>
    <div class="form-field">
    <textarea name="profile_description" class="required"><?php echo isset($desc) ? $desc : '' ?></textarea>
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
                <label>Must have following training/ certification</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="CPR" name="training[]" <?php if(in_array('CPR',$trainingtemp)){?> checked="checked"<?php } ?>> CPR</div>
                    <div class="checkbox"><input type="checkbox" value="First Aid" name="training[]" <?php if(in_array('First Aid',$trainingtemp)){?> checked="checked"<?php } ?>> First Aid</div>
                    <div class="checkbox"><input type="checkbox" value="Nanny/ Babysitter course" name="training[]" <?php if(in_array('Nanny/ Babysitter course',$trainingtemp)){?> checked="checked"<?php } ?>> Nanny/ Babysitter course</div>
                    <div class="checkbox"><input type="checkbox" value="Degree" name="training[]" <?php if(in_array('Degree',$trainingtemp)){?> checked="checked"<?php } ?>> Degree</div>
                    <div class="checkbox"><input type="checkbox" value="Not necessary" name="training[]" <?php if(in_array('Not necessary',$trainingtemp)){?> checked="checked"<?php } ?>> Not necessary</div>
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
                    <option value="5+" <?php echo isset($exp) && $exp == 5 ? 'selected' : '' ?>>5+ years</option>
                </select>
                </div>
            </div>

            <div>
            <label>Level of observance necessary</label>
            <div class="form-field">
            <select name="religious_observance">
                <option value="">Select</option>
                <option value="Orthodox" <?php echo isset($religious_observance) && $religious_observance == 'Yeshivish/ Chasidish' ? 'selected' : '' ?>>Yeshivish/ Chasidish</option>
                <option value="Modern Orthodox" <?php echo isset($religious_observance) && $religious_observance == 'Modern Orthodox' ? 'selected' : '' ?>>Modern Orthodox</option>
                <option value="Other" <?php echo isset($religious_observance) && $religious_observance == 'Other' ? 'selected' : '' ?>>Other</option>
                <option value="Familiar With Jewish Tradition" <?php echo isset($religious_observance) && $religious_observance == 'Familiar With Jewish Tradition' ? 'selected' : '' ?>>Familiar With Jewish Tradition</option>
                <option value="Not Necessary" <?php echo isset($religious_observance) && $religious_observance == 'Not Necessary' ? 'selected' : '' ?>>Not Necessary</option>
            </select>
            </div>
        </div>
            <div>
                <label>Smoker</label>
                <div class="form-field">
                <div class="radio"><input type="radio" name="smoker" value="1" <?php if(in_array('1',$smoker)){?> checked="checked" <?php } ?>> Yes</div>
                <div class="radio"><input type="radio" name="smoker" value="2" <?php if(in_array('2',$smoker)){?> checked="checked" <?php } ?>> No</div>
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
        <input type="submit" class="btn btn-success" value="Update"/>
        </div>
</div>
</form>
</div>
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

$(document).ready(function(){
       if($('#ckbox1').is(':checked')){
            $("#textbox1").show();
       }else{
            $("#textbox1").hide();
            $('#textbox1').val('');
       }

        $("#ckbox1").change(function(){
            if($('#ckbox1').is(':checked')){
                $("#textbox1").show();   
            }else{
                $("#textbox1").hide(); 
                $('#textbox1').val('');       
            }
        });
    });
</script>