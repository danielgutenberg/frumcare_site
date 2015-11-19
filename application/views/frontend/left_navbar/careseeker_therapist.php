<?php echo $this->breadcrumbs->show();?>
			<h3><?php echo "Therapist";?></h3>  			
	  		<div class="left-search-panel col-lg-3 col-md-3 col-sm-3 col-xs-12">
	 	<h4>Advanced Search</h4>
	 	<form method="post" id="left-nav" action="">
	 		
 					
	 		<div>
	 			<label>Gender of therapist wanted</label>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="1" class="gender_of_caregiver">Male</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="2" class="gender_of_caregiver"> Female</div>
	 			<div class="radio-half"><input type="radio" name="gender_of_caregiver" value="3" class="gender_of_caregiver"> Any</div>
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
            location.href = '<?php echo site_url();?>'+locationaddress;
            
            if(pagelink == 'Workers / staff for childcare facility')
                location.href = '<?php echo site_url();?>organizations/careseeker_childcarefacility';
            if(pagelink == 'Workers / staff for senior care facility')
                location.href = '<?php echo site_url();?>organizations/careseeker_seniorcarefacility';
            if(pagelink == 'Workers / staff for special needs facility')
                location.href = '<?php echo site_url();?>organizations/careseeker_specialneedsfacility';
            if(pagelink == 'Workers for cleaning company')
                location.href = '<?php echo site_url();?>organizations/careseeker_cleaningcompany';                 
		});
		$('.neighbour').blur(function(){
    		  $(".searchloader").fadeIn("fast");
    			var neighbour = $('.neighbour').val();
                var gender_of_caregiver = $('.gender_of_caregiver').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';                          
    			var lat = $('#lat').val();
            var lng = $('#lng').val();
            var location = $('#place').val();
            var pagenum = $('#pagenum').val();
    			$.ajax({
    				type:"get",
    				url:"<?php echo site_url();?>careseeker_therapist/search",
    				data:"pagenum="+pagenum+"&lat="+lat+"&lng="+lng+"&location="+location+"&neighbour="+neighbour+"&gender_of_caregiver="+gender_of_caregiver,
    				success:function(message){
    						$(".searchloader").fadeOut("fast");
    						var json = jQuery.parseJSON(message);
    		 				var pagenum = json.num;
    		 				var pagedata = json.userdatas;
    						$('#list_container').html(pagedata);
    						$('#total').text(json.total);
                            $('.navigations').html(json.pagination);
                            if (json.location) {
                        	$('#locationaddress').text(json.location)
                        }
    				}
    			});
		});

        $('.looking_to_work,.gender,.gender_of_caregiver,.morenum,.looking_to_work,.availability,.subject').click(function(){
                $(".searchloader").fadeIn("fast");
    			var neighbour = $('.neighbour').val();
                var gender_of_caregiver = $('.gender_of_caregiver').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';                          
    			var lat = $('#lat').val();
            var lng = $('#lng').val();
            var location = $('#place').val();
            var pagenum = $('#pagenum').val();
    			$.ajax({
    				type:"get",
    				url:"<?php echo site_url();?>careseeker_therapist/search",
    				data:"pagenum="+pagenum+"&lat="+lat+"&lng="+lng+"&location="+location+"&neighbour="+neighbour+"&gender_of_caregiver="+gender_of_caregiver,
    				success:function(message){
    						$(".searchloader").fadeOut("fast");
    						var json = jQuery.parseJSON(message);
    		 				var pagenum = json.num;
    		 				var pagedata = json.userdatas;
    						$('#list_container').html(pagedata);
    						$('#total').text(json.total);
                            $('.navigations').html(json.pagination);
                            if (json.location) {
                        	$('#locationaddress').text(json.location)
                        }
    				}
    			});         
        });
        var neighbour = $('.neighbour').val();
                var gender_of_caregiver = $('.gender_of_caregiver').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';                          
    			var lat = $('#lat').val();
            var lng = $('#lng').val();
            var location = $('#place').val();
            var pagenum = $('#pagenum').val();
    			$.ajax({
    				type:"get",
    				url:"<?php echo site_url();?>careseeker_therapist/search",
    				data:"pagenum="+pagenum+"&lat="+lat+"&lng="+lng+"&location="+location+"&neighbour="+neighbour+"&gender_of_caregiver="+gender_of_caregiver,
    				success:function(message){
    						$(".searchloader").fadeOut("fast");
    						var json = jQuery.parseJSON(message);
    		 				var pagenum = json.num;
    		 				var pagedata = json.userdatas;
    						$('#list_container').html(pagedata);
    						$('#total').text(json.total);
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
                        var gender_of_caregiver = $('.gender_of_caregiver').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';                          
                        var care_type = $( ".jobtype option:selected" ).val();
                        var lat = $('#lat').val();
            var lng = $('#lng').val();
            var location = $('#place').val();
            var distance = $('#sort_by_miles').val();
                        $.ajax({
                            type : "post",
                            url  : "<?php echo site_url();?>careseeker_specialneedscaregiver/savesearch",
                            data:"lat="+lat+"&lng="+lng+"&location="+location+"&distance="+distance+"&neighbour="+neighbour+"&gender_of_caregiver="+gender_of_caregiver+"&care_type="+care_type,
                            success:function(msg){
                                //console.log(msg);
                                alert('Search saved to search alerts section in your dashboard');
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
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/><!--for datepicker-->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script><!--for datepicker-->