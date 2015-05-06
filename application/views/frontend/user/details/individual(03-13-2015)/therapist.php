<?php
$cross = "<img src='".site_url()."img/cross.png'> ";
$tick  = "<img src='".site_url()."img/nut-list.png'> ";    
?>
<div class="table-responsive">
    <table class="table table-striped borderbottom">
        <?php 
        if(!empty($type_of_therapy)){?>
        <tr>
           <td >Type of therapy</td>
           <td >    		
            <?php echo $type_of_therapy; ?>  
        </td>
    </tr>
    <?php }
    if(!empty($certification)){?>
    <tr>
    	<td >Training/ Certification</td>
    	<td >    		
            <?php echo $certification; ?>  
        </td>
    </tr>
    <?php }
    if(!empty($experience)){?>
    <tr>
    	<td >Years of experience</td>
    	<td >    		
            <?php echo $experience; ?>  
        </td>
    </tr>
    <?php }
    if(!empty($licence_information)){?>
    <tr>
    	<td >Licence information</td>
    	<td >    		
            <?php echo $licence_information; ?>  
        </td>
    </tr>
    <?php }
    if(!empty($rate)){?>
    <tr>
    	<td >Rate</td>
    	<td >
            <?php echo '$'.$rate; 
            $type = explode(',',$rate_type);
            ?>
            <div class="details-info"><?php if(in_array('1',$type)){echo $tick; }else{ echo $cross; } ?>  Hourly Rate</div>
            <div class="details-info"><?php if(in_array('2',$type)){echo $tick; }else{ echo $cross; } ?>  Monthly Rate</div>    
        </td>
    </tr>
    <?php }
    if($references==1){?>
    <tr>
    	<td >References</td>
    	<td >
    		<a href="#">Download</a>
    	</td>
    </tr>
    <?php } ?> 
</table>
</div>