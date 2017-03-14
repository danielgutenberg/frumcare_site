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

                    <div class="top-welcome">
                        <h2><?php echo $title;?></h2>
                    </div>


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
                    <div id="result">
                        <?php 
                            if ($form) {
                                if ($message != '') {
                                    echo $message;
                                } else {
                                    $this->load->view($form, array('record' => array(
                                        'ac_type' => $ac,
                                        'account_type' => $ac,
                                        'organization_care' => $oc,
                                        'submit_id' => segment(3)
                                    ))); 
                                }
                                
                            }
                        ?>
                    </div>

                </div>
            </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('.progtrckr').css('display','none');
    $($('h1')[1]).css('display', 'none')
    $('#result .ad-form-container').css('margin-left', '-18px')
    
    $('#care_type').on('change',function(){
        location.href = '<?php echo site_url();?>ad/new_profile/' + $("#all_cares").val()
    }); 
    
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
        var id = '<?php echo segment(3);?>'
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

