<link href="<?php echo site_url();?>css/user.css" type="text/css" rel="stylesheet">

<div class="container sign_up_save">
  <?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
       <?php $this->load->view('frontend/user/dashboard_nav');?>
   </div>

   <div class="dashboard-right float-right">

    <div class="verify-phone-no">
 	<h2>Verify Your Phone number</h2>
 	<?php  
	    echo $this->session->flashdata('error'); 
    ?>
<form role="form" action="<?php echo site_url();?>user/smsverification/<?php echo sha1(check_user());?>" method="post" id="verification">
        <div><label>Phone Verfication Code</label>
         <input type="text" name="verfication_code" class="required" placeholder="Please enter the verification">
         </div><br />
         <div class="verification-btn">
         <input type="hidden" name="user_id" value="<?php echo check_user();?>">   
         <input type="submit" name="verify" value="Verify" class="btn btn-success verify">
        </div>
    </form>
 </div>
</div>
 </div>
