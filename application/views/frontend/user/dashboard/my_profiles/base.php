<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">

<?php
// $photo_url = site_url("images/plus.png");
$ac = $this->session->userdata('account_category');
$oc = $this->session->userdata('organization_care');
// if(check_user()) {
//     $current_user = get_user(check_user());
//     $photo = $current_user['profile_picture'];
//     $photo_status = $current_user['profile_picture_status'];
//     if($photo!="")
//         $photo_url = base_url('images/profile-picture/thumb/'.$photo);
// }
?>
<div class="container">
<?php echo $this->breadcrumbs->show();?>
    <div class="row">
    	<div class="col-xs-12 col-sm-3">
        	<?php $this->load->view('frontend/user/dashboard/nav');?>
        </div><!--dashboard-left-->
     <div class="col-sm-9 col-xs-12">  
	        <div class="top-welcome">
                <h2>
                    <?php 
                    if($ac == 1 || $ac == 3){ 
                        echo "My Profiles";
                        $profile='Profile';
                    }
                    if($ac ==2){ 
                        echo "My Jobs";
                        $profile='Job';
                    }
                    /*if($ac=3){
                        if($oc ==1){
                            echo "My Profiles";
                            $profile='Profile';
                        }
                        if($oc==2){
                            echo "My Jobs";
                            $profile='Job';
                        }
                    }*/?>
                </h2>
                <?php 
    		        if(user_flash()){
    		            echo user_flash();
    		        }
    		    ?>
    		    <div class="alert alert-success alert-dismissible invite_response" role="alert" style="display:none">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            </div>
	        </div>
         
            <div class="row">
            <div class="col-xs-12">
                <?php $this->load->view('frontend/user/dashboard/my_profiles/profile_list', array('userdatas'=>$all_profile, 'ac' => $ac)); ?>
		        </div>
		        </div>
		        <br>
		         <div class="edit-block">
                       <?php echo anchor('ad/addprofile',"Add New $profile",'class="btn btn-info"');?>
                </div>
		</div>

	</div><!--dashboard-right-->
</div>

<link rel="stylesheet" href="<?php echo base_url();?>css/jquery.raty.css">
<script src="<?php echo base_url();?>js/jquery.raty.js"></script>
