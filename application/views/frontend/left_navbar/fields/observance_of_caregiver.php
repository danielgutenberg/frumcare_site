<?php $observance = explode(',',$data['observance']); ?>
<div style="font-size:12px">
 	<label style="font-size:13px; font-weight:600; margin-bottom:6px;">Level of observance</label>
 	<select name="age_of_caregiver" style="width:80%" id="observance">
 	    <option value="Any" <?php if (in_array('Any',$observance)) echo 'selected' ?>> Any </option>
         <option value="Yeshivish/Chasidish" <?php if (in_array('Yeshivish/Chasidish',$observance)) echo 'selected' ?>> Yeshivaish / Chasidish</option>
         <option value="Orthodox/Modern orthodox" <?php if (in_array('Orthodox/Modern orthodox',$observance)) echo 'selected' ?>> Orthodox / Modern Orthodox</option>
         <option value="Familiar With Jewish Tradition" <?php if (in_array('Familiar With Jewish Tradition',$observance)) echo 'selected' ?>> Familiar with Jewish Tradition</option>
     </select>
 </div>