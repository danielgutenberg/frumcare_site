<?php echo $this->breadcrumbs->show();?>
			<h3>
					<?php 
						echo ucwords(str_replace('_', ' ',segment(1)));
					?>
			</h3>  			
	  		<div class="left-search-panel">
	 	<h4>Refine Results</h4>
	 	<form method="post" id="left-nav" action="">
 			<div class="select-services">
	 			<label>Choose a Care Type</label>
 				<select name="service" class="service required">
					<option value="">--select--</option>
					<option value="1" <?php if(segment(1) == 'babysitter'){?> selected="selected" <?php }?>>Babysitter</option>
					<option value="2" <?php if(segment(1) == 'nanny'){?> selected="selected" <?php }?> >Nanny/Au-pair</option>
					<option value="3" <?php if(segment(1) == 'nursery'){?> selected="selected" <?php }?>>Nursery/ Playgroup/ Drop off/ Gan</option>
					<option value="10" <?php if(segment(1) == 'daycarecenter'){?> selected="selected" <?php }?>>Day Care Center/Day Camp/Afternoon Activities</option>
                    <option value="4" <?php if(segment(1) == 'tutor'){?> selected="selected" <?php }?>>Tutor/ Private lessons</option>
					<option value="5" <?php if(segment(1) == 'senior_caregiver'){?> selected="selected" <?php }?> >Senior Caregiver</option>
					<option value="13" <?php if(segment(1) == 'seniorcareagency'){?> selected="selected" <?php }?>>Senior Care Agency</option>                    
                    <option value="16" <?php if(segment(1) == 'seniorcarecenter'){?> selected="selected" <?php }?>>Assisted living / Senior Care Center/ Nursing Home</option>
                    <option value="6" <?php if(segment(1) == 'special_needs_caregiver'){?> selected="selected" <?php }?>>Special needs caregiver</option>
                    <option value="14" <?php if(segment(1) == 'specialneedscenter'){?> selected="selected" <?php }?>>Special needs center</option>
					<option value="7" <?php if(segment(1) == 'therapists'){?> selected="selected" <?php }?>>Therapist</option>
					<option value="8" <?php if(segment(1) == 'cleaning'){?> selected="selected" <?php }?>>Cleaning/ household help</option>
					<option value="15" <?php if(segment(1) == 'cleaninghousehold'){?> selected="selected" <?php }?>>Cleaning/ household help company</option>
                    <option value="9" <?php if(segment(1) == 'errand_runner'){?> selected="selected" <?php }?>>Errand runner/ odd jobs/ personal assistant/ driver</option>                    																													
                    <option value="25" <?php if(segment(1) == 'careseeker_childcarefacility'){?> selected="selected" <?php }?>>Workers/Staff for childcare facility</option>
                    <option value="26" <?php if(segment(1) == 'careseeker_seniorcarefacility'){?> selected="selected" <?php }?> >Workers/Staff for senior care facility</option>
                    <option value="27" <?php if(segment(1) == 'careseeker_specialneedsfacility'){?> selected="selected" <?php }?>>Workers/Staff for special needs facility</option>
                    <option value="28" <?php if(segment(1) == 'careseeker_cleaningcompany'){?> selected="selected" <?php }?>>Works for cleaning company</option>
 				</select>
	 		</div>

 			<div class="neighborhood">
	 			<label>Neighborhood</label>
	 			<input type="text" name="neighborhood" value="" class="neighbour">
 			</div>

 			<div>
	 			<label>Age of Caregiver</label>
	 			<input type="text" name="caregiverage_from" value="" placeholder="FROM" style="width:25%" class="caregiverage_from"> to  
	 			<input type="text" name="caregiverage_to" value="" placeholder="TO" style="width:25%" class="caregiverage_to">
	 		</div>

	 		<div>
	 			<label>Gender of caregiver</label>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="1" class="gender">Male</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="2" class="gender">Female</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="3" class="gender">Any</div>
	 		</div>
	 		<div>
	 			<label>Languages</label>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="English" class="lang">English</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Yiddish" class="lang">Yiddish</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Hebrew" class="lang">Hebrew</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Russian" class="lang">Russian</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="French" class="lang">French</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Other" class="lang">Other</div>
	 		</div>
	 		<div>
	 			<label>Level of observance (check one or more)</label>
	 			<div class="checkbox"><input type="checkbox" value="Yeshivish/Chasidish" name="observance[]" class="observance">Yeshivish/Chasidish</div>
	 			<div class="checkbox"><input type="checkbox" value="Orthodox/Modern orthodox" name="observance[]" class="observance">Orthodox/Modern orthodox</div>	 			
	 			<div class="checkbox"><input type="checkbox" value="Familiar with Jewish Tradition" name="observance[]" class="observance">Familiar with Jewish Tradition</div>
	 			<div class="checkbox"><input type="checkbox" value="Any" name="observance[]" class=" observance">Any</div>	 			
	 		</div>
	 		<div>
 				<label>Type of caregiver</label> 				 				
 				<div class="checkbox"><input type="checkbox" name="carelocation[]" class="carelocation" value="Live In">Live In</div>
 				<div class="checkbox"><input type="checkbox" name="carelocation[]" class="carelocation" value="Live Out">Live Out</div>
	 		</div>

	 		<div class="year-exp">
		 		<span>Minimum Experience</span>
		 			<select name="year_experience" class="required year_experience">
		 			<option value="">--select--</option>
		 				<option value="1">1 year</option>	
		 				<option value="2">2 years</option>	
		 				<option value="3">3 years</option>	
		 				<option value="4">4 years</option>	
		 				<option value="5+">5+ years</option>	
		 			</select>
		 	</div>

		 	<div>
		 		<label>Training</label>
		 		<div class="checkbox"><input type="checkbox" name="training" class="training" value="CPR">CPR</div>
 				<div class="checkbox"><input type="checkbox" name="training" class="training" value="First Aid">First Aid</div>
 				<div class="checkbox"><input type="checkbox" name="training" class="training" value="Senior Care Training">Senior Care Training</div>
 				<div class="checkbox"><input type="checkbox" name="training" class="training" value="Nurse">Nurse</div>
 				<div class="checkbox"><input type="checkbox" name="training" class="training" value="Nurse">Other</div>
		 	</div>

		 	<div>
		 		<label>Able to work with</label>
		 		<div class="checkbox"><input type="checkbox" class="able_to_work" name="able_to_work" value="Alz./ dementia">Alz./ dementia</div>
		 		<div class="checkbox"><input type="checkbox" class="able_to_work" name="able_to_work" value="Sight Loss">Sight Loss</div>
		 		<div class="checkbox"><input type="checkbox" class="able_to_work" name="able_to_work" value="Hearing Loss">Hearing Loss</div>
		 		<div class="checkbox"><input type="checkbox" class="able_to_work" name="able_to_work" value="Wheelchair Bound">Wheelchair Bound</div>
		 		<div class="checkbox"><input type="checkbox" class="able_to_work" name="able_to_work" value="Able to tend to personal hygiene of senior">Able to tend to personal hygiene of senior</div>
		 	</div>
		 	<div>
		 		<label>Availability (check one or more)</label>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Immediate">Immediate</div>
		 		<div class="checkbox full"><input type="checkbox" id="chkbox1" value="Start Date">Start Date<input type="text" id="textbox1"/></div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Occasionally">Occasionally</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Regularly">Regularly</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Morning">Morning</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Afternoon">Afternoon</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Evening">Evening</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Overnight">Overnight</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Weekends Fri/Sun">Weekends Fri/Sun</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Shabbos">Shabbos</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="By appointment">24 hr care</div>
		 	</div>

		 	<div>
		 		<label>Abilities</label>
		 		<div class="checkbox"><input type="checkbox" class="driver_license" name="driver_license" value="1">Drivers License</div>
		 		<div class="checkbox"><input type="checkbox" class="vehicle" name="vehicle" value="1">Vehicle</div>
		 		<div class="checkbox"><input type="checkbox" class="available_on_short_notice" name="available_on_short_notice" value="1">Available on short notice</div>
		 	</div>

	 		<div>
		 		<div class="educationss" colspan="2">
		 		<input type="hidden" name="category" value="" id="care_type">
			 		<div colspan="2" class="search-btns">
				 		<input type="submit" class="btn btn-primary searchs" value="Search" name="searchs">
				 	</div>

			</form>
		</div>
</div>	 
	  </div>
<script>
	$(document).ready(function(){
		var care_type = $( ".service option:selected" ).val();
			$('#care_type').val(care_type);	

		$('.service').change(function(){
			$('#care_type').val($(this).val());
            var pagelink = $(this).find("option:selected").text();
            
            if(pagelink == 'Nanny/Au-pair')
                var locationaddress = 'nanny';
            if(pagelink == 'Babysitter')
                var locationaddress = 'babysitter';
            if(pagelink == 'Nursery/ Playgroup/ Drop off/ Gan')
                var locationaddress = 'nursery';
            if(pagelink == 'Tutor/ Private lessons')
                var locationaddress = 'tutor';
             if(pagelink == 'Senior Caregiver')
                var locationaddress = 'senior_caregiver';
            if(pagelink == 'Special needs caregiver')
                var locationaddress = 'special_needs_caregiver';
            if(pagelink == 'Therapist')
                var locationaddress = 'therapists';
            if(pagelink == 'Cleaning/ household help')
                var locationaddress = 'cleaning';
            if(pagelink == 'Errand runner/ odd jobs/ personal assistant/ driver')
                var locationaddress = 'errand_runner';
                            
            if(pagelink == 'Day Care Center/Day Camp/Afternoon Activities')
                var locationaddress = 'daycarecenter';

            if(pagelink == 'Senior Care Agency')
                var locationaddress = 'seniorcareagency';

            if(pagelink == 'Special needs center')
                var locationaddress = 'specialneedscenter';

            if(pagelink == 'Cleaning/ household help company')
            	var locationaddress = 'cleaning';

            if(pagelink == 'Assisted living / Senior Care Center/ Nursing Home')
            	var locationaddress = 'seniorcarecenter';
             if(pagelink == 'Workers/Staff for childcare facility')
                var locationaddress = 'careseeker_childcarefacility';
            if(pagelink == 'Workers/Staff for senior care facility')
                var locationaddress = 'careseeker_seniorcarefacility';
            if(pagelink == 'Workers/Staff for special needs facility')
                var locationaddress = 'careseeker_specialneedsfacility';
             if(pagelink == 'Works for cleaning company')
                var locationaddress = 'careseeker_cleaningcompany';
            if(pagelink == '--select--')
                var locationaddress = 'careseekers/organization';

            if(pagelink == '--select--')
            	var locationaddress = 'caregivers'; 
                
            location.href = '<?php echo site_url();?>'+locationaddress;                
		});

		// onkeyup
		$('.neighbour,.caregiverage_from,.caregiverage_to').blur(function(){
			$(".searchloader").fadeIn("fast");
			var neighbour = $('.neighbour').val();
            var caregiverage_from = $('.caregiverage_from').val();
            var caregiverage_to = $('.caregiverage_to').val();
            var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
            var lang = $('.lang:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var observance = $('.observance:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var carelocations = $('.carelocation:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var trainings = $('.training:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var able_to_work = $('.able_to_work:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var min_exp = $('.year_experience').val();
		    var availability = $('.availability:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
		    var driver_license = $('.driver_license').is(':checked')?$('.driver_license').val():'';
		    var vehicle = $('.vehicle').is(':checked') ? $('.vehicle').val(): '';
		    var available = $('.available_on_short_notice').is('.checked')?$('.available_on_short_notice').val():'';
            var start_date = $("#textbox1").val()?$("#textbox1").val():'';
				$.ajax({
					type:"get",
					url:"<?php echo site_url();?>senior_caregiver/search",
					data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&gender="+gender+"&language="+lang+"&observance="+observance+"&min_exp="+min_exp+"&availability="+availability+"&care_type="+care_type+"&carelocation="+carelocations+"&trainings="+trainings+"&able_to_work="+able_to_work+"&driver_license="+driver_license+"&vehicle="+vehicle+"&available="+available+"&start_date="+start_date,
					success:function(done){
							$(".searchloader").fadeOut("fast");
							var json = jQuery.parseJSON(done);
 							var pagenum = json.num;
 							var pagedata = json.userdatas;
							$('#list_container').html(pagedata);
							$('#total').text(json.total);
					}
				});

		});

		// onclick
		$('.gender,.lang,.observance,.availability,.able_to_work,.availability,.driver_license,.vehicle,.available_on_short_notice,.training,.carelocation').click(function(){
			$(".searchloader").fadeIn("fast");
			var neighbour = $('.neighbour').val();
            var caregiverage_from = $('.caregiverage_from').val();
            var caregiverage_to = $('.caregiverage_to').val();
            var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
            var lang = $('.lang:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var observance = $('.observance:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var min_exp = $('.year_experience').val();
		    var availability = $('.availability:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		     var carelocations = $('.carelocation:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var trainings = $('.training:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var able_to_work = $('.able_to_work:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var driver_license = $('.driver_license').is(':checked')?$('.driver_license').val():'';
		    var vehicle = $('.vehicle').is(':checked') ? $('.vehicle').val(): '';
		    var available = $('.available_on_short_notice').is('.checked')?$('.available_on_short_notice').val():'';
            var start_date = $("#textbox1").val()?$("#textbox1").val():'';
				$.ajax({
					type:"get",
					url:"<?php echo site_url();?>senior_caregiver/search",
					data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&gender="+gender+"&language="+lang+"&observance="+observance+"&min_exp="+min_exp+"&availability="+availability+"&care_type="+care_type+"&carelocation="+carelocations+"&trainings="+trainings+"&able_to_work="+able_to_work+"&driver_license="+driver_license+"&vehicle="+vehicle+"&available="+available+"&start_date="+start_date,
					success:function(done){
							$(".searchloader").fadeOut("fast");
							var json = jQuery.parseJSON(done);
 							var pagenum = json.num;
 							var pagedata = json.userdatas;
							$('#list_container').html(pagedata);
							$('#total').text(json.total);
					}
				});
		});

		// onselect
		$('.year_experience,#textbox1').change(function(){
			$(".searchloader").fadeIn("fast");
			var neighbour = $('.neighbour').val();
            var caregiverage_from = $('.caregiverage_from').val();
            var caregiverage_to = $('.caregiverage_to').val();
            var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
            var lang = $('.lang:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var observance = $('.observance:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var subjects = $('.subjects:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var min_exp = $('.year_experience').val();
		    var availability = $('.availability:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var carelocations = $('.carelocation:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var trainings = $('.training:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var able_to_work = $('.able_to_work:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var start_date = $("#textbox1").val()?$("#textbox1").val():'';
		    var driver_license = $('.driver_license').is(':checked')?$('.driver_license').val():'';
		  	var vehicle = $('.vehicle').is(':checked') ? $('.vehicle').val(): '';
		    var available = $('.available_on_short_notice').is('.checked')?$('.available_on_short_notice').val():'';

				$.ajax({
					type:"get",
					url:"<?php echo site_url();?>senior_caregiver/search",
					data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&gender="+gender+"&language="+lang+"&observance="+observance+"&min_exp="+min_exp+"&availability="+availability+"&care_type="+care_type+"&carelocation="+carelocations+"&trainings="+trainings+"&able_to_work="+able_to_work+"&driver_license="+driver_license+"&vehicle="+vehicle+"&available="+available+"&start_date="+start_date,
					success:function(done){
							$(".searchloader").fadeOut("fast");
							var json = jQuery.parseJSON(done);
 							var pagenum = json.num;
 							var pagedata = json.userdatas;
							$('#list_container').html(pagedata);
							$('#total').text(json.total);
					}
				});
		});

        //$("#textbox1").hide();
         $("#chkbox1").click(function(){
            if($('#chkbox1').is(':checked')){
                $("#textbox1").show();
                $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();   
            }else{
                //$("#textbox1").hide(); 
                $('#textbox1').val('');
                 $(".searchloader").fadeIn("fast");
			var neighbour = $('.neighbour').val();
            var caregiverage_from = $('.caregiverage_from').val();
            var caregiverage_to = $('.caregiverage_to').val();
            var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
            var lang = $('.lang:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var observance = $('.observance:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var subjects = $('.subjects:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var min_exp = $('.year_experience').val();
		    var availability = $('.availability:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var carelocations = $('.carelocation:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var trainings = $('.training:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var able_to_work = $('.able_to_work:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var start_date = $("#textbox1").val()?$("#textbox1").val():'';
		    var driver_license = $('.driver_license').is(':checked')?$('.driver_license').val():'';
		  	var vehicle = $('.vehicle').is(':checked') ? $('.vehicle').val(): '';
		    var available = $('.available_on_short_notice').is('.checked')?$('.available_on_short_notice').val():'';

				$.ajax({
					type:"get",
					url:"<?php echo site_url();?>senior_caregiver/search",
					data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&gender="+gender+"&language="+lang+"&observance="+observance+"&min_exp="+min_exp+"&availability="+availability+"&care_type="+care_type+"&carelocation="+carelocations+"&trainings="+trainings+"&able_to_work="+able_to_work+"&driver_license="+driver_license+"&vehicle="+vehicle+"&available="+available+"&start_date="+start_date,
					success:function(done){
							$(".searchloader").fadeOut("fast");
							var json = jQuery.parseJSON(done);
 							var pagenum = json.num;
 							var pagedata = json.userdatas;
							$('#list_container').html(pagedata);
							$('#total').text(json.total);
					}
				});
            }       
         });				
	// onpress esc key hide the loader
		$(document).on('keyup',function(evt) {
		    if (evt.keyCode == 27) {
		       $(".searchloader").fadeOut("fast");
		    }
		});
        
         $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();

       if($('#chkbox1').is(':checked')){
            $("#textbox1").show();
       }else{
            //$("#textbox1").hide();
            $('#textbox1').val('');
       }

        $("#chkbox1").change(function(){
            if($('#chkbox1').is(':checked')){
                $("#textbox1").show();   
            }else{
                //$("#textbox1").hide(); 
                $('#textbox1').val('');       
            }
        });
	});
</script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/><!--for datepicker-->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script><!--for datepicker-->
<script type="text/javascript">
	$(document).ready(function(){
	var $myDialog = $('<div></div>')
    .html('Are you sure you want to save this search?')
    .dialog({
    autoOpen: false,
    title: 'Save Search',
    buttons: {
      "OK": function () {
      	$(this).dialog("close");

			var neighbour = $('.neighbour').val();
            var caregiverage_from = $('.caregiverage_from').val();
            var caregiverage_to = $('.caregiverage_to').val();
            var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
            var lang = $('.lang:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var observance = $('.observance:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var subjects = $('.subjects:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var min_exp = $('.year_experience').val();
		    var availability = $('.availability:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var carelocations = $('.carelocation:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var trainings = $('.training:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var able_to_work = $('.able_to_work:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var start_date = $("#textbox1").val()?$("#textbox1").val():'';
		    var driver_license = $('.driver_license').is(':checked')?$('.driver_license').val():'';
		  	var vehicle = $('.vehicle').is(':checked') ? $('.vehicle').val(): '';
		    var available = $('.available_on_short_notice').is('.checked')?$('.available_on_short_notice').val():'';
	    	var care_type = $( "#care_type" ).val();

		    	$.ajax({
			    		type:"post",
			    		url:"<?php echo site_url();?>senior_caregiver/savesearch",
			    		data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&gender="+gender+"&language="+lang+"&observance="+observance+"&min_exp="+min_exp+"&availability="+availability+"&care_type="+care_type+"&carelocation="+carelocations+"&trainings="+trainings+"&able_to_work="+able_to_work+"&driver_license="+driver_license+"&vehicle="+vehicle+"&available="+available+"&start_date="+start_date,
			    		success:function(done){
			    			console.log(done);
			    		}
	    		});
      	},
      "Cancel": function () {
        $(this).dialog("close");
        return false;
      }
    }
  });

		var $myDialog2 = $('<div></div>')
    .html('Please login to save searches')
    .dialog({
    autoOpen: false,
    title: 'Save Search',
    buttons: {
      "OK": function () {
        $(this).dialog("close");
        window.location = "<?php echo site_url();?>login";
      },
      "Cancel": function () {
        $(this).dialog("close");
        return false;
      }
    }
  });
  
	$('.searchs').click(function(e){
		e.preventDefault();
		var site_url = "<?php echo site_url();?>";
        var user_id = "<?php echo check_user(); ?>";
        if(user_id != "")        
            return $myDialog.dialog('open'); //replace the div id with the id of the button/form
        else
            return $myDialog2.dialog('open');
        });

 });
</script>
