 <div class="container">
 <?php $this->load->view('frontend/caregivers/left_navbar.php',$ipdata);?>

<div class="right-caregivers">
	<div class="searchloader" style="display:none">
	</div>
	<?php 
		if(isset($ipdata['city'])){
			$city = "Near ".$ipdata['city'];
		}else{
			$city = "In ".$ipdata['country_name'];
		}
	?>
	<h3>
		<?php 
			if(is_array($userdatas)){
			 	$count = count($userdatas);
			}else{
				$count = 0;
			}
			echo $count;
		?> 
		Caregivers <?php echo $city;?>
	</h3>
    
    <div class="want-top"><p>Want Caregivers to Contact you?<a href="<?php echo site_url().'ad'?>" class="btn btn-primary ml10 btn-xs">Post a job free</a></p></div>

	<div class="select-relevance">
		<span class="sort-by-relevance">
			<select  id="sortby" name="">
            <option>Sort By Caregivers</option>
                <?php
                    foreach($care_type as $care )
                    {
                        ?><option  value="<?php echo $care['id']?>"><?php echo $care['service_name'];?></option><?php
                    }
                ?>			
			</select>
		</span>
        <?php // print_r($care_type);?>
        <!--<span class="sort-by-relevance">
<select id="sortby">
<option value="desc" <?php if(isset($this->session->userdata['search_order'])){ if($this->session->userdata['search_order'] == 'desc'){ ?> selected="selected" <?php } }?>>Sort By Latest</option>
<option value="asc" <?php if(isset($this->session->userdata['search_order'])){ if($this->session->userdata['search_order'] == 'asc'){ ?> selected="selected" <?php } }?>>Sort By Name</option>
<option value="distance" <?php if(isset($this->session->userdata['distance'])){ if($this->session->userdata['search_order'] == 'distance'){ ?> selected="selected" <?php } }?>>Sort By Distance</option>
</select>
</span>-->
        
		<span>Results per Page</span>
			<span class="fifteens">
				<select id="sort">
					<option value="15" <?php if(isset($this->session->userdata['search_limit'])){ if($this->session->userdata['search_limit'] == '15'){?> selected="selected" <?php } } ?>>15</option>
					<option value="25" <?php if(isset($this->session->userdata['search_limit'])){ if($this->session->userdata['search_limit'] == '25'){?> selected="selected" <?php } } ?>>25</option>
					<option value="50" <?php if(isset($this->session->userdata['search_limit'])){ if($this->session->userdata['search_limit'] == '50'){?> selected="selected" <?php } }?>>50</option>
					<option value="100" <?php if(isset($this->session->userdata['search_limit'])){ if($this->session->userdata['search_limit'] == '100'){?> selected="selected" <?php } }?>>100</option>
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
<div id="result"></div>
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

			$('#sort,#sortby').change(function(){
				var order 	= $('#sortby option:selected').val();
				var per_page  = $('#sort option:selected').val();
				$('.navigations').html('');
				$('.searchloader').fadeIn("fast");

				  dataType:"json",
				  $.ajax({
				  		type:"get",
				  		url:"<?php echo site_url();?>caregivers/sort_cate",
				  		data:"limit="+per_page+"&order="+order+"&care=care",
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

<script>
    function careProfile(){
        var x = document.getElementById("careType").value;
        if (window.XMLHttpRequest){ // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
            }
            else{ // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("list_container").innerHTML=xmlhttp.responseText;
            }
            }
            xmlhttp.open("GET","<?php echo base_url().'caregivers/sort_cate'?>?care_name="+x,true);
            xmlhttp.send();
        }  
</script>