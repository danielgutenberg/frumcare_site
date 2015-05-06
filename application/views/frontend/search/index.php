<div class="container">
 <?php
    $data['category']   =  $category;
    $data['search_for'] =  $search_for;
    $this->load->view('frontend/search/left_navbar.php',$data);
 ?>

<div class="right-caregivers">
	<div class="searchloader" style="display:none">
	</div>
	<h3>
		Search Results
	</h3>

	<div class="clearfix margin-bot"></div>
	<div id="list_container">
	<?php //$this->load->view('frontend/search_list', array('userdatas'=>$recordData,'userlogs'=>$userlogs));?>
    <?php //print_rr($recordData); 
    $userdatas = $recordData; ?>
    <?php $this->load->view('frontend/common_profile_list', array('userdatas'=>$userdatas,'userlogs'=>$userlogs));?>    
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
		});
</script>