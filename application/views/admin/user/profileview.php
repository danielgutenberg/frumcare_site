<?php 
    if($recordData['profile_picture']!='')
        $img_url = site_url().'images/profile-picture/thumb/'.$recordData['profile_picture'];
    else
           $img_url = site_url().'images/no-image.jpg';
?>
<div class="container">
    <div class="padding-10 content-box">
        <div class="row main-content">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h1 class="txt-color-blueDark">User Profile View</h1>
                </div>
                <div class="panel-collapse">
                <div class="panel-body">
                        <div class="ad-manager">
                            <div class="form-group">
                                <label class="control-label">User Id:</label>
                                <div class="ad-manager-full-input"><?php echo $recordData['id']; ?></div>
                            </div>
                            <div class="form-group">   
                                <label class="control-label">User Name:</label>
                                <div class="ad-manager-full-input"><?php echo $recordData['name'];?></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Image:</label>
                                <div class="ad-manager-full-input">
                                    <img src="<?php echo $img_url;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Address:</label>
                                <div class="ad-manager-full-input"><?php echo $recordData['location'];?></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">City:</label>
                                <div class="ad-manager-full-input"><?php echo $recordData['city'];?></div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Phone Number:</label>
                                <div class="ad-manager-full-input"><?php echo $recordData['contact_number'];?></div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Age:</label>
                                <div class="ad-manager-full-input"><?php echo $recordData['age'];?></div>
                            </div>

                              <div class="form-group">
                                <label class="control-label">Gender:</label>
                                <div class="ad-manager-full-input">
                                    <?php 
                                        if($recordData['gender'] == 1)
                                            echo "Male";
                                        else
                                            echo "Female";

                                        ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Marital Status:</label>
                                <div class="ad-manager-full-input">
                                    <?php 
                                        if($recordData['marital_status'] == 1)
                                            echo "Married";
                                        else
                                            echo "Single";

                                        ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Languages:</label>
                                <div class="ad-manager-full-input">
                                    <?php 
                                         $lang = $recordData['language'];
                                         if($lang == 'es'){
                                            echo 'Spanish';
                                         }if($lang == 'eng'){
                                            echo 'English';
                                         }if($lang == 'sign'){
                                            echo 'Sign';
                                         }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Smoker:</label>
                                <div class="ad-manager-full-input">
                                        <?php if($recordData['smoker'] == 1){
                                            echo 'Yes';
                                        }else{
                                            echo 'No';
                                        } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Level of Observance:</label>
                                <div class="ad-manager-full-input"><?php echo $recordData['religious_observance'];?></div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Level of Education:</label>
                                <div class="ad-manager-full-input"><?php echo $recordData['education_level'];?></div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Education Institution Attended:</label>
                                <div class="ad-manager-full-input"><?php echo $recordData['educational_institution'];?></div>
                            </div>

                             <div class="form-group">
                                <label class="control-label">Action:</label>
                                <div class="ad-manager-btns">
                                    <?php echo prev_next('admin/user/profile/view',$recordData['id'], 'tbl_user');?>
                                    <a href="<?php echo site_url();?>admin/user/delete/<?php echo $recordData['id'];?>" class="btn btn-danger" onclick="return confirm('Are you suer to delete?');">Delete</a>
                                </div>

                            </div> 
 
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>