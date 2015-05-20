<?php 
    $current_user = get_user(segment(4));
    // $exp = $current_user['experience'];
    // $edu = $current_user['education_level'];
    // $hr_rate = $current_user['hourly_rate'];
    // $desc = $current_user['profile_description'];
    // $bg_check = $current_user['agree_bg_check'];
?>
<div class="row">
    <div class="col-md-9 content-box">
        <div class="row main-content">
            <div class="container">
                <?php $action = $this->uri->segment(3);?>
                <h1>Edit Ad</h1>
                <?php flash() ?>
                <div class="ad-manager">
                    <form role="form" id="ad_add_edit_form" method="post" action="<?php echo base_url('admin/ad/edit/'.segment(4))?>" enctype="multipart/form-data">
                            <div class="form-group">
                                                    <label class="control-label">Name</label>
                                                    <div class="ad-manager-input">
                                                       <?php echo $detail[0]['name'];?>
                                                    </div>
                                                    <a href="<?php echo site_url();?>admin/ad/detail/<?php echo $detail[0]['id'];?>" class="btn btn-default btn-primary" target="_blank">Manage Ad Details</a>
                                                </div>
                    

                            <div class="form-group">
                                <label class="control-label">Created on</label>
                                <div class="ad-manager-input"><?php echo $detail[0]['created_on'];?></div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Updated on</label>
                                <div class="ad-manager-input"><?php echo $detail[0]['updated_on'];?></div>
                                <div class="ad-manager-input"><input type="hidden" name="updated_on" value="<?php echo strtotime('now');?>"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Category</label>
                                <div class="ad-manager-input">
                                    <?php 
                                        if($detail[0]['account_category'] == 1){
                                         echo "Caregiver";
                                        }
                                        elseif($detail[0]['account_category'] == 2){ 
                                                echo "Parent";
                                        }
                                        if($detail[0]['account_category'] == 3){
                                            echo "Organization";
                                        }
                                    ?>
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="control-label">
                                    Care Type
                                </label>
                                <div class="ad-manager-select">
                                    <select id="care_type" name="care_type" class="form-control">
                                        <option value="">Select Care Type</option>
                                        <optgroup label="Individual">
                                            <?php
                                            $flag = 0;
                                            foreach($care as $c){ ?>
                                                <option value="<?php echo $c['id'] ?>" <?php echo ($detail[0]['care_type'] == $c['id']) ? 'selected' : ''; ?>>
                                                    <?php
                                                    echo $c['service_name'];
                                                    if($c['service_by'] == 2 && $flag != 1) {
                                                        echo '</optgroup><optgroup label="Organization">';
                                                        $flag = 1;
                                                    }
                                                    ?>
                                                </option>
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Type</label>
                                <div class="ad-manager-select">
                                    <select name="ad_type" class="form-control">
                                        <option value="0" <?php if($detail[0]['ad_type'] == 0){?> checked="checked" <?php }?> >Free</option>
                                        <option value="1" <?php if($detail[0]['ad_type'] == 1){?> checked="checked" <?php }?>>Paid</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label"> Is Active</label>
                                <div class="ad-manager-radio">
                                    <div><input type="radio" name="profile_status" value="1" <?php if($detail[0]['profile_status'] == 1){?> checked="checked" <?php  } ?> />  Active </div>
                                    <div><input type="radio" name="profile_status" value="0" <?php if($detail[0]['profile_status'] == 0){?> checked="checked" <?php  } ?>/>  Inactive </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Actions</label>
                                <div class="ad-manager-btns">
                                    <?php echo prev_next('admin/ad/edit',$detail[0]['id'],'tbl_userprofile');?>
                                    <a href="<?php echo site_url();?>admin/ad/delete/<?php echo $detail[0]['id'];?>" class="btn btn-default btn-danger" onclick="return confirm('Are sure to delete this ad?');">Delete</a>
                                    <a href="<?php echo site_url();?>admin/ad/hide/<?php echo $detail[0]['id'];?>" class="btn btn-default  btn-primary" onclick="return confirm('Are you sure to hide this ad?')">Hide</a>
                                    <!-- <a href="<?php echo site_url();?>admin" class="btn btn-default  btn-primary">Refresh</a> -->
                                    <a href="#" class="btn btn-primary">Refresh</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    <input class="btn btn-default btn-primary" type="submit" name="add_user" value="Update"/>
                                    
                                </label>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>