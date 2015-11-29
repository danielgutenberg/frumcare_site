<?php $this->load->view('frontend/care/giver/edit_variables'); ?>

<div class="container">

<?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
         <?php $this->load->view('frontend/user/dashboard_nav');?>
    </div>

    <div class="dashboard-right float-right">

<form action="<?php echo site_url().'user/update_job_details/'.$care_type;?>" method="post">
    <div class="ad-form-container">
    <div>
        <h1 class="step3">Edit Organization Details</h1>
    </div>

    <div>
        <label>Year established</label>
        <div class="form-field">
        <select name="established" class="txt">
            <option value="">Select year established</option>
            <?php for($i=1950;$i<=date('Y');$i++):?>
            <option value="<?php echo $i?>" <?php if($established == $i){?> selected="selected" <?php } ?>><?php echo $i;?></option>
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
        <label>Specialize in</label>
        <div class="form-field">
            <div class="checkbox"><input type="checkbox" value="Autism" name="willing_to_work[]" <?php if(in_array('Autism', $willing_to_work)){?> checked="checked" <?php }?>> <span>Autism</span></div>
            <div class="checkbox"><input type="checkbox" value="Down Syndrome" name="willing_to_work[]" <?php if(in_array('Down Syndrome', $willing_to_work)){?> checked="checked" <?php }?>> <span>Down Syndrome</span></div>
            <div class="checkbox"><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]" <?php if(in_array('Wheelchair bound', $willing_to_work)){?> checked="checked" <?php }?>> <span>Wheelchair bound</span></div>
            <div class="checkbox"><input type="checkbox" value="Handicapped" name="willing_to_work[]" <?php if(in_array('Handicapped',$willing_to_work)){?> checked="checked"<?php }?>><span>Handicapped</span></div>
        </div>
    </div>
   <div>
        <?php $extra_field = explode(',',$detail[0]['extra_field']); ?>
        <label>Observance in facility</label>
        <div class="checkbox"><input type="checkbox" value="Shul on premises" name="extra_field[]" <?php if(in_array('shul on premises',$extra_field)){?> checked="checked" <?php }?>/>Shul on premises</div>
        <div class="checkbox"><input type="checkbox" value="Kosher kitchen" name="extra_field[]" <?php if(in_array('kosher kitchen',$extra_field)){?> checked="checked" <?php }?>/>Kosher kitchen</div>
        <div class="checkbox"><input type="checkbox" value="Kosher food available" name="extra_field[]" <?php if(in_array('kosher food available',$extra_field)){?> checked="checked" <?php }?>/>Kosher food available</div>
        <div class="checkbox"><input type="checkbox" value="Shabbos observant facility" name="extra_field[]" <?php if(in_array('shabbos observant facility',$extra_field)){?> checked="checked" <?php }?>/>Shabbos observant facility</div>
    </div>
    <div>
        <label>Number of patients</label>
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


    <div>
        <label>Cost</label>
        <div class="form-field">
           <input type="text" name="rate" value="<?php echo $rate;?>">
        </div>
    </div>

            <div>
        <label>Tell us about your organization / facilities / staff</label>
        <div class="form-field">
        <textarea name="profile_description" class="txt"><?php echo isset($profile_description) ? $profile_description : '' ?></textarea>
        </div>
    </div>



        <?php $this->load->view('frontend/care/photo_upload', ['photo_name' => 'facility_pic', 'upload_title' => "Upload Photo of Facility / Organization"]); ?>               


            <div>
                <label> Payment Options(specify)</label>
                <div class="form-field">
                    <input type="text" name="payment_option" value="<?php echo $detail[0]['payment_option'];?>">
                </div>
            </div>
    <div>
          <input type="submit" class="btn btn-success" value="Update"/>
    </div>

    </div>
    </form>
</div>
</div>