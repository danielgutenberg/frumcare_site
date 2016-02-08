<link href="<?php echo site_url();?>css/user.css" rel="stylesheet" type="text/css">
<div class="container">
<?php echo $this->breadcrumbs->show();?>
	<div class="dashboard-left float-left">
		 <?php $this->load->view('frontend/user/dashboard_nav');?>
	</div>
	<div class="dashboard-right float-right">
		<div class="top-welcome">
			<h2>Create Alert</h2>
		</div>
		<div class="searchloader mainsearch" style="opacity: 1; display: none;"></div>
        <div>Looking for a
            <select id="careId" name="service" class="service care_type" style="width:300px">
                <option <?php if ($record['care_type'] == 0) echo 'selected' ?> value="0">--select--</option> 
                <option <?php if ($record['care_type'] == 1) echo 'selected' ?> value="1">Babysitter</option>
                <option <?php if ($record['care_type'] == 2) echo 'selected' ?> value="2">Nanny / Au-pair</option>
                <option <?php if ($record['care_type'] == 3) echo 'selected' ?> value="3">Nursery / Playgroup / Drop off / Gan</option>
                <option <?php if ($record['care_type'] == 10) echo 'selected' ?> value="10">Day Care Center / Day Camp / Afternoon Activities</option>
                <option <?php if ($record['care_type'] == 4) echo 'selected' ?> value="4">Tutor/ Private lessons</option>
                <option <?php if ($record['care_type'] == 5) echo 'selected' ?> value="5">Senior Caregiver</option>
                <option <?php if ($record['care_type'] == 13) echo 'selected' ?> value="13">Senior Care Agency</option>                    
                <option <?php if ($record['care_type'] == 16) echo 'selected' ?> value="16">Assisted living / Senior Care Center / Nursing Home</option>
                <option <?php if ($record['care_type'] == 6) echo 'selected' ?> value="6">Special needs caregiver</option>
                <option <?php if ($record['care_type'] == 14) echo 'selected' ?> value="14">Special needs center</option>
                <option <?php if ($record['care_type'] == 7) echo 'selected' ?> value="7">Therapist</option>
                <option <?php if ($record['care_type'] == 8) echo 'selected' ?> value="8">Cleaning / household help</option>
                <option <?php if ($record['care_type'] == 15) echo 'selected' ?> value="15">Cleaning / household help company</option>
                <option <?php if ($record['care_type'] == 9) echo 'selected' ?> value="9">Errand runner / odd jobs / personal assistant / driver</option>
                <option <?php if ($record['care_type'] == 17) echo 'selected' ?> value="17">Babysitter Job</option>
            	<option <?php if ($record['care_type'] == 18) echo 'selected' ?> value="18">Nanny / Au-pair Job</option>        
            	<option <?php if ($record['care_type'] == 19) echo 'selected' ?> value="19">Tutor / Private lessons Job</option>
            	<option <?php if ($record['care_type'] == 20) echo 'selected' ?> value="20">Senior Caregiver Job</option>        
            	<option <?php if ($record['care_type'] == 22) echo 'selected' ?> value="22">Special needs caregiver Job</option>           
            	<option <?php if ($record['care_type'] == 24) echo 'selected' ?> value="24">Cleaning / household help Job</option>        
            	<option <?php if ($record['care_type'] == 21) echo 'selected' ?> value="21">Errand runner / odd jobs / personal assistant / driver Job</option>
                <option <?php if ($record['care_type'] == 25) echo 'selected' ?> value="25">Workers / Staff for childcare facility</option>
                <option <?php if ($record['care_type'] == 26) echo 'selected' ?> value="26">Workers / Staff for senior care facility</option>
                <option <?php if ($record['care_type'] == 27) echo 'selected' ?> value="27">Workers / Staff for special needs facility</option>
                <option <?php if ($record['care_type'] == 28) echo 'selected' ?> value="28">Workers for cleaning company</option>
            </select>
        </div>
<?php if ($record['care_type'] != null) { ?>
        <div id="locationField">Location
            <input type="hidden" id="lat" name="lat" value="<?php echo isset($lat)?$lat:''?>"/>
            <input type="hidden" id="lng" name="lng" value="<?php echo isset($lng)?$lng:''?>"/>
            <input type="hidden" id="cityName" name="city" value="<?php echo isset($city)?$city:''?>"/>
            <input type="hidden" id="stateName" name="state" value="<?php echo isset($state)?$state:''?>"/>
            <input type="hidden" id="countryName" name="country" value="<?php echo isset($country)?$country:''?>"/>
            <input type="text" name="location" class="locationName required" placeholder="Please enter a street address" value="<?php echo $record['location'] ?>" style="margin-left:30px; width:300px" id="autocomplete" required/>
        </div> 
        <span style="color:red;" id="error"> </span>
        <div style="margin-top: 10px; margin-bottom:5px;">within            
            <select style="margin-left:48px" name="sort_by_miles" id="sort_by_miles">        
                <option <?php if ($record['distance'] == 1) echo 'selected' ?>  value="1">1 Miles</option>
                <option <?php if ($record['distance'] == 2) echo 'selected' ?>  value="2">2 Miles</option>
                <option <?php if ($record['distance'] == 5) echo 'selected' ?>  value="5">5 Miles</option>
                <option <?php if ($record['distance'] == 10) echo 'selected' ?>  value="10">10 Miles</option>
                <option <?php if ($record['distance'] == 25) echo 'selected' ?>  value="25">25 Miles</option>
                <option <?php if ($record['distance'] == 50) echo 'selected' ?> value="50">50 Miles</option>
                <option <?php if ($record['distance'] > 50) echo 'selected' ?>  value="unlimited" >Unlimited Miles</option>
            </select>
        </div>  
		<input type="hidden" class="alert_id" value="<?php echo $record['id']?>">
		<?php
    $s1 = $record['care_type'] > 9 && $record['care_type'] < 22 ? 'jobs' : 'caregivers';// must be caregivers, jobs, organization
    $s2 = $record['care_slug']; // must be care type, job type
    $s3 = $this->uri->segment(3);
    $navbars = [
        "1" => 'babysitter',
        "2" => 'nanny',
        "3" => 'nursery',
        "4" => 'tutor',
        "5" => 'senior_caregiver',
        "6" => 'special_needs_caregiver',
        "7" => 'therapists',
        "8" => 'cleaning',
        "9" => 'errand_runner',
        "10" => 'daycarecenter',
        "13" => 'seniorcareagency',
        "14" => 'careseeker_specialneedscaregiver',
        "15" => 'cleaninghousehold',
        "16" => 'careseeker_seniorcaregiver',
        "17" => 'careseeker_babysitter',
        "18" => 'careseeker_nanny',
        "19" => 'careseeker_tutor',
        "20" => 'careseeker_seniorcaregiver',
        "21" => 'careseeker_errandrunner',
        "22" => 'careseeker_specialneedscaregiver',
        "24" => 'careseeker_cleaninghousehold',
        "25" => 'babysitter',
        "26" => 'senior_caregiver',
        "27" => 'special_needs_caregiver',
        "28" => 'cleaning',
        "29" => 'therapists'
    ];
    

    $this->load->view('frontend/left_navbar/' . $navbars[$s3], array('data' => $record));

} ?>



       
	   

</div>
</div>
<script>
    var $dialog = $('<div></div>')
        .html('Search alert successfully created.  You will receive an email as soon as new profiles with your search criteria are placed on the site.')
        .dialog({
        autoOpen: false,
        modal: true,
        title: 'Search Created',
        close: function() {
            location.href = '<?php echo site_url();?>' + 'user/searches/'
            $(".searchloader").fadeIn("fast");
        },
        buttons: {
          "OK": function () {
            $(this).dialog("close");
            location.href = '<?php echo site_url();?>' + 'user/searches/'
            $(".searchloader").fadeIn("fast");
          },
        }
      });

	$(document).ready(function(){
	    $('h3').remove()
	    $('h4').remove()
	    $('.breadcrumb:eq(1)').remove();
	     $('.left-search-panel').removeClass('col-xs-12')
	    $('.left-search-panel').removeClass('col-sm-3 ')
	    $('.left-search-panel').removeClass('col-md-3 ')
	    $('.left-search-panel').removeClass('col-lg-3 ')
	    $('.left-search-panel').addClass('col-xs-5')
		$('.searchs').click(function(e){
	        $(".searchloader").fadeIn("fast");
		    e.preventDefault();
		    if ($('#lat').val() == '') {
                window.scrollTo(0, $("#locationField").offset().top);
                $("#locationField").css('border-color', 'red')
                document.getElementById("error").innerHTML="Please click on location from dropdown";
                $(".searchloader").fadeOut("fast");
                return false
            } else {
            }
		    var id = $('.alert_id').val();
		    var care_type = $('#careId').val();
    		var caregiverage_from = $('.caregiverage_from').val() ? $('.caregiverage_from').val() : '';
            var caregiverage_to = $('.caregiverage_to').val() ? $('.caregiverage_to').val() : '';
    		var gender = $('.gender_of_caregiver').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
    	    var willing = $(this).val();
            var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
    		var lang = $('.lang:checked').map(function(_, el) {
    	       	return $(el).val();
    	    }).get();
    	    var observance = $('.observance:checked').map(function(_, el) {
    	       	return $(el).val();
    	    }).get();
    	    var age_group = $('.age_group:checked').map(function(_, el) {
    	       	return $(el).val();
    	    }).get();
    		var rate = $('.rate').val();
            var caregiverage_from = $('.caregiverage_from').val() ? $('.caregiverage_from').val() : '';
            var caregiverage_to = $('.caregiverage_to').val() ? $('.caregiverage_to').val() : '';
            var gender_of_caregiver = $('.gender_of_caregiver').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
            var gender_of_careseeker = $('.gender_of_careseeker').is(':checked')?$('input[name=gender_of_careseeker]:checked').val():'';
            var lang = $('.lang:checked').map(function(_, el) {
    	        return $(el).val();
    	    }).get();
            var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
    	    var observance = $('.observance:checked').map(function(_, el) {
    	        return $(el).val();
    	    }).get();
    
    	    var carelocations = $('.carelocation:checked').map(function(_, el) {
    	        return $(el).val();
    	    }).get();
    
    	    var trainings = $('.training:checked').map(function(_, el) {
    	        return $(el).val();
    	    }).get();
    	    var skills = $('.skills:checked').map(function(_, el) {
    	        return $(el).val();
    	    }).get();
    	    var able_to_work = $('.able_to_work:checked').map(function(_, el) {
    	        return $(el).val();
    	    }).get();
            var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
    	    var min_exp = $('.year_experience').val() ? $('.year_experience').val() : '';
    	    var availability = $('.availability:checked').map(function(_, el) {
    	        return $(el).val();
    	    }).get();
    	    var number_of_children = $('.number_of_children').val() ? $('.number_of_children').val() : '';
            var morenum = $('.morenum:checked').map(function(_, el) {
    	        return $(el).val();
    	    }).get();
    	    var age_group = $('.age_group:checked').map(function(_, el) {
    	        return $(el).val();
    	    }).get();
            var looking_to_work = $('.looking_to_work:checked').map(function(_, el) {
    	        return $(el).val();
    	    }).get();
    	    var willing_to_work = $('.willing_to_work:checked').map(function(_, el) {
    	        return $(el).val();
    	    }).get();
            var year_experience = $('.year_experience:checked').map(function(_, el) {
    	        return $(el).val();
    	    }).get();
    	    var subject = $('.subject:checked').map(function(_, el) {
                return $(el).val();
            }).get();
    	    var pick_up_child = $('.pick_up_child').is(':checked') ? $('.pick_up_child').val() : '';
            var cook = $('.cook').is(':checked') ? $('.cook').val():'';
            var basic_housework = $('.basic_housework').is(':checked') ? $('.basic_housework').val() :'';
            var homework_help = $('.homework_help').is(':checked') ? $('.homework_help').val() :'';
            var bed_children = $('.bed_children').is(':checked') ? $('.bed_children').val() :'';
            var bath_children = $('.bath_children').is(':checked') ? $('.bath_children').val() :'';
            var accept_insurance = $('.accept_insurance').is(':checked')?$('input[name=accepts_insurance]:checked').val():'';
    	    var cook = $('.cook').is(':checked') ? $('.cook').val():'';
            var basic_housework = $('.basic_housework').is(':checked') ? $('.basic_housework').val() :'';
            var homework_help = $('.homework_help').is(':checked') ? $('.homework_help').val() :'';
            var driver_license = $('.driver_license').is(':checked')?$('.driver_license').val():'';
    	    var vehicle = $('.vehicle').is(':checked') ? $('.vehicle').val(): '';
    	    var available = $('.available_on_short_notice').is(':checked')?$('.available_on_short_notice').val():'';
            var start_date = $("#textbox1").val()?$("#textbox1").val():'';
            var extra_field = $('.extra_field:checked').map(function(_, el) {
    	        return $(el).val();
    	    }).get();
            var lat = $('#lat').val();
    	    var lat = $('#lat').val();
            var long = $('#lng').val();
            var location = $('.locationName').val();
            var distance = $('#sort_by_miles').val();
    	    $.ajax({
    	    	type:"post",
    	    	url:"<?php echo site_url();?>user/add_alert",
    	    	data:"lat="+lat+"&long="+long+"&location="+location+"&distance="+distance+"&care_type="+care_type+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&age_group="+age_group+"&gender="+gender+"&care_type="+care_type+"&willing_to_work="+willing_to_work+"&smoker="+smoker+"&subject="+subject+"&rate="+rate+"&skills="+skills+"&distance="+distance+"&bath_children="+bath_children+"&bed_children="+bed_children+"&pick_up_child="+pick_up_child+"&cook="+cook+"&basic_housework="+basic_housework+"&homework_help="+homework_help+"&lat="+lat+"&location="+location+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&gender_of_careseeker="+gender_of_careseeker+"&gender_of_caregiver="+gender_of_caregiver+"&language="+lang+"&observance="+observance+"&min_exp="+min_exp+"&availability="+availability+"&number_of_children="+number_of_children+"&morenum="+morenum+"&age_group="+age_group+"&looking_to_work="+looking_to_work+"&year_experience="+year_experience+"&carelocation="+carelocations+"&trainings="+trainings+"&able_to_work="+able_to_work+"&driver_license="+driver_license+"&vehicle="+vehicle+"&available="+available+"&start_date="+start_date+"&smoker="+smoker+"&extra_field="+extra_field+"&accept_insurance="+accept_insurance,
    	    	success:function(done){
    	    	    $(".searchloader").fadeOut("fast");
                    return $dialog.dialog('open');
    	    	}
    	    });
		});
        
	});
</script>
<?php if ($care == null) { ?>
<script>
    $(document).ready(function(){
        $('#careId').change(function(){
            var id = $('#careId').val()
            location.href = '<?php echo site_url();?>' + 'user/add_new_alert/' + id
        })
    })
</script>
<?php } ?>
