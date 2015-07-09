<div class="row">
    <div class="col-md-9 content-box">
        <div class="row main-content">
            <div class="container">
               
                <h1>Edit Ad</h1>
                

                <div class="ad-manager">
                    <form role="form" id="ad_add_edit_form" method="post" action="<?php echo base_url('admin/ad/detail/'.segment(4))?>" enctype="multipart/form-data">
                        <div class="form-group">
                               <label class="control-label">Name:</label>
                                <div class="ad-manager-full-input"><?php echo $detail[0]['first_name'].' '.$detail[0]['last_name'];?></div>
                            </div>
                           <div class="form-group">
                                <label class="control-label">Email:</label>
                                <div class="ad-manager-full-input"><?php echo $detail[0]['email'];?></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Phone:</label>
                                <div class="ad-manager-full-input"><?php echo $detail[0]['contact_number'];?></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Gender:</label>
                                <div class="ad-manager-full-input">
                                    <?php 
                                        if($detail[0]['gender'] = 1)
                                            echo 'Male';
                                        else 
                                            echo 'Female';
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Location:</label>
                                <div class="ad-manager-full-input"><?php echo $detail[0]['location'];?></div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">City:</label>
                                <div class="ad-manager-full-input"><?php echo $detail[0]['city'];?></div>
                            </div>

                             <div class="form-group">
                                <label class="control-label">Type:</label>
                                <div class="ad-manager-full-input">
                                    
                                        <?php if($detail[0]['account_category'] == 1){ echo "Caregiver"; }?> 
                                        <?php if($detail[0]['account_category'] == 2){ echo "Careseeker"; }?> 
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php //echo $ad_form;?></label>
                            </div>
                            <?php if($ad_form){
                                    $this->load->view($ad_form,$detail);
                                }?>
                                
                            <div class="form-group">
                                <div class="ad-manager-btns">
                                    <input class="btn btn-primary btn-default" type="submit" name="update" value="Update"/>
                                    <input class="btn btn-primary btn-danger" type="button" value="Cancel" onclick="history.go(-1);"/>
                                </div>
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
