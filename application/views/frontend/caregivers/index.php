 <div class="container">
 <?php $this->load->view('frontend/babysitter/left_navbar.php');?>
<div class="right-caregivers">
<div class="searchloader" style="display:none">
</div>
<?php 
		$cat = $this->uri->segment(2)?$this->uri->segment(2):'';
		if($cat == 'organization')
			$acc_cat = 3;
		else
			$acc_cat = 1;
	?>
	<?php if(is_array($ipdata)){?>
		Showing results for <a href="javascript:void(0);" class="showgeolocation" id="showgeolocation1"><?php echo $ipdata['city'];?>,<?php echo $ipdata['regionName'];?>,<?php echo $ipdata['country'];?></a>
	<?php  } ?>

<div id="locationField" style="display:none;">
	<input type="text" name="location" class="required" value="" id="autocomplete" onFocus="geolocate()"/>
	<input type="hidden" id="lng">
	<input type="hidden" id="lat">
	<input  type="hidden" id="acc_cat" value="<?php echo $acc_cat;?>">
	<!-- <select name="distance" class="listing_distance">
			<option value="1">1 Mile</option>
			<option value="2">2 Miles</option>
			<option value="5">5 Miles</option>
			<option value="10">10 Miles</option>
			<option value="25">25 Miles</option>
			<option value="50">50 Miles</option>
	</select> -->
	<input type="button" value="Change Location" class="btn btn-primary" onclick="myfunction();"> 
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
		Caregivers <span id="locationaddress"><?php echo $city;?></span>
	</h3>

	<div class="want-top"><p>Want Caregivers to Contact you?<a href="<?php echo site_url().'signup?ac=1'?>" class="btn btn-primary ml10 btn-xs">Post a job free</a></p></div>

	<div class="select-relevance">
		<span>
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
                if(pagelink == 'Day Care Center / Day Camp / Afternoon Activities')
                    var locationaddress = 'daycarecenter';
                if(pagelink == 'Senior Care Agency')
                    var locationaddress = 'seniorcareagency';
                if(pagelink == 'Special needs center')
                    var locationaddress = 'specialneedscenter';
                if(pagelink == 'Cleaning / household help company')
                    var locationaddress = 'cleaningcompany';
                if(pagelink == 'Assisted living / Senior Care Center / Nursing Home')
                    var locationaddress = 'seniorcarecenter';
                    
                location.href = '<?php echo site_url();?>'+locationaddress;
			});
			var inital_sortlimit  = $('#sort').val();
			//var inital_sortlimit = 2;
			if(inital_sortlimit){
				$.ajax({
					type:"get",
					url:"<?php echo site_url();?>caregivers/getPages",
					data:"per_page="+inital_sortlimit,
					success:function(data){
						for (i= 1; i<=data; i++) {
								if(i == 1){
									var aclass="active";
								} 
								else{
									var aclass  = "in-active";
								}
                  			$('.navigations').append('<a href="<?php echo site_url();?>caregivers/pages/'+i+'"><span class="'+aclass+'">'+i+'</span></a>')

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
                var ac = 1;
                var care_type = '';
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
            /*
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

	                  				$('.navigations').append('<a href="<?php echo site_url();?>caregivers/pages/'+i+'"><span class="'+aclass+'">'+i+'</span></a>')
	            				}
				  		 }
				  		
				  });
			});
            */
            $('#sort,#sortby').change(function(){
				var per_page  = $('#sort option:selected').val();
                var care_type = $('#sortby').val();

				$('.navigations').html('');
				$('.searchloader').fadeIn("fast");

				  dataType:"json",
				  $.ajax({
				  		type:"get",
				  		url:"<?php echo site_url();?>caregivers/sort_cate",
				  		data:"limit="+per_page+"&care_type="+care_type,

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

	                  				$('.navigations').append('<a href="<?php echo site_url();?>caregivers/pages/'+i+'"><span class="'+aclass+'">'+i+'</span></a>')
	            				}
				  		 }
				  		
				  });
			});                        
		});
</script>
