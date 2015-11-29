<?php $this->load->view('frontend/care/giver/edit_variables'); ?>

<div class="container">

<?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
         <?php $this->load->view('frontend/user/dashboard_nav');?>
    </div>
    <div class="dashboard-right float-right">

    <form action ="<?php echo site_url().'user/update_job_details/'.$care_type;?>" method="post">
        <div class="ad-form-container float-left">
            <div class="top-welcome">
                <h1 class="step3">Edit Organization Details</h1>
            </div>
            <div>
                <label>Type of Organization</label>
                <select name="sub_care">
                    <option <?php echo $detail[0]['sub_care']=='day care center'?'selected="selected"':'';?> value="day care center">Day Care Center</option>
                    <option <?php echo $detail[0]['sub_care']=='day camp'?'selected="selected"':'';?> value="day camp">Day Camp</option>
                    <option <?php echo $detail[0]['sub_care']=='afternoon activities'?'selected="selected"':'';?> value="afternoon activities">Afternoon Activities</option>
                    <option <?php echo $detail[0]['sub_care']=='pre school'?'selected="selected"':'';?> value="pre school">Pre-School</option>
                    <option <?php echo $detail[0]['sub_care']=='other'?'selected="selected"':'';?> value="other">Other</option>
                </select>
            </div>
            <div>
                <label>For</label>
                <div class="form-field">
                <div class="checkbox"><input type="checkbox" value="Boys" name="looking_to_work[]" <?php if(in_array('Boys',$lookingtowork)){?> checked="checked"<?php }?>> <span>Boys</span></div>
                <div class="checkbox"><input type="checkbox" value="Girls" name="looking_to_work[]" <?php if(in_array('Girls',$lookingtowork)){?> checked="checked"<?php }?>> <span>Girls</span></div>
                <div class="checkbox"><input type="checkbox" value="Both" name="looking_to_work[]" <?php if(in_array('Both',$lookingtowork)){?> checked="checked"<?php }?>> <span>Both</span></div>
                </div>
            </div>
            <div>
                <label>Year established</label>
                <div class="form-field">
                <select name="established" class="required">
                    <option value="">Select year established</option>
                    <?php for($i=1950;$i<=date('Y');$i++):?>
                    <option value="<?php echo $i?>" <?php if($established == $i){?> selected="selected" <?php }?>><?php echo $i;?></option>
                    <?php endfor;?>
                </select>
                </div>
            </div>

            <div>
                <label>Certification</label>
                <div class="form-field">
                <input type="text" value="<?php echo isset($certification) ? $certification : '' ?>" name="certification" class="txt">
                </div>
            </div>
            <div>
                <label>Age group</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="0-3" name="age_group[]" <?php if(in_array('0-3',$age_group)){?> checked="checked" <?php } ?>/> 0-3 months</div>
                    <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]" <?php if(in_array('3-6',$age_group)){?> checked="checked" <?php } ?>/> 3-6 months</div>
                    <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]" <?php if(in_array('6-12',$age_group)){?> checked="checked" <?php } ?>/> 6-12 months</div>
                    <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]" <?php if(in_array('1-3',$age_group)){?> checked="checked" <?php } ?>/> 1 to 3 years</div>
                    <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]" <?php if(in_array('3-5',$age_group)){?> checked="checked" <?php } ?>/> 3 to 5 years</div>
                    <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]" <?php if(in_array('6-11',$age_group)){?> checked="checked" <?php } ?>/> 6 to 11 years</div>
                    <div class="checkbox"><input type="checkbox" value="12+" name="age_group[]" <?php if(in_array('12+',$age_group)){?> checked="checked" <?php } ?>/> 12+ years</div>
                </div>
            </div>

            <div>
                <label>Number of children in group</label>
                <div class="form-field">
                <input type="text" value="<?php echo isset($number_of_children) ? $number_of_children : '' ?>" name="number_of_children" class="txt number">
                </div>
            </div>

            <div>
                <label>Number of staff</label>
                <div class="form-field">
                <input type="text" value="<?php echo isset($number_of_staff) ? $number_of_staff : '' ?>" name="number_of_staff" class="txt number">
                </div>
            </div>


            <?php $this->load->view('frontend/care/giver/fields/days_hours'); ?>


            <?php 
                $data = [
                    'photo_name' => 'facility_pic',
                    'upload_title' => "Upload owner's photo",
                    'picture_type' => 'facility_pic'
                ];
                $this->load->view('frontend/care/photo_upload', $data);
            ?>



            <div>
                <label>Tell us about your organization / facilities / activities</label>
                <div class="form-field">
                <textarea name="profile_description" class="txt"><?php echo isset($profile_description) ? $profile_description : '' ?></textarea>
                </div>
            </div>

            <?php $this->load->view('frontend/care/giver/fields/references'); ?>
            <div>
            <label>Cost</label>
            <div class="form-field">
                <input type="text" value="<?php echo $rate;?>" name="rate">
            </div>
        </div>
            <br/>
            <div>
                <input type="submit" class="btn btn-success" value="Update"/>
            </div>
        </div>
   </form>
</div>
</div>

