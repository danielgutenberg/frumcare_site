<div class="container">
    
    <?php if ($content_data['title'] == 'Rate Calculator' || $content_data['title'] == 'Background Check') { ?>
    	<h2 style="text-align:center"> <?php echo $content_data['title'];?> </h2>
    	<br>
    	<br>
    	<br>
    	<h3 style="text-align:center">This Page is Currently Under Construction</h3>
    <?php } else { ?>
    
    <h2> <?php echo $content_data['title'];?> style="text-align:center"</h2>
    <?php echo $this->breadcrumbs->show();?>
    <div class="left-sidebar-resource">
        <ul class="sidebarmenu">
			<li><a href="<?php echo site_url();?>safety-guide/families">Safety Guide</a>
			    <ul class="submenuleft">
			        <li style="margin-left: 20px;"> <a href="<?php echo site_url();?>safety-guide/families"> For Families </a> </li>
			        <li style="margin-left: 20px;"> <a href="<?php echo site_url();?>safety-guide/caregivers"> For Caregivers </a> </li>
			    </ul>
			 </li>
			<li><a href="<?php echo site_url();?>advice-and-tips/families">Advice and Tips</a>
			<ul class="submenuleft">
			    <li style="margin-left: 20px;"> <a href="<?php echo site_url();?>advice-and-tips/families"> For Families </a> </li>
			    <li style="margin-left: 20px;"> <a href="<?php echo site_url();?>advice-and-tips/caregivers"> For Caregivers </a> </li>
			    <li style="margin-left: 20px;"> <a href="<?php echo site_url();?>advice-and-tips/employers"> For Employers </a> </li>
			</ul>
			 </li>
			<li> <a href="<?php echo site_url();?>faq"> FAQ </a> </li>
			<li> <a href="<?php echo site_url();?>rate-calculator"> Rate Calculator </a> </li>						
			<li> <a href="<?php echo site_url();?>background-check"> Background Check </a> </li>       
		</ul>
	</div>
    <?php if($content_data){?> 
        <div class="right-side-resources">
         	<p> <?php echo nl2br($content_data['content']); 
         
    }?></p></div>
    
    <?php } ?>
    

</div>