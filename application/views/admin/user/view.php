<div class="container">
    <div class="padding-10 content-box">
        <div class="row main-content">
            <div class="panel panel-default">
                <?php $action = $this->uri->segment(3);?>
                <div class="panel-heading">
                <h1 class="txt-color-blueDark">View User</h1>
                </div>
                <?php flash() ?>
                <div class="panel-collapse">
                <div class="panel-body">
                        <div class="ad-manager">
                           <div class="form-group">
                                <label class="control-label">User Id:</label>
                                <div class="ad-manager-full-input">
                                    <?php 
                                        echo $detail[0]['id']; 
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">User Name:</label>
                                <div class="ad-manager-full-input">
                                    <?php echo $detail[0]['name']; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Image:</label>
                                <div class="ad-manager-full-input">
                                    <?php 
                                        $img  = site_url().'images/no-image.jpg';
                                        if($detail[0]['profile_picture']!=''){
                                            if(file_exists('images/profile-picture/thumb/'.$detail[0]['profile_picture'])){
                                                $img = site_url().'images/profile-picture/thumb/'.$detail[0]['profile_picture'];
                                            }else{
                                                 $img  = site_url().'images/no-image.jpg';
                                            }
                                        }
                                    ?>
                                    <img src="<?php echo $img;?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label">User Email:</label>
                                <div class="ad-manager-full-input">
                                    <?php echo $detail[0]['email']; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Account Type:</label>
                                <div class="ad-manager-full-input">
                                    <?php 
                                    if(isset($profile_detail[0]['account_category']))
                                    {
                                        if($profile_detail[0]['account_category'] == 1){
                                            echo 'Caregiver';
                                        }
                                        elseif($profile_detail[0]['account_category'] == 2){
                                            echo 'Parent';
                                        }else{
                                            echo 'Organization';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Care Type:</label>
                                <div class="ad-manager-full-input">
                                    <?php foreach($care_types as $care_type){
                                        if(isset($profile_detail[0]['care_type'])){
                                        if($care_type['id'] == $profile_detail[0]['care_type']){
                                            echo $care_type['service_name'];
                                        }
                                    } }?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Package:</label>
                                <div class="ad-manager-full-input">
                                    <?php 
                                        if($payment_detail)
                                            echo $payment_detail[0]['package_name'];
                                        else
                                            echo 'No Package available';
                                    ?>
                                </div>
                            </div>
                            
                            <?php
                                    if($detail[0]['status'] == 1){
                                        $status = "inactivate";
                                        }else{
                                            $status = "activate";
                                        }
                                    ?>

                            <div class="form-group">
                                <label class="control-label">Action:</label>
                                <div class="ad-manager-btns">
                                    <?php echo prev_next('admin/user/view',$detail[0]['id'], 'tbl_user');?>
                                    <a href="<?php echo site_url();?>admin/user/delete/<?php echo $detail[0]['id'];?>" class="btn btn-danger" onclick="return confirm('Are you suer to delete?');">Delete</a>
                                    <a class="btn btn-danger" href="<?php echo base_url('admin/user/status/'.$detail[0]['id'].'/'.$status)?>"><?php if($detail[0]['status'] == 1){ echo 'Inactive';}else{echo 'Active';}?></a>
                                    <a href="mailto:<?php echo $detail[0]['email'];?>">Email this user </a>
                                </div>

                            </div>

                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>