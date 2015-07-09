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

                <div class="ad-manager">
                    <form role="form" action="<?php echo site_url();?>admin/pay/save/<?php echo $recordData['id'];?>" method="post" enctype="multipart/form-data" id="payform">

                

                    <div class="form-group">
                            <label class="control-label">Name:</label>
                            <div class="ad-manager-full-input"><input type="text" class="form-control required" name="name" value="<?php echo $recordData['user_name'];?>" /></div>
                        </div>


                         <div class="form-group">
                            <label class="control-label">Card Number:</label>
                            <div class="ad-manager-full-input">
                                <input type="text" class="form-control required" name="card_number" value="<?php if(isset($recordData['card_number']))echo $recordData['card_number'];?>" />
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="control-label">Card Expiry Date:</label>
                            <div class="ad-manager-full-input"><input type="text" class="form-control required" name="card_expiry_date" value="<?php if(isset($recordData['card_expiry_date']) && $recordData['card_expiry_date'] != '0000-00-00')echo $recordData['card_expiry_date'];?>" id="card_expiry_date"/></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">CVV:</label>
                            <div class="ad-manager-full-input"><input type="text" class="form-control required" name="cvv" value="<?php if(isset($recordData['cvv']))echo $recordData['cvv'];?>" /></div>
                        </div>
                          <div class="form-group">
                            <label class="control-label">Actions:</label>
                            <div class="ad-manager-btns">
                                <?php prev_next('admin/payment/pay',$recordData['id'],'tbl_payments');?>
                            </div>
                        </div>
                             <div class="form-group">
                                <div class="ad-manager-full-input">
                                    <input type="hidden" name="id" value="<?php echo $recordData['id'];?>">
                                </div>
                            </div>
                         <div class="form-group">
                            <div class="ad-manager-btns">
                                <input type="submit" class="btn btn-primary" id="btn_save" name="save_admin_info" value="Pay"/> 
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
<script type="text/javascript">    
    $('#payform').validate({
    rules: {
        cvv: {
          required: true,
          number: true,
          digits: true,
          maxlength: 4
        }
      }

    });
    $(function() {
    $( "#card_expiry_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });
</script>
