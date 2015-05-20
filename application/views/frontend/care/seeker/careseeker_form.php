<div class="container">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/><!--for datepicker-->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script><!--for datepicker-->
<?php echo $this->breadcrumbs->show();
$log_id = $this->session->userdata('log_id');
?>
	 <?php //$this->load->view('frontend/care/caregiver_menu') ?>

	  <div class="ad-form-container">

        <?php if(segment(3)=="job-details-{$log_id}" && check_user() && isset($view)):?>
        <form action="<?php echo base_url('ad/add_careseeker_step2') ?>" method="post" id="personal-details-form" enctype="multipart/formdata">
            <input type="hidden" name="id" value="<?php echo check_user() ? check_user() : '' ?>">
            <?php if(isset($view)) echo $view; ?>
            <input type="submit" class="btn btn-success" value="Save & Continue"/>
        </form>
        <?php elseif(segment(3)==''):?>
        <form action="<?php echo base_url('ad/add_careseeker_step1') ?>" method="post" id="personal-details-form">
            <input type="hidden" name="account_category" value="<?php echo (segment(2) == 'caregiver') ? 1 : 2 ?>">
            <?php $this->load->view('frontend/care/detail_view') ?>
            <input id="submit-btn" type="submit" class="btn btn-success" value="<?php echo check_user() ? 'Save & Continue' : 'Join Now';?>"/>
        </form>
        <?php else:?>
            <h2>Follow stepwise procedure to complete ad posting.</h2>
        <?php endif;?>

         <!-- IMAGE FORM -->
        <form action="<?php echo site_url("ad/upload_pp")?>" method="post" enctype="multipart/form-data" id="MyUploadForm" style>
            <input name="ImageFile" id="imageInput" type="file" accept="image/png" style="display: none;"/>
        </form>
       
    </div>

</div>

