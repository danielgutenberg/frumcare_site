<link href="<?php echo site_url(); ?>style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places&language=en-AU"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/jquery.raty.css">          
<script src="<?php echo base_url();?>js/jquery.raty.js"></script>
<script>
    $("#locationField").ready(function(){        
        var autocomplete = new google.maps.places.Autocomplete($("#autocomplete")[0], {});
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    var place = autocomplete.getPlace();                    
                    var lat = place.geometry.location.k;
                    var lng = place.geometry.   location.D;                                
                    $("#lat").val(lat);
                    $("#lng").val(lng);
                    $(".searchloader").fadeIn("fast");
                    var x = $('#sort_by_select').val();
                    var y = $('#autocomplete').val();
                    var z = $("#per_page").val();
                    var lat = $('#lat').val();
                    var lng = $('#lng').val();
                    var miles = $("#sort_by_miles").val();
                    var ac = "<?php echo $account_category ?>";
                    var care_type = "<?php echo $care_type ?>";
                    if(y!=''){
                        $("#showgeolocation1").text(y);
                        $("#locationaddress").text(y);
                        $.post('<?php echo site_url()?>common_care_controller/sort',{'miles':miles,'option':x,'per_page':z,'lat':lat,'lng':lng,'location':y,'account_category':ac,'care_type':care_type,'total_page':$('#total').text()},function(msg){
                            $(".searchloader").fadeOut("fast");
    				  			var json = jQuery.parseJSON(msg);
    							var pagenum = json.num;
    							var pagedata = json.userdatas;
    							$('#list_container').html(pagedata);
    							$('#total').text(json.total_rows);
                                $('.navigations').html(json.pagination);    
                        
                        });
                    }
                    else{
                        var y = $("#showgeolocation1").text();
                        $.post('<?php echo site_url()?>common_care_controller/sort',{'miles':miles,'option':x,'per_page':z,'location':y,'account_category':ac,'care_type':care_type,'total_page':$('#total').text()},function(msg){
                            $(".searchloader").fadeOut("fast");
    				  			var json = jQuery.parseJSON(msg);
    							var pagenum = json.num;
    							var pagedata = json.userdatas;
    							$('#list_container').html(pagedata);
    							$('#total').text(json.total_rows);
                                $('.navigations').html(json.pagination);
                            
                        });
                    }                             
                });                              
    });
</script>
<div class="container">
<?php 
    $s1 = $this->uri->segment(1); // must be caregivers, jobs, organization
    $s2 = $this->uri->segment(2); // must be care type, job type    
    
    if($s1=='jobs' && ($s2 == 'all'|| $s2 ==''))
        $left_navbar='careseeker_babysitter';
    
    if( $s1=='caregivers' && ($s2 == 'all'|| $s2 =='') )
        $left_navbar='babysitter';
        
    if( $s1=='caregivers' && $s2 == 'organizations')
        $left_navbar='babysitter';
                                
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

        $this->load->view('frontend/'.$left_navbar.'/left_navbar');

    }
    else{
        die('The page you are trying to access doesnt exist anymore');
    }                                                                   
?>
<div class="right-caregivers col-lg-9 col-md-9 col-sm-9 col-xs-12">
    <br />
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
		<input type="hidden" id="lng">
		<input type="hidden" id="lat">
		<!--<input type="button" value="Change Location" class="btn btn-primary" id="change_location"">--> 
	</div>  	
<script type="text/javascript">
	$(document).ready(function(){
		$('.showgeolocation').click(function(){
			$('#locationField').toggle();
			$('#autocomplete').val('');
            $('#autocomplete').focus();
		});
	})
</script>
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
        <span id="locationaddress"><?php echo $location;?></span>
	</h3>
    
	<?php if(($account_category == 1) || ($care_type < 17 && $care_type > 0)){ 
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
<?php
$pagination	= '';
if($pages > 1){	
	$pagination .= '<a href="#" class="paginate_click in-active" id="previous">previous</a>';
	for($i = 1; $i<=$pages; $i++)
	{
		
		if($i==1){
            $pagination .= ' <a href="#" class="paginate_click active" id="'.$i.'-page" >'.$i.'</a> ';
        }else{
            $pagination .= ' <a href="#" class="paginate_click in-active" id="'.$i.'-page">'.$i.'</a> ';   
        }
        
	}
	$pagination .= '<a href="#" class="paginate_click in-active" id="next">next</a></div>';
	//$pagination .= '</ul>';
} 
?>

	<div class="clearfix margin-bot"></div>
	<div id="list_container" class="">
	<?php //print_rr($userdatas);?>
    <?php $this->load->view('frontend/common_profile_list', array('userdatas'=>$userdatas,'userlogs'=>$userlogs));?>
	</div>
	<div class="navigations"><?php echo $pagination; ?></div>
	</div>
</div> 
<script type="text/javascript">    
		$(document).ready(function(){            
            //for sort by location, per page
            $(document).on('change','#sort_by_select,#per_page,#sort_by_miles',function(){                
                $(".searchloader").fadeIn("fast");
                var x = $('#sort_by_select').val();
                var y = $('#autocomplete').val();
                var z = $("#per_page").val();
                var miles = $("#sort_by_miles").val();
                var lat = $('#lat').val();
                var lng = $('#lng').val();
                var ac = "<?php echo $account_category ?>";
                var care_type = "<?php echo $care_type ?>";
                if(y!=''){
                    $.post('<?php echo site_url()?>common_care_controller/sort',{'miles':miles,'option':x,'per_page':z,'lat':lat,'lng':lng,'location':y,'account_category':ac,'care_type':care_type,'total_page':'<?php echo $total_rows ?>'},function(msg){
                        $(".searchloader").fadeOut("fast");
			  			var json = jQuery.parseJSON(msg);
						var pagenum = json.num;
						var pagedata = json.userdatas;
						$('#list_container').html(pagedata);
						$('#total').text(json.total_rows);
                        $('.navigations').html(json.pagination);    
                    
                    });
                }
                else{
                    var y = $("#showgeolocation1").text();
                    $.post('<?php echo site_url()?>common_care_controller/sort',{'miles':miles,'option':x,'per_page':z,'location':y,'account_category':ac,'care_type':care_type,'total_page':'<?php echo $total_rows ?>'},function(msg){
                        $(".searchloader").fadeOut("fast");
			  			var json = jQuery.parseJSON(msg);
						var pagenum = json.num;
						var pagedata = json.userdatas;
						$('#list_container').html(pagedata);
						$('#total').text(json.total_rows);
                        $('.navigations').html(json.pagination);
                        
                    });
                }
                
            });
            
            $('#autocomplete').change(function(e){                  
                   e.stopImmediatePropagation();
                   $(this).focus();
            });
                                                                                         
            //for pagination
            $(document).on('click','.paginate_click',function (e) {		        
                $('.searchloader').fadeIn("fast");
                var x = $('#sort_by_select').val();
                var y = $('#autocomplete').val();
                var z = $("#per_page").val();
                var lat = $('#lat').val();
                var lng = $('#lng').val();
                var miles = $("#sort_by_miles").val();
                var ac = "<?php echo $account_category ?>";
                var care_type = "<?php echo $care_type ?>";
                var previous = '<a href="#" class="paginate_click in-active">previous</a>'
                var next = '<a href="#" class="paginate_click in-active">next</a>'
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
                
        		$('.paginate_click').removeClass('active'); //remove any active class
                $('.paginate_click').addClass('in-active'); //remove any active class		
                if(y!=''){
            		$.post("<?php echo site_url();?>common_care_controller/fetch_pages", {'miles':miles,'page':(page_num-1),'option':x,'per_page':z,'lat':lat,'lng':lng,'location':y,'account_category':ac,'care_type':care_type,'total_page':$('#total').text()}, function(msg){
                       $('.searchloader').fadeOut("fast");
                        var json = jQuery.parseJSON(msg);
        				var pagenum = json.num;
        				var pagedata = json.userdatas;
        				$('#list_container').html(pagedata);
        				$('#total').text(json.total_rows);
                        // $('.navigations').html(json.pagination);
            		});
                }
                else{
                    var y = $("#showgeolocation1").text();
                    $.post("<?php echo site_url();?>common_care_controller/fetch_pages", {'miles':miles,'page':(page_num-1),'option':x,'per_page':z,'location':y,'account_category':ac,'care_type':care_type,'total_page':$('#total').text()}, function(msg){
                       $('.searchloader').fadeOut("fast");
                        var json = jQuery.parseJSON(msg);
        				var pagenum = json.num;
        				var pagedata = json.userdatas;
        				$('#list_container').html(pagedata);
        				$('#total').text(json.total_rows);
                        // $('.navigations').html(json.pagination);
            		});
                }
                var element = parseInt(page_num) + 1
                $('.paginate_click').eq(element).removeClass('in-active');
        		$('.paginate_click').eq(element).addClass('active'); //add active class to currently clicked element (style purpose)
        		
        		return false; //prevent going to herf link
        	});

		});
</script>

