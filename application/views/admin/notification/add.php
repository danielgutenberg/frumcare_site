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
                        $id=$editdata['id'];
                        $name=$editdata['full_name'];
                        $username=$editdata['username'];
                        $password=encrypt_decrypt('decrypt', $editdata['password']);
                        $email_address1 = $editdata['email1'];
                        $email_address2 = $editdata['email2'];
                        $email_address3 = $editdata['email3'];
                		$role=$editdata['role'];
                    }
                    else{
                        $id='';
                    }
                    ?>
                    <div class="ad-manager">
                    <form role="form" action="<?php if($action=='add'){echo site_url('admin/notification/add');}else{echo site_url('admin/adminrole/edit_save');}?>" method="post" enctype="multipart/form-data" id="admin_add_edit_form">
                         <div class="form-group">
                            <label class="control-label">Notification Title/Subject</label>
                            <div class="ad-manager-full-input"><input type="text" class="form-control required" name="notification_title" value="" /></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Notification Text/Mesage</label>
                            <div class="ad-manager-full-input">
                                <textarea class="form-control required" name="notification_description"></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                        	<label class="control-label">Notification Type</label>
                        	<div class="ad-manager-select">
                        		<select class="form-control required" name="notification_type">
                            		<option>--select--</option>
                            		<option value="Ad Refresh">Ad Refresh</option>
                                    <option value="Upgrade Account">Upgrade Account</option>
                        		</select>
                        	</div>
                    	</div>

                        <div class="form-group">
                            <label class="control-label">Status</label>
                            <div class="ad-manager-select">
                                <select class="form-control required" name="status">
                                    <option>--select--</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                             <div class="ad-manager-btns">
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
</script>
