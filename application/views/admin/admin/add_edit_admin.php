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
                    <h1 class="txt-color-blueDark"><?php if($action=='add'){echo "Add";}else{echo "Edit";}?> Admin Details</h1>
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
                        $status=$editdata['status'];
                    }
                    else{
                        $id='';
                    }
                    ?>
                    <div class="ad-manager">
                    <form role="form" action="<?php if($action=='add'){echo site_url('admin/admin/add_save');}else{echo site_url('admin/admin/edit_save');}?>" method="post" enctype="multipart/form-data" id="admine_add_edit_form">
                         <div class="form-group">
                            <label class="control-label">Admin Full Name</label>
                            <div class="ad-manager-full-input"><input type="text" class="form-control required" name="name" value="<?php if(isset($name)){ echo $name;} ?>" /></div>
                        </div>
                         <div class="form-group">
                            <label class="control-label">Admin Username</label>
                            <div class="ad-manager-full-input"><input type="text" class="form-control required" name="username" value="<?php if(isset($username)){ echo $username;} ?>" /></div>
                        </div>
                         <div class="form-group">
                            <label class="control-label">Admin Email</label>    
                            <div class="ad-manager-full-input">
                                <input type="text" class="form-control required email" name="email_address1" value="<?php if(isset($email_address1)){ echo $email_address1;} ?>" />
                                <input type="hidden" name="email_address2" />
                                <input type="hidden" name="email_address3" />
                            </div>
                        </div>
                        <?php if(is_super() && $action=='edit'):?>
                        <!-- <tr>
                            <td></td>
                            <td><a href="javascript:void(0)" class="btn btn-info">Reset Password</a></td>
                        </tr> -->
                        <?php endif;?>
                         <div class="form-group">
                            <label class="control-label">Admin Password</label>
                            <div class="ad-manager-select">
                                <?php
                                if($action=='edit')
                                {
                                    ?>
                                    <input <?php echo is_super()?'':'readonly'?> type="password" class="form-control required" name="current_password" id="current_password" value="<?php echo $password;?>"/>
                                <?php    
                                }
                                else
                                {
                                    ?>
                                    <input type="password" class="form-control required" name="password" />
                                    <?php
                                }
                                ?>
                                
                            </div>
                        </div>
                     	 <div class="form-group">
                        	<label class="control-label">Admin Role</label>
                        	<div class="ad-manager-select">
                        		<select class="form-control required" name="role">
                            		<option value="">Select Admin Role</option>
                                    <?php 
                                        if(isset($adminrole)){
                                            foreach($adminrole as $rolea): ?>
                                                <option value="<?php echo $rolea['role_name'];?>" <?php if($action=='edit'){ if($rolea['role_name'] == $role){?> selected="selected" <?php }}?>><?php echo $rolea['role_name'];?></option>
                                    <?php 
                                        endforeach;
                                     } 
                                    ?>
                        		</select>
                        	</div>
                    	</div>

                        <?php 
                                if($this->session->userdata('admin_level')=='Super Admin'){ 
                                    ?>
                                     <div class="form-group">
                                     <label class="control-label">Status</label>
                                     <div class="ad-manager-full-input">
                                     <select name="status" class="form-control required">
                                        <option value="1" <?php echo isset($status) && $status==1?"selected":''?>>Active</option>
                                        <option value="0" <?php echo isset($status) && $status==0?"selected":''?>>Inactive</option>
                                    </select>
                                    </div>
                                    </div>
                                    <?php 
                                }
                                else{
                                    ?>
                                    <input type="hidden" name="status" value="<?php $status ?>"/>
                                    <?php
                                } ?>

                         <div class="form-group">
                             <div class="ad-manager-btns">
                               <?php if($action=="edit"):?>
                                      <?php prev_next('admin/admin/edit', $id, 'tbl_admin');?>
                                <?php if(role($id)==1):?>
                                    <a href="<?php echo site_url('admin/admin/delete')."/".$id; ?>" class="btn  btn-primary btn-danger" title="Delete" onclick="return confirm('Are you sure to delete this admin?');">Delete</a>
                                <?php endif?>
                                <?php endif?>
                            <?php if(isset($id)){ ?><input type="hidden" name="id" value="<?php echo $id; ?>" /><?php }?>
                            <input type="submit" class="btn btn-default  btn-primary" id="btn_save" name="save_admin_info" value="Save"/> 
                            <input type="reset" class="btn btn-default  btn-primary" id="reset" /> 
                            <input type="button" class="btn btn-default  btn-danger" value="Cancel" onclick="history.go(-1)" />
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
    $('#admine_add_edit_form').validate();
</script>
