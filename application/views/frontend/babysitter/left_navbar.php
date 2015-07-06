<?php echo $this->breadcrumbs->show(); ?>			
            <h3>                
                <?php
                if(segment(1) == 'caregivers' && segment(2) == 'workers-staff-for-childcare-facility' ) {
                    echo "Workers / Staff for childcare facility";
                }
                elseif(segment(1) == 'caregivers' && (segment(2) == 'all' || segment(2) == '' ) ) {
                    echo "Caregivers";
                }
                else if(segment(1) == 'caregivers' && segment(2) == 'organizations'){
                	echo 'Workers / Staff';
                } 
                elseif(segment(1) == 'caregivers' && segment(2) == 'organizations' && (segment(3) == 'all' || segment(3) == '')  ) {
                    echo "Caregiver Organizations";
                }
               
                else {
                    echo "Babysitter";
                } ?>
            </h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		<?php 
	 			$cat = $this->uri->segment(2)?$this->uri->segment(2):'';

	 		?>
 			<div>
	 			<label>Age of Caregiver</label>
	 			<div>
	 			<input type="text" name="caregiverage_from" value="" placeholder="FROM" style="width:33%" class="caregiverage_from"> to  
	 			<input type="text" name="caregiverage_to" value="" placeholder="TO" style="width:33%" class="caregiverage_to">
	 			</div>
	 		</div>

	 		<div>
	 			<label>Gender of caregiver</label>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="1" class="gender"> Male</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="2" class="gender"> Female</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="3" class="gender"> Any</div>
	 		</div>

	 		<div id="smoker">
	 			<label>Smoker</label>
	 			<div class="radio-half"><input type="radio" name="smoker" value="1" class="smoker"> Yes</div>
	 			<div class="radio-half"><input type="radio" name="smoker" value="2" class="smoker"> No</div>
	 		</div>

	 		<div>
	 			<label>Languages</label>
	 			<div class="checkbox first"><input type="checkbox" name="languages[]" value="English" class="lang"> English</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Yiddish" class="lang"> Yiddish</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Hebrew" class="lang"> Hebrew</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Russian" class="lang"> Russian</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="French" class="lang"> French</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Other" class="lang"> Other</div>
	 		</div>
	 		<div>
	 			<label>Level of observance</label>
	 			<div class="checkbox first"><input type="checkbox" value="Yeshivish/ Chasidish" name="observance[]" class="hidefamiliar observance">Yeshivish / Chasidish</div>
	 			<div class="checkbox"><input type="checkbox" value="Orthodox/ Modern orthodox" name="observance[]" class="hidefamiliar observance">Orthodox / Modern orthodox</div>
	 			<div class="checkbox"><input type="checkbox" value="Familiar with Jewish Tradition" name="observance[]" class="show observance">Familiar with Jewish Tradition</div>
	 			<?php /*<div class="checkbox"><input type="checkbox" value="Not Jewish" name="observance[]" class="show observance">Not Jewish</div> */?>
	 			<div class="checkbox"><input type="checkbox" value="Any" name="observance[]" class="hidefamiliar observance">Any</div>
	 			<?php /*<div class="familarsection"></div>*/?>
	 		</div>
            
            <div>
	 			<label>Care Location</label>
	 			<div class="checkbox first"><input type="checkbox" value="Child's home" class="looking_to_work">Child's home</div>
	 			<div class="checkbox"><input type="checkbox" value="My home" class="looking_to_work">Caregivers home</div>
                <div class="checkbox"><input type="checkbox" value="Caregiving institution" class="looking_to_work" <?php echo ($this->uri->segment(1)=='caregivers' && ($this->uri->segment(2)=='workers-staff-for-childcare-facility' || $this->uri->segment(2)=='organizations'  || $this->uri->segment(3) == 'workers-staff-for-childcare-facility') )?'checked':'' ?> >Caregiving institution</div>
	 			<div class="checkbox"><input type="checkbox" value="Mother's helper" class="looking_to_work">Mother's helper</div>
	 		</div>
            
	 		<div>
	 			<label>Number of children requiring care</label>
	 			<select name="number_of_children" class="number_of_children">
	 				<option value="">--select--</option>
	 				<option value="1">1</option>
	 				<option value="2">2</option>
	 				<option value="3">3</option>
	 				<option value="4">4</option>
	 				<option value="5">5</option>
	 				<option value="6">5+</option>
	 			</select>
	 		</div>
	 		<div>
	 			<label></label>
	 			<div class="checkbox first"><input type="checkbox" value="twins" name="optional_number[]" class="morenum">Twins</div>
	 			<div class="checkbox"><input type="checkbox" value="triplets" name="optional_number[]" class="morenum">Triplets</div>
	 		</div>

	 		<div>
	 			<label>Age of children requiring care</label>
	 			<div class="checkbox first"><input type="checkbox" value="0-3" name="age_group[]" class="age_group"> 0-3 months</div>
                <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]" class="age_group"> 3-6 months</div>
                <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]" class="age_group"> 6-12 months</div>                
                <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]"  class="age_group"> 1 to 3 years</div>
                <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]"  class="age_group"> 3 to 5 years</div>
                <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]"  class="age_group"> 6 to 11 years</div>
                <div class="checkbox"><input type="checkbox" value="13" name="age_group[]"  class="age_group"> 12+ years</div>
	 		</div>
            
	 		<div class="year-exp">
		 		<span>Minimum Experience</span>
		 			<select name="year_experience" class="required year_experience">
		 			<option value="">--select--</option>
		 				<option value="1">1 year</option>	
		 				<option value="2">2 years</option>	
		 				<option value="3">3 years</option>	
		 				<option value="4">4 years</option>	
		 				<option value="6">5+ years</option>	
		 			</select>
		 	</div>
		 	<div>
		 		<label>Training</label>
		 		<div class="checkbox first"><input type="checkbox" class="training" value="CPR">CPR</div>
		 		<div class="checkbox"><input type="checkbox" class="training" value="First Aid">First Aid</div>
		 		<div class="checkbox"><input type="checkbox" class="training" value="Nanny/ Babysitter Course">Nanny / Babysitter Course</div>
		 		<div class="checkbox"><input type="checkbox" class="training" value="Other">Other</div>
		 	</div>
		 	<div>
		 		<label>When you need care</label>
		 		<div class="checkbox first"><input type="checkbox" class="availability" value="Immediate">Immediate</div>
		 		<div class="checkbox full"><input type="checkbox" id="chkbox1" value="Start Date">Start Date<input type="text" id="textbox1"/></div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Occassionally">Occasionally</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Regularly">Regularly</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Morning">Morning</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Afternoon">Afternoon</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Evening">Evening</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Night Nurse">Night Nurse</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Weekends Fri/Sun">Weekends Fri / Sun</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Shabbos">Shabbos</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Vacation Sitter">Vacation Sitter</div>
		 	</div>
		 	<div>
		 		<label>Abilities and skills</label>
		 		<div class="checkbox first"><input type="checkbox" class="driver_license" value="1">Drivers License</div>
		 		<div class="checkbox full"><input type="checkbox" class="vehicle" value="1">Vehicle</div>
		 		<div class="checkbox"><input type="checkbox" class="pick_up_child" value="1">Able to pick up kids from school</div>
		 		<div class="checkbox"><input type="checkbox" class="cook" value="1">Able to cook and prepare food</div>
		 		<div class="checkbox"><input type="checkbox" class="basic_housework" value="1">Able to do light housework / cleaning</div>
		 		<div class="checkbox"><input type="checkbox" class="homework_help" value="1">Able to help with homework</div>
		 		<div class="checkbox"><input type="checkbox" class="sick_child_care" value="1">Able to care for sick child</div>
		 		<div class="checkbox"><input type="checkbox" class="on_short_notice" value="1">Available on short notice</div>

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
	   var url = $(location).attr('href').split("/").splice(0, 5).join("/");       
		var care_type = $( ".service option:selected" ).val();
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
                var locationaddress = 'organizations/careseeker_childcarefacility';
            if(pagelink == 'Workers / Staff for senior care facility')
                var locationaddress = 'organizations/careseeker_seniorcarefacility';
            if(pagelink == 'Workers / Staff for special needs facility')
                var locationaddress = 'organizations/careseeker_specialneedsfacility';
             if(pagelink == 'Workers for cleaning company')
                var locationaddress = 'organizations/careseeker_cleaningcompany';
            if(pagelink == '--select--')
            	var locationaddress = 'caregivers';

                
            location.href = '<?php echo site_url();?>'+locationaddress;                
		});
        
        $('.neighbour,.caregiverage_from,.caregiverage_to').blur(function(){
            var neighbour = $('.neighbour').val();
			var gender = $('.gender').is(':checked') ? $('input[name=gender_of_caregiver]:checked').val():'';
            var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
            var lang = $('.lang:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var observance = $('.observance:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var number_of_children = $('.number_of_children').val();
            var morenum = $('.morenum:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var age_group = $('.age_group:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var looking_to_work = $('.looking_to_work:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var year_experience = $('.year_experience').val();
            var driver_license = $('.driver_license').is(':checked') ? $('.driver_license').val() : ''; 
            var vehicle = $('.vehicle').is(':checked') ? $('.vehicle').val(): '';
            var pick_up_child = $('.pick_up_child').is(':checked') ? $('.pick_up_child').val() : '';
            var cook = $('.cook').is(':checked') ? $('.cook').val():'';
            var basic_housework = $('.basic_housework').is(':checked') ? $('.basic_housework').val() :'';
            var homework_help = $('.homework_help').is(':checked') ? $('.homework_help').val() :'';
            var on_short_notice = $('.on_short_notice').is(':checked') ? $('.on_short_notice').val():'';
            var caregiverage_from  = $('.caregiverage_from').val();
            var caregiverage_to = $('.caregiverage_to').val();
            var start_date = $("#textbox1").val()?$("#textbox1").val():'';
            var care_type = $( ".select-services option:selected" ).val();
            var training = $('.training:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
		    var sickChild = $('.sick_child_care').is(':checked') ? $('.sick_child_care').val():'';

        	
			$(".searchloader").fadeIn("fast");
			var availability = $('.availability:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            
			$.ajax({
				type:"get",
				url:"<?php echo site_url();?>babysitter/search",
				data:"availability="+availability+"&training="+training+"&sick_child_care="+sickChild+"&neighbour="+neighbour+"&gender="+gender+"&smoker="+smoker+"&lang="+lang+"&observance="+observance+"&number_of_children="+number_of_children+"&morenum="+morenum+"&age_group="+age_group+"&looking_to_work="+looking_to_work+"&year_experience="+year_experience+"&driver_license="+driver_license+"&vehicle="+vehicle+"&pick_up_child="+pick_up_child+"&cook="+cook+"&basic_housework="+basic_housework+"&homework_help="+homework_help+"&on_short_notice="+on_short_notice+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&start_date="+start_date+"&care_type="+care_type,
				success:function(message){
						$(".searchloader").fadeOut("fast");
						var json = jQuery.parseJSON(message);
		 				var pagenum = json.num;
		 				var pagedata = json.userdatas;
						$('#list_container').html(pagedata);
						$('#total').text(json.total);
                        $('.navigations').html(json.pagination);
				}
			});
		});        
        
        $('.number_of_children,.year_experience,.age_group,#textbox1').change(function(){
		$(".searchloader").fadeIn("fast");
			var care_type = $( ".select-services option:selected" ).val();
			var neighbour = $('.neighbour').val();
			var gender = $('.gender').is(':checked') ? $('input[name=gender_of_caregiver]:checked').val():'';
            var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
            var lang = $('.lang:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var observance = $('.observance:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var number_of_children = $('.number_of_children').val();
            var morenum = $('.morenum:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var age_group = $('.age_group:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var looking_to_work = $('.looking_to_work:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var year_experience = $('.year_experience').val();
            var driver_license = $('.driver_license').is(':checked') ? $('.driver_license').val() : ''; 
            var vehicle = $('.vehicle').is(':checked') ? $('.vehicle').val(): '';
            var pick_up_child = $('.pick_up_child').is(':checked') ? $('.pick_up_child').val() : '';
            var cook = $('.cook').is(':checked') ? $('.cook').val():'';
            var basic_housework = $('.basic_housework').is(':checked') ? $('.basic_housework').val() :'';
            var homework_help = $('.homework_help').is(':checked') ? $('.homework_help').val() :'';
            var on_short_notice = $('.on_short_notice').is(':checked') ? $('.on_short_notice').val():'';
            var caregiverage_from  = $('.caregiverage_from').val();
            var caregiverage_to = $('.caregiverage_to').val();
            var start_date = $("#textbox1").val()?$("#textbox1").val():'';
            var training = $('.training:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
		    var sickChild = $('.sick_child_care').is(':checked') ? $('.sick_child_care').val():'';

        	
			
			var availability = $('.availability:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            
			$.ajax({
				type:"get",
				url:"<?php echo site_url();?>babysitter/search",
				data:"availability="+availability+"&training="+training+"&sick_child_care="+sickChild+"&neighbour="+neighbour+"&gender="+gender+"&smoker="+smoker+"&lang="+lang+"&observance="+observance+"&number_of_children="+number_of_children+"&morenum="+morenum+"&age_group="+age_group+"&looking_to_work="+looking_to_work+"&year_experience="+year_experience+"&driver_license="+driver_license+"&vehicle="+vehicle+"&pick_up_child="+pick_up_child+"&cook="+cook+"&basic_housework="+basic_housework+"&homework_help="+homework_help+"&on_short_notice="+on_short_notice+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&start_date="+start_date+"&care_type="+care_type,
				success:function(message){
						$(".searchloader").fadeOut("fast");
						var json = jQuery.parseJSON(message);
		 				var pagenum = json.num;
		 				var pagedata = json.userdatas;
						$('#list_container').html(pagedata);
						$('#total').text(json.total);
                        $('.navigations').html(json.pagination);
				}
			});
		});
              
		$('.gender,.smoker,.lang,.observance,.homework_help,.on_short_notice,.sick_child_care,.morenum,.basic_housework,.vehicle,.looking_to_work,.year_experience,.training,.availability,.driver_license,.pick_up_child,.cook').click(function(){
            $(".searchloader").fadeIn("fast");			
            var care_type = $( ".select-services option:selected" ).val();
            var neighbour = $('.neighbour').val();
			var gender = $('.gender').is(':checked') ? $('input[name=gender_of_caregiver]:checked').val():'';
            var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
            var lang = $('.lang:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var observance = $('.observance:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var number_of_children = $('.number_of_children').val();
            var morenum = $('.morenum:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var age_group = $('.age_group:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var looking_to_work = $('.looking_to_work:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
		    var training = $('.training:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var year_experience = $('.year_experience').val();
            var driver_license = $('.driver_license').is(':checked') ? $('.driver_license').val() : ''; 
            var vehicle = $('.vehicle').is(':checked') ? $('.vehicle').val(): '';
            var pick_up_child = $('.pick_up_child').is(':checked') ? $('.pick_up_child').val() : '';
            var cook = $('.cook').is(':checked') ? $('.cook').val():'';
            var basic_housework = $('.basic_housework').is(':checked') ? $('.basic_housework').val() :'';
            var homework_help = $('.homework_help').is(':checked') ? $('.homework_help').val() :'';
            var on_short_notice = $('.on_short_notice').is(':checked') ? $('.on_short_notice').val():'';
            var caregiverage_from  = $('.caregiverage_from').val()?$('.caregiverage_from').val():'';
            var caregiverage_to = $('.caregiverage_to').val()?$('.caregiverage_to').val():'';
            var start_date = $("#textbox1").val()?$("#textbox1").val():'';
            var sickChild = $('.sick_child_care').is(':checked') ? $('.sick_child_care').val():'';

        	
			
			var availability = $('.availability:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            
			$.ajax({
				type:"get",
				url:"<?php echo site_url();?>babysitter/search",
				data:"availability="+availability+"&training="+training+"&sick_child_care="+sickChild+"&neighbour="+neighbour+"&gender="+gender+"&smoker="+smoker+"&lang="+lang+"&observance="+observance+"&number_of_children="+number_of_children+"&morenum="+morenum+"&age_group="+age_group+"&looking_to_work="+looking_to_work+"&year_experience="+year_experience+"&driver_license="+driver_license+"&vehicle="+vehicle+"&pick_up_child="+pick_up_child+"&cook="+cook+"&basic_housework="+basic_housework+"&homework_help="+homework_help+"&on_short_notice="+on_short_notice+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&start_date="+start_date+"&care_type="+care_type,
				success:function(message){
						$(".searchloader").fadeOut("fast");
						var json = jQuery.parseJSON(message);
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
                //$("#textbox1").hide(); 
                $('#textbox1').val('');
                 $(".searchloader").fadeIn("fast");

			var neighbour = $('.neighbour').val();
			var gender = $('.gender').is(':checked') ? $('input[name=gender_of_caregiver]:checked').val():'';
            var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
            var lang = $('.lang:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var observance = $('.observance:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var number_of_children = $('.number_of_children').val();
            var morenum = $('.morenum:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var age_group = $('.age_group:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var looking_to_work = $('.looking_to_work:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var year_experience = $('.year_experience').val();
            var driver_license = $('.driver_license').is(':checked') ? $('.driver_license').val() : ''; 
            var vehicle = $('.vehicle').is(':checked') ? $('.vehicle').val(): '';
            var pick_up_child = $('.pick_up_child').is(':checked') ? $('.pick_up_child').val() : '';
            var cook = $('.cook').is(':checked') ? $('.cook').val():'';
            var basic_housework = $('.basic_housework').is(':checked') ? $('.basic_housework').val() :'';
            var homework_help = $('.homework_help').is(':checked') ? $('.homework_help').val() :'';
            var on_short_notice = $('.on_short_notice').is(':checked') ? $('.on_short_notice').val():'';
            var caregiverage_from  = $('.caregiverage_from').val()?$('.caregiverage_from').val():'';
            var caregiverage_to = $('.caregiverage_to').val()?$('.caregiverage_to').val():'';
            var start_date = $("#textbox1").val()?$("#textbox1").val():'';
            var care_type = $( ".select-services option:selected" ).val();
            var training = $('.training:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            
			var sickChild = $('.sick_child_care').is(':checked') ? $('.sick_child_care').val():'';

        	
			
			var availability = $('.availability:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            
			$.ajax({
				type:"get",
				url:"<?php echo site_url();?>babysitter/search",
				data:"availability="+availability+"&training="+training+"&sick_child_care="+sickChild+"&neighbour="+neighbour+"&gender="+gender+"&smoker="+smoker+"&lang="+lang+"&observance="+observance+"&number_of_children="+number_of_children+"&morenum="+morenum+"&age_group="+age_group+"&looking_to_work="+looking_to_work+"&year_experience="+year_experience+"&driver_license="+driver_license+"&vehicle="+vehicle+"&pick_up_child="+pick_up_child+"&cook="+cook+"&basic_housework="+basic_housework+"&homework_help="+homework_help+"&on_short_notice="+on_short_notice+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&start_date="+start_date+"&care_type="+care_type,
				success:function(message){
						$(".searchloader").fadeOut("fast");
						var json = jQuery.parseJSON(message);
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


<script>
$(document).ready(function () {
  var neighbour = $('.neighbour').val();
			var gender = $('.gender').is(':checked') ? $('input[name=gender_of_caregiver]:checked').val():'';
            var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
            var lang = $('.lang:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var observance = $('.observance:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var number_of_children = $('.number_of_children').val();
            var morenum = $('.morenum:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var age_group = $('.age_group:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var looking_to_work = $('.looking_to_work:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var year_experience = $('.year_experience').val();
            var driver_license = $('.driver_license').is(':checked') ? $('.driver_license').val() : ''; 
            var vehicle = $('.vehicle').is(':checked') ? $('.vehicle').val(): '';
            var pick_up_child = $('.pick_up_child').is(':checked') ? $('.pick_up_child').val() : '';
            var cook = $('.cook').is(':checked') ? $('.cook').val():'';
            var basic_housework = $('.basic_housework').is(':checked') ? $('.basic_housework').val() :'';
            var homework_help = $('.homework_help').is(':checked') ? $('.homework_help').val() :'';
            var on_short_notice = $('.on_short_notice').is(':checked') ? $('.on_short_notice').val():'';
            var caregiverage_from  = $('.caregiverage_from').val()?$('.caregiverage_from').val():'';
            var caregiverage_to = $('.caregiverage_to').val()?$('.caregiverage_to').val():'';
            var start_date = $("#textbox1").val()?$("#textbox1").val():'';
            var care_type = $( ".select-services option:selected" ).val();
            var training = $('.training:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var sickChild = $('.sick_child_care').is(':checked') ? $('.sick_child_care').val():'';

        	
			
			var availability = $('.availability:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            
			$.ajax({
				type:"get",
				url:"<?php echo site_url();?>babysitter/search",
				data:"availability="+availability+"&training="+training+"&sick_child_care="+sickChild+"&neighbour="+neighbour+"&gender="+gender+"&smoker="+smoker+"&lang="+lang+"&observance="+observance+"&number_of_children="+number_of_children+"&morenum="+morenum+"&age_group="+age_group+"&looking_to_work="+looking_to_work+"&year_experience="+year_experience+"&driver_license="+driver_license+"&vehicle="+vehicle+"&pick_up_child="+pick_up_child+"&cook="+cook+"&basic_housework="+basic_housework+"&homework_help="+homework_help+"&on_short_notice="+on_short_notice+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&start_date="+start_date+"&care_type="+care_type,
				success:function(message){
						$(".searchloader").fadeOut("fast");
						var json = jQuery.parseJSON(message);
		 				var pagenum = json.num;
		 				var pagedata = json.userdatas;
						$('#list_container').html(pagedata);
						$('#total').text(json.total);
                        $('.navigations').html(json.pagination);
				}
			});
  
  
  
  var $myDialog = $('<div></div>')
    .html('Are you sure you want to save this search?')
    .dialog({
    autoOpen: false,
    title: 'Save Search',
    buttons: {
      "OK": function () {
        $(this).dialog("close");
 	       var neighbour = $('.neighbour').val();
    		var gender = $('.gender').is(':checked') ? $('input[name=gender_of_caregiver]:checked').val():'';
            var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
            var lang = $('.lang:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var observance = $('.observance:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var number_of_children = $('.number_of_children').val();
            var morenum = $('.morenum:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var age_group = $('.age_group:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var looking_to_work = $('.looking_to_work:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var year_experience = $('.year_experience').val();
            var driver_license = $('.driver_license').is(':checked') ? $('.driver_license').val() : ''; 
            var vehicle = $('.vehicle').is(':checked') ? $('.vehicle').val(): '';
            var pick_up_child = $('.pick_up_child').is(':checked') ? $('.pick_up_child').val() : '';
            var cook = $('.cook').is(':checked') ? $('.cook').val():'';
            var basic_housework = $('.basic_housework').is(':checked') ? $('.basic_housework').val() :'';
            var homework_help = $('.homework_help').is(':checked') ? $('.homework_help').val() :'';
            var on_short_notice = $('.on_short_notice').is(':checked') ? $('.on_short_notice').val():'';
            var caregiverage_from  = $('.caregiverage_from').val()?$('.caregiverage_from').val():'';
            var caregiverage_to = $('.caregiverage_to').val()?$('.caregiverage_to').val():'';
            var start_date = $("#textbox1").val()?$("#textbox1").val():'';
            var care_type = $( ".select-services option:selected" ).val();
            var training = $('.training:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
		    var availability = $('.availability:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
		    var sickChild = $('.sick_child_care').is(':checked') ? $('.sick_child_care').val():'';

        	
			$.ajax({
            	type : "post",
            	url  : "<?php echo site_url();?>babysitter/savesearch",
            	data:"availability="+availability+"&training="+training+"&sick_child_care="+sickChild+"&neighbour="+neighbour+"&gender="+gender+"&smoker="+smoker+"&lang="+lang+"&observance="+observance+"&number_of_children="+number_of_children+"&morenum="+morenum+"&age_group="+age_group+"&looking_to_work="+looking_to_work+"&year_experience="+year_experience+"&driver_license="+driver_license+"&vehicle="+vehicle+"&pick_up_child="+pick_up_child+"&cook="+cook+"&basic_housework="+basic_housework+"&homework_help="+homework_help+"&on_short_notice="+on_short_notice+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&start_date="+start_date+"&care_type="+care_type,
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
        var prev_url = $(location).attr('href');
        document.cookie = "previous_url="+prev_url;
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