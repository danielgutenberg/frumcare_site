<?php $this->load->view('frontend/care/giver/edit_variables'); ?>

<div class="container">

<?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
         <?php $this->load->view('frontend/user/dashboard_nav');?>
    </div>

    <div class="dashboard-right float-right">

    <form action="<?php echo site_url().'user/update_job_details/'.$care_type;?>" method="post">
        <div class="ad-form-container float-left">
            <div class="top-welcome">
                <h2 class="step3">Edit Job Details</h2>
            </div>

            <div>
                <label>Type of Organization</label>
                <select name="sub_care">

                    <option <?php echo $detail[0]['sub_care']=='assisted living residence'?'selected="selected"':'';?> value="assisted living residence">Assisted living residence</option>
                    <option <?php echo $detail[0]['sub_care']=='senior care center'?'selected="selected"':'';?> value="senior care center">Senior care center</option>
                    <option <?php echo $detail[0]['sub_care']=='nursing home'?'selected="selected"':'';?> value="nursing home">Nursing home</option>
                    <option <?php echo $detail[0]['sub_care']=='rehab therapy center'?'selected="selected"':'';?> value="rehab therapy center">Rehab / Therapy Center</option>
                    <option <?php echo $detail[0]['sub_care']=='other'?'selected="selected"':'';?> value="other">Other</option>
                </select>
            </div>



            <div>
                <label>Year established</label>
                <div class="form-field">
                <select name="established" class="txt">
                    <option value="">Select year established</option>
                    <?php for($i=1950;$i<=date('Y');$i++):?>
                    <option value="<?php echo $i?>" <?php if($established == $i){ ?> selected="selected" <?php }?>><?php echo $i;?></option>
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
                <label>Number of patients / residents</label>
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
                <label>Specialize in</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Alz./dementia" name="willing_to_work[]" <?php if(in_array('Alz./dementia',$willingtowork)){?> checked="checked" <?php }?>> <span>Alz./dementia</span></div>
                    <div class="checkbox"><input type="checkbox" value="Sight loss" name="willing_to_work[]" <?php if(in_array('Sight loss',$willingtowork)){?> checked="checked" <?php }?>> <span>Sight loss</span></div>
                    <div class="checkbox"><input type="checkbox" value="Hearing loss" name="willing_to_work[]" <?php if(in_array('Hearing loss',$willingtowork)){?> checked="checked" <?php }?>> <span>Hearing loss</span></div>
                    <div class="checkbox"><input type="checkbox" value="Wheelchair bound" name="willing_to_work[]" <?php if(in_array('Wheelchair bound',$willingtowork)){?> checked="checked" <?php }?>> <span>Wheelchair bound</span></div>
                </div>
            </div>

            <div>
                <label>Observance in facility</label>
                <div class="checkbox"><input type="checkbox" value="shul on premises" name="extra_field[]" <?php if(in_array('shul on premises',$extra_field)){?> checked="checked" <?php }?>/>Shul on premises</div>
                <div class="checkbox"><input type="checkbox" value="kosher kitchen" name="extra_field[]" <?php if(in_array('kosher kitchen',$extra_field)){?> checked="checked" <?php }?>/>Kosher kitchen</div>
                <div class="checkbox"><input type="checkbox" value="kosher food available" name="extra_field[]" <?php if(in_array('kosher food available',$extra_field)){?> checked="checked" <?php }?>/>Kosher food available</div>
                <div class="checkbox"><input type="checkbox" value="shabbos observant facility" name="extra_field[]" <?php if(in_array('shabbos observant facility',$extra_field)){?> checked="checked" <?php }?>/>Shabbos observant facility</div>
            </div>

            <div>
                <label>Cost</label>
                <div class="form-field">
                   <input type="text" name="rate" value="<?php echo $rate;?>">
                </div>
            </div>
            <div>
                <label>Tell us about your organization / facility / staff</label>
                <div class="form-field">
                <textarea name="profile_description" class="txt"><?php echo isset($desc) ? $desc : '' ?></textarea>
                </div>
            </div>

            <?php $this->load->view('frontend/care/giver/fields/references') ?>

            <?php $this->load->view('frontend/care/photo_upload', ['photo_name' => 'facility_pic', 'upload_title' => "Upload Photo of Facility / Organization"]); ?> 

            <div>
                <label> Payment Options(specify)</label>
                <div class="form-field">
                    <input type="text" name="payment_option" value="<?php echo $detail[0]['payment_option'];?>">
                </div>
            </div>
            <br />
                <input type="submit" class="btn btn-success" value="Update"/>
            </div>
    </form>
</div>
</div>
