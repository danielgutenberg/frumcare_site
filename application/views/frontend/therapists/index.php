 <div class="container">
 <?php $this->load->view('frontend/therapist/left_navbar.php',$ipdata);?>
<div class="right-caregivers">
	<?php if(is_array($ipdata)){?>
		Showing results for <a href="javascript:void(0);" class="showgeolocation" id="showgeolocation1"><?php echo $ipdata['city'];?>,<?php echo $ipdata['regionName'];?>,<?php echo $ipdata['country'];?></a>
	<?php  } ?>

    <div id="locationField" style="display:none;">
		<input type="text" name="location" class="required area" value="" id="autocomplete" onFocus="geolocate()"/>
		<input type="hidden" id="lng">
		<input type="hidden" id="lat">
		<input type="button" value="Change Location" class="btn btn-primary" onclick="myfunction();"> 
	</div>
<div class="searchloader" style="display:none">
	</div>
	<?php 
		if($ipdata['city']){
			$city = "Near ".$ipdata['city'];
		}else{
			$city = "In ".$ipdata['country'];
		}
	?>
	
	<h3>
		<span id="total">
		<?php 
			if(is_array($userdatas)){
			 	$count = count($userdatas);
			}else{
				$count = 0;
			}
			echo $count;
		?> 
		</span>
		Therapist <span id="locationaddress"><?php echo $city;?></span>
	</h3>
<div class="want-top"><p>Want Caregivers to Contact you?<a href="<?php echo site_url().'signup?ac=1'?>" class="btn btn-primary ml10 btn-xs">Post a job free</a></p></div>
	<div class="select-relevance">
		<!--<span class="sort-by-relevance">
			<select id="sortby">
				<option value="desc" <?php if(isset($this->session->userdata['search_order'])){ if($this->session->userdata['search_order'] == 'desc'){ ?> selected="selected" <?php } }?>>Sort By Latest</option>
				<option value="asc"  <?php if(isset($this->session->userdata['search_order'])){ if($this->session->userdata['search_order'] == 'asc'){ ?> selected="selected" <?php } }?>>Sort By Name</option>
				<option value="distance"  <?php if(isset($this->session->userdata['distance'])){ if($this->session->userdata['search_order'] == 'distance'){ ?> selected="selected" <?php } }?>>Sort By Distance</option>
			</select>
		</span>-->
        <span class="sort-by-relevance">
			<select name="sort_by_select" id="sort_by_select">
                <option value="distance">Sort by distance</option>
                <option value="tbl_userprofile.id">Sort by latest</option>                
                <option value="age">Sort by age</option>
            </select>
		</span>
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

	<div class="navigations"></div>

	<div class="clearfix margin-bot"></div>
	<div id="list_container">

	<?php $this->load->view('frontend/caregivers/profile_list', array('userdatas'=>$userdatas,'userlogs'=>$userlogs));?>
	</div>
	
	</div>

</div> 

<link rel="stylesheet" href="<?php echo base_url();?>css/jquery.raty.css">
<script src="<?php echo base_url();?>js/jquery.raty.js"></script>

<script type="text/javascript">
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

		$(document).ready(function(){
                $('#sortby').change(function(){ 
                $('#sortby').val($(this).val());
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
                    
                location.href = '<?php echo site_url();?>'+locationaddress;
			});
            $(document).on('change','#sort_by_select,#per_page',function(){
                
                $(".searchloader").fadeIn("fast");
                var x = $('#sort_by_select').val();
                var y = $('#autocomplete').val();
                var z = $("#sort").val();
                var lat = $('#lat').val();
                var lng = $('#lng').val();
                var ac = 1;
                var care_type = 7;
                if(y!=''){
                    $.post('<?php echo site_url()?>common_care_controller/sort',{'option':x,'per_page':z,'lat':lat,'lng':lng,'location':y,'account_category':ac,'care_type':care_type},function(msg){
                        $(".searchloader").fadeOut("fast");
				  			var json = jQuery.parseJSON(msg);
							var pagenum = json.num;
							var pagedata = json.userdatas;
							$('#list_container').html(pagedata);
							$('#total').text(json.total_rows);    
                    
                    });
                }
                else{
                    $.post('<?php echo site_url()?>common_care_controller/sort',{'option':x,'per_page':z,'location':y,'account_category':ac,'care_type':care_type},function(msg){
                        $(".searchloader").fadeOut("fast");
				  			var json = jQuery.parseJSON(msg);
							var pagenum = json.num;
							var pagedata = json.userdatas;
							$('#list_container').html(pagedata);
							$('#total').text(json.total_rows);
                        
                    });
                }
                
            });
			var inital_sortlimit  = $('#sort').val();
			//var inital_sortlimit = 2;
			if(inital_sortlimit){
				$.ajax({
					type:"get",
					url:"<?php echo site_url();?>therapists/getPages",
					data:"per_page="+inital_sortlimit,
					success:function(data){
						for (i= 1; i<=data; i++) {
								if(i == 1){
									var aclass="active";
								} 
								else{
									var aclass  = "in-active";
								}
                  			$('.navigations').append('<a href="<?php echo site_url();?>therapists/pages/'+i+'"><span class="'+aclass+'">'+i+'</span></a>')

            			}
					}	
				});
			}

			$('#sort,#sortby').change(function(){
				  var order 	= $('#sortby option:selected').val();
				  var per_page  = $('#sort option:selected').val();
					$('.navigations').html('');
					$('.searchloader').fadeIn("fast");
				  dataType:"json",
				  $.ajax({
				  		type:"get",
				  		url:"<?php echo site_url();?>caregivers/sort",
				  		data:"limit="+per_page+"&order="+order,
				  		success:function(msg){
				  			$(".searchloader").fadeOut("fast");
				  			var json = jQuery.parseJSON(msg);
							var pagenum = json.num;
							var pagedata = json.userdatas;
							$('#list_container').html(pagedata);

							var id = '<?php echo $this->uri->segment(3)?$this->uri->segment(3):1;?>';
								for (i= 1; i<=pagenum; i++) {
									if(i == id)
										var aclass="active";
									else
										var aclass  = "in-active";

	                  				$('.navigations').append('<a href="<?php echo site_url();?>therapists/pages/'+i+'"><span class="'+aclass+'">'+i+'</span></a>')
	            				}
				  		 }
				  		
				  });
			});
		});
</script>

<!-- for google map starts -->
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>

<script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initialize() {
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
      { types: ['geocode'] });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });
}

// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();
	var lat = autocomplete.getPlace().geometry.location.lat();
	var lng = autocomplete.getPlace().geometry.location.lng();
	
    document.getElementById('lat').value =  lat;
    document.getElementById('lng').value =  lng;

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = new google.maps.LatLng(
          position.coords.latitude, position.coords.longitude);
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
// [END region_geolocation]
function myfunction(){

	var lat = document.getElementById('lat').value;
	var lng = document.getElementById('lng').value;
    var location = document.getElementById('autocomplete').value;

	if((lat == '') && (lng == '')){
		alert("Plese enter address");return false;
	}else{
		 if (window.XMLHttpRequest){ // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else{ // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState==4 && xmlhttp.status==200){
                //document.getElementById("list_container").innerHTML= xmlhttp.responseText;
                var json = xmlhttp.responseText;
                obj = JSON.parse(json);
                document.getElementById("list_container").innerHTML     = obj.userdatas;
                document.getElementById("total").innerHTML				= obj.total_rows;
                document.getElementById("locationaddress").innerHTML	= " Near "+document.getElementById('autocomplete').value;
                document.getElementById("showgeolocation1").innerHTML	= document.getElementById('autocomplete').value;
            }
        }
        xmlhttp.open("GET","<?php echo base_url().'therapists/searchbylocation' ?>?latitude="+lat+"&longitude="+lng+"&location="+location,true);
        xmlhttp.send();
	}
	 
}
</script>

<script>
	$(document).ready(function(){
		$('.showgeolocation').click(function(){
			$('#locationField').toggle();
			$('#autocomplete').val('');
		});
	});
</script>
