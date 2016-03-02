<!-- additional css &  script starts -->
<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>css/progressbar.css" type="text/css" rel="stylesheet"/>

<?php
    $action = 'ad/new_profile';
    if(segment(3) != '') {
        $action = 'user/edit/'.segment(3);
        $user_data = $user_data[0];
        $fname = $user_data['first_name'];
        $lname = $user_data['last_name'];
        $email = $user_data['email'];
        $pass = $user_data['password'];
        $care = $user_data['care_type'];
        $age = $user_data['age'];
        $location = $user_data['location'];
        $city = $user_data['city'];
        $gender  = $user_data['gender'];
    }

     $ac = $this->session->userdata('account_category');
     $oc = $this->session->userdata('organization_care');
?> 
 <div class="container">
    <?php echo $this->breadcrumbs->show();?>
    <div class="row">
        <?php flash(); 
        if($ac == 1 || $ac ==3)
	    $title='Add New Profile';
	if($ac ==2) 
	    $title='Add New Job';
        ?>
        <div class="dashboard-left float-left">
            <?php $this->load->view('frontend/user/dashboard/nav');?>
        </div><!--dashboard-left-->
                <div class="dashboard-right float-right">  
                    <?php if(segment(3) == '') { ?>
                    <div class="top-welcome">
                        <h2><?php echo $title;?></h2>
                    </div>
                    <?php } else { ?>
                    <div class="top-welcome">
                        <h2>Edit your account</h2>
                    </div>
                    <?php } ?>
                    <div class="sign-up-form">
                        <form name="myform" id="myform">
                            <div class="form-field">
                                <div id="individual" style="display: none;">
                                    <label>Individual</label>
                                    <div class="radio ind_caregiver" style="display: none;"><input type="radio" value='1' id="ind_caregiver" name="care1" checked="checked" >Caregiver</div>
                                    <div class="radio ind_parent" style="display: none;"><input type="radio" value='2' id="ind_parent" name="care2" checked="checked" >Parent</div>
                                </div>                                                                
                                <div id="organization" style="display: none;">
                                    <label>Caregiving Organization</label>
                                    <div class="radio org_caregiver"><label><input type="radio" value='1' id="org_caregiver" name="care" checked="checked" />Advertise My Service</label></div>
                                    <div class="radio org_parent"><label><input type="radio" value='2' id="org_parent" name="care" />Find Workers</label></div>                                                                                                    
                                </div>
                                <div id="care_type" class='care-type clearfix' ></div>                            
                        </form> 
                    </div>
                    <div id="result" style="display: none; "></div>
                    <?php if(segment(3) != '') { ?>
                    <a href="<?php echo base_url('login/get-password/'.sha1($email).'?redirect_uri='.urlencode(current_url())) ?>">Click here</a> to change your password.
                    <br />
                    <?php } ?>
                </div>
            </div>
    </div>
</div>
<script>
$(document).ready(function(){
    var ac = "<?php echo $ac?>";
    var oc = "<?php echo $oc?>";    
    if(ac != '3'){     
       $("#individual").show();
       if(ac == '1'){         
            $('.ind_caregiver').show();            
            get_cares(1,1);
       }
       if(ac == '2'){           
            $('.ind_parent').show();            
            get_cares(2,1);
        }
    }else{
        $("#organization").show();
        get_cares(1,2);
    }
    $(document).on('click','.ind_parent',function(){
        $("#result").html('');
        get_cares(2,1);
    });
    $(document).on('click','.ind_caregiver',function(){
        $("#result").html('');
        get_cares(1,1);
    });
    $(document).on('click','.org_parent',function(){
        $("#result").html('');
        get_cares(2,2);
    });
    $(document).on('click','.org_caregiver',function(){
        $("#result").html('');
        get_cares(1,2);
    });
    function get_cares(a,b){
        var x = a;
        var y = b;
        $.ajax({
            type:"POST",
            url:"<?php echo site_url();?>user/get_this_care",
            data:{f1:x,f2:y},            
            success:function(msg){                
                $("#care_type").html(msg);   
            }
        });
    }
});
</script>        
<script>
    $(function(){
        $('#care_type').on('change',function(){
            $("#result").fadeOut(500);
            $(".searchloader").fadeIn("fast");
            $.ajax({
                type:"POST",
                url:"<?php echo site_url().$action;?>",
                data:{id:$("#all_cares").val()},            
                success:function(msg){
                    $(".searchloader").fadeOut("fast");  
                    $("#result").html(msg);
                    $("#result").fadeIn(500);
                }                
            });            
        });            
        var account_category = $('.acc_cat').val();
        var account_id = $('.acc_cat').attr('id');

        $('.acc_cat').change(function(){
            getAccountCat($(this).val(),$(this).attr('id'));
        });


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
