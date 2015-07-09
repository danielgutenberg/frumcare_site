<?php
$url = urlencode(current_url());
if(check_user()) {
    $current_user = get_user(check_user());
    $fname = $current_user['first_name'];
    $mname = $current_user['middle_name'];
    $lname = $current_user['last_name'];
    $pass = encrypt_decrypt('decrypt', $current_user['password']);
    $email = $current_user['email'];
    //$phone = $current_user['contact_number'];
    //$location = $current_user['location_street1'];
    //$month = date('m', $current_user['dob']);
    //$day = date('d', $current_user['dob']);
    //$year = date('Y', $current_user['dob']);
    //$gender = $current_user['gender'];
    $care = $current_user['care_type'];
    //echo '<script>load_experience_form('.$care.')</script>';
}
?>
<div class="ad-form">
    <div>
        <h1 class="step1">
            Step 1: Sign Up 
        </h1>
    </div>

    <div class="care-types">   
        <label>I am a</label>
        <div class="form-field">
                <input type="radio" name="account_category" value="2" class="acc_cat" checked="checked" id="1"> Parent
                <input type="radio" name="account_category" value="1" class="acc_cat" id="1"> Caregiver
                <input type="radio" name="account_category" value="3" class="organization"> Caregiving Organization
        </div>

        <div class="form-field organizational_care" style="display:none;">
            <input type="radio" name="organization_care" value="1" class="org_caretype required" id="2">Advertise My Service
            <input type="radio" name="organization_care" value="2" class="org_caretype required" id="2">Find Workers
        </div>

        <label>Care type</label>
        <div class="form-field">
            <div id="select_options"></div>
        </div>
    </div>
    <div class="ad-first-name">
        <label class="f_name">Name</label>
        <div class="form-field">
        <input type="text" name="name" class="required" value="" placeholder="Name"/>
        </div>
    </div>
    

    <div class="ad-email">    
        <label>Email</label>
        <div class="form-field">
        <input onblur="check_email(this.id)" id="email" type="text" name="email" class="required email" value="<?php echo isset($email) ? $email : '' ?>" placeholder="Email"/>
        <span id="email_msg"></span>
        </div>
    </div>

    <div class="ad-password">
        <label>Password</label>
        <div class="form-field">
        <input type="password" name="password" class="required" value="<?php echo isset($pass) ? $pass : '' ?>" placeholder="Password" id="org_password"/>
        </div>
    </div>

    <div class="ad-password">
        <label>Confirm Password</label>
        <div class="form-field">
        <input type="password" name="confirm_password" class="required" placeholder="Confirm Password"/>
        </div>
    </div>

    <?php if(check_user()== false):?>
        <div class="ad-checkbox">
            <input type="checkbox" name="terms_conditions" class="required">
            <label class="accept-terms">I accept the 
                <a href="javascript:void(0);" id="terms-and-conditions" class="terms" data-toggle="modal" data-target="#terms">terms and conditions.</a>
            </label>
        </div>
    <?php endif?>

</div>

<script>
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

    $(function(){
        var account_category = $('.acc_cat').val();
        var account_id = $('.acc_cat').attr('id');

        getAccountCat(account_category,account_id);

        $('.acc_cat').change(function(){
            getAccountCat($(this).val(),$(this).attr('id'));
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

        //  for loading organization 
        $('.organization').click(function(){
            $('.organizational_care').css('display','block');
        });

        $('.acc_cat').click(function(){
            $('.organizational_care').css('display','none');
            $('.org_caretype').removeAttr("checked");
        });

        $('.org_caretype').click(function(){
            getAccountCat($(this).val(),$(this).attr('id'));
        });

    });

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
                        $('.msg').text('Type of care you provide');
                   }
                   if(account_category == 2){
                        $('.msg').text('Type of care you are seeking');
                   }
                }
        });
    }

</script>

<!-- Modal starts-->
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
<!-- modal ends -->
