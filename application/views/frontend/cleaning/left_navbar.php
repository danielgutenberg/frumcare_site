<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo $this->uri->segment(1) == 'caregivers' && $this->uri->segment(2) == 'workers-for-cleaning-company' ? 'Workers for Cleaning Company' : 'Cleaning / household help';?></h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
 			<div class="select-services careType">
	 			<label>Choose a Care Type</label>
 				<?php $this->load->view('frontend/common/left_nav_title')?>
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
            
            <div id="smoker">
	 			<label>Smoker</label>
	 			<div class="radio-half"><input type="radio" name="smoker" value="1" class="smoker"> Yes</div>
	 			<div class="radio-half"><input type="radio" name="smoker" value="2" class="smoker"> No</div>
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
	 			<div class="checkbox"><input type="checkbox" value="Yeshivish/Chasidish" name="observance[]" class="observance">Yeshivish / Chasidish</div>
	 			<div class="checkbox"><input type="checkbox" value="Orthodox/Modern orthodox" name="observance[]" class="observance">Orthodox / Modern orthodox</div>	 			
	 			<div class="checkbox"><input type="checkbox" value="Familiar with Jewish Tradition" name="observance[]" class="observance">Familiar with Jewish Tradition</div>
	 			<div class="checkbox"><input type="checkbox" value="Any" name="observance[]" class=" observance">Any</div>	 			
	 		</div>

	 		<div>
 				<label>For Work in</label>
 				<div class="checkbox"><input type="checkbox" name="carelocation" class="carelocation" value="Private Home">Private Home</div>
 				<div class="checkbox"><input type="checkbox" name="carelocation" class="carelocation" value="Business / Office">Business / Office</div>
                 <div class="checkbox"><input type="checkbox" name="carelocation" class="carelocation" value="Cleaning Company" <?php echo $this->uri->segment(1) == 'caregivers' && ($this->uri->segment(2)=='workers-for-cleaning-company' || $this->uri->segment(3)=='workers-for-cleaning-company')?'checked':'' ?>>Cleaning Company</div> 				
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
		 		<label>When you need help (check one or more)</label>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="One Time">One Time</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Immediate">Immediate</div>
		 		<div class="checkbox full"><input type="checkbox" id="chkbox1" value="Start Date">Start Date<input type="text" id="textbox1"/></div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Occasionally">Occasionally</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Regularly">Regularly</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Morning">Morning</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Afternoon">Afternoon</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Evening">Evening</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Weekends Fri/Sun">Weekends Fri / Sun</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Saturday">Saturday</div>
		 	</div>

		 	<div>
		 		<label>Skills</label>
		 		<div class="checkbox"><input type="checkbox" class="skills" name="skills" value="Dishes">Dishes</div>
		 		<div class="checkbox"><input type="checkbox" class="skills" name="skills" value="Floors">Floors</div>
		 		<div class="checkbox"><input type="checkbox" class="skills" name="skills" value="Windows">Windows</div>
		 		<div class="checkbox"><input type="checkbox" class="skills" name="skills" value="Laundry">Laundry</div>
		 		<div class="checkbox"><input type="checkbox" class="skills" name="skills" value="Folding">Folding</div>
                <div class="checkbox"><input type="checkbox" class="skills" name="skills" value="Ironing">Ironing</div>
		 		<div class="checkbox"><input type="checkbox" class="skills" name="skills" value="Cleaning and dusting furniture">Cleaning and dusting furniture</div>
		 		<div class="checkbox"><input type="checkbox" class="skills" name="skills" value="Cleaning refrigerator/ freezer">Cleaning refrigerator / freezer</div>
		 		<div class="checkbox"><input type="checkbox" class="skills" name="skills" value="Cleaning Oven/ stove">Cleaning Oven / stove</div>
		 		<div class="checkbox"><input type="checkbox" value="Pesach Cleaning" name="willing_to_work[]"><span>Pesach Cleaning</span></div>
		 		<div class="checkbox"><input type="checkbox" class="skills" name="skills" value="Able to watch children as well">Able to watch children as well</div>
		 	</div>

	 		<div>
		 		<div class="educationss" colspan="2">
		 		<input type="hidden" name="category" value="" id="care_type">
			 		<div colspan="2" class="search-btns">
				 		<input type="submit" class="btn btn-primary searchs" data-toggle="tooltip" data-placement="left" title="Save your search. Setup email alerts and be the first to see new profiles that have your search criteria." value="Save this Search" name="searchs">
				 	</div>

			</form>
		</div>
</div>	 
	  </div>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
<script>
	$(document).ready(function(){
		var care_type = $( ".careType option:selected" ).val();
			$('#care_type').val(care_type);
		$('.service').change(function(){
			$('#care_type').val($(this).val());
            var pagelink = $(this).find("option:selected").text();
            
            if(pagelink == 'Nanny / Au-pair')
                var locationaddress = 'nanny';
            if(pagelink == 'Babysitter')
                var locationaddress = 'babysitter';
            if(pagelink == 'Nursery / Playgroup / Drop off / Gan')
                var locationaddress = 'nursery';
            if(pagelink == 'Tutor / Private lessons')
                var locationaddress = 'tutor';
             if(pagelink == 'Senior Caregiver')
                var locationaddress = 'senior_caregiver';
            if(pagelink == 'Special needs caregiver')
                var locationaddress = 'special_needs_caregiver';
            if(pagelink == 'Therapist')
                var locationaddress = 'therapists';
            if(pagelink == 'Cleaning / household help')
                var locationaddress = 'cleaning';
            if(pagelink == 'Errand runner / odd jobs / personal assistant / driver')
                var locationaddress = 'errand_runner';
                            
            if(pagelink == 'Day Care Center / Day Camp / Afternoon Activities')
                var locationaddress = 'daycarecenter';

            if(pagelink == 'Senior Care Agency')
                var locationaddress = 'seniorcareagency';

            if(pagelink == 'Special needs center')
                var locationaddress = 'specialneedscenter';

            if(pagelink == 'Cleaning / household help company')
            	var locationaddress = 'cleaninghousehold';

            if(pagelink == 'Assisted living / Senior Care Center / Nursing Home')
            	var locationaddress = 'seniorcarecenter';
             if(pagelink == 'Workers / Staff for childcare facility')
                var locationaddress = 'careseeker_childcarefacility';
            if(pagelink == 'Workers / Staff for senior care facility')
                var locationaddress = 'careseeker_seniorcarefacility';
            if(pagelink == 'Workers / Staff for special needs facility')
                var locationaddress = 'careseeker_specialneedsfacility';
             if(pagelink == 'Workers for cleaning company')
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

		    var skills = $('.skills:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    var min_exp = $('.year_experience').val();
		    var availability = $('.availability:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
		    var driver_license = $('.driver_license').is(':checked')?$('.driver_license').val():'';
		    var vehicle = $('.vehicle').is(':checked') ? $('.vehicle').val(): '';
		    var available = $('.available_on_short_notice').is('.checked')?$('.available_on_short_notice').val():'';
			var start_date = $("#textbox1").val()?$("#textbox1").val():'';
            	$.ajax({
					type:"get",
					url:"<?php echo site_url();?>cleaning/search",
					data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&gender="+gender+"&language="+lang+"&observance="+observance+"&min_exp="+min_exp+"&availability="+availability+"&care_type="+care_type+"&carelocation="+carelocations+"&skills="+skills+"&driver_license="+driver_license+"&vehicle="+vehicle+"&available="+available+"&start_date="+start_date+"&smoker="+smoker,
					success:function(done){
							$(".searchloader").fadeOut("fast");
							var json = jQuery.parseJSON(done);
 							var pagenum = json.num;
 							var pagedata = json.userdatas;
							$('#list_container').html(pagedata);
							$('#total').text(json.total);
                            $('.navigations').html(json.pagination);
					}
				});

		});        
        
		// onclick
		$('.gender,.skills,.lang,.observance,.availability,.carelocation,.smoker,.driver_license,.vehicle,.available_on_short_notice,.training').click(function(){
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

		   var skills = $('.skills:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    
            var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
		    var driver_license = $('.driver_license').is(':checked')?$('.driver_license').val():'';
		    var vehicle = $('.vehicle').is(':checked') ? $('.vehicle').val(): '';
		    var available = $('.available_on_short_notice').is('.checked')?$('.available_on_short_notice').val():'';
            var start_date = $("#textbox1").val()?$("#textbox1").val():'';
				$.ajax({
					type:"get",
					url:"<?php echo site_url();?>cleaning/search",
					data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&gender="+gender+"&language="+lang+"&observance="+observance+"&min_exp="+min_exp+"&availability="+availability+"&care_type="+care_type+"&carelocation="+carelocations+"&driver_license="+driver_license+"&vehicle="+vehicle+"&available="+available+"&start_date="+start_date+"&skills="+skills+"&smoker="+smoker,
					success:function(done){
							$(".searchloader").fadeOut("fast");
							var json = jQuery.parseJSON(done);
 							var pagenum = json.num;
 							var pagedata = json.userdatas;
							$('#list_container').html(pagedata);
							$('#total').text(json.total);
                            $('.navigations').html(json.pagination);
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
             var skills = $('.skills:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

		    //var trainings = $('.training:checked').map(function(_, el) {
//		        return $(el).val();
//		    }).get();

		    var able_to_work = $('.able_to_work:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            
            var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
		    var driver_license = $('.driver_license').is(':checked')?$('.driver_license').val():'';
		  	var vehicle = $('.vehicle').is(':checked') ? $('.vehicle').val(): '';
		    var available = $('.available_on_short_notice').is('.checked')?$('.available_on_short_notice').val():'';
            var start_date = $("#textbox1").val()?$("#textbox1").val():'';
				$.ajax({
					type:"get",
					url:"<?php echo site_url();?>cleaning/search",
					data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&gender="+gender+"&language="+lang+"&observance="+observance+"&min_exp="+min_exp+"&availability="+availability+"&care_type="+care_type+"&carelocation="+carelocations+"&driver_license="+driver_license+"&vehicle="+vehicle+"&available="+available+"&start_date="+start_date+"&skills="+skills+"&smoker="+smoker,
					success:function(done){
							$(".searchloader").fadeOut("fast");
							var json = jQuery.parseJSON(done);
 							var pagenum = json.num;
 							var pagedata = json.userdatas;
							$('#list_container').html(pagedata);
							$('#total').text(json.total);
                            $('.navigations').html(json.pagination);
					}
				});
		});
        //$("#textbox1").hide();
         $("#chkbox1").click(function(){
            if($('#chkbox1').is(':checked')){
                $("#textbox1").show();
                $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();   
            }else{
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
            
		    var able_to_work = $('.able_to_work:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
             var skills = $('.skills:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
		    var driver_license = $('.driver_license').is(':checked')?$('.driver_license').val():'';
		  	var vehicle = $('.vehicle').is(':checked') ? $('.vehicle').val(): '';
		    var available = $('.available_on_short_notice').is('.checked')?$('.available_on_short_notice').val():'';
            var start_date = $("#textbox1").val()?$("#textbox1").val():'';
				$.ajax({
					type:"get",
					url:"<?php echo site_url();?>cleaning/search",
					data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&gender="+gender+"&language="+lang+"&observance="+observance+"&min_exp="+min_exp+"&availability="+availability+"&care_type="+care_type+"&carelocation="+carelocations+"&driver_license="+driver_license+"&vehicle="+vehicle+"&available="+available+"&start_date="+start_date+"&skills="+skills+"&smoker="+smoker,
					success:function(done){
							$(".searchloader").fadeOut("fast");
							var json = jQuery.parseJSON(done);
 							var pagenum = json.num;
 							var pagedata = json.userdatas;
							$('#list_container').html(pagedata);
							$('#total').text(json.total);
                            $('.navigations').html(json.pagination);
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
            
		    var able_to_work = $('.able_to_work:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
             var skills = $('.skills:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
		    var driver_license = $('.driver_license').is(':checked')?$('.driver_license').val():'';
		  	var vehicle = $('.vehicle').is(':checked') ? $('.vehicle').val(): '';
		    var available = $('.available_on_short_notice').is('.checked')?$('.available_on_short_notice').val():'';
            var start_date = $("#textbox1").val()?$("#textbox1").val():'';
            var care_type = $( ".careType option:selected" ).val();

            $.ajax({
            	type : "post",
            	url  : "<?php echo site_url();?>cleaning/savesearch",
            	data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&gender="+gender+"&language="+lang+"&observance="+observance+"&min_exp="+min_exp+"&availability="+availability+"&care_type="+care_type+"&carelocation="+carelocations+"&driver_license="+driver_license+"&vehicle="+vehicle+"&available="+available+"&start_date="+start_date+"&skills="+skills+"&smoker="+smoker,
            	success:function(msg){
            		//console.log(msg);
                    alert('Search saved');
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
        window.location = '<?php echo site_url()?>login?url='+ btoa('<?php echo uri_string(); ?>');
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