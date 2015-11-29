<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php
    if($detail){
        $lookingtowork = explode(',',$detail[0]['looking_to_work']);
        //$age_grp = $detail[0]['age_group'];
        $age_group = explode(',',$detail[0]['age_group']);
        $lang = explode(',',$detail[0]['language']);
        $training = explode(',',$detail[0]['training']);
        $exp = $detail[0]['experience'];
        $hr_rate = $detail[0]['hourly_rate'];
        $availability = explode(',', $detail[0]['availability']);
        $desc = $detail[0]['profile_description'];
        $ref  = $detail[0]['references'];
        $estd = $detail[0]['established'];
        $certification = $detail[0]['certification'];
        $number_of_children = $detail[0]['number_of_children'];
        $number_of_staff = $detail[0]['number_of_staff'];
        $ref_det            = $detail[0]['references_details'];
        $reference_file = $detail[0]['reference_file'];
        $rate = $detail[0]['rate'];
        $rate_type = $detail[0]['rate_type'];
        $facility = $detail[0]['facility_pic'];
    }
?>
<?php $care_type = $this->uri->segment(4);?>
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
                    <option value="<?php echo $i?>" <?php if($estd == $i){?> selected="selected" <?php }?>><?php echo $i;?></option>
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


            <div>
                <label>Days / Hours</label>
                <div class="form-field">
                <br>
                 <label style="width:25%">Sun</label><input type="text" name="sunday_from" class="time" style="width:25%" value="<?php echo $detail[0]['sunday_from'];?>"> to  <input type="text" name="sunday_to" class="time" style="width:25%" value="<?php echo $detail[0]['sunday_to'];?>">
                 <br>
                 <br>
                 <label style="width:25%">Mon-Thu</label><input type="text" name="mid_days_from" value="<?php echo $detail[0]['mid_days_from'];?>" class="time" style="width:25%"> to  <input type="text" name="mid_days_to" class="time" style="width:25%" value="<?php echo $detail[0]['mid_days_from'];?>">
                 <br>
                 <br>
                 <label style="width:25%">Fri</label><input type="text" name="friday_from" value="<?php echo $detail[0]['friday_from'];?>" style="width:25%" class="time"> to <input type="text" name="friday_to" class="time" style="width:25%" value="<?php echo $detail[0]['friday_to'];?>">
                 <div class="checkbox"><input type="checkbox" name="extended_hrs_available" value="1" <?php if($detail[0]['extended_hrs'] == 1){?> checked="checked" <?php }?> > Extended Hours Available</div>
                 <div class="checkbox"><input type="checkbox" name="flexible_hours" value="1" <?php if($detail[0]['flexible_hours'] == 1){?> checked="checked" <?php }?>> Flexible Hours</div>

                 <br>
                 <label>Vacation Days (Please specify vacation days)</label>
                 <br>
                 <input type="text" name="vacation_days" value="<?php echo $detail[0]['vacation_days'];?>" placeholder="Vacation Days">

                <br>
                <br>

                <input type="hidden" id="pdf-name" name="pdf" value="<?php echo $detail[0]['pdf'];?>">
                <button class="btn btn-primary" id="pdf_file">Please select pdf file</button>
                <input type="file" name="pdf_upload" id="pdf_upload" style="display: none;">
                <div id="output1" class="loader1">
                        <?php if(isset($detail[0]['pdf'])){
                            echo $detail[0]['pdf'];
                        }else{
                            echo 'No file';
                        }
                        ?>
                </div>
                </div>
            </div>


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
                <textarea name="profile_description" class="txt"><?php echo isset($desc) ? $desc : '' ?></textarea>
                </div>
            </div>

            <div>
                <label>References</label>
                <div class="form-field">
                <div class="radio"><input type="radio" value="1" name="references" id="ref_check1" class="required" <?php echo isset($ref) && $ref == 1 ? 'checked' : '' ?>/> Yes</div>
                <div class="radio"><input type="radio" value="2" name="references" id="ref_check2" class="required" <?php echo isset($ref) && $ref == 2 ? 'checked' : '' ?> /> No</div>
                </div>
            </div>

            <div class="refrence_file" <?php echo isset($reference_file) && $ref =='1' ?"":"" ?>>
            <label></label>
            <input type="hidden" id="file-name" name="file" value="<?php echo isset($reference_file)?$reference_file:'' ?>">
            <button class="btn btn-primary" id="select_file">Select File</button>
            <input type="file" name="file_upload" id="file_upload" style="display: none;">
            <div id="output" class="loader">
                    <?php if(isset($reference_file))
                        echo $reference_file;
                    else
                        echo 'No files';
                    ?>

                </div>
        </div>
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

