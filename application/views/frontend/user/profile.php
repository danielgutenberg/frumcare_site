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
        	<?php $this->load->view('frontend/user/dashboard_nav');?>
        </div><!--dashboard-left-->
     <div class="dashboard-right float-right">  
	        <div class="top-welcome">
	            <p style="color:#FF0000"><?php echo $this->session->flashdata('info');?></p>
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
	        </div>
	        
            <form class="user-profile" action="<?php echo site_url();?>user/upload/<?php echo sha1(check_user());?>" method="post" enctype="multipart/form-data">            
            <div class="profile-left">
	            <div id="output">
	                <?php $this->load->view('frontend/user/photo_upload') ?>
	                <!--<a href="#"><img src="<?php echo $photo_url?>"/></a>-->
	            </div>
		        <!--<div class="upload-btns">-->
		        <!--    <button class="btn btn-default" id="upload">Select File</button>-->
		        <!--    <input type="file" name="ImageFile" id="ImageFile" style="display: none;"> <div class="loader"></div>-->

		        <!--    <input type="hidden" id="file-name" name="profile_picture" value="<?php if(isset($photo)) echo $photo;?>" />-->
		        <!--    <input type="hidden" id="user_id" name="user_id" value="<?php echo check_user();?>" />-->
		        <!--    <input type="hidden" id="status" name="profile_picture_status" value="<?php if(isset($photo_status)) echo $photo_status ? $photo_status:'0';?>" />-->

		            <!-- <input type="submit" name="save_image" class="btn btn-info" value="Save Image" /> -->                    
                    <?php
                        if($ac == 1){?>
                            <br />
                            <a href="<?php echo site_url('user/details/'.sha1(check_user()))?>" class="btn btn-info">Edit Personal Details</a>
                            <?php
                        }
                    ?>
                    <?php
                        if($ac == 3){?>
                            <br />
                            <a href="<?php echo site_url('user/details/'.sha1(check_user()))?>" class="btn btn-info">Edit Organization Info</a>
                            <?php
                        }
                    ?>
                    <br />
                    <div class="edit-block">
           <?php echo anchor('user/addprofile',"Add New $profile",'class="btn btn-info"');?>
        </div>
		        </div>
        	
            <table cellspacing="5" cellpadding="5" class="profiletable">
        <?php
            if(!empty($all_profile)){
            foreach($all_profile as $row){
                ?>
                <tr>
                    <td width="35%"><?php echo $row->service_name;?></td>
                    <td width="15%"><a href="<?php echo site_url();?>user/edit_profile/<?php echo $this->session->userdata['current_user'];?>/<?php echo $row->care_type;?>">Edit <?php echo $profile ?></a></td>
                    <!--<td width="15%">-->
                    <!--    <a href=" <?php /*echo site_url();*/?>user/hide_profile/<?/*php echo $this->session->userdata['current_user'];*/?>/<?php /*echo $row->care_type;*/?>" onclick="return confirm('Are you sure to hide?')">-->
                    <!--        Hide &nbsp;-->
                    <!--    </a>-->
                    <!--</td>-->
                    <td width="10%">
                        <?php if ($row->profile_status == 1) {echo 'Approved';} else {echo 'Pending';} ?>
                    </td>
                    <?php if ($row->profile_status == 2) { ?>
                        <td width="15%">
                            <a href="<?php echo site_url();?>user/unarchive_profile/<?php echo $this->session->userdata['current_user'];?>/<?php echo $row->care_type;?>" onclick="return confirm('Are you sure you want to activate this profile?')">
                            Unarchive &nbsp;
                        </td>
                    <?php } else if ($row->profile_status == 1){ ?>
                    <td width="15%">
                        <a href="<?php echo site_url();?>user/delete_profile/<?php echo $this->session->userdata['current_user'];?>/<?php echo $row->care_type;?>" onclick="return confirm('Are you sure you want to archive this profile?')">
                        Archive &nbsp;
                    </td>
                    <?php } ?>
                    
                    

                    <!--<td width="20%">

                        <a href="<?php echo site_url();?>user/upgradepackage/<?php echo $this->session->userdata['current_user'];?>/<?php echo $row->care_type;?>">
                        Upgrade Now &nbsp;
                    </td>-->
                </tr>
            <?php }
            }else{
                echo "Currently you have no profiles";
            }?>
        </table>
	    
	    
	    
		</div>

	</div><!--dashboard-right-->
</div>
<!-- FILE UPLOAD -->
<script type="text/javascript">
//     var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
//     var link = '<?php echo site_url("user/upload_image?files")?>';
//     $('#upload').click(function(e){
//         e.preventDefault();
//         $('#ImageFile').trigger('click');
//     });
//   $('#output').click(function(e){
//         e.preventDefault();
//         $('#ImageFile').trigger('click');
//     });
// </script>

<script type="text/javascript" src="<?php echo site_url("js/portfoliouploader.js")?>"></script>
<!-- FILE UPLOAD -->
