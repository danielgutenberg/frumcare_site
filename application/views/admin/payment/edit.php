<div class="row">
    <div class="col-md-9 content-box">
        <div class="row">
            <div class="container">
                <?php $action = $this->uri->segment(3);?>
                <h1>Edit Payment</h1>
                <?php flash(); ?>
                <div class="ad-manager">
                    <form role="form" method="post" action="<?php echo site_url();?>admin/payment/edit/<?php echo $details['id'];?>" enctype="multipart/form-data">
                       <div class="form-group">
                                <label class="control-label">Title(Package Name) :</label>
                                 <div class="ad-manager-full-input">
                                    <input type="text" name="package_name" value="<?php echo $details['package_name'];?>" class="form-control required" readonly>
                                </div>
                            </div>
                             
                             <div class="form-group">
                                <label class="control-label">By(User Name) :</label>
                                <div class="ad-manager-full-input">
                                    <input type="text" name="user_name" value="<?php echo $details['user_name'];?>" class="form-control required" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Created on :</label>
                                 <div class="ad-manager-full-input">
                                    <input type="text" name="created_date" value="<?php echo $details['created_date'];?>" class="form-control required" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Updated on :</label>
                                 <div class="ad-manager-full-input">
                                    <input type="text" name="updated_date" value="<?php echo $details['updated_date'];?>" class="form-control required" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Amount :</label>
                                 <div class="ad-manager-full-input one-line">
                                    <span>$</span><input type="text" name="amount" value="<?php echo $details['package_amount'];?>" class="form-control required" readonly>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label">Status :</label>
                                 <div class="ad-manager-full-input">
                                    <select name="status" class="form-control">
                                        <option value="1" <?php if($details['status'] == 1){?> selected="selected" <?php }?>>Paid</option>
                                        <option value="0" <?php if($details['status'] == 0){?> selected="selected" <?php }?>>Pending</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                            <?php 
                                if($details['status'] == 1) $stat = 'paid';
                                else $stat = 'pending';
                            ?>
                            <label class="control-label">Actions:</label>
                             <div class="ad-manager-full-input inline-block">
                                <div class="prev-nexts"><?php prev_next('admin/payment/edit', $details['id'], 'tbl_payments');?></div>
                                <div class="btns-wrapper">
                                <div class="delete"><a href="<?php echo site_url();?>admin/payment/delete/<?php echo $details['id'];?>" onclick="return confirm('Are you sure to delete?')"> Delete </a><span>|</span>  </div>
                                <div class="paids"><a href="<?php echo site_url();?>admin/payment/markascomplete/<?php echo $details['id'];?>" onclick="return confirm('Are sure to mark this transaction as complete?');"> Mark as Complete </a><span>|</span></div> 
                                <div class="complete"><a href="<?php echo site_url();?>admin/payment/updatepaymentstatus/<?php echo $details['id'];?>" onclick="return confirm('Are you sure to change the payment status?')">Mark as Paid </a><span>|</span></div>
                                <div class="mark-paid"><a href="<?php echo site_url();?>admin/payment/issuerefund/<?php echo $details['id'];?>"> Issue Refund </a><span>|</span></div>
                                <div class="refund"><a href="<?php echo site_url();?>admin/payment/sendinvoice/<?php echo $details['id'];?>"> Send Invoice </a> <span>|</span></div>
                                <div class="invoice"><a href="<?php echo site_url();?>admin/payment/sendinvoiceremainder/<?php echo $details['id'];?>"> Send Invoice Remainder </a><span>|</span></div>
                                <div class="pays"><a href="<?php echo site_url();?>admin/payment/pay/<?php echo $details['id'];?>"> Pay </a></div>
                            </div></div>
                            <input type="hidden" name="id" value="<?php echo $details['id'];?>">
</div>
                            <div class="form-group">
                                <div class="ad-manager-btns">
                                    <input class="btn btn-primary btn-default" type="submit" value="Save Changes" name="save" />
                                    <input class="btn btn-danger btn-default" type="button" value="Cancel" onclick="history.go(-1);"/>
                                </div>
                            </div>
                            
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

