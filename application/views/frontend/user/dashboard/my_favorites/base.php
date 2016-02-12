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
    	<div class="dashboard-left float-left">
        	<?php $this->load->view('frontend/user/dashboard/nav');?>
        </div><!--dashboard-left-->
     <div class="dashboard-right float-right">  
	        <div class="top-welcome">
                <h2>
                    <?php 
                        echo "My Favorites";
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
	        </div>
         
            <div class="row">
            <div class="col-xs-12">
                <?php $this->load->view('frontend/user/dashboard/my_favorites/profile_list', array('userdatas'=>$all_profile, 'ac' => $ac)); ?>
		        </div>
		        </div>
		        <br>
		</div>

	</div><!--dashboard-right-->
</div>

