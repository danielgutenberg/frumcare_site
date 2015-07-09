<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<div class="container">
	<?php echo $this->breadcrumbs->show();?>
    <div class="dashboard-left float-left">
         <?php $this->load->view('frontend/user/dashboard_nav');?>
    </div>
    <div class="dashboard-right float-right">
    	<div class="top-welcome">
            <h2>My Favorites</h2>
        </div>
        <?php 
		        if(user_flash()){
		            echo user_flash();
		        }
		    ?>


        <?php 
        if($record == false ){
            echo  'There are no favorites profiles.';
        }
       
        	if(isset($record)){
        		if(is_array($record)){
        			foreach($record as $rec):
                        $userprofile = get_userprofile($rec['profile_id']);
                        $user_id = $userprofile['user_id'];
        				$userdetails = get_user2($user_id);                        
                        $care_type = get_care_detail($userprofile['care_type']);
                        
        				if($userdetails[0]['care_type'] < 17)
        					$cat = "caregivers";
        				else
        					$cat = "jobs";

						$img = $userdetails[0]['profile_picture'];
						if(!empty($img) && file_exists('images/profile-picture/thumb/'.$img))
							$imgsrc=  site_url().'images/profile-picture/thumb/'.$img;
						else          
							$imgsrc = site_url().'images/no-image.jpg';                         
        ?>	
        	
            <div class="favourite-list">
                <div class="favourite-img"><img src="<?php echo $imgsrc;?>" title="<?php echo $userdetails[0]['name'] ?>"></div>
                <div style="  position: relative;float: left;margin-left: 18px;font-size: 23px;"><?php echo $care_type['service_name'];?></div>
            	<div class="float-right favourite-details-btn"><div class="favourite-view"><a href="<?php echo site_url();?><?php echo $cat;?>/details/<?php echo $userdetails[0]['uri']."/".$userprofile['care_type'];?>">View Profile</a></div>
            	<div class="unfavourite-btn"><a href="<?php echo site_url();?>user/unfavorite/<?php echo $rec['id'];?>" class="btn btn-info" onclick="return confirm('Are you sure to unfavorite this profile?');">Unfavorite</a></div></div>
            </div>

    	<?php 
        		endforeach;
        		}
        	}else{
        		echo 'No favorite profiles';
        	}
        ?>
    </div>
</div>
