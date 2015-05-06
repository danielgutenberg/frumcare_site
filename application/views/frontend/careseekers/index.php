<link href="<?php echo site_url(); ?>style.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<div class="container">
 <?php $this->load->view('frontend/careseeker_babysitter/left_navbar',$ipdata);?>

<div class="right-caregivers">
	<div class="searchloader" style="display:none">
	</div>
	<?php 
		$cat = $this->uri->segment(2)?$this->uri->segment(2):'';
		if($cat == 'organization')
			$acc_cat = 3;
		else
			$acc_cat = 2;
	?>
	<?php if(is_array($ipdata)){?>
		Showing results for <a href="javascript:void(0);" class="showgeolocation" id="showgeolocation1"><?php echo $ipdata['city'];?>,<?php echo $ipdata['regionName'];?>,<?php echo $ipdata['country'];?></a>
	<?php  } ?>
	<div id="locationField" style="display:none">
		<input type="text" name="location" class="required" value="" id="autocomplete" onFocus="geolocate()"/>
		<input type="hidden" id="lng">
		<input type="hidden" id="lat">
		<input type="button" value="Change Location" class="btn btn-primary" id="change_location""> 
	</div>  
	<input  type="hidden" id="acc_cat" value="<?php echo $acc_cat;?>">

<script type="text/javascript">
	$(document).ready(function(){
		$('.showgeolocation').click(function(){
			$('#locationField').toggle();
			$('#autocomplete').val('');
		});
	})
</script>

	<?php 

		if(isset($ipdata['city'])){
			$city = "Near ".$ipdata['city'];
		}else{
			$city = "In ".$ipdata['country'];
		}
	?>
	<h3>
		<span id="total"><?php echo $total_rows ?></span>
	 Jobs <span id="locationaddress"><?php echo $city;?></span>
	</h3>

	<div class="want-top"><p>Want Employers to Contact you?<a href="<?php echo site_url().'signup?ac=2'?>" class="btn btn-primary ml10 btn-xs">Create a Profile for free</a></p></div>

	<div class="select-relevance">
        <?php /*<span class="sort-by-relevance">
			<select  id="sortby" name="careType">
            <option value=''>Sort By Jobs</option>
                <?php
                    foreach($care_type as $care )
                    {
                        ?><option  value="<?php echo $care['id']?>"><?php echo $care['service_name'];?></option><?php
                    }
                ?>			
			</select>
		</span> */?>
        <span>
            <select name="sort_by_select" id="sort_by_select">
                <option value="distance">Sort by distance</option>
                <option value="tbl_userprofile.id">Sort by latest</option>                
                <option value="age">Sort by age</option>
            </select>
        </span>            
		<span>Results per Page</span>
			<span class="fifteens">
				<?php /*<select id="sort">
					<option value="15" <?php if(isset($this->session->userdata['search_limit'])){ if($this->session->userdata['search_limit'] == '15'){?> selected="selected" <?php } } ?>>15</option>
					<option value="25" <?php if(isset($this->session->userdata['search_limit'])){ if($this->session->userdata['search_limit'] == '25'){?> selected="selected" <?php } } ?>>25</option>
					<option value="50" <?php if(isset($this->session->userdata['search_limit'])){ if($this->session->userdata['search_limit'] == '50'){?> selected="selected" <?php } }?>>50</option>
					<option value="100" <?php if(isset($this->session->userdata['search_limit'])){ if($this->session->userdata['search_limit'] == '100'){?> selected="selected" <?php } }?>>100</option>
				</select>
                */ ?>
                <select id="per_page">
					<option value="15">15</option>
					<option value="25">25</option>
					<option value="50">50</option>
					<option value="100">100</option>
				</select>
			</span>
	</div>
	<!--<div class="navigations"></div>-->
<?php
$pagination	= '';
if($pages > 1){	
	//$pagination	.= '<ul class="paginate">';
	for($i = 1; $i<$pages; $i++)
	{
		if($i==1){
            $pagination .= ' <a href="#" class="paginate_click active" id="'.$i.'-page" >'.$i.'</a> ';
        }else{
            $pagination .= ' <a href="#" class="paginate_click in-active" id="'.$i.'-page">'.$i.'</a> ';   
        }        
	}
	//$pagination .= '</ul>';
} 
?>
<div class="navigations"><?php echo $pagination; ?></div>
	<div class="clearfix margin-bot"></div>
	<div id="list_container">
	<?php $this->load->view('frontend/careseekers/profile_list', array('userdatas'=>$userdatas,'userlogs'=>$userlogs));?>
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
			var inital_sortlimit  = $('#sort').val();
			if(inital_sortlimit){
				$.ajax({
					type:"get",
					url:"<?php echo site_url();?>careseekers/getPages",
					data:"per_page="+inital_sortlimit,
					success:function(data){
						for (i= 1; i<=data; i++) {
								if(i == 1){
									var aclass="active";
								} 
								else{
									var aclass  = "in-active";
								}
                  			$('.navigations').append('<a href="<?php echo site_url();?>careseekers/pages/'+i+'"><span class="'+aclass+'">'+i+'</span></a>')

            			}
					}	
				});
			}
            $(document).on('change','#sort_by_select,#per_page',function(){
                
                $(".searchloader").fadeIn("fast");
                var x = $('#sort_by_select').val();
                var y = $('#autocomplete').val();
                var z = $("#per_page").val();
                var lat = $('#lat').val();
                var lng = $('#lng').val();
                var ac = 2;
                var care_type = '';
                if(y!=''){
                    $.post('<?php echo site_url()?>common_care_controller/sort',{'option':x,'per_page':z,'lat':lat,'lng':lng,'location':y,'account_category':ac,'care_type':care_type,'total_page':'<?php echo $total_rows ?>'},function(msg){
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
                    $.post('<?php echo site_url()?>common_care_controller/sort',{'option':x,'per_page':z,'location':y,'account_category':ac,'care_type':care_type,'total_page':'<?php echo $total_rows ?>'},function(msg){
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
            $(document).on('click','#change_location',function(){
                
                $(".searchloader").fadeIn("fast");
                var x = $('#sort_by_select').val();
                var y = $('#autocomplete').val();
                var z = $("#per_page").val();
                var lat = $('#lat').val();
                var lng = $('#lng').val();
                var ac = 2;
                var care_type = '';
                if(y!=''){
                    $.post('<?php echo site_url()?>common_care_controller/sort',{'option':x,'per_page':z,'lat':lat,'lng':lng,'location':y,'account_category':ac,'care_type':care_type,'total_page':'<?php echo $total_rows ?>'},function(msg){
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
                    $.post('<?php echo site_url()?>common_care_controller/sort',{'option':x,'per_page':z,'location':y,'account_category':ac,'care_type':care_type,'total_page':'<?php echo $total_rows ?>'},function(msg){
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
			$('#sort,#sortby').change(function(){
				var per_page  = $('#sort option:selected').val();
                var care_type = $('#sortby').val();
				$('.navigations').html('');
				$('.searchloader').fadeIn("fast");
				  dataType:"json",
				  $.ajax({
				  		type:"get",
				  		url:"<?php echo site_url();?>careseekers/sort_cate",
				  		data:"limit="+per_page+"&care_type="+care_type,
				  		success:function(msg){
				  			$(".searchloader").fadeOut("fast");
				  			var json = jQuery.parseJSON(msg);
							var pagenum = json.num;
							var pagedata = json.userdatas;
							$('#list_container').html(pagedata);
							$('#total').text(json.total_rows);

							var id = '<?php echo $this->uri->segment(3)?$this->uri->segment(3):1;?>';
								for (i= 1; i<=pagenum; i++) {
									if(i == id)
										var aclass="active";
									else
										var aclass  = "in-active";

	                  				$('.navigations').append('<a href="<?php echo site_url();?>careseekers/pages/'+i+'"><span class="'+aclass+'">'+i+'</span></a>')
	            				}
				  		 }
				  		
				  });
			});
            			$('#sortby').change(function(){ 
			     $('#sortby').val($(this).val());
                var pagelink = $(this).find("option:selected").text();
                
                if(pagelink == 'Nanny/ Au-pair')
                    var locationaddress = 'careseeker_nanny';
                if(pagelink == 'Babysitter')
                    var locationaddress = 'careseeker_babysitter';
                if(pagelink == 'Tutor/ private lessons')
                    var locationaddress = 'careseeker_tutor';
                 if(pagelink == 'Senior caregiver')
                    var locationaddress = 'careseeker_seniorcaregiver';
                if(pagelink == 'Special needs caregiver')
                    var locationaddress = 'careseeker_specialneedscaregiver';
                if(pagelink == 'Therapist')
                    var locationaddress = 'careseeker_therapist';
                if(pagelink == 'Cleaning/ household help')
                    var locationaddress = 'careseeker_cleaninghousehold';
                 if(pagelink == 'Errand runner/ odd jobs/ personal assistant/ driver')
                    var locationaddress = 'careseeker_errandrunner'; 
                 if(pagelink == 'Workers/ staff for childcare facility')
                 	var locationaddress = 'careseeker_childcarefacility'; 
                 if(pagelink == 'Workers/ staff for senior care facility')
                 	var locationaddress = 'careseeker_seniorcarefacility'; 
                 if(pagelink == 'Workers/ staff for special needs facility')
                 	var locationaddress = 'careseeker_specialneedsfacility'; 
                 if(pagelink == 'Workers for cleaning company')
                 	var locationaddress = 'careseeker_cleaningcompany'; 
                    
                location.href = '<?php echo site_url();?>'+locationaddress;
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

/*function myfunction(){

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
                document.getElementById("list_container").innerHTML= obj.userdatas;
                document.getElementById("total").innerHTML= obj.total_rows;	
                document.getElementById("locationaddress").innerHTML	= " Near "+document.getElementById('autocomplete').value;
                document.getElementById("showgeolocation1").innerHTML	= document.getElementById('autocomplete').value;
            }
        }
        xmlhttp.open("GET","<?php echo base_url().'careseekers/searchbylocation' ?>?latitude="+lat+"&longitude="+lng+"&account_category="+$('#acc_cat').val()+"&location="+location,true);
        xmlhttp.send();
	}
	 
}*/
</script>
<script>
$(document).ready(function() {		
	$(document).on('click','.paginate_click',function (e) {		        
        $('.searchloader').fadeIn("fast");
        var x = $('#sort_by_select').val();
        var y = $('#autocomplete').val();
        var z = $("#per_page").val();
        var lat = $('#lat').val();
        var lng = $('#lng').val();
        var ac = 2;
        var care_type = '';                 		
		var clicked_id = $(this).attr("id").split("-"); //ID of clicked element, split() to get page number.
		var page_num = parseInt(clicked_id[0]); //clicked_id[0] holds the page number we need 		
		$('.paginate_click').removeClass('active'); //remove any active class
        $('.paginate_click').addClass('in-active'); //remove any active class		
        if(y!=''){
    		$.post("<?php echo site_url();?>common_care_controller/fetch_pages", {'page':(page_num-1),'option':x,'per_page':z,'lat':lat,'lng':lng,'location':y,'account_category':ac,'care_type':care_type,'total_page':'<?php echo $total_rows ?>'}, function(msg){
               $('.searchloader').fadeOut("fast");
                var json = jQuery.parseJSON(msg);
				var pagenum = json.num;
				var pagedata = json.userdatas;
				$('#list_container').html(pagedata);
				$('#total').text(json.total_rows);
                $('.navigations').html(json.pagination);
    		});
        }
        else{
            $.post("<?php echo site_url();?>common_care_controller/fetch_pages", {'page':(page_num-1),'option':x,'per_page':z,'location':y,'account_category':ac,'care_type':care_type,'total_page':'<?php echo $total_rows ?>'}, function(msg){
               $('.searchloader').fadeOut("fast");
                var json = jQuery.parseJSON(msg);
				var pagenum = json.num;
				var pagedata = json.userdatas;
				$('#list_container').html(pagedata);
				$('#total').text(json.total_rows);
                $('.navigations').html(json.pagination);
    		});
        }
        $(this).removeClass('in-active');
		$(this).addClass('active'); //add active class to currently clicked element (style purpose)
		
		return false; //prevent going to herf link
	});	
});
</script>
