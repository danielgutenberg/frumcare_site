<div class="row">
    <div class="col-md-9 content-box">
        <div class="row">
            <div class="container">
                <span class="alert-info someinfo"><?php if($this->session->flashdata('info')){echo $this->session->flashdata('info');}?></span>
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4>
                        <i class="glyphicon glyphicon-credit-card"></i><span class="break"></span> <span>Profile Configuration Manager</span>
                      </h4>
                    </div>
                    <div class="panel-body">
                    <div class="table-responsive">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example">
                            <thead>
                                <tr class="success">
                                   <th>Package Name</th>
                                   <th>By(User name)</th>
                                   <th>Created On</th>
                                   <th>Updated On</th>
                                   <th>Amount</th>
                                   <th>Status</th>
                                   <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php
                                if(!$details)
                                {
                                    ?>
                                    <?php
                                }
                                else
                                {   
                                    foreach($details as $detail):
                                        //var_dump($detail);
                               ?>
                            <tr>
                                    
                                <td><?php echo $detail['package_name'];?></td>
                                <td><?php echo $detail['user_name'];?></td>
                                <td><?php echo $detail['created_date'];?></td>    
                                <td><?php echo $detail['updated_date'];?></td> 
                                <td><?php echo $detail['package_amount'];?></td>    
                                <td><?php if($detail['status'] == 0) echo  'Pending'; else echo 'Paid';?></td>    
                                <td><a href="<?php echo site_url();?>admin/payment/edit/<?php echo $detail['id'];?>" class="btn btn-info">Edit</a> <a href="<?php echo site_url();?>admin/payment/delete/<?php echo $detail['id'];?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a></td>

                            </tr>
                        <?php 
                            endforeach;  
                        }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="<?php echo site_url();?>admin/profile_config/add" class="btn btn-primary">Add</a>
            </div>
            </div>
        </div>
    </div>
</div>
