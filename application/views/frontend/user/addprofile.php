<!-- additional css &  script starts -->
<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<link href="<?php echo site_url();?>css/progressbar.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo site_url();?>css/jquery-ui.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/><!--for datepicker-->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script><!--for datepicker-->
<script type="text/javascript" src="<?php echo site_url();?>js/jquery-ui.js"></script>
<script>
    $("#textbox1").ready(function(){        
        $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
     });
</script>
<!-- additional css & script ends -->

<script>
    $(document).ready(function(){
        $("body").removeAttr("onload");    
         $(document).on('click','#ref_check1',function(){
            $('.refrence_file').show();

         });

          $(document).on('click','#ref_check2',function(){
            $('.refrence_file').hide();
            $('#output').text('');
            $('#file-name').val('');
         });
        });
</script>

<!-- FILE UPLOAD -->
<script type="text/javascript">
    var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
    var link = '<?php echo site_url("user/uploadfile?files")?>';

    $(document).on("click","#select_file",function(e){ 
        e.preventDefault();
        $('#file_upload').trigger('click');
        $(document).on('change', '#file_upload', prepareUpload);
    });

     $(document).on("click","#upload,#output3",function(e){ 
        e.preventDefault();
        $('#ImageFile').trigger('click');
        $(document).on('change', '#ImageFile', prepareUpload2);
    });


    $(document).on("click","#pdf_file",function(e){
        e.preventDefault();
        $('#pdf_upload').trigger('click');
        $(document).on('change', '#pdf_upload', prepareUpload1);
    });

    function prepareUpload(event){
        var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
        var link = '<?php echo site_url("user/uploadfile?files")?>';

        var files = event.target.files;
        event.stopPropagation(); // Stop stuff happening
        event.preventDefault(); // Totally stop stuff happening

        // START A LOADING SPINNER HERE

        // Create a formdata object and add the files
        var data = new FormData();
        $.each(files, function(key, value)
        {
            data.append(key, value);
        });
        $.ajax({
            url: link,
            type: 'POST',
            beforesend: $('.loader').html(loader),
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR)
            {
                if(typeof data.error === 'undefined')
                {
                    // Success so call function to process the form
                    if(data.type==1){
                        $('#output').html(data.html);
                        $('.loader').html('');
                        $('#file-name').val(data.files);    
                    }
                    else{
                        $('#output').html(data.files + ' selected');
                        $('#file-name').val(data.files);
                        $('.loader').html('');
                    }
                    
                }
                else
                {
                    // Handle errors here
                    console.log('ERRORS: ' + data.error);
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                // Handle errors here
                console.log('ERRORS: ' + textStatus);
                // STOP LOADING SPINNER
            }
        });
    }

    function prepareUpload2(event){
        var loader = '<img src="<?php echo site_url("images/loader.gif")?>">';
        var link = '<?php echo site_url("ad/upload_pp?files")?>';

        var files = event.target.files;
        event.stopPropagation(); // Stop stuff happening
        event.preventDefault(); // Totally stop stuff happening

        // START A LOADING SPINNER HERE

        // Create a formdata object and add the files
        var data = new FormData();
        $.each(files, function(key, value)
        {
            data.append(key, value);
        });
        $.ajax({
            url: link,
            type: 'POST',
            beforesend: $('.loader').html(loader),
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR)
            {
                if(typeof data.error === 'undefined')
                {
                    // Success so call function to process the form
                    if(data.type==1){
                        $('#output').html(data.html);
                        $('.loader').html('');
                        $('#file-name').val(data.files);    
                    }
                    else{
                        $('#output').html(data.html);
                        $('#file-name').val(data.files);
                        $('.loader').html('');
                    }
                    
                }
                else
                {
                    // Handle errors here
                    console.log('ERRORS: ' + data.error);
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                // Handle errors here
                console.log('ERRORS: ' + textStatus);
                // STOP LOADING SPINNER
            }
        });
    }

    // try uploadind pdf file

    function prepareUpload1(event){
        var loader1 = '<img src="<?php echo site_url("images/loader.gif")?>">';
        var link1 = '<?php echo site_url("user/uploadfile?files")?>';

        var validExtensions = ['pdf','PDF']; //array of valid extensions
        var fileName = $('#pdf_upload').val();
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
        if ($.inArray(fileNameExt, validExtensions) == -1){
           alert("Invalid file type. Please upload pdf file only");
           return false;
        }


        var files = event.target.files;
        event.stopPropagation(); // Stop stuff happening
        event.preventDefault(); // Totally stop stuff happening

        // START A LOADING SPINNER HERE

        // Create a formdata object and add the files
        var data = new FormData();
        $.each(files, function(key, value)
        {
            data.append(key, value);
        });
        $.ajax({
            url: link1,
            type: 'POST',
            beforesend: $('.loader1').html(loader1),
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR)
            {
                if(typeof data.error === 'undefined')
                {
                    // Success so call function to process the form
                    if(data.type==1){
                        $('#output1').html(data.html);
                        $('.loader1').html('');
                        $('#pdf-name').val(data.files);    
                    }
                    else{
                        $('#output1').html(data.files + ' selected');
                        $('#pdf-name').val(data.files);
                    }
                    
                }
                else
                {
                    // Handle errors here
                    console.log('ERRORS: ' + data.error);
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                // Handle errors here
                console.log('ERRORS: ' + textStatus);
                // STOP LOADING SPINNER
            }
        });
    }

</script>
<?php
    $action = 'user/new_profile';
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
            <?php $this->load->view('frontend/user/dashboard_nav');?>
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
                        <form name="myform" id="personal-details-form">
                            <?php /*
                            <div class="form-field">
                                <div class="radio"><label><input type="radio" name="account_category" value="<?php if($ac == 2){echo "2";} if($ac == 1){echo "1";}?>" <?php if($ac == 2 || $ac == 1 || $ac == 3){?> checked="checked" <?php } ?> class="acc_cat" id="1"><?php if($ac == 2) {echo "Parent";} if($ac == 1) {echo "Caregiver";} if($ac == 3) {echo "Caregivers";}?></label></div>                                
                                <div class="radio"><label><input type="radio" name="account_category" value="3" <?php if($ac == 3 ){?> checked="checked" <?php } ?> class="organization">Caregiving Organization</label></div>
                            </div>

                            <div class="form-field organizational_care" style="display:none">
                                <div class="radio"><label><input type="radio" name="organization_care" value="1" class="org_caretype required" id="2" <?php if($oc==1){ ?> checked="checked"<?php }?> >Advertise My Service</label></div>
                                <div class="radio"><label><input type="radio" name="organization_care" value="2" class="org_caretype required" id="2" <?php if($oc==2){ ?> checked="checked"<?php }?>>Find Workers</label></div>
                            </div>

    
                            <div class="care-type clearfix">Care Type: 
                                <div id="select_options" onchange="loadForm()"></div>
                            </div>
                            */?>
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
<script>
$(document).ready(function(){
    var ac = "<?php echo $ac?>";
    var oc = "<?php echo $oc?>";    
    if(ac != '3'){
       //$("#organization").hide();
       //$(".org_caregiver").hide();
       //$(".org_parent").hide();       
       $("#individual").show();
       if(ac == '1'){
            //$('.ind_parent').hide();            
            $('.ind_caregiver').show();            
            get_cares(1,1);
       }
       if(ac == '2'){
            //$('.ind_caregiver').hide();            
            $('.ind_parent').show();            
            get_cares(2,1);
        }
    }else{
        $("#organization").show();
        get_cares(1,2);
       /*if(oc == '1'){
            //$('.org_parent').hide();
            //$('.ind_parent').hide();            
            get_cares(1,2);
        }
       if(oc == '2'){
            //$('.org_caregiver').hide();
            //$('.ind_caregiver').hide();            
            get_cares(2,2);
       } */
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
    function loadForm(){
        if (window.XMLHttpRequest){ // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else{ // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState==4 && xmlhttp.status==200){
                document.getElementById("result").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","<?php echo base_url().$action ?>?ac_type="+document.myform.account_category.value+"&organization_care="+document.myform.organization_care.value+"&value="+document.myform.care_type.value,true);
        xmlhttp.send();
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
        //getAccountCat(account_category,account_id);

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

        });
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
                    $('.msg').text('Type of care you provide');
                }
                if(account_category == 2){
                    $('.msg').text('Type of care you are seeking');
                }
            }
        });
    }
</script>

<!-- Modal Starts-->
<div class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Terms and Conditions</h4>
            </div>
        <div class="modal-body"></div>
        </div>
    </div>
</div>
<!-- Modal Ends -->

<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initialize() {
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
      { types: ['geocode'] });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });
}

// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();
    console.log(place);
  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = new google.maps.LatLng(
          position.coords.latitude, position.coords.longitude);
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
// [END region_geolocation]

    </script>
<!-- for google map ends -->
<script>
    $("#locationField").ready(function(){        
        var autocomplete = new google.maps.places.Autocomplete($("#autocomplete")[0], {});
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    var place = autocomplete.getPlace();
                    //console.log(place.geometry.location);
                    var lat = place.geometry.location.A;
                    var lng = place.geometry.location.F;                                
                    $("#lat").val(lat);
                    $("#lng").val(lng);                                
                });
    });
</script>
</div>
