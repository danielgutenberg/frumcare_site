<?php $observance = explode(',',$data['observance']); ?>
<div>
    <label>Level of observance</label>
    <div class="checkbox first"><input type="checkbox" value="Yeshivish/Chasidish" name="observance[]" class="hidefamiliar observance" <?php if(in_array('Yeshivish/Chasidish',$observance)){?> checked="checked" <?php } ?>>Yeshivish / Chasidish</div>
    <div class="checkbox"><input type="checkbox" value="Orthodox/Modern orthodox" name="observance[]" class="hidefamiliar observance" <?php if(in_array('Orthodox/Modern orthodox',$observance)){?> checked="checked" <?php } ?>>Orthodox / Modern orthodox</div>
    <div class="checkbox"><input type="checkbox" value="Familiar With Jewish Tradition" name="observance[]" class="show observance" <?php if(in_array('Familiar With Jewish Tradition',$observance)){?> checked="checked" <?php } ?>>Familiar with Jewish Tradition</div>
    <div class="checkbox"><input type="checkbox" value="Any" name="observance[]" class="hidefamiliar observance" <?php if(in_array('Any',$observance)){?> checked="checked" <?php } ?>>Any</div>
</div>