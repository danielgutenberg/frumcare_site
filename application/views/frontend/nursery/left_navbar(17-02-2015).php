<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo ucfirst(segment(1));?></h3>  			
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
	 			<input type="text" name="caregiverage_from" value="" placeholder="FROM" style="width:25%" class="caregiverage_from" > to  
	 			<input type="text" name="caregiverage_to" value="" placeholder="TO" style="width:25%" class="caregiverage_to" >
	 		</div>

	 		<div>
	 			<label>Gender of caregiver</label>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="1" class="gender" >Male</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="2" class="gender" > Female</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="3" class="gender" > Any</div>
	 		</div>

	 		<div>
	 			<label>Languages</label>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="English" class="lang" > English</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Yiddish" class="lang" > Yiddish</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Hebrew" class="lang" > Hebrew</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Russian" class="lang" > Russian</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="French" class="lang" > French</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Other" class="lang" > Other</div>
	 		</div>
	 		<div>
	 			<label>Level of observance (check one or more)</label>
	 			<div class="checkbox"><input type="checkbox" value="Yeshivish/Chasidish" name="observance[]" class="observance">Yeshivish/Chasidish</div>
	 			<div class="checkbox"><input type="checkbox" value="Orthodox/Modern orthodox" name="observance[]" class="observance">Orthodox/Modern orthodox</div>	 			
	 			<div class="checkbox"><input type="checkbox" value="Familiar with Jewish Tradition" name="observance[]" class="observance">Familiar with Jewish Tradition</div>
	 			<div class="checkbox"><input type="checkbox" value="Any" name="observance[]" class=" observance">Any</div>	 			
	 		</div>
            
            <div>
                <label>For</label>
                <div class="radio"><input type="radio" name="willing" class="willing" value="Boys"/>Boys</div>
                <div class="radio"><input type="radio" name="willing" class="willing" value="Girls"/>Girls</div>
                <div class="radio"><input type="radio" name="willing" class="willing" value="Girls"/>Any</div>
            </div>
            <div>
	 			<label>For Age</label>
	 			<div class="checkbox"><input type="checkbox" value="0-3" name="age_group[]" class="age_group"> 0-3 months</div>
                <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]" class="age_group"> 3-6 months</div>
                <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]" class="age_group"> 6-12 months</div>                
                <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]"  class="age_group"> 1 to 3 years</div>
                <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]"  class="age_group"> 3 to 5 years</div>
                <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]"  class="age_group"> 6 to 11 years</div>
                <div class="checkbox"><input type="checkbox" value="12+" name="age_group[]"  class="age_group"> 12+ years</div>
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
			// assign care type id
			$('#care_type').val($( ".service option:selected" ).val());
			// on change assing care  type id 
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

			$('.neighbour').blur(function(){
			 $(".searchloader").fadeIn("fast");
					var neighbour = $(this).val();
					var caregiverage_from = $('.caregiverage_from').val();
					var caregiverage_to =  $('.caregiverage_to').val();
					var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
                    var willing = $('.willing').is(':checked')?$('input[name=willing]:checked').val():'';        
					var lang = $('.lang:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var observance = $('.observance:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();

                    var age_group = $('.age_group:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
                    
                    var care_type = $( ".service option:selected" ).val();

			    	$.ajax({
			    		type:"get",
			    		url:"<?php echo site_url();?>nursery/search",
			    		data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&age_group="+age_group+"&gender="+gender+"&care_type="+care_type+"&willing="+willing,
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

			$('.caregiverage_from').blur(function(){
			        $(".searchloader").fadeIn("fast");
					var neighbour = $('.neighbour').val();
					var caregiverage_from = $(this).val();
					var caregiverage_to =  $('.caregiverage_to').val();
					var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
                    var willing = $('.willing').is(':checked')?$('input[name=willing]:checked').val():'';
					var lang = $('.lang:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var observance = $('.observance:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	 var age_group = $('.age_group:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var care_type = $( ".service option:selected" ).val();

			    	$.ajax({
			    		type:"get",
			    		url:"<?php echo site_url();?>nursery/search",
			    		data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&age_group="+age_group+"&gender="+gender+"&care_type="+care_type+"&willing="+willing,
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

			$('.caregiverage_to').blur(function(){
			        $(".searchloader").fadeIn("fast");
					var neighbour = $('.neighbour').val();
					var caregiverage_from = $('.caregiverage_from').val();
					var caregiverage_to =  $(this).val();
					var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
                    var willing = $('.willing').is(':checked')?$('input[name=willing]:checked').val():'';
					var lang = $('.lang:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var observance = $('.observance:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
                     var age_group = $('.age_group:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var care_type = $( ".service option:selected" ).val();

			    	$.ajax({
			    		type:"get",
			    		url:"<?php echo site_url();?>nursery/search",
			    		data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&age_group="+age_group+"&gender="+gender+"&care_type="+care_type+"&willing="+willing,
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

			$('.gender').click(function(){
			 $(".searchloader").fadeIn("fast");
					var neighbour = $('.neighbour').val();
					var caregiverage_from = $('.caregiverage_from').val();
					var caregiverage_to =  $('.caregiverage_to').val();
					var gender = $(this).val();
                    var willing = $('.willing').is(':checked')?$('input[name=willing]:checked').val():'';
					var lang = $('.lang:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var observance = $('.observance:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	 var age_group = $('.age_group:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var care_type = $( ".service option:selected" ).val();

			    	$.ajax({
			    		type:"get",
			    		url:"<?php echo site_url();?>nursery/search",
			    		data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&age_group="+age_group+"&gender="+gender+"&care_type="+care_type+"&willing="+willing,
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

				$('.lang').click(function(){
				    $(".searchloader").fadeIn("fast");
					var neighbour = $('.neighbour').val();
					var caregiverage_from = $('.caregiverage_from').val();
					var caregiverage_to =  $('.caregiverage_to').val();
                    //$('input[name=radioName]:checked', '#myForm').val()
					//var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
                    var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
                    var willing = $('.willing').is(':checked')?$('input[name=willing]:checked').val():'';
					var lang = $('.lang:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var observance = $('.observance:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
                    
			    	 var age_group = $('.age_group:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
                     
			    	var care_type = $( ".service option:selected" ).val();

			    	$.ajax({
			    		type:"get",
			    		url:"<?php echo site_url();?>nursery/search",
			    		data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&age_group="+age_group+"&gender="+gender+"&care_type="+care_type+"&willing="+willing,
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

				$('.observance').click(function(){
				    $(".searchloader").fadeIn("fast");
					var neighbour = $('.neighbour').val();
					var caregiverage_from = $('.caregiverage_from').val();
					var caregiverage_to =  $('.caregiverage_to').val();
					var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
                    var willing = $('.willing').is(':checked')?$('input[name=willing]:checked').val():'';
					var lang = $('.lang:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var observance = $('.observance:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	 var age_group = $('.age_group:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
                    
			    	var care_type = $( ".service option:selected" ).val();

			    	$.ajax({
			    		type:"get",
			    		url:"<?php echo site_url();?>nursery/search",
			    		data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&age_group="+age_group+"&gender="+gender+"&care_type="+care_type+"&willing="+willing,
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
                
                	$('.age_group').click(function(){
    				    $(".searchloader").fadeIn("fast");
    					var neighbour = $('.neighbour').val();
    					var caregiverage_from = $('.caregiverage_from').val();
    					var caregiverage_to =  $('.caregiverage_to').val();
    					var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
                        var willing = $('.willing').is(':checked')?$('input[name=willing]:checked').val():'';
    					var lang = $('.lang:checked').map(function(_, el) {
    			        	return $(el).val();
    			    	}).get();
    			    	var observance = $('.observance:checked').map(function(_, el) {
    			        	return $(el).val();
    			    	}).get();
    			    	 var age_group = $('.age_group:checked').map(function(_, el) {
    			        	return $(el).val();
    			    	}).get();
                        
    			    	var care_type = $( ".service option:selected" ).val();
    
    			    	$.ajax({
    			    		type:"get",
    			    		url:"<?php echo site_url();?>nursery/search",
    			    		data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&age_group="+age_group+"&gender="+gender+"&care_type="+care_type+"&willing="+willing,
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
                
                $('.willing').click(function(){
    				    $(".searchloader").fadeIn("fast");
    					var neighbour = $('.neighbour').val();
    					var caregiverage_from = $('.caregiverage_from').val();
    					var caregiverage_to =  $('.caregiverage_to').val();
    					var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
                        var willing = $(this).val();
    					var lang = $('.lang:checked').map(function(_, el) {
    			        	return $(el).val();
    			    	}).get();
    			    	var observance = $('.observance:checked').map(function(_, el) {
    			        	return $(el).val();
    			    	}).get();
    			    	 var age_group = $('.age_group:checked').map(function(_, el) {
    			        	return $(el).val();
    			    	}).get();
                        
    			    	var care_type = $( ".service option:selected" ).val();
    
    			    	$.ajax({
    			    		type:"get",
    			    		url:"<?php echo site_url();?>nursery/search",
    			    		data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&age_group="+age_group+"&gender="+gender+"&care_type="+care_type+"&willing="+willing,
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
	});
</script>
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
			var caregiverage_to =  $('.caregiverage_to').val();
			var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
	        var willing = $(this).val();
			var lang = $('.lang:checked').map(function(_, el) {
	        	return $(el).val();
	    	}).get();
	    	var observance = $('.observance:checked').map(function(_, el) {
	        	return $(el).val();
	    	}).get();
	    	 var age_group = $('.age_group:checked').map(function(_, el) {
	        	return $(el).val();
	    	}).get();
	    	var care_type = $( "#care_type" ).val();
	    	$.ajax({
    			    		type:"post",
    			    		url:"<?php echo site_url();?>nursery/savesearch",
    			    		data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&age_group="+age_group+"&gender="+gender+"&care_type="+care_type+"&willing="+willing,
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
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/><!--for datepicker-->