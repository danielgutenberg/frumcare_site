<div class="row">
    <div class="col-md-9 content-box">
        <div class="row">
            <div class="container">
                <?php $action = $this->uri->segment(3);?>
                <h1>Payment Manager</h1>
                <?php flash(); ?>
                <div>
                    <form role="form" method="post" action="<?php echo site_url();?>admin/payment/edit/<?php echo $details['id'];?>" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Title(Package Name) :</td>
                                <td>
                                    <input type="text" name="package_name" value="<?php echo $details['package_name'];?>" class="form-control required" readonly>
                                </td>
                            </tr>
                             
                             <tr>
                                <td>By(User Name) :</td>
                                <td>
                                    <input type="text" name="user_name" value="<?php echo $details['user_name'];?>" class="form-control required" readonly>
                                </td>
                            </tr>

                            <tr>
                                <td>Created on :</td>
                                <td>
                                    <input type="text" name="created_date" value="<?php echo $details['created_date'];?>" class="form-control required" readonly>
                                </td>
                            </tr>

                            <tr>
                                <td>Updated on :</td>
                                <td>
                                    <input type="text" name="updated_date" value="<?php echo $details['updated_date'];?>" class="form-control required" readonly>
                                </td>
                            </tr>

                            <tr>
                                <td>Amount :</td>
                                <td>
                                    $<input type="text" name="amount" value="<?php echo $details['package_amount'];?>" class="form-control required" readonly>
                                </td>
                            </tr>


                            <tr>
                                <td>Status :</td>
                                <td>
                                    <select name="status" class="form-control">
                                        <option value="1" <?php if($details['status'] == 1){?> selected="selected" <?php }?>>Paid</option>
                                        <option value="0" <?php if($details['status'] == 0){?> selected="selected" <?php }?>>Pending</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                            <?php 
                                if($details['status'] == 1) $stat = 'paid';
                                else $stat = 'pending';
                            ?>
                            <td>Actions:</td>
                            <td>
                                <?php prev_next('admin/payment/edit', $details['id'], 'tbl_payments');?>
                                <a href="<?php echo site_url();?>admin/payment/delete/<?php echo $details['id'];?>" onclick="return confirm('Are you sure to delete?')"> Delete </a>|  
                                <a href="<?php echo site_url();?>admin/payment/markascomplete/<?php echo $details['id'];?>" onclick="return confirm('Are sure to mark this transaction as complete?');"> Mark as Complete </a>| 
                                <a href="<?php echo site_url();?>admin/payment/updatepaymentstatus/<?php echo $details['id'];?>" onclick="return confirm('Are you sure to change the payment status?')">Mark as Paid <a>|
                                <a href="<?php echo /*site_url();?>admin/payment/issuerefund/<?php echo $details['id'];*/ '#';?>"> Issue Refund </a>|
                                <a href="<?php echo /*site_url();?>admin/payment/sendinvoice/<?php echo $details['id'];?> */ '#'; ?> "> Send Invoice </a> |
                                <a href="<?php echo /*site_url();?>admin/payment/sendinvoiceremainder/<?php echo $details['id']; */ '#';?>"> Send Invoice Remainder </a>
                                <a href="<?php echo site_url();?>admin/payment/pay/<?php echo $details['id'];?>"> Pay </a>
                            </td>
                            <input type="hidden" name="id" value="<?php echo $details['id'];?>">

                            <tr>
                                <td colspan="2">
                                    <input class="btn btn-default" type="submit" value="Save Changes" name="save" />
                                    <input class="btn btn-default" type="button" value="Cancel" onclick="history.go(-1);"/>
                                </td>
                            </tr>
                            
                        </table>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
