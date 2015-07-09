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
   if(empty($at)){
       if(isset($this->session->userdata['account_type'])){
            $at = $this->session->userdata['account_type'];
        }else{
            $at  = 2;
        }
        if(segment(1) == 'signup'){
            $this->session->unset_userdata('care');
        }
    }

if($this->uri->segment(2)!='edit'){

?>

<ol class="progtrckr" data-progtrckr-steps="4">
    <li class="progtrckr-done">Sign Up</li>
    <li class="progtrckr-todo parent">Your Details</li>
    <li class="progtrckr-todo personal">Job Details</li>
    <li class="progtrckr-todo started">Start Getting Calls</li>
</ol>

<?php  } ?> 

<div class="container sign-up-forms">
    <?php flash();?>
    <?php if(segment(3) == '') { ?>
    <h2>
        Create your account
    </h2>
    <p>
        Sign up now for Frumcare. Already have an <br/>account?
        <a href="<?php echo base_url('login') ?>">Log In</a>
    </p>
    <?php } else { ?>
    <h2>Edit your account</h2>
    <?php } ?>
    <div class="sign-up-form">
        <form role="form" id="sign-up" action="<?php echo base_url($action) ?>" method="post">
         <div class="care-type clearfix">I am a</div>
                <div class="form-field">
                        <div class="radio short"><input type="radio" name="account_category" value="2" <?php if($at == 2 ){?> checked="checked" <?php } ?> class="acc_cat" id="1"> Parent</div>
                        <div class="radio short"><input type="radio" name="account_category" value="1" <?php if($at == 1 ){?> checked="checked" <?php } ?> class="acc_cat" id="1"> Caregiver</div>
                        <div class="radio long"><input type="radio" name="account_category" value="3" <?php if($at == 3 ){?> checked="checked" <?php } ?> class="organization"> Caregiving Organization</div>
                </div>

                <div class="form-field organizational_care" <?php echo isset($at) && $at==3?'':'style="display:none"'?>>
                    <div class="radio"><input type="radio" name="organization_care" value="1" class="org_caretype required" id="2" <?php echo isset($at) && $at==3?'checked="checked"':''?>>Advertise My Service</div>
                    <div class="radio"><input type="radio" name="organization_care" value="2" class="org_caretype required" id="2">Find Workers</div>
                </div>
        <div class="care-type clearfix">Care Type: 
            <div id="select_options"></div>
        </div>
        
        <span class="first-names">
                <input type="text" name="name" placeholder="Name" class="required name" value="<?php echo (isset($name)) ? $name : '' ?>"/>
        </span>
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
    
        <span class="sign-up-btn">
            <input id="submit-btn" type="submit" class="btn btn-success" value="<?php echo segment(3) != '' ? 'Save' : 'Sign up'; ?>"/>
         </span>
    </form>
    </div>
    <?php if(segment(3) != '') { ?>
    <a href="<?php echo base_url('login/get-password/'.sha1($email).'?redirect_uri='.urlencode(current_url())) ?>">Click here</a> to change your password.
        <br />
    <?php /* <a href="<?php echo base_url();?>user/verifyemailaddress/<?php echo sha1($email);?>" id="<?php echo $email;?>" class="verifyemail">Click here</a> to verfiy your email address. */?>

    <?php } ?>
</div>

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

        if(account_category == 2){
            $('.parent').text('Job Details');
            $('.personal').hide();
            $('.name').attr('placeholder', "Name");
            $('.started').text('Start Getting Calls');
        }
            

        var account_id = $('.acc_cat').attr('id');
        if($('.org_caretype').is(':checked'))
            getAccountCat(1,2);
        else
            getAccountCat(account_category,account_id);            

        $('.acc_cat').change(function(){
            getAccountCat($(this).val(),$(this).attr('id'));
            $('.name').attr('placeholder', "Name");
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

        $('.organization').click(function(){
            $('.organizational_care').css('display','block');
            $('.name').attr('placeholder', "Name of organization");
            $('.parent').text('Organization Info');
            $('.personal').css('display','none');
            $('.started').text('Organization Details');
        });

        $('.acc_cat').click(function(){
            $('.organizational_care').css('display','none');
            $('.org_caretype').removeAttr("checked");
        });

        $('.org_caretype').click(function(){
            getAccountCat($(this).val(),$(this).attr('id'));
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

     function getAccountCat(account_category,service_by){
        $.ajax({
                type:"post",
                url:"<?php echo site_url();?>ad/getCareType",
                data:"care_type="+account_category+"&service_by="+service_by,
                dataType:"json",
                success:function(done){
                   if(done){
                    $('#select_options').html(done).show();
                   }
                   if(account_category == 1){
                    var organization = $('.organization:checked').val();
                        $('.msg').text('Type of care you provide');
                        if(organization == 3){
                            $('.parent').text('Organization Info');
                            $('.personal').css('display','none');
                            $('.started').text('Organization Details');
                        }else{
                            $('.parent').text('Personal Details');
                            $('.personal').css('display','inline-block');
                            $('.started').text('Start Getting Calls');    
                        }
                   }
                   if(account_category == 2){
                       var organization = $('.organization:checked').val();

                        $('.msg').text('Type of care you are seeking');
                        if(organization == 3){
                            $('.parent').text('Organization Info');
                            $('.personal').css('display','none');
                            $('.started').text('Organization Details');    
                        }else{
                            $('.parent').text('Job Details');
                            $('.personal').css('display','none');
                            $('.started').text('Start Getting Calls');    
                        }
                        
                   }
                }
        });
    }
</script>
