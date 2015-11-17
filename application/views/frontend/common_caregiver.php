<link rel="stylesheet" href="<?php echo base_url();?>css/jquery.raty.css">          
<script src="<?php echo base_url();?>js/jquery.raty.js"></script>
<script>
    $("#locationSearch").ready(function(){        
        var autocomplete = new google.maps.places.Autocomplete($("#autocomplete")[0], { types: ['address'] });
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();                    
                var lat = place.geometry.location.lat();
                var lng = place.geometry.location.lng();                                
                $("#lat").val(lat);
                $("#lng").val(lng);
                $("#place").val(place.formatted_address);
                $(".searchloader").fadeIn("fast");
                filterCaregivers();
            });                              
    });
</script>
<div class="container">
<?php
    $s1 = $this->uri->segment(1); // must be caregivers, jobs, organization
    $s2 = $this->uri->segment(2); // must be care type, job type
    $s3 = $this->uri->segment(3);
    if($s1=='jobs' && ($s2 == 'all'|| $s2 ==''))
        $left_navbar='all_jobs';

    if( $s1=='caregivers' && ($s2 == 'all'|| $s2 =='') )
        $left_navbar='caregivers';
        
    if( $s1=='caregivers' && $s2 == 'organizations')
        $left_navbar='caregivers';
                                
    if($s2 == 'babysitter'){
        if($s1 == 'caregivers')
            $left_navbar='babysitter';
        elseif($s1 == 'jobs')
            $left_navbar='careseeker_babysitter';
    }

    if($s2 == 'nanny-au-pair'){
        if($s1 == 'caregivers')
            $left_navbar='nanny';
        elseif($s1 == 'jobs')
            $left_navbar='careseeker_nanny';
    }

    if($s2 == 'nursery-playgroup-drop-off-gan'){
        if($s1 == 'caregivers')
            $left_navbar='nursery';
    }

    if($s2 == 'tutor-private-lessons'){
        if($s1 == 'caregivers')
            $left_navbar='tutor';
        elseif($s1 == 'jobs')
            $left_navbar='careseeker_tutor';
    }

    if($s2 == 'senior-caregiver'){
        if($s1 == 'caregivers')
            $left_navbar='senior_caregiver';
        elseif($s1 == 'jobs')
            $left_navbar='careseeker_seniorcaregiver';
    }

    if($s2 == 'special-needs-caregiver'){
        if($s1 == 'caregivers')
            $left_navbar='special_needs_caregiver';
        elseif($s1 == 'jobs')
            $left_navbar='careseeker_specialneedscaregiver';
    }

    if($s2 == 'therapists'){
        if($s1 == 'caregivers')
            $left_navbar='therapists';
        elseif($s1 == 'jobs')
            $left_navbar='careseeker_therapist';
    }

    if($s2 == 'cleaning-household-help'){
        if($s1 == 'caregivers')
            $left_navbar='cleaning';
        elseif($s1 == 'jobs')
            $left_navbar='careseeker_cleaninghousehold';
    }

    if($s2 == 'errand-runner-odd-jobs-personal-assistant-driver'){
        if($s1 == 'caregivers')
            $left_navbar='errand_runner';
        elseif($s1 == 'jobs')
            $left_navbar='careseeker_errandrunner';
    }

    if($s2 == 'day-care-center-day-camp-afternoon-activities'){
        $left_navbar='daycarecenter';
    }
    if($s2 == 'senior-care-agency')
        $left_navbar='seniorcareagency';

    if($s2 == 'special-needs-center')
        $left_navbar='specialneedscenter';

    if($s2 == 'cleaning-household-help-company')
        $left_navbar='cleaninghousehold';

    if($s2 == 'assisted-living-senior-care-center-nursing-home')
        $left_navbar='seniorcarecenter';

    if($s2 == 'workers-staff-for-childcare-facility'){
        if($s1 == 'caregivers')
            $left_navbar='babysitter';
        elseif($s1 == 'jobs')
            $left_navbar='careseeker_childcarefacility';
    }
    
    if($s1 == 'caregivers' && $s2 == 'organizations' && $s3 == 'workers-staff-for-childcare-facility'){        
            $left_navbar='organization_childcare';
    }
            
    if($s1 == 'caregivers' && $s2 == 'organizations' && $s3 == 'workers-staff-for-senior-care-facility'){       
        $left_navbar='organization_senior_caregiver';       
    }        
    if( $s1 == 'caregivers' && $s2 == 'organizations' && $s3 == 'workers-staff-for-special-needs-facility'){
        
            $left_navbar='organization_special_needs_caregiver';
        
    }        
    if( $s1 == 'caregivers' && $s2 == 'organizations' && $s3 == 'workers-for-cleaning-company'){        
            $left_navbar='organization_cleaning';            
    }
    if( $s1=='caregivers' && $s2 == 'organizations' && $s3 == '') {
        $left_navbar='organizations';
    }   
    if( $s1=='caregivers' && $s2 == 'organizations' && $s3 == 'all') {
        $left_navbar='organizations';
    }

    if($s2 == 'workers-staff-for-senior-care-facility'){
        if($s1 == 'caregivers')
            $left_navbar='senior_caregiver';
        elseif($s1 == 'jobs')
            $left_navbar='careseeker_seniorcarefacility';
    }
    elseif($s2 == 'workers-staff-for-special-needs-facility'){
        if($s1 == 'caregivers')
            $left_navbar='special_needs_caregiver';
        elseif($s1 == 'jobs')
            $left_navbar='careseeker_specialneedsfacility';
    }
    if($s2 == 'workers-for-cleaning-company'){
        if($s1 == 'caregivers')
            $left_navbar='cleaning';
        elseif($s1 == 'jobs')
            $left_navbar='careseeker_cleaningcompany';
    }
    if(isset($left_navbar)){

        $this->load->view('frontend/left_navbar/' . $left_navbar, array('care_type' => $care_type));

    }
    else{
        die('The page you are trying to access doesnt exist anymore');
    }
?>
<div class="right-caregivers col-lg-9 col-md-9 col-sm-9 col-xs-12">
    <br />

    <div class="searchloader" style="display:none"></div>
    <?php if ($care_type < 10 && $account_category == 3) {?>
    Find Workers for your <?php $this->load->view('frontend/common/left_nav_title');?>  <br>
    <?php } else {?>
    Find a <?php $this->load->view('frontend/common/left_nav_title'); if($s1 == 'jobs') {echo 'Job';}?>  <br>
    <?php } ?>
    Near <t id="locationSearch">
		<input type="text" name="location" class="required" value="<?php echo $location['place'] ?>" placeholder="Please enter a street address" id="autocomplete" style="width: 229px;margin-left: 9px;"/>
		<input type="hidden" id="lng" value="<?php echo $location['lng']?>">
		<input type="hidden" id="lat" value="<?php echo $location['lat']?>">
		<input type="hidden" id="place" value="<?php echo $location['place']?>">
		<input type="hidden" id="pagenum" value="">
	</t>        
    within            
    <select name="sort_by_miles" id="sort_by_miles">        
        <option value="1">1 Miles</option>
        <option value="2">2 Miles</option>
        <option value="5">5 Miles</option>
        <option value="10">10 Miles</option>
        <option value="25">25 Miles</option>
        <option value="50">50 Miles</option>
        <option value="unlimited" selected="selected">Unlimited Miles</option>
    </select>   
	<h3>
		<span id="total"><?php echo $total_rows ?></span>
        <?php
          if( $total_rows > 1 && substr($title,-1) == 'y' ){
            $ntitle = substr($title,0,-1);
            echo $ntitle.'ies near';
          }
          elseif( substr($title,-1) == 's' ) echo $title.' near ';
          elseif( $total_rows > 1 ) echo $title.'s near ';
          else echo $title.' near ';
        ?>
        <span id="locationaddress"><?php echo $location['place'];?></span>
	</h3>
    
	<?php if($care_type < 17 && $care_type > 0){
        $ac = $account_category==3?3:1; ?>
        <div class="want-top"><p>Want Caregivers to Contact you?<a href='<?php echo site_url()."signup?ac=$ac"?>' class="btn btn-primary ml10 btn-xs">Post a Job for free</a></p></div>
    <?php } else {
            $ac = $account_category==3?3:2; ?>
        <div class="want-top"><p>Want Employers to Contact you?<a href='<?php echo site_url()."signup?ac=$ac"?>' class="btn btn-primary ml10 btn-xs">Create a Profile for free</a></p></div>
    <?php } ?>

	<div class="select-relevance">
            <select name="sort_by_select" id="sort_by_select">
                <option value="distance">Sort by distance</option>
                <option value="tbl_userprofile.id">Sort by latest</option>
            </select>

		<span>Results per Page</span>
			<span class="fifteens">
                <select id="per_page">
					<option value="15">15</option>
					<option value="25">25</option>
					<option value="50">50</option>
					<option value="100">100</option>
				</select>
			</span>
	</div>
<?php
$pagination	= '';
if ($pages > 5) {
    $pages = 5;
}
if ($pages > 1) {	
	for($i = 1; $i<=$pages; $i++)
	{

		if($i==1){
            $pagination .= ' <a href="#" class="paginate_click active" id="'.$i.'-page" >'.$i.'</a> ';
        }else{
            $pagination .= ' <a href="#" class="paginate_click in-active" id="'.$i.'-page">'.$i.'</a> ';
        }

	}
	$pagination .= '<a href="#" class="paginate_click in-active" id="next">next</a>';
} 
?>
    <div class="navigations"></div>
	<div class="clearfix margin-bot"></div>
	<div id="list_container" class="">
    <?php $this->load->view('frontend/common_profile_list', array('userdatas'=>$userdatas,'userlogs'=>$userlogs));?>
	</div>
	<div class="navigations"></div>
	</div>
</div> 
<script>
    function filterCaregivers() {
        var per_page = $("#per_page").val();
        var distance = $("#sort_by_miles").val();
        var sort_by = $('#sort_by_select').val();
		var care_type = $('#careId').val();
		var rate = $('.rate').val();
        var caregiverage_from = $('.caregiverage_from').val() ? $('.caregiverage_from').val() : '';
        var caregiverage_to = $('.caregiverage_to').val() ? $('.caregiverage_to').val() : '';
        var gender_of_caregiver = $('.gender_of_caregiver').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
        var gender_of_careseeker = $('.gender_of_careseeker').is(':checked')?$('input[name=gender_of_careseeker]:checked').val():'';
        var lang = $('.lang:checked').map(function(_, el) {
	        return $(el).val();
	    }).get();
        var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
	    var observance = $('.observance:checked').map(function(_, el) {
	        return $(el).val();
	    }).get();

	    var carelocations = $('.carelocation:checked').map(function(_, el) {
	        return $(el).val();
	    }).get();

	    var trainings = $('.training:checked').map(function(_, el) {
	        return $(el).val();
	    }).get();
	    var skills = $('.skills:checked').map(function(_, el) {
	        return $(el).val();
	    }).get();
	    var able_to_work = $('.able_to_work:checked').map(function(_, el) {
	        return $(el).val();
	    }).get();
        var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
	    var min_exp = $('.year_experience').val() ? $('.year_experience').val() : '';
	    var availability = $('.availability:checked').map(function(_, el) {
	        return $(el).val();
	    }).get();
	    var number_of_children = $('.number_of_children').val() ? $('.number_of_children').val() : '';
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
	    var subject = $('.subject:checked').map(function(_, el) {
            return $(el).val();
        }).get();
	    var pick_up_child = $('.pick_up_child').is(':checked') ? $('.pick_up_child').val() : '';
        var cook = $('.cook').is(':checked') ? $('.cook').val():'';
        var basic_housework = $('.basic_housework').is(':checked') ? $('.basic_housework').val() :'';
        var homework_help = $('.homework_help').is(':checked') ? $('.homework_help').val() :'';
        var bed_children = $('.bed_children').is(':checked') ? $('.bed_children').val() :'';
        var bath_children = $('.bath_children').is(':checked') ? $('.bath_children').val() :'';
        var accept_insurance = $('.accept_insurance').is(':checked')?$('input[name=accepts_insurance]:checked').val():'';
	    var cook = $('.cook').is(':checked') ? $('.cook').val():'';
        var basic_housework = $('.basic_housework').is(':checked') ? $('.basic_housework').val() :'';
        var homework_help = $('.homework_help').is(':checked') ? $('.homework_help').val() :'';
        var driver_license = $('.driver_license').is(':checked')?$('.driver_license').val():'';
	    var vehicle = $('.vehicle').is(':checked') ? $('.vehicle').val(): '';
	    var available = $('.available_on_short_notice').is(':checked')?$('.available_on_short_notice').val():'';
        var start_date = $("#textbox1").val()?$("#textbox1").val():'';
        var extra_field = $('.extra_field:checked').map(function(_, el) {
	        return $(el).val();
	    }).get();
        var lat = $('#lat').val();
        var lng = $('#lng').val();
        var location = $('#place').val();
        var pagenum = $('#pagenum').val() ? $('#pagenum').val(): 1;
		$.ajax({
			type:"get",
			url:"<?php echo site_url();?>common_care_controller/search",
			data:"care_type="+care_type+"&subject="+subject+"&rate="+rate+"&skills="+skills+"&per_page="+per_page+"&distance="+distance+"&sort_by="+sort_by+"&pagenum="+pagenum+"&bath_children="+bath_children+"&bed_children="+bed_children+"&pick_up_child="+pick_up_child+"&cook="+cook+"&basic_housework="+basic_housework+"&homework_help="+homework_help+"&lat="+lat+"&lng="+lng+"&location="+location+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&gender_of_careseeker="+gender_of_careseeker+"&gender_of_caregiver="+gender_of_caregiver+"&language="+lang+"&observance="+observance+"&min_exp="+min_exp+"&availability="+availability+"&number_of_children="+number_of_children+"&morenum="+morenum+"&age_group="+age_group+"&looking_to_work="+looking_to_work+"&year_experience="+year_experience+"&carelocation="+carelocations+"&trainings="+trainings+"&able_to_work="+able_to_work+"&driver_license="+driver_license+"&vehicle="+vehicle+"&available="+available+"&start_date="+start_date+"&smoker="+smoker+"&extra_field="+extra_field+"&accept_insurance="+accept_insurance,
			success:function(done){
				$(".searchloader").fadeOut("fast");
				var json = jQuery.parseJSON(done);
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
	}
	
	$(document).ready(function(){
	    var plc = $('#place').val()
	    $('#autocomplete').val(plc)
	    $('#locationaddress').val(plc)
	    filterCaregivers();
        $('.neighbour,.caregiverage_from,.caregiverage_to').blur(function(){
            $(".searchloader").fadeIn("fast");
            $('#pagenum').val(1);
            filterCaregivers();
		});        
        
        $('.rate,.accept_insurance,.number_of_children,.year_experience,.age_group,#textbox1,.sub_care,#per_page,#sort_by_miles,#sort_by_select').change(function(){
			$(".searchloader").fadeIn("fast");
			$('#pagenum').val(1);
            filterCaregivers();
		});
              
		$('.subject,.skills,.extra_field,.gender_of_caregiver,.gender_of_careseeker,.smoker,.lang,.observance,.homework_help,.on_short_notice,.sick_child_care,.morenum,.basic_housework,.vehicle,.looking_to_work,.year_experience,.training,.availability,.driver_license,.pick_up_child,.cook,.carelocation').click(function(){
            $(".searchloader").fadeIn("fast");
            $('#pagenum').val(1);
            filterCaregivers();
		});
        
        //for pagination
        $(document).on('click','.paginate_click',function (e) {
            $(".searchloader").fadeIn("fast");
            if ($(this).attr("id") == 'previous') {
                var page_num = parseInt($('.paginate_click.active').attr('id').split('-')[0]) - 1
                if (page_num == 0) {
                    page_num = 1
                }
            } else if ($(this).attr("id") == 'next') {
                var page_num = parseInt($('.paginate_click.active').attr('id').split('-')[0]) + 1
                if (page_num == $('.paginate_click').length - 1) {
                    page_num = $('.paginate_click').length - 2
                }
            } else {
                var clicked_id = $(this).attr("id").split("-"); //ID of clicked element, split() to get page number.
    		    var page_num = parseInt(clicked_id[0]); //clicked_id[0] holds the page number we need 
            }
            
	        $('#pagenum').val(page_num)
    		filterCaregivers()
    	});
        
        
         $("#chkbox1").click(function(){
            if($('#chkbox1').is(':checked')){
                $("#textbox1").show();
                $( "#textbox1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();   
            }else{
                //$("#textbox1").hide(); 
                $('#textbox1').val('');
                $(".searchloader").fadeIn("fast");
                filterCaregivers();

            }       
         });	

		// onpress esc key hide the loader
		$(document).on('keyup',function(evt) {
		    if (evt.keyCode == 27) {
		       $(".searchloader").fadeOut("fast");
		    }
		});
	});
</script>

<script>
    $(document).ready(function() {
	
    	var $myDialog = $('<div></div>')
        .html('Are you sure you want to save this search?')
        .dialog({
        autoOpen: false,
        title: 'Save Search',
        buttons: {
            "OK": function () {
                $(this).dialog("close");
        		var care_type = $('#careId').val();
        		var caregiverage_from = $('.caregiverage_from').val() ? $('.caregiverage_from').val() : '';
                var caregiverage_to = $('.caregiverage_to').val() ? $('.caregiverage_to').val() : '';
        		var gender = $('.gender').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
        	    var willing = $(this).val();
                var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
        		var lang = $('.lang:checked').map(function(_, el) {
        	       	return $(el).val();
        	    }).get();
        	    var observance = $('.observance:checked').map(function(_, el) {
        	       	return $(el).val();
        	    }).get();
        	    var age_group = $('.age_group:checked').map(function(_, el) {
        	       	return $(el).val();
        	    }).get();
        	    var lat = $('#lat').val();
                var lng = $('#lng').val();
                var location = $('#place').val();
                var distance = $('#sort_by_miles').val();
        	    $.ajax({
        	    	type:"post",
        	    	url:"<?php echo site_url();?>common_care_controller/savesearch",
        	    	data:"lat="+lat+"&lng="+lng+"&location="+location+"&distance="+distance+"&care_type="+care_type+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&languages="+lang+"&observance="+observance+"&age_group="+age_group+"&gender="+gender+"&care_type="+care_type+"&willing="+willing+"&smoker="+smoker,
        	    	success:function(done){
           				//console.log(done);
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
