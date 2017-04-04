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


<div class="share-profile-wrap" style="border:none; font-size:16px; background-color:#27aae0; text-align:center">
		<p style ="padding:2px; padding-top:15px; color:white;">Want <i>more</i> options when <br> you need them? </p>
		<p style ="padding:2px; color:white; font-size:24px; font-weight: 700;">	Help grow <br> FrumCare.com! </p>
		<p style ="padding:2px; color:white;">More people = More <br> options = More matches</p>
		
		<div style="text-align:center; padding-bottom: 15px;">
		<?php echo anchor('',"Invite Friends",'class="btn btn-info invite" style="background-color:#8ec931 !important"');?>
		</div>
</div>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Invite Friends to Join FrumCare.com</h4>
                                </div>
                                <div class="modal-body">
                        <form class="usersinviteform">
                            <table>
                       
                                <tbody class="rows">
                                <tr>
                                    <td><label>Name:</label></td>
                                    <td style="padding:3px;padding-top: 0px;">
                                        <input type="email" name="names[]" class="required" multiple></input>
                                    </td>
                                    <td><label>Email:</label></td>
                                    <td style="padding:3px;padding-top: 0px;">
                                        <input type="email" name="emails[]" class="required" multiple></input>
                                    </td>
                                </tr>
                                </tbody>
                                <tr><td class="addrow" style="cursor: pointer;font-size: 13px;color: blue;">Add New Row</td></tr>

                    
                                <tr>
                                    <td>
                                        <input type="hidden" name="current_user" value="<?php echo @$this->session->userdata['current_user'];?>"/>
                                    </td>
                                </tr>
                            </table>

                            <div class="modal-footer">
                              <button style="float:left" type="button" class="btn btn-primary save">Invite Friends</button>
                          </div>
                                </div>

                            </div>
                        </div>
                        </form>
                    </div>
<script>
    $(document).ready(function() {
    	$('.invite').click(function(e) {
    		e.preventDefault()
        	$('#myModal2').modal('show');
    	})
    	
    	
	    $('.save').on('click',function(){
			$('form.usersreviewform').validate({
		         rules: {
		            emails: {
		                required: true,
		                email: true
		            },
		        }
		    });
		    console.log($('form.usersinviteform').serializeArray()); 
			$.ajax( {
				type: "POST",
				url: '<?php echo site_url();?>invite_friends',
				data: $('form.usersinviteform').serializeArray(),
				success: function( msg ) {
	    			$('#myModal2').modal('hide');
	                $('.invite_response').html(msg);
	                $('.invite_response').show();
	                html = '<tr><td><label>Email:</label></td><td style="padding:3px;padding-top: 0px;"><input type="email" name="emails[]" class="required" multiple></input></td><td><label>Name:</label></td><td style="padding:3px;padding-top: 0px;"><input type="email" name="names[]" class="required" multiple></input></td></tr>'
        
        			$('.rows').html(html)
	            }
	        });
		});
        
        $('.addrow').on('click', function() {
        	html = '<tr><td><label>Email:</label></td><td style="padding:3px;padding-top: 0px;"><input type="email" name="emails[]" class="required" multiple></input></td><td><label>Name:</label></td><td style="padding:3px;padding-top: 0px;"><input type="email" name="names[]" class="required" multiple></input></td></tr>'
        
        	$('.rows').append(html)
        })
    })
</script>