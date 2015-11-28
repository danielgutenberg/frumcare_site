<?php
$cross = "<img src='".site_url()."img/cross.png'> ";
$tick  = "<img src='".site_url()."img/nut-list.png'> ";  
if($currency == 'ILS') {
    $symbol = "&#8362;"; 
} else {
    $symbol = '$';
}
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
    else{
            ?>
                <tr>
                    <td >Type of therapy </td>
                    <td>N/A</td>
                </tr>
            <?php
          }
          if(!empty($experience)){?>
    <tr>
    	<td>Years in Practice</td>
    	<td>    		
            <?php if ($experience == '6') {echo '5+'; } else {echo $experience;} ?>  
        </td>
    </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td>Years in Practice</td>
                    <td>N/A</td>
                </tr>
            <?php
          }
                if(!empty($certification)){
                    if(segment(4)== 7 ){
                        $info = "Information";
                    }else{
                        $info = "";
                    }
        ?>
    <tr>
    	<td >Certification / License information</td>
    	<td >    		
            <?php echo $certification; ?>  
        </td>
    </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td >Certification / License information</td>
                    <td>N/A</td>
                </tr>
            <?php
          }
    
    if(!empty($licence_information)){?>
    <?php /* <tr>
    	<td >Licence information</td>
    	<td >    		
            <?php echo $licence_information; ?>  
        </td>
    </tr> */?>
    <?php }
    else{
            ?>
                <?php /* <tr>
                    <td >Licence information </td>
                    <td>N/A</td>
                </tr> */?>
            <?php
          }
    if(!empty($rate)){?>
    <tr>
    	<td >Rate</td>
    	<td >
            <?php echo $symbol . $rate . ' / Hr'; 
            $type = explode(',',$rate_type);
            ?>
            <!--<div class="details-info"><?php if(in_array('1',$type)){echo $tick; }else{echo $cross; } ?>  Hourly Rate</div>-->
            <div class="details-info"><?php if(in_array('2',$type)){echo $tick; }else{echo $cross; } ?>  Monthly Rate Available</div>    
        </td>
    </tr>
    <?php }
    else{
            ?>
                <tr>
                    <td >Rate </td>
                    <td>N/A</td>
                </tr>
            <?php
          }
          ?>

    <!--<tr>-->
    <!--    <td>Accepts Insurance</td>-->
    <!--    <td><?php if ($accept_insurance == 1) {echo 'yes';} else { echo 'no';}?></td>-->
    <!--</tr>-->
    <!--<tr>-->
        <td>Payment Options</td>
        <td><?php echo !empty( $payment_option ) ? $payment_option : 'N/A'; ?></td>
    </tr>
    
    <?php
    if($references==1){?>
    <!--<tr>-->
    <!--	<td >References</td>-->
    <!--	<td >-->
    <!--		<a href="#">Download</a>-->
    <!--	</td>-->
    <!--</tr>-->
    <?php }
    else{ ?>
            <!--<tr>-->
            <!--    <td>References</td>-->
            <!--    <td>N/A</td>-->
            <!--</tr>-->
        <?php            
        } ?> 
</table>
</div>
