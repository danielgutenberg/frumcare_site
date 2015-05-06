<?php echo $this->breadcrumbs->show();?>
			<h3>Special Needs Center</h3>
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
	 			<label>Spoken Languages</label>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="English" class="lang">English</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Yiddish" class="lang">Yiddish</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Hebrew" class="lang">Hebrew</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Russian" class="lang">Russian</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="French" class="lang">French</div>
	 			<div class="checkbox"><input type="checkbox" name="languages[]" value="Other" class="lang">Other</div>
	 		</div>

	 		<div>
	 			<label>Specialize in</label>
	 			<div class="checkbox"><input type="checkbox" name="willing_to_work[]" value="Autism" class="willing_to_work">Autism</div>
	 			<div class="checkbox"><input type="checkbox" name="willing_to_work[]" value="Down Syndrome" class="willing_to_work">Down Syndrome</div>
	 			<div class="checkbox"><input type="checkbox" name="willing_to_work[]" value="Handicapped" class="willing_to_work">Handicapped</div>
	 			<div class="checkbox"><input type="checkbox" name="willing_to_work[]" value="Wheelchair bound" class="willing_to_work">Wheelchair bound</div>
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

		$('.show').click(function(){
			$('.familarsection').html('<div class="checkbox"><input type="checkbox" value="Familiar with Jewish Tradition" name="observance[]" class="familiar observance">Familiar with Jewish Tradition</div>').show();
		});

		$('.hidefamiliar').click(function(){
			$('.familarsection').hide();
		});

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
		$('.neighbour').blur(function(){
			$(".searchloader").fadeIn("fast");
			var neighbour = $('.neighbour').val();
            var lang = $('.lang:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
		    var willing_to_work = $('.willing_to_work:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();

				$.ajax({
					type:"get",
					url:"<?php echo site_url();?>specialneedscenter/search",
					data:"neighbour="+neighbour+"&language="+lang+"&willing_to_work="+willing_to_work+"&care_type="+care_type,
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
		$('.lang,.willing_to_work').click(function(){
			$(".searchloader").fadeIn("fast");
			var neighbour = $('.neighbour').val();
            var lang = $('.lang:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
		    var willing_to_work = $('.willing_to_work:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
				$.ajax({
					type:"get",
					url:"<?php echo site_url();?>specialneedscenter/search",
					data:"neighbour="+neighbour+"&language="+lang+"&willing_to_work="+willing_to_work+"&care_type="+care_type,
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
            $("#textbox1").hide();
            $('#textbox1').val('');
       }

        $("#chkbox1").change(function(){
            if($('#chkbox1').is(':checked')){
                $("#textbox1").show();   
            }else{
                $("#textbox1").hide(); 
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
            var lang = $('.lang:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
		    var willing_to_work = $('.willing_to_work:checked').map(function(_, el) {
		        return $(el).val();
		    }).get();
		    var care_type = $('#care_type').val();
				$.ajax({
					type:"post",
					url:"<?php echo site_url();?>specialneedscenter/savesearch",
					data:"neighbour="+neighbour+"&language="+lang+"&willing_to_work="+willing_to_work+"&care_type="+care_type,
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