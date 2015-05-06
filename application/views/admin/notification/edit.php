<div class="container">
    <div class="padding-10">
        <div class="row">
               <span class="error">
                    <h3><?php if($this->session->flashdata('info')){ echo $this->session->flashdata('info'); } ?></h3>
                </span>
               <?php $action = $this->uri->segment(3);?>
                   <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                   <div class="panel-heading">
                    <h1 class="txt-color-blueDark"><?php if($action=='add'){echo "Add";}else{echo "Edit";}?> Notification </h1>
                    </div>
                    <div class="panel-collapse collapse in">
                    <div class="panel-collapse collapse in panel-body">
                    <?php
                    if($action=='edit')
                    {
                        $id                  = $editData['id'];
                        $notification_title  = $editData['notification_title'];
                        $notification_desc   = $editData['notification_desc'];
                        $status              = $editData['status'];
                        $notification_type   = $editData['notification_type'];
                    }
                    else{
                        $id='';
                    }
                    ?>
                    <div class="ad-manager">
                    <form role="form" action="<?php if($action=='add'){echo site_url('admin/notification/add');}else{echo site_url('admin/notification/edit');}?>" method="post" enctype="multipart/form-data" id="admin_add_edit_form">
                         <div class="form-group">
                            <label class="control-label">Notification Title/Subject</label>
                            <div class="ad-manager-full-input"><input type="text" class="form-control required" name="notification_title" value="<?php echo $notification_title;?>" /></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Notification Text/Mesage</label>
                            <div class="ad-manager-full-input">
                                <textarea class="form-control required" name="notification_description"><?php echo $notification_desc;?></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label">Notification Type</label>
                            <div class="ad-manager-select">
                                <select class="form-control required" name="notification_type">
                                    <option>--select--</option>
                                    <option value="Ad Refresh" <?php if($notification_type == 'Ad Refresh'){?> selected="selected" <?php } ?> >Ad Refresh</option>
                                    <option value="Upgrade Account" <?php if($notification_type == 'Upgrade Account'){?> selected="selected" <?php } ?>>Upgrade Account</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Status</label>
                            <div class="ad-manager-select">
                                <select class="form-control required" name="status">
                                    <option>--select--</option>
                                    <option value="1" <?php if($status == 1){?> selected="selected" <?php }?>>Active</option>
                                    <option value="0" <?php if($status == 0){?> selected="selected" <?php }?>>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Action</label>
                            <div class="ad-manager-select">
                               <input type="button" class="btn btn-success isrecurring" value="Set Recurring Notification">
                            </div>
                        </div>

                        <div class="form-group">
                             <div class="ad-manager-btns">
                             <input type="hidden" name="id" value="<?php echo $id;?>" >
                             <input type="text" name="isrecurring_notification" class="recurring" value="0">
                                <input type="submit" class="btn btn-default  btn-primary" id="btn_save" name="save_admin_info" value="Save"/> 
                            </div>
                        </div>
                    </form>
                </div>
                    </div>
                    </div>
                </div><!--panel default-->
            </div>
        </div>
    </div>
</div>
<script>    
    $('#admin_add_edit_form').validate();
    $(document).ready(function(){
        $('.isrecurring').click(function(){
            $('.recurring').val(1)
        });
    });
</script>
