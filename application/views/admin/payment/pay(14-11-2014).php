<div class="">
    <div class="padding-10">
        <div class="row">
               <span class="error">
                    <h3><?php if($this->session->flashdata('info')){ echo $this->session->flashdata('info'); } ?></h3>
                </span>
                   <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                   <div class="panel-heading">
                    <h1>Payment Details</h1>
                    </div>
                    <div class="panel-collapse collapse in">
                    <div class="panel-collapse collapse in panel-body">
                    <form role="form" action="<?php echo site_url();?>admin/pay/save/<?php echo $recordData['id'];?>" method="post" enctype="multipart/form-data" id="payform">
                    <table widht="100%">
                        <tr>
                            <td>Name:</td>
                            <td><input type="text" class="form-control required" name="name" value="<?php echo $recordData['user_name'];?>" /></td>
                        </tr>

                        <tr>
                            <td>Card Number:</td>
                            <td><input type="text" class="form-control required" name="card_number" value="" /></td>
                        </tr>

                        <tr>
                            <td>Card Expiry Date:</td>
                            <td><input type="text" class="form-control required" name="card_expiry_date" value="" id="card_expiry_date"/></td>
                        </tr>

                        <tr>
                            <td>CVV:</td>
                            <td><input type="text" class="form-control required" name="cvv" value="" /></td>
                        </tr>

                         <tr>
                            <td>Actions:</td>
                            <td>
                                <?php prev_next('admin/payment/pay',$recordData['id'],'tbl_payments');?>
                            </td>
                        </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="hidden" name="id" value="<?php echo $recordData['id'];?>">
                                </td>
                            </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" class="btn btn-default" id="btn_save" name="save_admin_info" value="Pay"/> 
                            </td>
                        </tr>
                    </table>
                    </form>
                    </div>
                    </div>
                </div><!--panel default-->
            </div>
        </div>
    </div>
</div> 
<script type="text/javascript">    
    $('#payform').validate();
   
</script>
