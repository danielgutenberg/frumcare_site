<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo "Tutor/Private lessons";?></h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		
 			<div class="select-services careType">
	 			<label>Choose a Job Type</label>
                <?php $this->load->view('frontend/common/left_nav_title')?>
                 <?php /*
 				<select name="service" class="service">
					<option value="">--select--</option>                                               
                        <option value="17" <?php if(segment(1) == 'careseeker_babysitter'){?> selected="selected" <?php }?>>Babysitter</option>
                        <option value="18" <?php if(segment(1) == 'careseeker_nanny'){?> selected="selected" <?php }?> >Nanny/Au-pair</option>
                        <option value="25" <?php if(segment(1) == 'careseeker_childcarefacility'){?> selected="selected" <?php } ?>>Workers/ staff for childcare facility</option>
                        <option value="19" <?php if(segment(1) == 'careseeker_tutor'){?> selected="selected" <?php }?>>Tutor/ Private lessons</option>
                        <option value="20" <?php if(segment(1) == 'careseeker_seniorcaregiver'){?> selected="selected" <?php }?>>Senior Caregiver</option>
                        <option value="26" <?php if(segment(1) == 'careseeker_seniorcarefacility'){?> selected="selected" <?php } ?>>Workers/ staff for senior care facility</option>
                        <option value="22" <?php if(segment(1) == 'careseeker_specialneedscaregiver'){?> selected="selected" <?php }?>>Special needs caregiver</option>
                        <option value="27" <?php if(segment(1) == 'careseeker_specialneedsfacility'){?> selected="selected" <?php } ?>>Workers/ staff for special needs facility</option>   
                        <option value="23" <?php if(segment(1) == 'careseeker_therapist'){?> selected="selected" <?php }?>>Therapist</option>
                        <option value="24" <?php if(segment(1) == 'careseeker_cleaninghousehold'){?> selected="selected" <?php }?>>Cleaning/ household help</option>
                        <option value="28" <?php if(segment(1) == 'careseeker_cleaningcompany'){?> selected="selected" <?php } ?>>Workers for cleaning company</option>
                        <option value="21" <?php if(segment(1) == 'careseeker_errandrunner'){?> selected="selected" <?php }?>>Errand runner/ odd jobs/ personal assistant/ driver</option>
                        
                    </option>                                            
 				</select>
                */ ?> 
	 		</div> 		
             <div>
                <label>subject(s)(check one or more)</label>
                <div class="form-field">
                    <div class="checkbox"><input type="checkbox" value="Elementary school" name="subjects[]" class="subject"> Elementary school</div>
                    <div class="checkbox"><input type="checkbox" value="High school" name="subjects[]" class="subject"> High school</div>
                    <div class="checkbox"><input type="checkbox" value="Post high school" name="subjects[]" class="subject"> Post high school</div>
                    <div class="checkbox"><input type="checkbox" value="limudei kodesh" name="subjects[]" class="subject"/>Limudei Kodesh</div>
                    <div class="checkbox"><input type="checkbox" value="general studies" name="subjects[]" class="subject" />General Studies</div>
                    <div class="checkbox"><input type="checkbox" value="Music" name="subjects[]" class="subject"> Music</div>
                    <div class="checkbox"><input type="checkbox" value="Art" name="subjects[]" class="subject"> Art</div>
                    <div class="checkbox"><input type="checkbox" value="Ohter" name="subjects[]" class="subject"> Ohter</div>
                </div>
            </div>
 			<div>
	 			<label>Gender of tutor wanted</label>
	 			<div class="radio-half"><input type="radio" name="gender" value="1" class="gender"> Male  </div>
	 			<div class="radio-half"><input type="radio" name="gender" value="2" class="gender"> Female </div>
                <div class="radio-half"><input type="radio" name="gender" value="3" class="gender"> Any </div>
	 		</div> 

	 		<div>
	 			<label>Gender of Student</label>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="1" class="gender_of_caregiver">Male</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="2" class="gender_of_caregiver"> Female</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="3" class="gender_of_caregiver"> Any</div>
	 		</div>
            <div>
		 		<label>Job Hours (check one or more)</label>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="One Time">One time</div>
                <div class="checkbox"><input type="checkbox" class="availability" value="Occasionally">Occasionally</div>
                <div class="checkbox"><input type="checkbox" class="availability" value="Regularly">Regularly</div>
                <div class="checkbox"><input type="checkbox" class="availability" value="Asap">Asap</div>
		 		<div class="checkbox full"><input type="checkbox" id="chkbox1" value="Start Date">Start Date<input type="text" id="textbox1"/></div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Morning">Morning</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Afternoon">Afternoon</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Evening">Evening</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Weekends Fri/Sun">Weekends Fri / Sun</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Shabbos">Shabbos</div>
		 	</div>
            <div class="select-services">
                <label>Wage</label>
                    <select name="rate" class="rate">
                        <option value="">Select rate</option>
                        <option value="5-10">$5-$10 / Hr</option>
                        <option value="10-15">$10-$15 / Hr</option>
                        <option value="15-25">$15-$25 / Hr</option>
                        <option value="25-35">$25-$35 / Hr</option>
                        <option value="35-45">$35-$45 / Hr</option>
                        <option value="45-55">$45-$55 / Hr</option>
                        <option value="55+">$55+ / Hr</option>
                    </select>    
                    <!-- <select name="rate_type" class="rate_type">
                        <option value="">Select type</option>
                        <option value="1">Per Hour</option>
                        <option value="2">Global Monthly Payment</option>
                    </select> -->
            </div>

            <div>
                <!--<label></label>-->
                <!--<div class="checkbox"><input type="checkbox" class="rate_type" value="1">Per hour</div>-->
                <div class="checkbox"><input type="checkbox" class="rate_type" value="2">Monthly payment avaialble</div>
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
                var locationaddress = 'careseeker_nanny';
            if(pagelink == 'Babysitter')
                var locationaddress = 'careseeker_babysitter';
            if(pagelink == 'Tutor / Private lessons')
                var locationaddress = 'careseeker_tutor';
             if(pagelink == 'Senior Caregiver')
                var locationaddress = 'careseeker_seniorcaregiver';
            if(pagelink == 'Special needs caregiver')
                var locationaddress = 'careseeker_specialneedscaregiver';
            if(pagelink == 'Therapist')
                var locationaddress = 'careseeker_therapist';
            if(pagelink == 'Cleaning / household help')
                var locationaddress = 'careseeker_cleaninghousehold';
            if(pagelink == 'Errand runner / odd jobs / personal assistant/ driver')
                var locationaddress = 'careseeker_errandrunner';       
            if(pagelink == '--select--')
                var locationaddress = 'careseekers'; 
            if(pagelink == 'Workers / staff for childcare facility')
                location.href = '<?php echo site_url();?>careseeker_childcarefacility';
            if(pagelink == 'Workers / staff for senior care facility')
                location.href = '<?php echo site_url();?>careseeker_seniorcarefacility';
            if(pagelink == 'Workers / staff for special needs facility')
                location.href = '<?php echo site_url();?>careseeker_specialneedsfacility';
            if(pagelink == 'Workers for cleaning company')
                location.href = '<?php echo site_url();?>careseeker_cleaningcompany';

            location.href = '<?php echo site_url();?>'+locationaddress;            
		});
		$('.neighbour').blur(function(){
    		  $(".searchloader").fadeIn("fast");
    			var neighbour = $('.neighbour').val();
                var morenum = $('.morenum:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var looking_to_work = $('.looking_to_work:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var availability = $('.availability:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var rate = $('.rate').val();
                var rate_type = $('.rate_type:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var subject = $('.subject:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var start_date = $("#textbox1").val()?$("#textbox1").val():''; 
                var gender = $('.gender').is(':checked')?$('input[name=gender]:checked').val():'';
                var gender_of_caregiver = $('.gender_of_caregiver').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';                          
    			$.ajax({
    				type:"get",
    				url:"<?php echo site_url();?>careseeker_tutor/search",
    				data:"rate="+rate+"&rate_type="+rate_type+"&neighbour="+neighbour+"&morenum="+morenum+"&looking_to_work="+looking_to_work+"&subject="+subject+"&gender="+gender+"&gender_of_caregiver="+gender_of_caregiver+"&availability="+availability+"&start_date="+start_date,
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
        $('.looking_to_work,.gender,.gender_of_caregiver,.morenum,.looking_to_work,.availability,.subject').click(function(){
                $(".searchloader").fadeIn("fast");
    			var neighbour = $('.neighbour').val();
                var morenum = $('.morenum:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var looking_to_work = $('.looking_to_work:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var availability = $('.availability:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var rate = $('.rate').val();
                var rate_type = $('.rate_type:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var subject = $('.subject:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var start_date = $("#textbox1").val()?$("#textbox1").val():''; 
                var gender = $('.gender').is(':checked')?$('input[name=gender]:checked').val():'';
                var gender_of_caregiver = $('.gender_of_caregiver').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';                          
    			$.ajax({
    				type:"get",
    				url:"<?php echo site_url();?>careseeker_tutor/search",
    				data:"rate="+rate+"&rate_type="+rate_type+"&neighbour="+neighbour+"&morenum="+morenum+"&looking_to_work="+looking_to_work+"&subject="+subject+"&gender="+gender+"&gender_of_caregiver="+gender_of_caregiver+"&availability="+availability+"&start_date="+start_date,
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
        $('.rate,.rate_type,#textbox1').change(function(){
                $(".searchloader").fadeIn("fast");
    			var neighbour = $('.neighbour').val();
                var morenum = $('.morenum:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var looking_to_work = $('.looking_to_work:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var availability = $('.availability:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var rate = $('.rate').val();
                var rate_type = $('.rate_type:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var subject = $('.subject:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var start_date = $("#textbox1").val()?$("#textbox1").val():''; 
                var gender = $('.gender').is(':checked')?$('input[name=gender]:checked').val():'';
                var gender_of_caregiver = $('.gender_of_caregiver').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';                          
    			$.ajax({
    				type:"get",
    				url:"<?php echo site_url();?>careseeker_tutor/search",
    				data:"rate="+rate+"&rate_type="+rate_type+"&neighbour="+neighbour+"&morenum="+morenum+"&looking_to_work="+looking_to_work+"&subject="+subject+"&gender="+gender+"&gender_of_caregiver="+gender_of_caregiver+"&availability="+availability+"&start_date="+start_date,
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
                var morenum = $('.morenum:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var looking_to_work = $('.looking_to_work:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var availability = $('.availability:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var rate = $('.rate').val();
                var rate_type = $('.rate_type:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var subject = $('.subject:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var start_date = $("#textbox1").val()?$("#textbox1").val():''; 
                var gender = $('.gender').is(':checked')?$('input[name=gender]:checked').val():'';
                var gender_of_caregiver = $('.gender_of_caregiver').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';                          
    			$.ajax({
    				type:"get",
    				url:"<?php echo site_url();?>careseeker_tutor/search",
    				data:"rate="+rate+"&rate_type="+rate_type+"&neighbour="+neighbour+"&morenum="+morenum+"&looking_to_work="+looking_to_work+"&subject="+subject+"&gender="+gender+"&gender_of_caregiver="+gender_of_caregiver+"&availability="+availability+"&start_date="+start_date,
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
                        var morenum = $('.morenum:checked').map(function(_, el) {
                            return $(el).val();
                        }).get();
                        var looking_to_work = $('.looking_to_work:checked').map(function(_, el) {
                            return $(el).val();
                        }).get();
                        var availability = $('.availability:checked').map(function(_, el) {
                            return $(el).val();
                        }).get();
                        var rate = $('.rate').val();
                        var rate_type = $('.rate_type').val();
                        var subject = $('.subject:checked').map(function(_, el) {
                            return $(el).val();
                        }).get();
                        var start_date = $("#textbox1").val()?$("#textbox1").val():''; 
                        var gender = $('.gender').is(':checked')?$('input[name=gender]:checked').val():'';
                        var gender_of_caregiver = $('.gender_of_caregiver').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
                        var care_type = $( ".careType option:selected" ).val();

                        $.ajax({
                            type : "post",
                            url  : "<?php echo site_url();?>careseeker_tutor/savesearch",
                            data:"rate="+rate+"&rate_type="+rate_type+"&neighbour="+neighbour+"&morenum="+morenum+"&looking_to_work="+looking_to_work+"&subject="+subject+"&gender="+gender+"&gender_of_caregiver="+gender_of_caregiver+"&availability="+availability+"&start_date="+start_date+"&care_type="+care_type,
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