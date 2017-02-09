<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php
if(segment(3) != '') {
    $action         = 'user/edit/'.segment(3);
    $user_data      = $user_data[0];
    $name           = $user_data['name'];
    $email          = $user_data['email'];
    $password       = $user_data['original_password'];    
  }
?>
<div class="container">
   <?php echo $this->breadcrumbs->show();?>
   <div class="dashboard-left float-left">
        <?php $this->load->view('frontend/user/dashboard/nav');?>
</div><!--dashboard-left-->

<div class="dashboard-right float-right">
    <div class="searchloader mainsearch" style="display:none"></div>
    <div class="top-welcome">
            <h2>Edit Personal Details</h2>
    </div>
<div class="sign-up-form centeralign">
            <?php
                $attributes = array('id' => 'edituserdetails', 'role' => 'form');
                echo form_open('user/edit/' . sha1(check_user()), $attributes);
            ?>

        <span class="first-names">
            <label>Name</label>
            <input onchange="copyName()" id="visibleName" type="text" name="name" placeholder="Name" class="required" value="<?php $nme = $organzation_name ? $organization_name : $name;  echo (isset($nme)) ? $nme : '' ?>"/>
        </span>
        
        <span class="email-names">
            <label>Email</label>
            <input onchange="copyEmail()" onblur="check_email(this.id)" id="email" type="text" name="email" placeholder="Email" class="required email" value="<?php echo (isset($email)) ? $email : '' ?>"/>
        </span> 
        <span id="email_msg"></span>

       <!--  <span class="first-names">
            <label>Password</label>
            <input id="password" type="password" name="password" placeholder="Password" class="required" value="<?php echo (isset($password)) ? $password : '' ?>"/>
        </span>  -->

        <span class="sign-up-btn"><input id="submit-btn" type="submit" class="btn btn-success" value="<?php echo segment(3) != '' ? 'Save' : 'Sign up'; ?>"/></span>
        <br>
        <a href="<?php echo base_url('login/get-password/'.sha1($email).'?redirect_uri='.urlencode(current_url())) ?>">Click here</a> to change your password.
        
    
    </form>
    <form id="verification" action="<?php echo site_url();?>signup/resend-verification" method = "post">
        <input id="hiddenName" type="hidden" name="name" value="<?php $nme = $organzation_name ? $organization_name : $name;  echo (isset($nme)) ? $nme : '' ?>"/>
        <input id="hiddenEmail" type="hidden" name="email" value="<?php echo (isset($email)) ? $email : '' ?>"/>
        <a id="submitForm" type="submit" value="Click Here" style="cursor:pointer;">Click here</a> to resend verification email.
    </form>
    
    <span class="sign-up-btn deleteAccount" style="width:44%; padding-left:14%;"><input id="submit-btn" type="submit" class="btn btn-danger" value="Delete Account"/></span>
</div>
     

</div>
</div>

<script type="text/javascript" src="<?php echo site_url();?>js/jquery.ui.maskinput.js"></script>

<script type="text/javascript">
    $('#submitForm').click(function(){
        $('#verification').submit()
    })
    function copyName() {
        $('#hiddenName').val($('#visibleName').val())
    }
     function copyEmail() {
         $('#hiddenEmail').val($('#email').val())
     }
    
    $(function(){
        $('#edituserdetails').validate();
        $('.verifyemail').on('click',function(e){
            e.preventDefault();
            var email = $(this).attr('id');
                $.ajax({
                    type:"post",
                    url:"<?php echo base_url();?>user/verfiyemail",
                    data:"email_address="+email,
                    succcess:function(msg){
                            
                    }
                });
        });
        $('.contact').mask('999-999-9999');
    });
</script>
<script>
    function PulseAnimation()
    {
    	$('.mainsearch').animate({
    		opacity: 0.3,
    	}, 500, function() {
    		$('.mainsearch').animate({
    			opacity: 1
    		}, 500, function() {
    			if(window.continue_pulse) {
    				PulseAnimation();
    			}
    		})
    	});
    }
</script>
<script>
    $(document).ready(function() {
    
    var $myDialog2 = $('<div></div>')
        .html('Are you sure you would like to delete your account?  This action cannot be undone')
        .dialog({
        autoOpen: false,
        title: 'Delete Account',
        buttons: {
          "YES": function () {
            $(this).dialog("close");
            $(".searchloader").fadeIn("fast");
            window.continue_pulse = true;
            PulseAnimation()
            $.ajax({
    	    	type:"get",
    	    	url:"<?php echo site_url();?>account/delete",
    	    	success:function(data){
                    window.location = 'https://frumcare.activehosted.com/f/2?email=' + data;
                    
    	    	}
    	    });
          },
          "NO": function () {
            $(this).dialog("close");
            return false;
          }
        }
      });
      
    	$('.deleteAccount').click(function(e){
    		e.preventDefault();
    		return $myDialog2.dialog('open');
        });

 });
</script>