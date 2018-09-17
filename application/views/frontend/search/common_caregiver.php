<script src="https://use.fontawesome.com/87c0f31b81.js"></script>
<script>
    $("#locationSearch").ready(function(){        
        var autocomplete = new google.maps.places.Autocomplete($("#autocomplete")[0], { types: ['geocode'] });
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace(); 
                var lat = place.geometry.location.lat();
                var lng = place.geometry.location.lng();                                
                $("#lat").val(lat);
                $("#lng").val(lng);
                $("#place").val(place.formatted_address);
            });                              
    });
</script>
<style>
    #site-wrapper {
        background: lightgrey;
    }
    .caregivers-contact-you {
        font-family: Rufina;
        color: #1d1c1b;
        font-size: 24px;
        font-weight: 400;
        line-height: 26px;
        text-align: center;
        margin-bottom:40px;
        margin-top: -50px;
        margin-left: 200px;
    }
    .right-caregivers {
        margin-top: 0px;
    }
    .white {
        background: white;
    }
    .navigatorBox {
        min-height: 160px;
    }
    .paddingBottom {
        padding-bottom: 5px;
    }
    .paddingTop {
        padding-top: 20px;
    }
    .inactive {
        color: grey;
        cursor:default;
    }
    @media (min-width: 992px) {
        .decreasePadding {
            padding-right: 2px;
            padding-left: 2px;
        }
    }
    @media (min-width: 1400px) {
        .container {
            width: 1290px;
        }
    }
    .amzn-native-container {
        margin-left: auto;
        margin-right: auto;
    }
</style>
<div class="container">
    <?php echo $this->breadcrumbs->show(); ?>
    <?php 
    $s1 = $this->uri->segment(1); // must be caregivers, jobs, organization
    $s2 = $this->uri->segment(2); // must be care type, job type
    $s3 = $this->uri->segment(3);
    ?>
    <?php if($s1 == 'caregivers'){
        $ac = $account_category==3?3:2; ?>
        <div class="caregivers-contact-you"><p>Want Caregivers to Contact you?<a href='<?php echo site_url()."signup?ac=$ac"?>' class="btn btn-primary ml10 btn-xs">Post a Job for free</a></p></div>
    <?php } else {
            $ac = $account_category==3?3:1; ?>
        <div class="caregivers-contact-you"><p>Want Employers to Contact you?<a href='<?php echo site_url()."signup?ac=$ac"?>' class="btn btn-primary ml10 btn-xs">Create a Profile for free</a></p></div>
    <?php } ?>
<?php
    if($s1=='jobs' && ($s2 == 'all'|| $s2 =='')) {
        $left_navbar='all_jobs';
        $careType = 'jobs';
    }

    if( $s1=='caregivers' && ($s2 == 'all'|| $s2 =='') ) {
        $left_navbar='caregivers';
        $careType = 'caregivers';
    }
        
    if( $s1=='caregivers' && $s2 == 'organizations') {
        $left_navbar='caregivers';
        $careType = 'organizations';
    }
                                
    if($s2 == 'babysitter'){
        if($s1 == 'caregivers')
            $left_navbar='babysitter';
        elseif($s1 == 'jobs')
            $left_navbar='careseeker_babysitter';
    }
    
    if($s2 == 'pediatric-baby-nurse'){
        if($s1 == 'caregivers')
            $left_navbar='baby_nurse';
        elseif($s1 == 'jobs')
            $left_navbar='careseeker_baby_nurse';
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
    
    if( $s1=='caregivers' && $s2 == 'organization-workers') {
        $left_navbar='organizations';
        $careType = 'organization-workers';
    }
    
    if( $s1=='caregivers' && $s2 == 'organization-workers' && $s3 = 'workers-staff-for-childcare-facility') {
        $left_navbar='organization_childcare';
    }
    
    if( $s1=='caregivers' && $s2 == 'organization-workers' && $s3 = 'workers-for-cleaning-company') {
        $left_navbar='organization_cleaning';
    }
    
    if( $s1=='caregivers' && $s2 == 'organization-workers' && $s3 = 'workers-staff-for-senior-care-facility') {
        $left_navbar='organization_senior_caregiver';
    }
    
    if( $s1=='caregivers' && $s2 == 'organization-workers' && $s3 = 'workers-staff-for-special-needs-facility') {
        $left_navbar='organization_special_needs_caregiver';
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

        $this->load->view('frontend/left_navbar/base', array('care_type' => $care_type, 'left_navbar' => $left_navbar, 's1' => $s1));

    }
    else{
        die('The page you are trying to access doesnt exist anymore');
    }
?>
<div class="right-caregivers col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding-left:30px;">

    <div class="searchloader mainsearch" style="display:none"></div>
    <div class="col-xs-12 white paddingTop navigatorBox">
        <div class="row paddingBottom">
            <div class="col-md-3 col-sm-6 col-xs-6 paddingBottom">
                <?php if($this->uri->segment(2) == 'organization-workers') {?>
                <label class="locationText" style="cursor:pointer">Find Workers for your</label> <?php $this->load->view('frontend/search/care_types_dropdown');?></br>
                <?php } else {?>
                <label class="locationText" style="cursor:pointer">Find a</label> <?php $this->load->view('frontend/search/care_types_dropdown'); if($s1 == 'jobs') {echo 'Job';}?> </br>
                <?php } ?>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 paddingBottom">
                <label class="locationText">Near</label>
                <t id="locationSearch" style="cursor:pointer">
            		<input type="text" name="location" class="required" value="<?php echo $location['place'] ?>" placeholder="Please enter a street address" id="autocomplete" style="width: 95%;cursor:pointer"/>
            		<input type="hidden" id="lng" value="<?php echo $location['lng']?>">
            		<input type="hidden" id="lat" value="<?php echo $location['lat']?>">
            		<input type="hidden" id="place" value="<?php echo $location['place']?>">
            		<input type="hidden" id="pagenum" value="">
            		<b class="locationCaret caret"></b>
            	</t>
        	</div>
        	<div class="col-md-2 col-xs-6 paddingBottom decreasePadding">
                <label class="locationText">Within</label>          
                <select name="sort_by_miles" id="sort_by_miles" style="cursor:pointer; width:95%">        
                    <option value="1" <?php if ($distance == 1) {echo 'selected="selected"';} ?>>1 Miles</option>
                    <option value="2" <?php if ($distance == 2) {echo 'selected="selected"';} ?>>2 Miles</option>
                    <option value="5" <?php if ($distance == 5) {echo 'selected="selected"';} ?>>5 Miles</option>
                    <option value="10" <?php if ($distance == 10) {echo 'selected="selected"';} ?>>10 Miles</option>
                    <option value="30" <?php if ($distance == 30) {echo 'selected="selected"';} ?>>30 Miles</option>
                    <option value="50" <?php if ($distance == 50) {echo 'selected="selected"';} ?>>50 Miles</option>
                    <option value="unlimited" <?php if ($distance == 'unlimited') {echo 'selected="selected"';} ?>>Unlimited Miles</option>
                </select>  
            </div>
            <div class="col-md-3 col-xs-6 paddingBottom">
                <label class="locationText" style="height:37px;"></label>  
                <a id="searchButton" style="cursor:pointer; padding: 5px 20px;font-size: 13px;" class="btn btn-primary btn-sm"><i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;GO</a>
            </div>
        </div>
        <div class="row paddingTop">
            <div class="col-xs-6 col-md-3 paddingBottom" style="padding-top:4px">
                <div class="total_rows hidden" style="margin-bottom: 0px; font-size: 24px; margin-top:-10px;">
            		<span id="total"></span>
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
            	</div>
            </div>
            <div class="col-xs-6 col-md-2 paddingBottom" style="padding-left:2px; padding-right: 2px;">
                <select name="sort_by_select" id="sort_by_select" style="cursor:pointer; width:100%; max-width: 130px;">        
                    <option value="tbl_userprofile.id">Sort by latest</option>
                    <option value="distance">Sort by distance</option>
                </select> 
            </div>
            <div class="col-xs-6 col-md-4 paddingBottom" style="padding-top:4px">
                <div class="navigations" style="float:none"></div>
            </div>
            <div style="margin-top: 1px;float: right;" style="margin-top: -4px;" class="col-md-3 col-xs-6 paddingBottom">
                <div>
        		    <span>Results per page</span>
        			<span class="fifteens">
                        <select id="per_page">
        					<option value="15">15</option>
        					<option value="25">25</option>
        					<option value="50">50</option>
        				</select>
        			</span>
        		</div>
    	    </div>
        </div>
	</div>

	<div class="clearfix margin-bot"></div>
	<div id="list_container" class="">
	</div>
	<div class="navigations"></div>
	</div>

</div> 
			<script src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=b995b62a-2c1a-4adc-94b4-639eb2be9af6"></script>

<script>
    function filterCaregivers() {
        $(".searchloader").fadeIn("fast");
        window.continue_pulse = true;
        PulseAnimation()
        var per_page = $("#per_page").val();
        var distance = $("#sort_by_miles").val();
        var sort_by = $('#sort_by_select').val();
		var care_type = $('#careId').val() != null ? $('#careId').val() : '<?php echo $careType ?>'
		var rate = $('.rate').val();
		var caregiverage_from = '';
		var caregiverage_to = '';
		if ($('#age_of_caregiver').val()) {
		    var ages = $('#age_of_caregiver').val().split('_')
		    caregiverage_from = ages[0];
		    caregiverage_to = ages[1];
		}
        var gender_of_caregiver = $("#gender_of_caregiver").val() ? $("#gender_of_caregiver").val() : '';
        var gender_of_careseeker = $('.gender_of_careseeker').is(':checked')?$('input[name=gender_of_careseeker]:checked').val():'';
        var lang = $('.lang:checked').map(function(_, el) {
	        return $(el).val();
	    }).get();
	    var jobLang = $('.job_lang:checked').map(function(_, el) {
	        return $(el).val();
	    }).get();
	    var observance = $('#observance').val() ? $('#observance').val() : '';

	    var carelocations = $('.carelocation:checked').map(function(_, el) {
	        return $(el).val();
	    }).get();
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
			data:"care_type="+care_type+"&rate="+rate+"&per_page="+per_page+"&distance="+distance+"&sort_by="+sort_by+"&pagenum="+pagenum+"&lat="+lat+"&lng="+lng+"&location="+location+"&caregiverage_from="+caregiverage_from+"&caregiverage_to="+caregiverage_to+"&gender_of_careseeker="+gender_of_careseeker+"&gender_of_caregiver="+gender_of_caregiver+"&language="+lang+"&job_language="+jobLang+"&observance="+observance+"&min_exp="+min_exp+"&availability="+availability+"&number_of_children="+number_of_children+"&morenum="+morenum+"&age_group="+age_group+"&looking_to_work="+looking_to_work+"&year_experience="+year_experience+"&carelocation="+carelocations+"&available="+available+"&start_date="+start_date,
			success:function(done){
			    window.continue_pulse = false
				$(".searchloader").fadeOut("fast");
				var json = jQuery.parseJSON(done);
 				var pagenum = json.num;
 				var pagedata = json.userdatas;
				$('#list_container').html(pagedata);
				$('#total').text(json.total);
                $('.navigations').html(json.pagination);
                $('.total_rows').removeClass('hidden')
                if (json.location) {
                	$('#locationaddress').text(json.location)
                }
                $('#half').raty({
                     path       : '<?php echo site_url();?>img/',
                     starHalf   : 'star-half.png',
                     starOff    : 'star-off.png',
                     starOn     : 'star-on.png',
                     half  : true,
                });
            
                $('.rating-score').each(function() {
                     $(this).raty({
                      path : '<?php echo site_url();?>img/',
                      starHalf   : 'star-half.png',
                      starOff    : 'star-off.png',
                      starOn     : 'star-on.png',
                      score	   : $(this).attr('id'),
                      readOnly : true,
                      half  : true,
                      space : false
                  });
                });
                $('.profile_snippets').each(function(e, f) {var text = f.innerText.substring(0, f.innerText.length - 1); f.innerText = text;})
	       }
		});
	}
	
	$(document).ready(function(){
	    var plc = $('#place').val()
	    $('#autocomplete').val(plc)
	    $('#locationaddress').val(plc)
	    filterCaregivers();
        $('.neighbour,.caregiverage_from,.caregiverage_to').blur(function(){
            $('#pagenum').val(1);
            filterCaregivers();
		});
		
        $('#age_of_caregiver, #observance,select[name="gender"],select[name="gender_of_caregiver"],.rate,.accept_insurance,.number_of_children,.year_experience,.age_group,#textbox1,.sub_care,#per_page,select[name="sort_by_select"]').change(function(){
			$('#pagenum').val(1);
            filterCaregivers();
		});
              
		$('.subject,.skills,.extra_field,.gender,.gender_of_caregiver,.gender_of_careseeker,.smoker,.lang,.job_lang,.homework_help,.on_short_notice,.sick_child_care,.morenum,.basic_housework,.vehicle,.looking_to_work,.year_experience,.training,.availability,.driver_license,.pick_up_child,.cook,.carelocation').click(function(){
            $('#pagenum').val(1);
            filterCaregivers();
		});
        
        //for pagination
        $(document).on('click', '.show_all', function(e) {
            $("#per_page").val(10000)
            $('#pagenum').val(1)
    		filterCaregivers()
        });
        
        $(document).on('click','.paginate_click',function (e) {
            if ($(this).attr("id") == 'inactive') {
                return false;
            }
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
<script>
    function PulseAnimation()
    {
    	$('.mainsearch').animate({
    		opacity: 0.3,
    	}, 500, function() {
    		$('.mainsearch').animate({
    			opacity: 1
    		}, 500, function() {
    			if(window.continue_pulse) {
    				PulseAnimation();
    			}
    		})
    	});
    }
</script>

<script>
      $(document).ready(function(){
        
        $('#searchButton').click(function(){
            var type = $('#careId').attr('data-type');
            var ids = $('#careId').val() != null ? $('#careId').val() : ['<?php echo $careType ?>']
            if (ids.length == 1) {
                navigate(ids[0], type)
            }
            if (ids.length > 1) {
                multisearch(ids.join(','), type)
            }
        });
        
        function multisearch(ids,type){
            var lat = $('#lat').val();
            var lng = $('#lng').val();
            var place = $('#place').val();
            var distance = $("#sort_by_miles").val();
            if (type == 'caregivers') {
                location.href = '<?php echo site_url();?>caregivers/all?location=' + place + '&lat=' + lat + '&lng=' + lng + '&ids=' + ids +'&distance=' + distance;
            }
            if (type == 'jobs')                    
                location.href = '<?php echo site_url();?>jobs/all?location=' + place + '&lat=' + lat + '&lng=' + lng + '&ids=' + ids +'&distance=' + distance;
            if(type == 'organization_job')
                location.href = '<?php echo site_url();?>caregivers/organizations/all?location=' + place + '&lat=' + lat + '&lng=' + lng + '&ids=' + ids +'&distance=' + distance;
        }
        
        function navigate(pagelink,type){
            var lat = $('#lat').val();
            var lng = $('#lng').val();
            var place = $('#place').val();
            var distance = $("#sort_by_miles").val();
            if(pagelink == '1')
                var locationaddress = 'babysitter';
            if(pagelink == '2')
                var locationaddress = 'nanny-au-pair';            
            if(pagelink == '3')
                var locationaddress = 'nursery-playgroup-drop-off-gan';
            if(pagelink == '4')
                var locationaddress = 'tutor-private-lessons';
             if(pagelink == '5')
                var locationaddress = 'senior-caregiver';
            if(pagelink == '6')
                var locationaddress = 'special-needs-caregiver';
            if(pagelink == '7')
                var locationaddress = 'therapists';
            if(pagelink == '8')
                var locationaddress = 'cleaning-household-help';
            if(pagelink == '9')
                var locationaddress = 'errand-runner-odd-jobs-personal-assistant-driver';   
            if(pagelink == '10')
                var locationaddress = 'pediatric-baby-nurse'; 
            if(pagelink == '11')
                var locationaddress = 'day-care-center-day-camp-afternoon-activities';
            if(pagelink == '13')
                var locationaddress = 'senior-care-agency';
            if(pagelink == '14')
                var locationaddress = 'special-needs-center';
            if(pagelink == '15')
            	var locationaddress = 'cleaning-household-help-company';
            if(pagelink == '16')
            	var locationaddress = 'assisted-living-senior-care-center-nursing-home';
             if(pagelink == '17')
            	var locationaddress = 'babysitter';
             if(pagelink == '18')
            	var locationaddress = 'nanny-au-pair';
             if(pagelink == '19')
            	var locationaddress = 'tutor-private-lessons';
             if(pagelink == '20')
            	var locationaddress = 'senior-caregiver';
             if(pagelink == '21')
            	var locationaddress = 'errand-runner-odd-jobs-personal-assistant-driver';
             if(pagelink == '22')
            	var locationaddress = 'special-needs-caregiver';
             if(pagelink == '23')
            	var locationaddress = 'pediatric-baby-nurse';
             if(pagelink == '24')
            	var locationaddress = 'cleaning-household-help';            
             if(pagelink == '25' || pagelink == '31')
                var locationaddress = 'workers-staff-for-childcare-facility';
            if(pagelink == '26' || pagelink == '35')
                var locationaddress = 'workers-staff-for-senior-care-facility';
            if(pagelink == '27' || pagelink == '36')
                var locationaddress = 'workers-staff-for-special-needs-facility';
             if(pagelink == '28' || pagelink == '38')
                var locationaddress = 'workers-for-cleaning-company';
            
            if(pagelink == 'caregivers')
                var locationaddress = 'all';
            if(pagelink == 'jobs')
                var locationaddress = 'all';
            if(pagelink == 'organizations')
                var locationaddress = '';
            if(type == 'caregivers')    
                if (pagelink == '3' || pagelink == '11' || pagelink == '13' || pagelink == '14' || pagelink == '15' || pagelink == 'organizations') {
                    url = '<?php echo site_url();?>caregivers/organizations/'+locationaddress + '?location=' + place + '&lat=' + lat + '&lng=' + lng +'&distance=' + distance;
                } else if (pagelink == '25' || pagelink == '26' || pagelink == '27' || pagelink == '28' || pagelink == '35' || pagelink == '36' || pagelink == '31' || pagelink == '38') { 
                    url = '<?php echo site_url();?>caregivers/organizations/'+locationaddress + '?location=' + place + '&lat=' + lat + '&lng=' + lng +'&distance=' + distance;
                } else {
                    url = '<?php echo site_url();?>caregivers/organization-workers/'+locationaddress + '?location=' + place + '&lat=' + lat + '&lng=' + lng +'&distance=' + distance;
                }
            if(type == 'jobs')                    
                url = '<?php echo site_url();?>jobs/'+locationaddress + '?location=' + place + '&lat=' + lat + '&lng=' + lng +'&distance=' + distance;
            if(type == 'organization_job')
                url= '<?php echo site_url();?>caregivers/organization-workers/'+locationaddress + '?location=' + place + '&lat=' + lat + '&lng=' + lng +'&distance=' + distance;
                
            location.href = url
        } //end of navigate
    });			         
</script>

<link rel="stylesheet" href="<?php echo base_url();?>css/jquery.raty.css">
<script src="<?php echo base_url();?>js/jquery.raty.js"></script>
<!--<script src="<?php echo base_url();?>js/labs.js" type="text/javascript"></script>-->

<style>
#amzn-native-ad-1 {
    margin-left: auto;
    margin-right:auto;
}
</style>



