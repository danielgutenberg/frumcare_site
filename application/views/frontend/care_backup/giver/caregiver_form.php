
<div class="container">
    <?php echo $this->breadcrumbs->show(); $log_id = $this->session->userdata('log_id');?>
    <?php //$this->load->view('frontend/care/caregiver_menu') ?>
    <ol class="progtrckr" data-progtrckr-steps="3">
        <li class="progtrckr-done">Sign up</li>
        <li class="progtrckr-todo">Your Details</li>
        <li class="progtrckr-todo">Start Getting Calls</li>
    </ol>
    <div class="ad-form-container">
        <?php if((segment(3)=="individual-{$log_id}" || segment(3)=="organization-{$log_id}") && ((isset($type) && segment(4)=='' && check_user()) || (isset($type) && segment(4)=='' && check_user()))): $type1 = $type==1? 'individual':'organization';?>
        <form action="<?php echo base_url('ad/add_caregiver_step2') ?>" method="post" id="personal-details-form" enctype="multipart/formdata">
            <input type="hidden" name="id" value="<?php echo check_user() ? check_user() : '' ?>">
            <input type="hidden" name="account_type" value="<?php echo $type;?>">
            <?php $this->load->view("frontend/care/giver/{$type1}") ?>
            <input type="submit" class="btn btn-success" value="Save & Continue"/>
        </form>

        <?php elseif(segment(4)=="job-details-{$log_id}" && check_user() && isset($view)):?>
        <form action="<?php echo base_url('ad/add_caregiver_step3') ?>" method="post" id="personal-details-form" enctype="multipart/formdata">
            <input type="hidden" name="id" value="<?php echo check_user() ? check_user() : '' ?>">
            <?php if(isset($view))echo $view; ?>
            <input type="submit" class="btn btn-success" value="Save & Continue"/>
        </form>
        <?php elseif(segment(3)==''):?>
        <form action="<?php echo base_url('ad/registeruser') ?>" method="post" id="personal-details-form" onsubmit="return validate()">
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
        <!-- IMAGE FORM -->
    </div>
</div>
