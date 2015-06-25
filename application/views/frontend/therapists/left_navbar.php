<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo 'Therapists';?></h3>  			
	  		<div class="left-search-panel">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		
 			<div class="select-services careType">
	 			<label>Choose a Care Type</label>
 				<?php $this->load->view('frontend/common/left_nav_title')?>
	 		</div>

 			<!--<div>
	 			<label>Age of Therapist</label>
	 			<input type="text" name="caregiverage_from" value="" placeholder="FROM" style="width:25%" class="caregiverage_from" > to  
	 			<input type="text" name="caregiverage_to" value="" placeholder="TO" style="width:25%" class="caregiverage_to" >
	 		</div>-->

	 		<div>
	 			<label>Gender of Therapist</label>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="1" class="gender" >Male</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="2" class="gender" > Female</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="3" class="gender" > Any</div>
	 		</div>
            
            <?php /*
            <div id="smoker">
	 			<label>Smoker</label>
	 			<div class="radio-half"><input type="radio" name="smoker" value="1" class="smoker"> Yes</div>
	 			<div class="radio-half"><input type="radio" name="smoker" value="2" class="smoker"> No</div>
	 		</div> */ ?>
            
	 		<div>
	 			<label>Languages</label>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="English" class="lang" > English</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Yiddish" class="lang" > Yiddish</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Hebrew" class="lang" > Hebrew</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Russian" class="lang" > Russian</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="French" class="lang" > French</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Other" class="lang" > Other</div>
	 		</div>
	 		<!--<div>
	 			<label>Level of observance (check one or more)</label>
	 			<div class="checkbox"><input type="checkbox" value="Yeshivish/Chasidish" name="observance[]" class="observance">Yeshivish/Chasidish</div>
	 			<div class="checkbox"><input type="checkbox" value="Orthodox/Modern orthodox" name="observance[]" class="observance">Orthodox/Modern orthodox</div>	 			
	 			<div class="checkbox"><input type="checkbox" value="Familiar with Jewish Tradition" name="observance[]" class="observance">Familiar with Jewish Tradition</div>
	 			<div class="checkbox"><input type="checkbox" value="Any" name="observance[]" class=" observance">Any</div>	 			
	 		</div>-->
	 		<div>
		 		<label>Accepts Insurance</label>
		 		<input type="radio" name="accepts_insurance" class="accept_insurance" value="1" > Yes
		 		<input type="radio" name="accepts_insurance" class="accept_insurance" value="2" > No
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
			// assign care type id
			var care_type = $( ".careType option:selected" ).val();
			$('#care_type').val(care_type);
			// on change assing care  type id 
			$('.service').change(function(){
				$('#care_type').val($(this).val());
			});
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

			$('.neighbour').blur(function(){
			 $(".searchloader").fadeIn("fast");
					var neighbour = $(this).val();
					var caregiverage_from = $('.caregiverage_from').val();
					var caregiverage_to =  $('.caregiverage_to').val();
					var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
					var lang = $('.lang:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
                    var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
			    	var observance = $('.observance:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var accept_insurance = $('.accept_insurance').is(':checked')?$('input[name=accept_insurance]:checked').val():'';
			    	var care_type = $( ".careType option:selected" ).val();

			    	$.ajax({
			    		type:"get",
			    		url:"<?php echo site_url();?>therapists/search",
			    		data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&accept_insurance="+accept_insurance+"&gender="+gender+"&care_type="+care_type+"&smoker="+smoker,
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

			$('.caregiverage_from').blur(function(){
			         $(".searchloader").fadeIn("fast");
					var neighbour = $('.neighbour').val();
					var caregiverage_from = $(this).val();
					var caregiverage_to =  $('.caregiverage_to').val();
					var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
					var lang = $('.lang:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
                    var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
			    	var observance = $('.observance:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var accept_insurance = $('.accept_insurance').is(':checked')?$('input[name=accept_insurance]:checked').val():'';
			    	var care_type = $( ".careType option:selected" ).val();

			    	$.ajax({
			    		type:"get",
			    		url:"<?php echo site_url();?>therapists/search",
			    		data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&accept_insurance="+accept_insurance+"&gender="+gender+"&care_type="+care_type+"&smoker="+smoker,
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

			$('.caregiverage_to').blur(function(){
			         $(".searchloader").fadeIn("fast");
					var neighbour = $('.neighbour').val();
					var caregiverage_from = $('.caregiverage_from').val();
					var caregiverage_to =  $(this).val();
					var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
					var lang = $('.lang:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var observance = $('.observance:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var accept_insurance = $('.accept_insurance').is(':checked')?$('input[name=accept_insurance]:checked').val():'';
			    	var care_type = $( ".careType option:selected" ).val();
                    var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
			    	$.ajax({
			    		type:"get",
			    		url:"<?php echo site_url();?>therapists/search",
			    		data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&accept_insurance="+accept_insurance+"&gender="+gender+"&care_type="+care_type+"&smoker="+smoker,
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

			$('.gender').click(function(){
			 $(".searchloader").fadeIn("fast");
					var neighbour = $('.neighbour').val();
					var caregiverage_from = $('.caregiverage_from').val();
					var caregiverage_to =  $('.caregiverage_to').val();
					var gender = $(this).val();
					var lang = $('.lang:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var observance = $('.observance:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var accept_insurance = $('.accept_insurance').is(':checked')?$('input[name=accept_insurance]:checked').val():'';
			    	var care_type = $( ".careType option:selected" ).val();
                    var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
			    	$.ajax({
			    		type:"get",
			    		url:"<?php echo site_url();?>therapists/search",
			    		data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&accept_insurance="+accept_insurance+"&gender="+gender+"&care_type="+care_type+"&smoker="+smoker,
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

				$('.lang').click(function(){
				    $(".searchloader").fadeIn("fast");
					var neighbour = $('.neighbour').val();
					var caregiverage_from = $('.caregiverage_from').val();
					var caregiverage_to =  $('.caregiverage_to').val();
                    //$('input[name=radioName]:checked', '#myForm').val()
					//var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
                    var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
					var lang = $('.lang:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var observance = $('.observance:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	//var accept_insurance = $('.accept_insurance').is(':checked')?$('input[name=accept_insurance]:checked').val():'';
                     var accept_insurance = $('.accept_insurance').is(':checked')?$('input[name=accept_insurance]:checked').val():'';
			    	var care_type = $( ".careType option:selected" ).val();
                    var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
			    	$.ajax({
			    		type:"get",
			    		url:"<?php echo site_url();?>therapists/search",
			    		data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&accept_insurance="+accept_insurance+"&gender="+gender+"&care_type="+care_type+"&smoker="+smoker,
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
                
                $('.smoker').click(function(){
				    $(".searchloader").fadeIn("fast");
					var neighbour = $('.neighbour').val();
					var caregiverage_from = $('.caregiverage_from').val();
					var caregiverage_to =  $('.caregiverage_to').val();
                    //$('input[name=radioName]:checked', '#myForm').val()
					//var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
                    var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
					var lang = $('.lang:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var observance = $('.observance:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	//var accept_insurance = $('.accept_insurance').is(':checked')?$('input[name=accept_insurance]:checked').val():'';
                     var accept_insurance = $('.accept_insurance').is(':checked')?$('input[name=accept_insurance]:checked').val():'';
			    	var care_type = $( ".careType option:selected" ).val();
                    var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
			    	$.ajax({
			    		type:"get",
			    		url:"<?php echo site_url();?>therapists/search",
			    		data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&accept_insurance="+accept_insurance+"&gender="+gender+"&care_type="+care_type+"&smoker="+smoker,
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

				$('.observance').click(function(){
				    $(".searchloader").fadeIn("fast");
					var neighbour = $('.neighbour').val();
					var caregiverage_from = $('.caregiverage_from').val();
					var caregiverage_to =  $('.caregiverage_to').val();
					var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
					var lang = $('.lang:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var observance = $('.observance:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var accept_insurance = $('.accept_insurance').is(':checked')?$('input[name=accept_insurance]:checked').val():'';
			    	var care_type = $( ".careType option:selected" ).val();
                    var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
			    	$.ajax({
			    		type:"get",
			    		url:"<?php echo site_url();?>therapists/search",
			    		data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&accept_insurance="+accept_insurance+"&gender="+gender+"&care_type="+care_type+"&smoker="+smoker,
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
				
				$('.accept_insurance').click(function(){
				    $(".searchloader").fadeIn("fast");
					var neighbour = $('.neighbour').val();
					var caregiverage_from = $('.caregiverage_from').val();
					var caregiverage_to =  $('.caregiverage_to').val();
					var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
					var lang = $('.lang:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var observance = $('.observance:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var accept_insurance = $(this).val();
			    	var care_type = $( ".careType option:selected" ).val();
   	                var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
			    	$.ajax({
			    		type:"get",
			    		url:"<?php echo site_url();?>therapists/search",
			    		data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&accept_insurance="+accept_insurance+"&gender="+gender+"&care_type="+care_type+"&smoker="+smoker,
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
	});
</script>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/><!--for datepicker-->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script><!--for datepicker-->

<script>
$(document).ready(function () {
  var neighbour = $('.neighbour').val();
					var caregiverage_from = $('.caregiverage_from').val();
					var caregiverage_to =  $('.caregiverage_to').val();
					var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
					var lang = $('.lang:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var observance = $('.observance:checked').map(function(_, el) {
			        	return $(el).val();
			    	}).get();
			    	var accept_insurance = $(this).val();
			    	var care_type = $( ".careType option:selected" ).val();
   	                var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
			    	$.ajax({
			    		type:"get",
			    		url:"<?php echo site_url();?>therapists/search",
			    		data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&accept_insurance="+accept_insurance+"&gender="+gender+"&care_type="+care_type+"&smoker="+smoker,
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
			var lang = $('.lang:checked').map(function(_, el) {
	        	return $(el).val();
	    	}).get();
	    	var observance = $('.observance:checked').map(function(_, el) {
	        	return $(el).val();
	    	}).get();
	    	var accept_insurance = $('.accept_insurance').is(':checked')?$('input[name=accept_insurance]:checked').val():'';
            var care_type = $( ".careType option:selected" ).val();
            var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
            $.ajax({
            	type : "post",
            	url  : "<?php echo site_url();?>therapists/savesearch",
            	data:"neighbour="+neighbour+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&accept_insurance="+accept_insurance+"&gender="+gender+"&care_type="+care_type+"&smoker="+smoker,
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