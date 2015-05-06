
<div class="">
    <div class="padding-10">
        <div class="row">
            <div class="">
                <?php flash();?>
                <!--Admin Details Manager-->
                <div class="panel-group" id="accordion">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h1 class="txt-color-blueDark">
                        <i class="fa fa-lg fa-fw fa-user"></i> <span>Admin Manager</span>
                       <div class="pull-right">
                            <?php if($this->session->userdata('admin_level')=='Super Admin'): ?>
                            <a class="btn btn-success" href="<?php echo site_url('admin/admin/add'); ?>">Add New Admin</a>
                            <?php endif ?>
                        </div>
                       </h1>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in">
                      <div class="panel-body">
                          
                        
                        <div class="table-responsive">

                            <table class="table table-hover table-bordered sortable_tbl">
                                <thead>
                                    <tr class="">
                                        <th>Full Name</th>
                                        <th>User Name</th>
                                        <th>Email Address</th>
                                        <!--<th>Email Address 2</th>
                                        <th>Email Address 3</th>-->
            							<th>Status</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($data!=null)
                                    {
                                        foreach($data as $admins)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $admins['full_name'];?></td>
                                                <td><?php echo $admins['username'];?></td>
                                                <td><?php echo $admins['email1'];?></td>
                                                <td><?php if($admins['status']==0){echo "Inactive";}else{echo "Active";}?></td>
                                                <!--<td><?php //echo $admins['email2'];?></td>
                                                <td><?php //echo $admins['email3'];?></td>-->
                                                <td>
                                                    <?php echo $admins['role'];?>
                                                </td>
            									<td>
                                                    <?php if($admins['id']==$this->session->userdata('admin_id') || $this->session->userdata('admin_level')=='Super Admin'):?>
                                                    <?php if($admins['id'] != 1 || $this->session->userdata('admin_id') == 1){ ?>
                                                    <a href="<?php echo site_url('admin/admin/edit')."/".$admins['id']; ?>" class="btn btn-info" title="Edit">Edit</a>
                                                    <?php } ?>
                                                    <?php endif?>
                                                    <?php //if(role($admins['id'])==1):?>
                                                    <?php if($this->session->userdata('admin_level')=='Super Admin'): ?> 
                                                    <?php if($admins['id']!=1){ ?>
                                                    <a href="<?php echo site_url('admin/admin/delete')."/".$admins['id']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure to delete this admin?');">Delete</a>
                                                    <?php } ?>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr class="warning">
                                            <th>No Data</th>
                                            <th>No Data</th>
                                            <th>No Data</th>
                                            <th>No Data</th>
                                            <th>No Data</th>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>    
                            </table>
                            
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <!----------------------------Admin Details Manager Ends--------------------------->
        </div>
    </div>  
</div>
</div>