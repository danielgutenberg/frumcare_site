<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<?php
if(segment(3) != '') {
    $action         = 'user/edit/'.segment(3);
    $user_data      = $user_data[0];
    $name           = $user_data['name'];
    $email          = $user_data['email'];
    $password       = $user_data['original_password'];    
  }
  //print_r($user_data);
?>
<div class="container">
   <?php echo $this->breadcrumbs->show();?>
   <div class="dashboard-left float-left">
        <?php $this->load->view('frontend/user/dashboard_nav');?>
</div><!--dashboard-left-->

<div class="dashboard-right float-right">
    <div class="top-welcome">
            <h2>Edit Personal Details</h2>
    </div>
<div class="sign-up-form centeralign">
    <form role="form" id="edituserdetails" action="<?php echo site_url();?>user/edit/<?php echo sha1(check_user());?>" method="post">

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

            var account_category = $('.acc_cat').val();
            getAccountCat(account_category);

        $('.acc_cat').change(function(){
            getAccountCat($(this).val());
        });

         $('.contact').mask('999-999-9999');

    });

    function check_email(id){
        // var data = {'email': $('#' + id).val()}
        // $.ajax({
        //     url: '<?php echo site_url("common_ajax/check_email")?>',
        //     type: 'post',
        //     data: data,
        //     success: function(res){
        //         if(res==1){
        //             $('#submit-btn').attr('disabled', 'disabled');
        //             $('#email_msg').html('<label class="email error">Not Available</label>');
        //         }
        //         else{
        //             $('#submit-btn').removeAttr('disabled');
        //             $('#email_msg').html('<label class="email success">Available</label>');
        //         }
                
        //     }

        // })
    } 

     function getAccountCat(account_category){
        $.ajax({
                type:"post",
                url:"<?php echo site_url();?>ad/getCareType",
                data:"care_type="+account_category,
                dataType:"json",
                success:function(done){
                   if(done){
                    $('#select_options').html(done).show();
                   }
                   if(account_category == 1){
                        $('.msg').text('Type of care you provide');
                   }
                   if(account_category == 2){
                        $('.msg').text('Type of care you are seeking');
                   }
                }
        });
    }

</script>