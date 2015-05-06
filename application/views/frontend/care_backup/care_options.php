<?php 
    if(isset($this->session->userdata['care']))
        $care = $this->session->userdata['care'];
        
?>

<select id="care_type" class="required" name="care_type">
    <?php  
        echo '<option value="" class="msg">Type of care you provide</option>';
            $flag = 0;
                foreach($care_type as $c) { 
                if($c['service_by'] == 2 && $flag != 1) {
                    $flag = 1;
                }
            ?>
            <option value="<?php echo $c['id'].'_'.$c['service_by']?>" <?php echo isset($care) && $care == $c['id'] ? 'selected' : '' ?>>
                    <?php echo $c['service_name'] ?>
            </option>
            <?php
                }
            ?>
</select>


<script type="text/javascript"> 
    $(document).ready(function(){
             $('#care_type').change(function(){
                var value = $(this).val();
                var service_type    =  value.split('_');
                var idforform       =  service_type[0];
                
                $.ajax({
                    type :'get',
                    url : '<?php echo site_url();?>user/new_profile',
                    data : 'subcat='+idforform,
                    success:function(msg){
                            console.log(msg);
                    }
                });

            if(service_type[1] == 2){
                $('.ad-first-name label.f_name').text('Company Name');
                $('.ad-last-name').hide();
            }
                if(service_type[1] == 1){
                    $('.ad-first-name label.f_name').text('Name');
                    $('.ad-last-name').show();
                    
                }
            });
    });

</script>