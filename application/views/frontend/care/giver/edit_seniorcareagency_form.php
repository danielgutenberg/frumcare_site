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
                <h2 class="step3">Edit Organization Details</h2>
            </div>

            <div>
                <label>Year established</label>
                <div class="form-field">
                <select name="established" class="txt">
                    <option value="">Select year established</option>
                    <?php for($i=1950;$i<=date('Y');$i++):?>
                    <option value="<?php echo $i?>" <?php if($i == $established){?> selected="selected" <?php }?>><?php echo $i;?></option>
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
                <div class="checkbox"><input type="checkbox" value="Alz./dementia" name="willingtowork[]" <?php if(in_array('Alz./dementia',$willingtowork)){?> checked="checked"<?php }?>> <span>Alz./ dementia</span></div>
                <div class="checkbox"><input type="checkbox" value="Sight loss" name="willingtowork[]" <?php if(in_array('Sight loss',$willingtowork)){?> checked="checked"<?php }?>> <span>Sight loss</span></div>

                <div class="checkbox"><input type="checkbox" value="Hearing loss" name="willingtowork[]" <?php if(in_array('Hearing loss',$willingtowork)){?> checked="checked"<?php }?>> <span>Hearing loss</span></div>
                <div class="checkbox"><input type="checkbox" value="Wheelchair bound" name="willingtowork[]" <?php if(in_array('Wheelchair bound',$willingtowork)){?> checked="checked"<?php }?>> <span>Wheelchair bound</span></div>
                </div>
            </div>

            <div>
                <label>Cost</label>
                <div class="form-field">
                   <input type="text" name="rate" value="<?php echo $rate;?>">
                </div>
            </div>

            <div>
                <!--<label>Check one or more</label>-->
                <div class="form-field">
                        <!--<div class="checkbox"><input type="checkbox" name="rate_type[]" value="1" <?php if(in_array('1',$rate_type)){?> checked="checked" <?php } ?>>Hourly Rate</div>-->
                        <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2" <?php if(in_array('2',$rate_type)){?> checked="checked" <?php } ?>>Monthly Rate Available</div>
                </div>
           </div>
            <div>
                <label>Tell us about your organization</label>
                <div class="form-field">
                <textarea name="profile_description" class="txt"><?php echo isset($desc) ? $desc : '' ?></textarea>
                </div>
            </div>

            <?php
                $photo_url = site_url("images/plus.png");
                if(isset($facility)){
                    $photo_url = base_url('images/profile-picture/thumb/'.$facility);
                }
            ?>

                <div class="upload-photo"  style="display:none;">
                    <h2>Upload photo of facility / organization</h2>
                    <input type="hidden" id="file-name" name="facility_pic" value="<?php echo isset($facility)?>">
                    <div id="output"><img src="<?php echo $photo_url?>"></div>
                    <label>Browse your computer to select a file to upload</label>
                    <button class="btn btn-default" id="upload">Choose File</button>
                    <input type="file" name="ImageFile" id="ImageFile" style="display: none;"> <div class="loader"></div>
                    <p>Please make sure your photo is appropriate for our site and sensitive to Jewish Tradition.</p>
                </div>



             <div>
                <label> Payment Options (specify)</label>
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

