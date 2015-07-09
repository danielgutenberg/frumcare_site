<link href="<?php echo site_url();?>css/progressbar.css" type="text/css" rel="stylesheet"/>
<?php
$action = 'signup/save_user';
if(segment(3) != '') {
    $action = 'user/edit/'.segment(3);
    $user_data = $user_data[0];
    $fname = $user_data['first_name'];
    //$mname = $user_data['middle_name'];
    $lname = $user_data['last_name'];
    $email = $user_data['email'];
    $pass = $user_data['password'];
    $care = $user_data['care_type'];
    $age = $user_data['age'];
    $location = $user_data['location'];
    $city = $user_data['city'];
    $gender  = $user_data['gender'];
    
}
if($this->uri->segment(2)!='edit'){

?>

<ol class="progtrckr" data-progtrckr-steps="3">
    <li class="progtrckr-done">Sign up</li>
    <li class="progtrckr-todo">Your Details</li>
    <li class="progtrckr-todo">Start Getting Calls</li>
</ol> 
<?php  } ?> 

<div class="container sign-up-forms">
    <?php flash(); ?>
    <?php if(segment(3) == '') { ?>
    <h2>
        Create your account
    </h2>
    <p>
        Signup now for Frumcare. Already have an <br/>account?
        <a href="<?php echo base_url('login') ?>">Log In</a>
    </p>
    <?php } else { ?>
    <h2>Edit your account</h2>
    <?php } ?>
    <div class="sign-up-form">
        <form role="form" id="sign-up" action="<?php echo base_url($action) ?>" method="post">

         <div class="care-type clearfix">I am a</div>
                <div class="form-field">
                        <input type="radio" name="account_category" value="1" checked="checked" class="acc_cat"> Caregiver
                        <input type="radio" name="account_category" value="2" class="acc_cat"> Careseeker
                </div>

        <div class="care-type clearfix">Care Type: 
            <div id="select_options"></div>
        </div>
        
        <span class="first-names"><input type="text" name="first_name" placeholder="First Name" class="required" value="<?php echo (isset($fname)) ? $fname : '' ?>"/></span>

        <span class="last-names"><input type="text" name="last_name" placeholder="Last Name" class="required" value="<?php echo (isset($lname)) ? $lname : '' ?>"/></span> 

        <span class="email-names"><input onblur="check_email(this.id)" id="email" type="text" name="email" placeholder="Email" class="required email" value="<?php echo (isset($email)) ? $email : '' ?>"/></span> 
        <span id="email_msg"></span>
        
        <span class="create-pswrd"><input type="password" name="password" placeholder="Password" class="required" id="org_password" /></span>

        <span class="confirm-pswrd"><input type="password" name="confirm_password" placeholder="Confirm Password" class="required"/></span>

        <div class="clearfix"></div>
        
      
    
    
        <div class="sign-up-checkboxs">
            <input type="checkbox" name="agree" class="required"/>
            <span>I have read and accept the
                <a href="javascript:void(0);" id="terms-and-conditions" class="terms" data-toggle="modal" data-target="#terms">Frumcare terms & conditions</a>
            </span>
        </div>
    
        <span class="sign-up-btn"><input id="submit-btn" type="submit" class="btn btn-success" value="<?php echo segment(3) != '' ? 'Save' : 'Sign up'; ?>"/></span>
    </form>
    </div>
    <?php if(segment(3) != '') { ?>
    <a href="<?php echo base_url('login/get-password/'.sha1($email).'?redirect_uri='.urlencode(current_url())) ?>">Click here</a> to change your password.
        <br />
    <?php /* <a href="<?php echo base_url();?>user/verifyemailaddress/<?php echo sha1($email);?>" id="<?php echo $email;?>" class="verifyemail">Click here</a> to verfiy your email address. */?>

    <?php } ?>
</div>
<script type="text/javascript">
    $(function(){
        $('.verifyemail').on('keyup',function(e){
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

        $('.terms').on('click',function(e){
            e.preventDefault();
            var  slug = $(this).attr('id');
            $.ajax({
                    type:"post",
                    url:"<?php echo site_url();?>"+slug,
                    data:"slug="+slug,
                    success:function(done){
                        $('#terms .modal-body').html(done);
                    }
            });

        });

    });

    function check_email(id){
        var data = {'email': $('#' + id).val()}
        $.ajax({
            url: '<?php echo site_url("common_ajax/check_email")?>',
            type: 'post',
            data: data,
            success: function(res){
                if(res==1){
                    $('#submit-btn').attr('disabled', 'disabled');
                    $('#email_msg').html('<label class="email error">Not Available</label>');
                }
                else{
                    $('#submit-btn').removeAttr('disabled');
                    $('#email_msg').html('<label class="email success">Available</label>');
                }
                
            }

        })
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

<!-- Modal -->
<div class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Terms and Conditions</h4>
      </div>
      <div class="modal-body">
        
      </div>
     
    </div>
  </div>
</div>
