<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo 'Senior Care Center';?></h3>  			
	  		<div class="left-search-panel">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		
 			<div class="select-services careType">
	 			<label>Choose a Care Type</label>
 				<?php $this->load->view('frontend/common/left_nav_title')?>
	 		</div> 			
           	<div>
                <label>Type of Organization</label>
                <select name="sub_care" class="sub_care">
                    <option value="">Select</option>
                    <option value="assisted living residence">Assisted living residence</option>
                    <option value="senior care center">Senior care center / Nursing home</option>
                    <!--<option value="nursing home">Nursing home</option>-->
                    <option value="rehab therapy center">Rehab / Therapy Center</option>
                    <option value="other">Other</option>
                </select>
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
	 			<label>Specialize In</label>
	 			<div class="checkbox"><input type="checkbox" value="Alz./dementia" class="willing_to_work">Alz. / dementia</div>
	 			<div class="checkbox"><input type="checkbox" value="Sight loss" class="willing_to_work">Sight loss</div>
                <div class="checkbox"><input type="checkbox" value="Hearing loss" class="willing_to_work">Hearing loss</div>
	 			<div class="checkbox"><input type="checkbox" value="Wheelchair Bound" class="willing_to_work">Wheelchair Bound</div>
	 		</div>
            <div>
                <label>Observance in facility</label>
                <div class="checkbox"><input type="checkbox" value="shul on premises" name="extra_field[]" class="extra_field" />Shul on premises</div>
                <div class="checkbox"><input type="checkbox" value="kosher kitchen" name="extra_field[]" class="extra_field" />Kosher kitchen</div>
                <div class="checkbox"><input type="checkbox" value="kosher food available" name="extra_field[]" class="extra_field" />Kosher food available</div>
                <div class="checkbox"><input type="checkbox" value="shabbos observant facility" name="extra_field[]" class="extra_field" />Shabbos observant facility</div>
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
	  </div><!--end of left search pannel-->      
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
		$('.neighbour').blur(function(){
    		  $(".searchloader").fadeIn("fast");
    			var neighbour = $('.neighbour').val();
                var lang = $('.lang:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var willing_to_work = $('.willing_to_work:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var extra_field = $('.extra_field:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var sub_care = $('.sub_care').val(); 
                var care_type = $( ".careType option:selected" ).val();
    			$.ajax({
    				type:"get",
    				url:"<?php echo site_url();?>seniorcarecenter/search",
    				data:"neighbour="+neighbour+"&willing_to_work="+willing_to_work+"&language="+lang+"&sub_care="+sub_care+"&extra_field="+extra_field,
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
        $('.sub_care').change(function(){
    		  $(".searchloader").fadeIn("fast");
    			var neighbour = $('.neighbour').val();
                var lang = $('.lang:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var willing_to_work = $('.willing_to_work:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();     
                var sub_care = $('.sub_care').val();
                var extra_field = $('.extra_field:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();       
    		    var care_type = $( ".careType option:selected" ).val();
    			$.ajax({
    				type:"get",
    				url:"<?php echo site_url();?>seniorcarecenter/search",
    				data:"neighbour="+neighbour+"&willing_to_work="+willing_to_work+"&language="+lang+"&sub_care="+sub_care+"&extra_field="+extra_field,
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
        $('.lang,.willing_to_work,.extra_field').click(function(){
               $(".searchloader").fadeIn("fast");
    			var neighbour = $('.neighbour').val();
                var lang = $('.lang:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var willing_to_work = $('.willing_to_work:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var extra_field = $('.extra_field:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get(); 
                var sub_care = $('.sub_care').val();   
                var care_type = $( ".careType option:selected" ).val();
    			$.ajax({
    				type:"get",
    				url:"<?php echo site_url();?>seniorcarecenter/search",
    				data:"neighbour="+neighbour+"&willing_to_work="+willing_to_work+"&language="+lang+"&sub_care="+sub_care+"&extra_field="+extra_field,
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
	});
</script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/><!--for datepicker-->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script><!--for datepicker-->
<script type="text/javascript">
    $(document).ready(function(){
    var neighbour = $('.neighbour').val();
                var lang = $('.lang:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var willing_to_work = $('.willing_to_work:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get();
                var extra_field = $('.extra_field:checked').map(function(_, el) {
    		        return $(el).val();
    		    }).get(); 
                var sub_care = $('.sub_care').val();   
                var care_type = $( ".careType option:selected" ).val();
    			$.ajax({
    				type:"get",
    				url:"<?php echo site_url();?>seniorcarecenter/search",
    				data:"neighbour="+neighbour+"&willing_to_work="+willing_to_work+"&language="+lang+"&sub_care="+sub_care+"&extra_field="+extra_field,
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
            var lang = $('.lang:checked').map(function(_, el) {
                return $(el).val();
            }).get();
            var willing_to_work = $('.willing_to_work:checked').map(function(_, el) {
                return $(el).val();
            }).get();
            var extra_field = $('.extra_field:checked').map(function(_, el) {
    		        return $(el).val();
  		    }).get();  
            var care_type = $( ".careType option:selected" ).val();
            var sub_care = $('.sub_care').val();
            $.ajax({
                type : "post",
                url  : "<?php echo site_url();?>seniorcarecenter/savesearch",
                data:"neighbour="+neighbour+"&willing_to_work="+willing_to_work+"&language="+lang+"&care_type="+care_type+"&sub_care="+sub_care+"&extra_field="+extra_field,
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