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
                    <h1 class="txt-color-blueDark"><?php if($action=='add'){echo "Add";}else{echo "Edit";}?> Admin Role Details</h1>
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
                    <form role="form" action="<?php if($action=='add'){echo site_url('admin/adminrole/add');}else{echo site_url('admin/adminrole/edit_save');}?>" method="post" enctype="multipart/form-data" id="admin_add_edit_form">
                         <div class="form-group">
                            <label class="control-label">Admin Role</label>
                            <div class="ad-manager-full-input"><input type="text" class="form-control required" name="name" value="<?php if(isset($name)){ echo $name;} ?>" /></div>
                        </div>
                         <div class="form-group">
                            <label class="control-label">Admin Privilege</label>    
                            <div class="ad-manager-checkbox">
                                <input type="checkbox" name="access[]" class="required" value="admin">Add Edit Admin <br/>
                                <input type="checkbox" name="access[]" class="required" value="pages">Add Edit Pages <br/>
                                <input type="checkbox" name="access[]" class="required" value="viewusers">Access User Manager<br/>
                                <input type="checkbox" name="access[]" class="required" value="viewuserlog">Access User Log Manager<br/>
                                <input type="checkbox" name="access[]" class="required" value="profilepics"> Approve and reject  profile picture<br/>
                                <input type="checkbox" name="access[]" class="required" value="userprofile">Access User Profile<br/>
                                <input type="checkbox" name="access[]" class="required" value="emailtemplate">Add Edit Email Template<br/>
                                <input type="checkbox" name="access[]" class="required" value="admanager">Acess Ad Manager<br/>
                                <input type="checkbox" name="access[]" class="required" value="searchalert">View Search Alert<br/>
                                <input type="checkbox" name="access[]" class="required" value="package">Add Edit Packages<br/>
                                <input type="checkbox" name="access[]" class="required" value="feature">Add Edit Features<br/>
                                <input type="checkbox" name="access[]" class="required" value="testimonial">Add Edit Testimonial<br/>
                                <input type="checkbox" name="access[]" class="required" value="notifications">Add Edit Notifications<br/>
                                <input type="checkbox" name="access[]" class="required" value="accept_payment"> Accept Payment <br/>
                                <input type="checkbox" name="access[]" class="required" value="replyticket"> Reply Ticket <br/>
                                <input type="checkbox" name="access[]" class="required" value="generalseo"> Edit General SEO <br/>
                                <input type="checkbox" name="access[]" class="required" value="notification">Add Edit Notification<br/>
                                <input type="checkbox" name="access[]" class="required" value="adminrole">Add Edit AdminRole<br/>

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
                            <?php if(isset($id)){ ?><input type="hidden" name="id" value="<?php echo $id; ?>" /><?php }?>
                            
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
