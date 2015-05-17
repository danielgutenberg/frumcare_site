 <div class="container">
 <?php $this->load->view('frontend/caregivers/left_navbar.php');?>

<div class="right-caregivers">

<?php 
		if(isset($ipdata->city)){
			$city = "Near ".$ipdata->city;
		}else{
			$city = "In ".$ipdata->country_name;
		}
?>

<h3>
	<?php echo count($userdatas);?> Institutions <?php echo $city;?>
</h3>
<div class="select-relevance">
	<span class="sort-by-relevance">
		<select id="sortby_instutions">
			<option value="desc" <?php if(isset($this->session->userdata['search_order'])){ if($this->session->userdata['search_order'] == 'desc'){ ?> selected="selected" <?php } } ?>>Sort By Latest</option>
			<option value="asc"  <?php if(isset($this->session->userdata['search_order'])){ if($this->session->userdata['search_order'] == 'asc'){ ?> selected="selected" <?php } }?>>Sort By Name</option>
		</select>
	</span>
	<span>Results per Page</span>
		<span class="fifteens">
			<select id="sort_instutions">
				<option value="15" <?php if(isset($this->session->userdata['search_limit'])){ if($this->session->userdata['search_limit'] == '15'){?> selected="selected" <?php } }?>>15</option>
				<option value="25" <?php if(isset($this->session->userdata['search_limit'])){ if($this->session->userdata['search_limit'] == '25'){?> selected="selected" <?php } }?>>25</option>
				<option value="50" <?php if(isset($this->session->userdata['search_limit'])){ if($this->session->userdata['search_limit'] == '50'){?> selected="selected" <?php } }?>>50</option>
				<option value="100" <?php if(isset($this->session->userdata['search_limit'])){ if($this->session->userdata['search_limit'] == '100'){?> selected="selected" <?php } }?>>100</option>
			</select>
		</span>
</div>
<div class="navigations"></div>

<div class="clearfix margin-bot"></div>
<!-- <div id="result">
</div> -->
		<?php $this->load->view('frontend/instutions/list.php');?>
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
			var inital_sortlimit  = $('#sort_instutions').val();
			
			if(inital_sortlimit){
				$.ajax({
					type:"get",
					url:"<?php echo site_url();?>instutions/getPageNumbers",
					data:"per_page="+inital_sortlimit,
					success:function(data){
						for (i=1; i<=data; i++) {
								if(i == 1) 
									var aclass="active";
								else
									var aclass = "in-active";
                  			$('.navigations').append('<a href="<?php echo site_url();?>instutions/pages/'+i+'"><span class="'+aclass+'">'+i+'</span></a>')
            			}
					}	
				});
			}

			$('#sort_instutions,#sortby_instutions').change(function(){
				  var order 	= $('#sortby_instutions option:selected').val();
				  var per_page  = $('#sort_instutions option:selected').val();
				  $.ajax({
				  		type:"get",
				  		url:"<?php echo site_url();?>instutions/sort",
				  		data:"limit="+per_page+"&order="+order,
				  		success:function(msg){
				  			
				  		}
				  });
			});
		});
</script>

