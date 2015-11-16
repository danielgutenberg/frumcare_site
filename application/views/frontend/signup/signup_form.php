<link rel="stylesheet" href="<?php echo base_url('css/bootstrap-responsive.min.css') ?>"><link href="<?php echo site_url();?>css/progressbar.css" type="text/css" rel="stylesheet"/>
<?php
$action = 'signup/save_user';
if(segment(3) != '') {
    $action = 'user/edit/'.segment(3);
    $user_data = $user_data[0];
    $fname = $user_data['name'];
    //$mname = $user_data['middle_name'];    
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
    <div class="signUpRight col-md-3 col-md-offset-1 hidden-sm hidden-xs">
        <h2 style="margin-left: -50px;">
        Why sign up? 
        </h2>
        <div class="rightText" style="border:1px solid black;">
        <!--<p>Connect with the perfect caregiver for your family on FrumCare. <br>  Get started by creating your free account now! <br></p>-->
        <div><span style="color:yellowgreen; font-weight:bold">&check;</span> Search quality caregivers in your area</div>
        <div><span style="color:yellowgreen; font-weight:bold">&check;</span> Set up search alerts and receive new caregiver profiles directly to your inbox</div>
        <div><span style="color:yellowgreen; font-weight:bold">&check;</span> Post jobs and get contacted by caregivers in your area</div>
        <div><span style="color:yellowgreen; font-weight:bold">&check;</span> Get access to exciting new features helping you with your care needs</div>
        </div>
    </div>
    <div class="sign-up-form col-md-4">
        <form role="form" id="sign-up" action="<?php echo base_url($action) ?>" method="post">
            <div class="care-type clearfix">I am a</div>
            <div class="form-field">
                    <div class="radio short"><input type="radio" name="account_category" value="2" <?php if($at == 2 ){?> checked="checked" <?php } ?> class="acc_cat" id="1"> Parent</div>
                    <div class="radio short"><input type="radio" name="account_category" value="1" <?php if($at == 1 ){?> checked="checked" <?php } ?> class="acc_cat" id="1"> Caregiver</div>
                    <div class="radio long"><input type="radio" name="account_category" value="3" <?php if($at == 3 ){?> checked="checked" <?php } ?> class="organization"> Caregiving Organization</div>
            </div>

            <div class="form-field organizational_care" <?php echo isset($at) && $at==3?'':'style="display:none"'?>>
                <div>What would you like to do?</div>
                <div class="radio"><input type="radio" name="organization_care" value="1" class="org_caretype required" id="2" checked="checked">Advertise My Service</div>
                <div class="radio"><input type="radio" name="organization_care" value="2" class="org_caretype required" id="2">Find Workers</div>
            </div>
            <div class="care-type clearfix">Care Type: 
                <div id="select_options"></div>
            </div>
        
            <span class="first-names">
                    <input style="width:330px" type="text" name="name" placeholder="Name" class="required name" value="<?php echo (isset($name)) ? $name : '' ?>"/>
            </span>
            <span class="email-names">
                <input style="width:330px" onblur="check_email(this.id)" id="email" type="text" name="email" placeholder="Email" class="required email" value="<?php echo (isset($email)) ? $email : '' ?>"/>
            </span> 

            <span id="email_msg"></span>
        
            <span class="create-pswrd">
                <input style="width:330px" type="password" name="password" placeholder="Password" class="required" id="org_password" />
            </span>

            <span class="confirm-pswrd">
                <input style="width:330px" type="password" name="confirm_password" placeholder="Confirm Password" class="required"/>
            </span>

            <div class="clearfix"></div>
    
            <div class="clearfix">
            <!--<input type="checkbox" name="agree" class="required"/>-->
            <span style="font-size:12px">By clicking on "Sign up" you agree to our <a href="<?php echo base_url();?>terms-of-use">Terms of use</a><br> and <a href="<?php echo base_url();?>privacy-policy">Privacy policy</a>
                <!--<a href="javascript:void(0);" id="terms-and-conditions" class="terms" data-toggle="modal" data-target="#terms">Frumcare terms & conditions</a>-->
            </span>
        </div>
    
            <span class="sign-up-btn">
                <input style="margin-left:-17px; margin-top:-50px;" id="submit-btn" type="submit" class="btn btn-success" value="<?php echo segment(3) != '' ? 'Save' : 'Sign up'; ?>"/>
             </span>
        </form>
    </div>
    <?php if(segment(3) != '') { ?>
    <a href="<?php echo base_url('login/get-password/'.sha1($email).'?redirect_uri='.urlencode(current_url())) ?>">Click here</a> to change your password.
        <br />
    <?php /* <a href="<?php echo base_url();?>user/verifyemailaddress/<?php echo sha1($email);?>" id="<?php echo $email;?>" class="verifyemail">Click here</a> to verfiy your email address. */?>

    <?php } ?>
    </div>
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
    function initialize() {
        var acc_category = $('input[name=account_category]:checked').val();
        if (acc_category == 1) {
            getAccountCat(1,1)
            leftText(1, 1);
        }
        if (acc_category == 2) {
            getAccountCat(2,1)
            leftText(2, 1);
        }
        if (acc_category == 3) {
            getAccountCat(1,2)
            leftText(3, 1);
        }
        
    }
    
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

        var account_category = $('input[name=account_category]:checked').val(); //$('.acc_cat').val();

        if(account_category == 2){
            $('.parent').text('Job Details');
            $('.personal').hide();
            $('.name').attr('placeholder', "Name");
            $('.started').text('Start Getting Calls');
        }
            

        // var account_id = $('.acc_cat').attr('id');
        // if($('.org_caretype').is(':checked'))
        //     getAccountCat(1,2);
        // else {            
        //     getAccountCat(account_category,account_id);  //kiran
        // }        
        $('.acc_cat').change(function(){
            $('.signUpRight').css('margin-top', '70px')
            getAccountCat($(this).val(),$(this).attr('id'));
            leftText($(this).val(),$(this).attr('id'));
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
            $('.signUpRight').css('margin-top', '130px')
            $('.organizational_care').css('display','block');
            $('.name').attr('placeholder', "Name of organization");
            $('.parent').text('Organization Info');
            $('.personal').css('display','none');
            $('.started').text('Organization Details');
            var careType = $('input[name=organization_care]:checked').val()
            getAccountCat(careType, 2)
            leftText(3, 1);
            
        });

        $('.acc_cat').click(function(){
            $('.organizational_care').css('display','none');
            // $('.org_caretype').removeAttr("checked");
        });

        $('.org_caretype').change(function(){
            getAccountCat($(this).val(),$(this).attr('id'));
            leftText($(this).val(),$(this).attr('id'));
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
    
    function leftText(ac, sb){
        var parent = '<div><span style="color:yellowgreen; font-weight:bold">&check;</span> Search Jobs in your area</div><div><span style="color:yellowgreen; font-weight:bold">&check;</span> Set up search alerts and receive new job openings directly to your inbox</div><div><span style="color:yellowgreen; font-weight:bold">&check;</span> Create a profile, list your skills and talents, add photos and more</div><div><span style="color:yellowgreen; font-weight:bold">&check;</span> Get access to exciting new features and tools for caregivers</div>'
        var job = '<div><span style="color:yellowgreen; font-weight:bold">&check;</span> Search quality caregivers in your area</div><div><span style="color:yellowgreen; font-weight:bold">&check;</span> Set up search alerts and receive new caregiver profiles directly to your inbox</div><div><span style="color:yellowgreen; font-weight:bold">&check;</span> Post jobs and get contacted by caregivers in your area</div><div><span style="color:yellowgreen; font-weight:bold">&check;</span> Get access to exciting new features helping you with your care needs</div>'
        var org = '<div><span style="color:yellowgreen; font-weight:bold">&check;</span> Advertise your services to jewish families worldwide</div><div><span style="color:yellowgreen; font-weight:bold">&check;</span> Post jobs and recruit employees / staff for your Organization</div><div><span style="color:yellowgreen; font-weight:bold">&check;</span> Get access to exciting new tools to help you run your Organization</div>'
        if(ac == 1){
        $('.rightText').html(parent)
        }
        if(ac == 2){
        $('.rightText').html(job)
        }
        if(ac == 3){
        $('.rightText').html(org)
        }
        
    }

    function getAccountCat(account_category,service_by){
        var parent_options = '<select id="care_type" class="required" name="care_type"><option value="" class="msg">Type of care you are seeking</option><option value="17_1">Babysitter</option><option value="18_1">Nanny / Au-pair</option><option value="19_1">Tutor / private lessons</option><option value="20_1">Senior caregiver</option><option value="22_1">Special needs caregiver</option><option value="24_1">Cleaning / household help</option><option value="21_1">Errand runner / odd jobs / personal assistant / driver</option></select>'
        var caregiver_options = '<select id="care_type" class="required" name="care_type"><option value="" class="msg">Type of care you provide</option><option value="1_1">Babysitter</option><option value="2_1">Nanny / Au-pair</option><option value="3_1">Nursery / Playgroup / Drop off / Gan</option><option value="4_1">Tutor / Private lessons</option><option value="5_1">Senior Caregiver</option><option value="6_1">Special needs caregiver</option><option value="7_1">Therapist</option><option value="8_1">Cleaning / household help</option><option value="9_1">Errand runner / odd jobs / personal assistant / driver</option></select>'
        var caregiver_organization_options = '<select id="care_type" class="required" name="care_type"><option value="" class="msg">Type of care you provide</option><option value="10_2">Day Care Center / Day Camp / Afternoon Activities</option><option value="13_2">Senior Care Agency</option><option value="16_2">Assisted living / Senior Care Center / Nursing Home</option><option value="14_2">Special needs center</option><option value="15_2">Cleaning / household help company</option></select>'
        var find_worker_options = '<select id="care_type" class="required" name="care_type"><option value="" class="msg">Type of care you are seeking</option><option value="25_2">Workers / staff for childcare facility</option><option value="26_2">Workers / staff for senior care facility</option><option value="27_2">Workers / staff for special needs facility</option><option value="28_2">Workers for cleaning company</option></select>'
        
        if(account_category == 1) {
            var organization = $('.organization:checked').val();
            $('.msg').text('Type of care you provide');
            if(organization == 3) {
                $('#select_options').html(caregiver_organization_options).show();
                $('.parent').text('Organization Info');
                $('.personal').css('display','none');
                $('.started').text('Organization Details');
            } else {
                $('#select_options').html(caregiver_options).show();
                $('.parent').text('Personal Details');
                $('.personal').css('display','inline-block');
                $('.started').text('Start Getting Calls');    
            }
        }
        if(account_category == 2){
           var organization = $('.organization:checked').val();
            $('.msg').text('Type of care you are seeking');
            if(organization == 3){
                $('#select_options').html(find_worker_options).show();
                $('.parent').text('Job Details');
                $('.personal').css('display','none');
                $('.started').text('Start Getting Calls');    
            }else{
                $('#select_options').html(parent_options).show();
                $('.parent').text('Job Details');
                $('.personal').css('display','none');
                $('.started').text('Start Getting Calls');    
            }
                        
       }
    }
</script>
