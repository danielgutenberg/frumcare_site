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
<?php if(($this->uri->segment(2) != 'new_profile')){?>
    <form action="<?php echo site_url();?>ad/savejobdetails" method="post">
        <?php }else{
    echo form_open('user/addprofileconfirm');
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
            <div>
                <label>Looking to work in</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Private home" name="looking_to_work[]"> <span>Private home</span></div>
                    <div class="checkbox"><input type="checkbox" value="Business/Office" name="looking_to_work[]"> <span>Business / Office</span></div>
                    <div class="checkbox"><input type="checkbox" value="Cleaning company" name="looking_to_work[]"> <span>Cleaning company</span></div>                
                </div>
            </div>
            
            <div>
                <label>Years of experience</label>
                <div class="form-field">
                <select name="experience" class="txt">
                    <option value="">Select years of experience</option>
                    <option value="1" <?php echo isset($exp) && $exp == 1 ? 'selected' : '' ?>>1 year</option>
                    <option value="2" <?php echo isset($exp) && $exp == 2 ? 'selected' : '' ?>>2 years</option>
                    <option value="3" <?php echo isset($exp) && $exp == 3 ? 'selected' : '' ?>>3 years</option>
                    <option value="4" <?php echo isset($exp) && $exp == 4 ? 'selected' : '' ?>>4 years</option>
                    <option value="6" <?php echo isset($exp) && $exp == 6 ? 'selected' : '' ?>>5+ years</option>
                </select>
                </div>
            </div>
            <div class="rate-select">
                <label>Rate</label>
                <div class="form-field">
                    <select name="rate" class="txt rate">
                        <option value="">Select rate</option>
                        <option value="5-10">$5-$10 / Hr</option>
                        <option value="10-15">$10-$15 / Hr</option>
                        <option value="15-25">$15-$25 / Hr</option>
                        <option value="25-35">$25-$35 / Hr</option>
                        <option value="35-45">$35-$45 / Hr</option>
                        <option value="45-55">$45-$55 / Hr</option>
                        <option value="55+">$55+ / Hr</option>
                    </select>
                </div>
            </div>
            <div>
                <!--<label>Check one or more</label>-->
                <!--<div class="checkbox"><input type="checkbox" name="rate_type[]" value="1">Hourly Rate</div>-->
                <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2">Monthly Rate Available</div>
            </div>
            <div>
                <label>Specialize in</label>
                <div class="form-field">
                     <div class="checkbox"><input type="checkbox" value="Dishes" name="willing_to_work[]"> <span>Dishes</span></div>
                    <div class="checkbox"><input type="checkbox" value="Floors" name="willing_to_work[]"> <span>Floors</span></div>
                    <div class="checkbox"><input type="checkbox" value="Windows" name="willing_to_work[]"> <span>Windows</span></div>                    
                    <div class="checkbox"><input type="checkbox" value="Laundry" name="willing_to_work[]"> <span>Laundry</span></div>
                    <div class="checkbox"><input type="checkbox" value="Folding" name="willing_to_work[]"> <span>Folding</span></div>
                    <div class="checkbox"><input type="checkbox" value="Ironing" name="willing_to_work[]"> <span>Ironing</span></div>
                    <div class="checkbox"><input type="checkbox" value="Cleaning and Dusting Furniture" name="willing_to_work[]"> <span>Cleaning and Dusting Furniture</span></div>                    
                    <div class="checkbox"><input type="checkbox" value="Cleaning Refrigerator/Freezer" name="willing_to_work[]"><span>Cleaning Refrigerator/Freezer</span></div>                    
                    <div class="checkbox"><input type="checkbox" value="Cleaning Oven/Stove" name="willing_to_work[]"><span>Cleaning Oven/Stove</span></div>                    
                    <div class="checkbox"><input type="checkbox" value="Pesach Cleaning" name="willing_to_work[]"><span>Pesach Cleaning</span></div>
                    <div class="checkbox"><input type="checkbox" value="Able to watch children as well" name="willing_to_work[]"><span>Able to watch children as well</span></div>
                </div>
            </div>
            <div>
                <label>Availability</label>
                <div class="form-field">                    
                    <div class="checkbox"><input type="checkbox" value="Immediate" name="availability[]"/> Immediate</div>
                    <div class="checkbox full"><input type="checkbox" value="Start Date" name="availability[]" id="ckbox1"/>Start Date <input  type="text" name="start_date" id="textbox1"/></div>
                    <div class="checkbox"><input type="checkbox" value="Occassionally" name="availability[]"> <span>Occassionally</span></div>
                    <div class="checkbox"><input type="checkbox" value="Regularly" name="availability[]"> <span>Regularly</span></div>
                    <div class="checkbox"><input type="checkbox" value="Morning" name="availability[]"> <span>Morning</span></div>
                    <div class="checkbox"><input type="checkbox" value="Afternoon" name="availability[]"> <span>Afternoon</span></div>
                    <div class="checkbox"><input type="checkbox" value="Evening" name="availability[]"> <span>Evening</span></div>
                    <div class="checkbox"><input type="checkbox" value="Weekends Fri./ Sun." name="availability[]"> <span>Weekends Fri./ Sun.</span></div>
                    <div class="checkbox"><input type="checkbox" value="Saturday" name="availability[]"> <span>Saturday</span></div>
                </div>
            </div>
            <div>
                <label>Tell us about yourself (Short description not cv)</label>
                <div class="form-field">
                <textarea name="profile_description" class="txt"><?php echo isset($desc) ? $desc : '' ?></textarea>
                </div>
            </div>
            	<div>
            <label>References</label>
            <div class="form-field not-required">
            <div class="radio"><input type="radio" id="ref_check1" value="1" name="references" class="required" <?php echo isset($ref) && $ref == 1 ? 'checked' : '' ?>/> Yes</div>
            <div class="radio"><input type="radio" id="ref_check2" value="2" name="references" class="required" <?php echo isset($ref) && $ref == 2 ? 'checked' : '' ?> checked/> No</div>
            </div>
        </div>
        <div class="refrence_file" style="display:none;">
            <label></label>
            <input type="hidden" id="file-name" name="file">
            <button class="btn btn-primary" id="select_file">Select File</button>
            <input type="file" name="file_upload" id="file_upload" style="display: none;"> 
            <div id="output" class="loader"></div>
        </div>

            <input type="hidden" name="account_type1" value="<?php echo $this->uri->segment(3);?>"/>
            <input type="hidden" name="account_type2" value="<?php echo $this->uri->segment(4);?>"/>


        <h2>Skills</h2>
            <div class="checkbox-wrap">
                <div>
                    <input type="checkbox" value="1" name="driver_license"> Drivers license
                </div>
                <div>
                    <input type="checkbox" value="1" name="vehicle"> Vehicle
                </div>
                <div>
                    <input type="checkbox" value="1" name="on_short_notice"> Available on short notice
                </div>
                
            </div>
            <br />
            <div>
                <input type="submit" class="btn btn-success" value="Save <?php if($this->uri->segment(2) != 'new_profile'){echo '& Continue';}?>"/>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
 $("#textbox1").ready(function(){        
        $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
     });
    $(document).ready(function(){    
        
        $("#ref_check2").click(function(){
            if($("#ref_check2").is(':checked')){
                $('.refrence_file').hide(); 
                $('#upload_ref').val('');       
            }
        });
        $("#ref_check1").click(function(){
            $(".refrence_file").show();   
        });
       // if($('#ckbox1').is(':checked')){
       //      $("#textbox1").show();
       // }else{
       //      $("#textbox1").hide();
       //      $('#textbox1').val('');
       // }

       //  $("#ckbox1").change(function(){
       //      if($('#ckbox1').is(':checked')){
       //          $("#textbox1").show();   
       //      }else{
       //          $("#textbox1").hide(); 
       //          $('#textbox1').val('');       
       //      }
       //  });
        // change monthly rate and hourly rate
        $('.charge').change(function(){
            $('.rate').attr('name',$(this).val());
        });
    });
</script>
