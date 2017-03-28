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
<div class="dashboard-nav" style="height: 375px;">
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
			<a href="<?php echo base_url();?>user/reviews" <?php if($this->uri->segment(2) == 'reviews'){?> class="active" <?php }?> >My Reviews</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>user/favorites" <?php if($this->uri->segment(2) == 'favorites'){?> class="active" <?php }?> >My Favorites</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>user/messages" <?php if($this->uri->segment(2) == 'messages'){?> class="active" <?php }?> >My Messages</a>
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


<div class="share-profile-wrap" style="padding-bottom:-10px">
	<div class="share-profile" style="font-size:16px; padding:1px; background-color:#27aae0; text-align:center">
		<p style ="padding:2px; color:white;">Want <i>more</i> options when <br> you need them? </p>
		<p style ="padding:2px; color:white; font-size:24px; font-weight: 700;">	Help grow <br> FrumCare.com! </p>
		<p style ="padding:2px; color:white;">More people = More <br> options = More matches</p>
		
		<div style="text-align:center; padding-bottom: 10px;">
		<?php echo anchor('user/invite',"Invite Friends",'class="btn btn-info" style="background-color:#8ec931 !important"');?>
		</div>
	</div>
</div>
