<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places&language=en-AU"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/jquery.raty.css">
<script src="<?php echo base_url();?>js/jquery.raty.js"></script>
<div class="clearfix"></div>
<div class="container">
<?php 
    $s1 = $this->uri->segment(1); // must be caregivers, jobs, organization
    $s2 = $this->uri->segment(2); // must be care type, job type    
    
    if($s1=='jobs' && ($s2 == 'all'|| $s2 ==''))
        $left_navbar='careseeker_babysitter';
    
    if( $s1=='caregivers' && ($s2 == 'all'|| $s2 =='') )
        $left_navbar='babysitter';
        
    if( $s1=='jobs' && $s2 == 'organizations')
        $left_navbar='careseeker_childcarefacility';
                                
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
            $left_navbar='nanny';                              
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
        $this->load->view('frontend/common/'.$left_navbar.'/left_navbar');
    }
    else{
        die('The page you are trying to access doesnt exist anymore');
    }                                                                   
?>
<div class="right-caregivers">	
    
    <div class="searchloader" style="display:none"></div>		
    Showing results for <br /><a href="javascript:void(0);" class="showgeolocation" id="showgeolocation1"><?php echo $location ?></a>        
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
    <div id="locationField" style="display: none;">
		<input type="text" name="location" class="required" value="" id="autocomplete"/>
		<input type="hidden" id="lng" value="<?php echo $lat; ?>">
		<input type="hidden" id="lat" value="<?php echo $lng; ?>">		 
	</div>
      	

<h3>
		<span id="total"><?php echo $total_rows ?></span>
        <?php
          echo $title." near ";
        ?>         
        <span id="locationaddress"><?php echo $location;?></span>
	</h3>
    
	<?php  if(($account_category == 1) || ($care_type < 17 && $care_type > 0)){ 
        $ac = $account_category==3?3:1; ?>
        <div class="want-top"><p>Want Caregivers to Contact you?<a href='<?php echo site_url()."signup?ac=$ac"?>' class="btn btn-primary ml10 btn-xs">Post a Job for free</a></p></div>
    <?php }
        if(($account_category == 2) || ($care_type > 16 && $care_type < 29) ){ 
            $ac = $account_category==3?3:2; ?>
        <div class="want-top"><p>Want Employers to Contact you?<a href='<?php echo site_url()."signup?ac=$ac"?>' class="btn btn-primary ml10 btn-xs">Create a Profile for free</a></p></div>
    <?php } ?>
    
	<div class="select-relevance">               
            <select name="sort_by_select" id="sort_by_select">
                <option value="distance">Sort by distance</option>
                <option value="tbl_userprofile.id">Sort by latest</option>                
                <option value="age">Sort by age</option>
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
<div class="navigations"><?php echo $pagination; ?></div>	
	<div id="list_container">
	   <?php $this->load->view('frontend/common_profile_list', array('userdatas'=>$userdatas,'userlogs'=>$userlogs));?>
	</div>	
</div>
</div>
 

<script>
	$(document).ready(function(){
	   $("#locationField").ready(function(){        
        var autocomplete = new google.maps.places.Autocomplete($("#autocomplete")[0], {});
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    var place = autocomplete.getPlace();                    
                    var lat = place.geometry.location.A;
                    var lng = place.geometry.location.F;                                 
                    $("#lat").val(lat);
                    $("#lng").val(lng);                    
                    huge_function();
            });
        });
        
        $('.showgeolocation').click(function(){
			$('#locationField').toggle();
			$('#autocomplete').val('');
            $('#autocomplete').focus();
		});               
        
        $('.rate,.rate_type,.smoker,.lang,.gender,.observance,.morenum,.age_group,.looking_to_work,.short_notice,.on_short_notice,.driver_license,.vehicle,.pick_up_child,.cook,.basic_housework,.homework_help,.bed_children,.bath_children,.rate_type,.subject,.carelocations,.skills,.willing_to_work,.training').click(function(event){
            event.preventDefault();
            huge_function(); 
        });
        
        $('.neighbour,.caregiverage_from,.caregiverage_to,.gender_of_caregiver').keyup(function(event){
            event.preventDefault();
            huge_function(); 
        });
        
        $('#textbox1,.rate,.year_experience,.number_of_children,.result_per_page,#sort_by_miles,#sort_by_select,#per_page').change(function(event){
            event.preventDefault();
            huge_function(); 
        });
        $(document).on('click','.paginate_click',function(event){
            event.preventDefault();
            var clicked_id = $(this).attr("id").split("-"); //ID of clicked element, split() to get page number.
    		var page_num = parseInt(clicked_id[0]); //clicked_id[0] holds the page number we need 		
    		$('.paginate_click').removeClass('active'); //remove any active class
            $('.paginate_click').addClass('in-active'); //remove any active class
            huge_function(page_num,'no');
            $(this).removeClass('in-active');
    		$(this).addClass('active'); //add active class to currently clicked element (style purpose)        		
    		return false; //prevent going to herf link
        });
        
        //huge function starts
        function huge_function(page_num = 1,save_search = 'no'){    
            $(".searchloader").fadeIn("fast");
            var neighbour = $('.neighbour').val()?$('.neighbour').val():'';
			var gender = $('.gender').is(':checked') ? $('input[name=gender_of_caregiver]:checked').val():'';
            var smoker = $('.smoker').is(':checked') ? $('input[name=smoker]:checked').val():'';
            var lang = $('.lang:checked').map(function(_, el) {
		        return $(el).val()?$(el).val():'';
		    }).get();
            var observance = $('.observance:checked').map(function(_, el) {
		        return $(el).val()?$(el).val():'';
		    }).get();
            var number_of_children = $('.number_of_children').val()?$('.number_of_children').val():'';
            var morenum = $('.morenum:checked').map(function(_, el) {
		        return $(el).val()?$(el).val():'';
		    }).get();
            var age_group = $('.age_group:checked').map(function(_, el) {
		        return $(el).val()?$(el).val():'';
		    }).get();
            var looking_to_work = $('.looking_to_work:checked').map(function(_, el) {
		        return $(el).val()?$(el).val():'';
		    }).get();                        
            var available = $('.short_notice').is('.checked')?$('.short_notice').val():'';
            var driver_license = $('.driver_license').is(':checked') ? $('.driver_license').val() : ''; 
            var vehicle = $('.vehicle').is(':checked') ? $('.vehicle').val(): '';
            var pick_up_child = $('.pick_up_child').is(':checked') ? $('.pick_up_child').val() : '';
            var cook = $('.cook').is(':checked') ? $('.cook').val():'';
            var basic_housework = $('.basic_housework').is(':checked') ? $('.basic_housework').val() :'';
            var homework_help = $('.homework_help').is(':checked') ? $('.homework_help').val() :'';
            var available = $('.on_short_notice').is(':checked') ? $('.on_short_notice').val():'';
            var bed_children = $('.bed_children').is(':checked') ? $('.bed_children').val() :'';
            var bath_children = $('.bath_children').is(':checked') ? $('.bath_children').val() :'';                                    
            var caregiverage_from  = $('.caregiverage_from').val()?$('.caregiverage_from').val():'';
            var caregiverage_to = $('.caregiverage_to').val()?$('.caregiverage_to').val():'';
            var start_date = $("#textbox1").val()?$("#textbox1").val():'';
            var availability = $('.availability:checked').map(function(_, el) {
    		        return $(el).val()?$(el).val():'';
    		    }).get();
            var rate = $('.rate').val() ? $('.rate').val() :'';
            var rate_type = $('.rate_type:checked').map(function(_, el) {
    		        return $(el).val()?$(el).val():'';
    		    }).get();
            var gender_of_caregiver = $('.gender_of_caregiver').is(':checked')?$('input[name=gender_of_caregiver]:checked').val():'';
            var subject = $('.subject:checked').map(function(_, el) {
    		        return $(el).val()?$(el).val():'';
    		    }).get();
            var looking_to_work = $('.carelocation:checked').map(function(_, el) { 
		        return $(el).val()?$(el).val():'';
		    }).get();            
            var year_experience = $('.year_experience').val()?$('.year_experience').val():'';
            var willing_to_work = $('.willing_to_work:checked').map(function(_, el) {
    		        return $(el).val()?$(el).val():'';
    		    }).get();
            var training = $('.training:checked').map(function(_, el) {
		        return $(el).val()?$(el).val():'';
		    }).get();                                                                        
            var accept_insurance = $('.accept_insurance').is(':checked')?$('input[name=accept_insurance]:checked').val():'';
            var location = $('#autocomplete').val()?$('#autocomplete').val():$('#showgeolocation1').text();
            var result_per_page = $("#per_page").val()?$("#per_page").val():'';
            var lat = $('#lat').val()?$('#lat').val():'';
            var lng = $('#lng').val()?$('#lng').val():'';
            var miles = $('#sort_by_miles').val()?$('#sort_by_miles').val():'';
            var care_type = $('.service').val()?$('.service').val():'';
            var account_category = "<?php echo isset($account_category)?$account_category:''; ?>";
            var total_page = $('#total').text();
            var sort_by_select = $("#sort_by_select").val()?$("#sort_by_select").val():'';
            $.post("<?php echo site_url(); ?>lists",
                {
                    "location"          :location,
                    "lat"               :lat,
                    "lng"               :lng,
                    "miles"             :miles,
                    'result_per_page'   :result_per_page,
                    "care_type"         :care_type,
                    "account_category"  :account_category,
                    "neighbour"         :neighbour,
                    "gender"            :gender,
                    "smoker"            :smoker,
                    "lang"              :lang,
                    "observance"        :observance,
                    "number_of_children":number_of_children,
                    "morenum"           :morenum,
                    "age_group"         :age_group,
                    "looking_to_work"   :looking_to_work,
                    "year_experience"   :year_experience,
                    "available"         :available,
                    "driver_license"    :driver_license,
                    "vehicle"           :vehicle,
                    "pick_up_child"     :pick_up_child,
                    "cook"              :cook,
                    "basic_housework"   :basic_housework,
                    "homework_help"     :homework_help,                    
                    "bed_children"      :bed_children,
                    "bath_children"     :bath_children,
                    "caregiverage_from" :caregiverage_from,
                    "caregiverage_to"   :caregiverage_to,
                    "start_date"        :start_date,
                    "availability"      :availability,
                    "rate"              :rate,
                    "rate_type"         :rate_type,
                    "gender_of_caregiver":gender_of_caregiver,                                        
                    "willing_to_work"   :willing_to_work,
                    "training"          :training,
                    "accept_insurance"  :accept_insurance,
                    "page"              :page_num-1,
                    'total_page'        :total_page,
                    'save_search'       :save_search,
                    "sort_by_select"    :sort_by_select                                    
                },
                function(msg){
                    $('.searchloader').fadeOut("fast");
                    var json = jQuery.parseJSON(msg);
    				var pagenum = json.num;
    				var pagedata = json.userdatas;
    				$('#list_container').html(pagedata);
    				$('#total').text(json.total_rows);
                    $('.navigations').html(json.pagination);
            }); //end of post function
        }   //end of  huge function                                            		                                                                                                                                                          
    });
</script>