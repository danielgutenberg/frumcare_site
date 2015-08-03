<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo "Day Care Center / Day Camp / Afternoon Activities";?></h3>  			
	  		<div class="left-search-panel">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
 			<!--<div class="select-services careType">-->
	 		<!--	<label>Choose a Care Type</label>-->
 			<!--	<?php $this->load->view('frontend/common/left_nav_title')?>-->
	 		<!--</div>			-->
	 		<div>
                <label>Type of Organization</label>
                <select name="sub_care" class="sub_care">
                    <option value="">Select</option>
                    <option value="day care center">Day Care Center</option>
                    <option value="day camp">Day Camp</option>
                    <option value="afternoon activities">Afternoon Activities</option>
                    <option value="pre school">Pre-School</option>
                    <option value="other">Other</option>
                </select>
            </div>
             <div>
	 			<label>For</label>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="1" class="gender">Boys</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="2" class="gender">Girls</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="3" class="gender">Any</div>
	 		</div>
   	        <div>
	 			<label>For ages</label>
	 			<div class="checkbox first"><input type="checkbox" value="0-3" name="age_group[]" class="age_group"> 0-3 months</div>
                <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]" class="age_group"> 3-6 months</div>
                <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]" class="age_group"> 6-12 months</div>                
                <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]"  class="age_group"> 1 to 3 years</div>
                <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]"  class="age_group"> 3 to 5 years</div>
                <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]"  class="age_group"> 6 to 11 years</div>
                <div class="checkbox"><input type="checkbox" value="12+" name="age_group[]"  class="age_group"> 12+ years</div>
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

            if(pagelink == 'Assisted living / Senior Care Center/ Nursing Home')
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

		// blur
		$('.neighbour').blur(function(){
			$(".searchloader").fadeIn("fast");
			var neighbour = $('.neighbour').val();
            var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
            
            var lang = $('.lang:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();		    
            var age_group = $('.age_group:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var sub_care = $('.sub_care').val();
            var lat = $('#lat').val();
            var lng = $('#lng').val();
            var location = $('#place').val();
            var pagenum = $('#pagenum').val();
				$.ajax({
					type:"get",
					url:"<?php echo site_url();?>daycarecenter/search",
					data:"pagenum="+pagenum+"&lat="+lat+"&lng="+lng+"&location="+location+"&neighbour="+neighbour+"&sub_care="+sub_care+"&gender="+gender+"&language="+lang+"&care_type="+care_type+"&age_group="+age_group,
					success:function(done){
							$(".searchloader").fadeOut("fast");
							var json = jQuery.parseJSON(done);
 							var pagenum = json.num;
 							var pagedata = json.userdatas;
							$('#list_container').html(pagedata);
							$('#total').html(json.total);
                            $('.navigations').html(json.pagination);
                            if (json.location) {
	                        	$('#locationaddress').text(json.location)
	                        }
					}
				});

		});
        
        // change
		$('.sub_care').change(function(){
			$(".searchloader").fadeIn("fast");
			var neighbour = $('.neighbour').val();
            var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
            
            var lang = $('.lang:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();		    
            var age_group = $('.age_group:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var sub_care = $('.sub_care').val();
            var lat = $('#lat').val();
            var lng = $('#lng').val();
            var location = $('#place').val();
            var pagenum = $('#pagenum').val();
				$.ajax({
					type:"get",
					url:"<?php echo site_url();?>daycarecenter/search",
					data:"pagenum="+pagenum+"&lat="+lat+"&lng="+lng+"&location="+location+"&neighbour="+neighbour+"&sub_care="+sub_care+"&gender="+gender+"&language="+lang+"&care_type="+care_type+"&age_group="+age_group,
					success:function(done){
							$(".searchloader").fadeOut("fast");
							var json = jQuery.parseJSON(done);
 							var pagenum = json.num;
 							var pagedata = json.userdatas;
							$('#list_container').html(pagedata);
							$('#total').html(json.total);
                            $('.navigations').html(json.pagination);
                            if (json.location) {
	                        	$('#locationaddress').text(json.location)
	                        }
					}
				});

		});

		// onclick
		$('.gender,.lang,.age_group').click(function(){
			$(".searchloader").fadeIn("fast");
			var neighbour = $('.neighbour').val();
            var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
            
            var lang = $('.lang:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();		    
            var age_group = $('.age_group:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var sub_care = $('.sub_care').val();
            var lat = $('#lat').val();
            var lng = $('#lng').val();
            var location = $('#place').val();
            var pagenum = $('#pagenum').val();
				$.ajax({
					type:"get",
					url:"<?php echo site_url();?>daycarecenter/search",
					data:"pagenum="+pagenum+"&lat="+lat+"&lng="+lng+"&location="+location+"&neighbour="+neighbour+"&sub_care="+sub_care+"&gender="+gender+"&language="+lang+"&care_type="+care_type+"&age_group="+age_group,
					success:function(done){
							$(".searchloader").fadeOut("fast");
							var json = jQuery.parseJSON(done);
 							var pagenum = json.num;
 							var pagedata = json.userdatas;
							$('#list_container').html(pagedata);
							$('#total').html(json.total);
                            $('.navigations').html(json.pagination);
                            if (json.location) {
	                        	$('#locationaddress').text(json.location)
	                        }
					}
				});
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
		var neighbour = $('.neighbour').val();
            var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
            
            var lang = $('.lang:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();		    
            var age_group = $('.age_group:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
            var sub_care = $('.sub_care').val();
            var lat = $('#lat').val();
            var lng = $('#lng').val();
            var location = $('#place').val();
            var pagenum = $('#pagenum').val();
				$.ajax({
					type:"get",
					url:"<?php echo site_url();?>daycarecenter/search",
					data:"pagenum="+pagenum+"&lat="+lat+"&lng="+lng+"&location="+location+"&neighbour="+neighbour+"&sub_care="+sub_care+"&gender="+gender+"&language="+lang+"&care_type="+care_type+"&age_group="+age_group,
					success:function(done){
							$(".searchloader").fadeOut("fast");
							var json = jQuery.parseJSON(done);
 							var pagenum = json.num;
 							var pagedata = json.userdatas;
							$('#list_container').html(pagedata);
							$('#total').html(json.total);
                            $('.navigations').html(json.pagination);
                            if (json.location) {
	                        	$('#locationaddress').text(json.location)
	                        }
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
            	var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
		        var lang = $('.lang:checked').map(function(_, el) {
			        return $(el).val();
			    }).get();			    
	            var care_type = $( ".care_type option:selected" ).val();
                var sub_care = $('.sub_care').val();
	            var age_group = $('.age_group:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
	            $.ajax({
	            	type : "post",
	            	url  : "<?php echo site_url();?>daycarecenter/savesearch",
	            	data:"neighbour="+neighbour+"&sub_care="+sub_care+"&gender="+gender+"&language="+lang+"&care_type="+care_type+"&age_group="+age_group,
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
