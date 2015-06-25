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
<div class="dashboard-nav">
	<ul>
		<li>
			<a href="<?php echo base_url();?>user/dashboard" <?php if($this->uri->segment(2) == 'dashboard'){?> class="active" <?php }?> >My Home</a>
		</li>
		<li>
			<a href="<?php echo base_url('user/edit/'.sha1(check_user())) ?>" <?php if($this->uri->segment(2) == 'account' || ($this->uri->segment(2) == 'edit')){?> class="active" <?php }?>>My Account</a> 
		</li>
		<li>
			<a href="<?php echo base_url();?>user/profile" <?php if(($this->uri->segment(2) == 'profile') || ($this->uri->segment(2) == 'edit_profile') || ($this->uri->segment(2) == 'details')||($this->uri->segment(2) == 'addprofile')){?> class="active" <?php }?> ><?php echo $profile1?></a>
		</li>
		<li>
			<a href="<?php echo base_url();?>user/searches" <?php if($this->uri->segment(2) == 'searches'){?> class="active" <?php }?> >My Search Alerts</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>user/notifications" <?php if($this->uri->segment(2) == 'notifications'){?> class="active" <?php }?> >My Notifications</a>
		</li>
		<!--<li>
			<a href="<?php echo base_url();?>user/reviews" <?php if($this->uri->segment(2) == 'reviews'){?> class="active" <?php }?> >My Reviews and Ratings</a>
		</li>-->
		<li>
			<a href="<?php echo base_url();?>user/favorites" <?php if($this->uri->segment(2) == 'favorites'){?> class="active" <?php }?> >My Favorites</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>user/backgroundverification" <?php if($this->uri->segment(2) == 'backgroundverification'){?> class="active" <?php }?>>My Background Checks</a>
		</li>
		<!--<li>-->
		<!--	<a href="<?php echo base_url();?>user/membership" <?php if($this->uri->segment(2) == 'membership'){?> class="active" <?php }?>>My Membership</a>-->
		<!--</li>-->
		<li>
			<a href="<?php echo base_url();?>user/paymenthistory" <?php if($this->uri->segment(2) == 'paymenthistory'){?> class="active" <?php }?>>My Payment History</a>
		</li>
	</ul>
</div>