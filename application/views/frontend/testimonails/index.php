<div class="container">
<div class="testimonials">

	<?php 
		echo $this->breadcrumbs->show();

		if($testimonails):
			foreach($testimonails as $key => $testimonail):
				$i = $key + 1;
			if($i % 2 == 0)
				$class = 'right-align clearfix';
			else 
				$class = 'left-align clearfix';
	?>

	<div class="<?php echo $class;?>">
		<img src="<?php echo $testimonail->image!="" ? site_url("images/testimonial/{$testimonail->image}") : site_url("images/no-image.jpg");?>" />
		<div class="testimonials-details-wrap">
		<div class="testimonials-details">
			<span class="quote">"</span><?php 
				$desc = nl2br(strip_tags(($testimonail->testimonial_description))); 
				echo strip_tags($desc);
			?><span class="quote">"</span>
			<span class="username"><?php echo $testimonail->testimonial_by;?></span>
		</div>
	</div>
</div>
	

	<?php 
			endforeach;
			
		endif;
	?>
	
</div>
</div>
