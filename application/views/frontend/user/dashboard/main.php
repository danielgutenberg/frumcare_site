<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<div class="container">
<?php //echo $this->breadcrumbs->show();?>
	<?php 
	     $user = (get_user(check_user()));
	?>
	<?php
 	$sessiondata = $this->session->all_userdata();
 		if(is_array($sessiondata)){			
			 $ac = $sessiondata['account_category'];
			 $oc = $sessiondata['organization_care'];
			    if($ac == 1 || $ac ==3)
			        $profile1='My Profiles';
			    if($ac ==2) 
			        $profile1='My Jobs';
			    /*if($ac == 3 && $oc == 1)
			        $profile1='My Profile';
				if($oc==2 && $ac == 3 )
			        $profile1='My Job';*/
		}
?>
	<div class="dashboard-wrappers">

	<div class="dashboard-left float-left">

		<?php $this->load->view('frontend/user/dashboard/nav.php');?>

	</div><!--dashboard-left-->

	<div class="dashboard-right float-right">

		<div class="top-welcome">
			<h2>
		        Welcome <?php $nme = $user['organization_name'] ? $user['organization_name'] : $user['name']; echo ucfirst($nme);?> !
		    </h2>
		    <?php 
		    
		        
    			echo search_flash($message);
		        if(user_flash()){
		            echo user_flash();
		        }
    		    
		    ?>

		 <!--   <div class="profile-progressbar">-->

		 <!--   <div class="profile-status">Your profile is 60% complete. <a href="#">Click here</a> to complete your profile.</div>-->
		 <!--   <div class="profile_progress" style="width:50%;">-->
			<!--		<div class="progress">-->
			<!--	        <div class="progress-bar" style="width: 60%;">-->
			<!--	            <span class="sr-only">60% Complete</span>-->
			<!--	        </div>-->
		 <!--   		</div>-->
			<!--</div>-->
			<!--</div>-->
		</div>


		<div class="dashboard-menu-icons" style="display:inline-block;">

			<div class="myaccount profile-block">
				<a href="<?php echo site_url();?>user/dashboard" class="profile-img">
					<img src="<?php echo site_url();?>img/icon-dashboard/home.png" title="Home" alt="Home">
				</a>
		
				<a href="<?php echo site_url();?>user/dashboard" class="profie-name">Home</a>
			</div>

			<div class="myaccount profile-block">
				<a href="<?php echo site_url();?>user/edit/<?php echo sha1(check_user());?>" class="profile-img">
					<img src="<?php echo site_url();?>img/icon-dashboard/account.png" title="My Account" alt="My Account">
				</a>
		
				<a href="<?php echo site_url();?>user/edit/<?php echo sha1(check_user());?>" class="profie-name">My Account</a>
			</div>


			<div class="myprofile profile-block">
					<a href="<?php echo site_url();?>user/profile" class="profile-img">
						<img src="<?php echo site_url();?>img/icon-dashboard/profile.png" title="My Profile" alt="My Profile">
					</a>
					
					<a href="<?php echo site_url();?>user/profile" class="profie-name">
						<?php echo $profile1?>
					</a>
			</div>

			<div class="searches profile-block">
					<a href="<?php echo site_url();?>user/searches" class="profile-img">
						<img src="<?php echo site_url();?>img/icon-dashboard/search.png" title="My Search Alerts" alt="My Search Alerts">
					</a>
					
					<a href="<?php echo site_url();?>user/searches" class="profie-name">
						My Search Alerts
					</a>
			</div>

			<!--<div class="notifications profile-block">-->
			<!--	<a href="<?php echo site_url();?>user/notifications" class="profile-img">-->
			<!--		<img src="<?php echo site_url();?>img/icon-dashboard/notification.png" title="My Notifications" alt="My Notifications">-->
			<!--	</a>-->
				
			<!--	<a href="<?php echo site_url();?>user/notifications" class="profie-name">-->
			<!--		My Notifications-->
			<!--	</a>-->
			<!--</div>-->

			<div class="reviews profile-block">
				<a href="<?php echo site_url();?>user/reviews" class="profile-img">
					<img src="<?php echo site_url();?>img/icon-dashboard/review.png" title="My Reviews and Ratings" alt="My Ratings and Reviews">
				</a>
				
				<a href="<?php echo site_url();?>user/reviews" class="profie-name">My Ratings and Reviews</a>
			</div>
			<div class="favorites profile-block">
					<a href="<?php echo site_url();?>user/favorites" class="profile-img">
						<img src="<?php echo site_url();?>img/icon-dashboard/favourite.png" title="My Favorites" alt="My Favorites">
					</a>
					
					<a href="<?php echo site_url();?>user/favorites" class="profie-name">
						My Favorites
					</a>
			</div>
			
			<div class="messages profile-block">
					<a href="<?php echo site_url();?>user/messages" class="profile-img">
						<img src="<?php echo site_url();?>img/icon-dashboard/message.png" title="My Messages" alt="My Messages">
					</a>
					
					<a href="<?php echo site_url();?>user/messages" class="profie-name">
						My Messages
					</a>
			</div>

			<div class="bgchecks profile-block"> 
					<a href="<?php echo site_url();?>user/backgroundverification" class="profile-img">
						<img src="<?php echo site_url();?>img/icon-dashboard/background-check.png" title="My Background Checks" alt="My Background Checks">
					</a>
					
					<a href="<?php echo site_url();?>user/backgroundverification" class="profie-name">
						My Background Checks
					</a>
			</div>

			<!--<div class="membership profile-block">-->
			<!--	<a href="#" class="profile-img">-->
			<!--		<img src="<?php echo site_url();?>img/icon-dashboard/members.png" title="My Membership" alt="My Membership">-->
			<!--	</a>-->
				
			<!--	<a href="#" class="profie-name">-->
			<!--		My Membership-->
			<!--	</a>-->
			<!--</div>-->
            <!--    
			<div class="myworkhistory profile-block">
				<a href="<?php echo site_url();?>user/#" class="profile-img">
					<img src="<?php echo site_url();?>img/icon-dashboard/work-history.png" title="My Work History" alt="My Work History">
				</a>
				
				<a href="#" class="profie-name">My Work History</a>
			</div>
			<div class="myprofile profile-block">
					<a href="#" class="profile-img">
						<img src="<?php echo site_url();?>img/icon-dashboard/pending-jobs.png" title="My Pending Jobs" alt="My Pending Jobs">
					</a>
					
					<a href="#" class="profie-name">
						My Pending Jobs
					</a>
			</div>
            -->
			<div class="searches profile-block">
					<a href="<?php echo site_url();?>user/paymenthistory" class="profile-img">
						<img src="<?php echo site_url();?>img/icon-dashboard/payment.png" title="My Payment History" alt="My Payment History">
					</a>
					
					<a href="<?php echo site_url();?>user/paymenthistory" class="profie-name">
						My Payment History
					</a>
			</div>			
		</div>		
		</div><!--dashboard-right-->
	</div>
</div>

 
        
