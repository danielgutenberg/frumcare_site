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
                        $id        = $editData['id'];
                        $role_name = $editData['role_name'];
                        $access    = explode(',' ,$editData['access']);
                        $status    = $editData['status'];
                    }
                    else{
                        $id='';
                    }
                    ?>
                    <div class="ad-manager">
                    <form role="form" action="<?php echo site_url('admin/adminrole/edit');?>" method="post" enctype="multipart/form-data" id="admin_add_edit_form">
                         <div class="form-group">
                            <label class="control-label">Admin Role</label>
                            <div class="ad-manager-full-input"><input type="text" class="form-control required" name="name" value="<?php if(isset($role_name)){ echo $role_name;} ?>" /></div>
                        </div>
                         <div class="form-group">
                            <label class="control-label">Admin Privilege</label>    
                            <div class="ad-manager-checkbox">
                                <input type="checkbox" name="access[]" class="required" value="admin" <?php if(in_array('admin',$access)){?> checked="checked" <?php }?>>Add Edit Admin <br/>
                                <input type="checkbox" name="access[]" class="required" value="pages" <?php if(in_array('pages',$access)){?> checked="checked" <?php }?>>Add Edit Pages <br/>
                                <input type="checkbox" name="access[]" class="required" value="viewusers" <?php if(in_array('viewusers',$access)){?> checked="checked" <?php }?>>Access User Manager<br/>
                                <input type="checkbox" name="access[]" class="required" value="viewuserlog" <?php if(in_array('viewuserlog',$access)){?> checked="checked" <?php }?>>Access User Log Manager<br/>
                                <input type="checkbox" name="access[]" class="required" value="profilepics" <?php if(in_array('profilepics',$access)){?> checked="checked" <?php }?>> Approve and reject  profile picture<br/>
                                <input type="checkbox" name="access[]" class="required" value="userprofile" <?php if(in_array('userprofile',$access)){?> checked="checked" <?php }?>>Access User Profile<br/>
                                <input type="checkbox" name="access[]" class="required" value="emailtemplate" <?php if(in_array('emailtemplate',$access)){?> checked="checked" <?php }?>>Add Edit Email Template<br/>
                                <input type="checkbox" name="access[]" class="required" value="admanager" <?php if(in_array('admanager',$access)){?> checked="checked" <?php }?>>Acess Ad Manager<br/>
                                <input type="checkbox" name="access[]" class="required" value="searchalert" <?php if(in_array('searchalert',$access)){?> checked="checked" <?php }?>>View Search Alert<br/>
                                <input type="checkbox" name="access[]" class="required" value="package" <?php if(in_array('package',$access)){?> checked="checked" <?php }?>>Add Edit Packages<br/>
                                <input type="checkbox" name="access[]" value="feature" <?php if(in_array('feature',$access)){?> checked="checked" <?php }?>>Add Edit Features<br/>
                                <input type="checkbox" name="access[]" class="required" value="testimonial" <?php if(in_array('testimonial',$access)){?> checked="checked" <?php }?> >Add Edit Testimonial<br/>
                                <input type="checkbox" name="access[]" class="required" value="notifications" <?php if(in_array('notifications',$access)){?> checked="checked" <?php }?>>Add Edit Notifications<br/>
                                <input type="checkbox" name="access[]" class="required" value="accept_payment" <?php if(in_array('accept_payment',$access)){?> checked="checked" <?php }?> > Accept Payment<br/>
                                <input type="checkbox" name="access[]" class="required" value="replyticket" <?php if(in_array('replyticket',$access)){?> checked="checked" <?php }?> > Reply Ticket<br/>
                                <input type="checkbox" name="access[]" class="required" value="generalseo" <?php if(in_array('generalseo',$access)){?> checked="checked" <?php }?>> Edit General SEO <br/>
                                <input type="checkbox" name="access[]" class="required" value="notification" <?php if(in_array('notification',$access)){?> checked="checked" <?php }?>>Add Edit Notification<br/>
                                <input type="checkbox" name="access[]" class="required" value="adminrole" <?php if(in_array('adminrole',$access)){?> checked="checked" <?php }?>>Add Edit AdminRole<br/>
                            </div>
                        </div>
                     
                     	 <div class="form-group">
                        	<label class="control-label">Status</label>
                        	<div class="ad-manager-select">
                        		<select class="form-control required" name="status">
                            		<option>--select--</option>
                            		<option value="1" <?php if($status == 1){?> selected="selected" <?php }?> >Active</option>
                                    <option value="0" <?php if($status == 0){?> selected="selected" <?php }?> >Inactive</option>
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
