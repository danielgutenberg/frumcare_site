<?php echo $this->breadcrumbs->show();?>
			<h3>
                <?php 
                    if(segment(1) == 'jobs' && (segment(2) == 'all' || segment(2) == '') )
                        echo 'Jobs';
                    else
                        echo 'Babysitter';
                ?>
            </h3>  			
	  		<div class="left-search-panel ">
	 	<h4>Advanced Search</h4>
        <?php $cat = $this->uri->segment(2)?$this->uri->segment(2):''; ?>
	 	<form method="post" id="left-nav" action="">
 			<div class="select-services">
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
                        
 				</select>
                */ ?>
	 		</div>

 		
            <div>
	 			<label>Care Location</label>
	 			<div class="checkbox"><input type="checkbox" value="Childs home" class="looking_to_work">Child's home</div>
	 			<div class="checkbox"><input type="checkbox" value="My home" class="looking_to_work">Caregivers home</div>
	 			<div class="checkbox"><input type="checkbox" value="Mothers helper" class="looking_to_work">Mother's helper</div>
	 		</div>
   	        <div class="select-services">
	 			<label>Number of children you can care for</label>
	 			<select name="number_of_children" class="number_of_children">
	 				<option value="">--select--</option>
	 				<option value="1">1</option>
	 				<option value="2">2</option>
	 				<option value="3">3</option>
	 				<option value="4">4</option>
	 				<option value="5">5</option>
	 				<option value="5+">5+</option>
	 			</select>
	 		</div>
            <div>
	 			<label></label>
	 			<div class="checkbox"><input type="checkbox" value="twins" name="optional_number[]" class="morenum">Twins</div>
	 			<div class="checkbox"><input type="checkbox" value="triplets" name="optional_number[]" class="morenum">Triplets</div>
	 		</div>
            <div>
	 			<label>Age of children you can care for</label>
	 			<div class="checkbox"><input type="checkbox" value="0-3" name="age_group[]" class="age_group"> 0-3 months</div>
                <div class="checkbox"><input type="checkbox" value="3-6" name="age_group[]" class="age_group"> 3-6 months</div>
                <div class="checkbox"><input type="checkbox" value="6-12" name="age_group[]" class="age_group"> 6-12 months</div>                
                <div class="checkbox"><input type="checkbox" value="1-3" name="age_group[]"  class="age_group"> 1 to 3 years</div>
                <div class="checkbox"><input type="checkbox" value="3-5" name="age_group[]"  class="age_group"> 3 to 5 years</div>
                <div class="checkbox"><input type="checkbox" value="6-11" name="age_group[]"  class="age_group"> 6 to 11 years</div>
                <div class="checkbox"><input type="checkbox" value="12+" name="age_group[]"  class="age_group"> 12+ years</div>
	 		</div>
            <div>
                <label>Job Hours</label>
                <div class="checkbox"><input type="checkbox" class="availability" value="One time">One Time</div>
                <div class="checkbox"><input type="checkbox" class="availability" value="Occasionally">Occasionally</div>
                <div class="checkbox"><input type="checkbox" class="availability" value="Regularly">Regularly</div>		 		
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Asap">Asap</div>
		 		<div class="checkbox full"><input type="checkbox" id="chkbox1" value="Start Date">Start Date<input type="text" id="textbox1"/></div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Morning">Morning</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Afternoon">Afternoon</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Evening">Evening</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Night Nurse">Night Nurse</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Weekends Fri/Sun">Weekends Fri / Sun</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Shabbos">Shabbos</div>
		 		<div class="checkbox"><input type="checkbox" class="availability" value="Vacation Sitter">Vacation Sitter</div>
		 	</div>
            <div class="select-services">
                <label>Rate</label>
                    <select name="rate" class="rate">
                        <option value="">Select rate</option>
                        <option value="5-10">$5-$10</option>
                        <option value="10-15">$10-$15</option>
                        <option value="15-25">$15-$25</option>
                        <option value="25-35">$25-$35</option>
                        <option value="35-45">$35-$45</option>
                        <option value="45-55">$45-$55</option>
                        <option value="55+">$55+</option>
                    </select>    
                
                            <div>
                <!--<div class="checkbox"><input type="checkbox" name="rate_type[]" value="1" class="rate_type"/>Per hour</div>-->
                <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2" class="rate_type"/>Monthly payment available</div>
            </div>
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
        var care_type = $( ".service option:selected" ).val();
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
            if(pagelink == 'Errand runner / odd jobs / personal assistant / driver')
                var locationaddress = 'careseeker_errandrunner';           
            location.href = '<?php echo site_url();?>'+locationaddress;
             if(pagelink == 'Workers / staff for childcare facility')
                location.href = '<?php echo site_url();?>careseeker_childcarefacility';
            if(pagelink == 'Workers / staff for senior care facility')
                location.href = '<?php echo site_url();?>careseeker_seniorcarefacility';
            if(pagelink == 'Workers / staff for special needs facility')
                location.href = '<?php echo site_url();?>careseeker_specialneedsfacility';
            if(pagelink == 'Workers for cleaning company')
                location.href = '<?php echo site_url();?>careseeker_cleaningcompany';
            if(pagelink == '--select--')
                location.href = 'careseekers';
            
		});

		$('.neighbour').blur(function(){
    		  $(".searchloader").fadeIn("fast");
    			var neighbour = $('.neighbour').val();
                var number_of_children = $('.number_of_children').val();
                var morenum = $('.morenum:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var looking_to_work = $('.looking_to_work:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var age_group = $('.age_group:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var availability = $('.availability:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var rate = $('.rate').val();
                var rate_type = $('.rate_type:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                //var rate_type = $('.rate_type').val();
                var start_date = $("#textbox1").val()?$("#textbox1").val():'';               
    			$.ajax({
    				type:"get",
    				url:"<?php echo site_url();?>careseeker_babysitter/search",
    				data:"rate="+rate+"&rate_type="+rate_type+"&neighbour="+neighbour+"&number_of_children="+number_of_children+"&morenum="+morenum+"&age_group="+age_group+"&looking_to_work="+looking_to_work+"&availability="+availability+"&start_date="+start_date,
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
        $('.looking_to_work,.age_group,.morenum,.looking_to_work,.availability,.age_group,.rate_type').click(function(){
                $(".searchloader").fadeIn("fast");
    			var neighbour = $('.neighbour').val();
                var number_of_children = $('.number_of_children:selected').val();
                var morenum = $('.morenum:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var looking_to_work = $('.looking_to_work:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var age_group = $('.age_group:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var availability = $('.availability:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var rate = $('.rate').val();
                //var rate_type = $('.rate_type').val();
                var rate_type = $('.rate_type:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var start_date = $("#textbox1").val()?$("#textbox1").val():'';               
    			$.ajax({
    				type:"get",
    				url:"<?php echo site_url();?>careseeker_babysitter/search",
    				data:"rate="+rate+"&rate_type="+rate_type+"&neighbour="+neighbour+"&number_of_children="+number_of_children+"&morenum="+morenum+"&age_group="+age_group+"&looking_to_work="+looking_to_work+"&availability="+availability+"&start_date="+start_date,
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
        $('.rate,.number_of_children,#textbox1').change(function(){
                $(".searchloader").fadeIn("fast");
    			var neighbour = $('.neighbour').val();
                var number_of_children = $('.number_of_children').val();
                var morenum = $('.morenum:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var looking_to_work = $('.looking_to_work:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var age_group = $('.age_group:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var availability = $('.availability:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var rate = $('.rate').val();
                var start_date = $("#textbox1").val()?$("#textbox1").val():'';
                //var rate_type = $('.rate_type').val();
                var rate_type = $('.rate_type:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();               
    			$.ajax({
    				type:"get",
    				url:"<?php echo site_url();?>careseeker_babysitter/search",
    				data:"rate="+rate+"&rate_type="+rate_type+"&neighbour="+neighbour+"&number_of_children="+number_of_children+"&morenum="+morenum+"&age_group="+age_group+"&looking_to_work="+looking_to_work+"&availability="+availability+"&start_date="+start_date,
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
                var number_of_children = $('.number_of_children').val();
                var morenum = $('.morenum:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var looking_to_work = $('.looking_to_work:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var age_group = $('.age_group:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var availability = $('.availability:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var start_date = $("#textbox1").val()?$("#textbox1").val():'';
                //var rate_type = $('.rate_type').val();
                var rate_type = $('.rate_type:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var rate = $('.rate').val();          
    			$.ajax({
    				type:"get",
    				url:"<?php echo site_url();?>careseeker_babysitter/search",
    				data:"rate="+rate+"&rate_type="+rate_type+"&neighbour="+neighbour+"&number_of_children="+number_of_children+"&morenum="+morenum+"&age_group="+age_group+"&looking_to_work="+looking_to_work+"&availability="+availability+"&start_date="+start_date,
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
            var year_experience = $('.year_experience:checked').map(function(_, el) {
                return $(el).val();
            }).get();
            var driver_license = $('.driver_license').is(':checked') ? $('.driver_license').val() : ''; 
            var vehicle = $('.vehicle').is(':checked') ? $('.vehicle').val(): '';
            var pick_up_child = $('.pick_up_child').is(':checked') ? $('.pick_up_child').val() : '';
            var cook = $('.cook').is(':checked') ? $('.cook').val():'';
            var basic_housework = $('.basic_housework').is(':checked') ? $('.basic_housework').val() :'';
            var homework_help = $('.homework_help').is(':checked') ? $('.homework_help').val() :'';
            var on_short_notice = $('.on_short_notice').is(':checked') ? $('.on_short_notice').val():'';
            var start_date = $("#textbox1").val()?$("#textbox1").val():'';
            var care_type   =  $('#care_type').val();
            var rate = $('.rate').val();
            $.ajax({
                type : "post",
                url  : "<?php echo site_url();?>careseeker_babysitter/savesearch",
                data:"neighbour="+neighbour+"&number_of_children="+number_of_children+"&morenum="+morenum+"&age_group="+age_group+"&looking_to_work="+looking_to_work+"&year_experience="+year_experience+"&driver_license="+driver_license+"&vehicle="+vehicle+"&pick_up_child="+pick_up_child+"&cook="+cook+"&basic_housework="+basic_housework+"&homework_help="+homework_help+"&on_short_notice="+on_short_notice+"&start_date="+start_date+"&care_type="+care_type,
                success:function(msg){
                    //console.log(msg);
                    alert(msg);                    
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