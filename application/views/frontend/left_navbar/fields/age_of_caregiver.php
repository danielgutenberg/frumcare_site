<div style="font-size:12px">
 	<label style="font-size:13px; font-weight:600; margin-bottom:6px;">Care Provider Age</label>
 	<select name="age_of_caregiver" style="width:80%">
 	    <option value="" <?php if ($data['age_of_caregiver'] == 2) echo 'selected' ?>> Any </option>
         <option value="1" <?php if ($data['age_of_caregiver'] == 3) echo 'selected' ?>> 0 - 18</option>
         <option value="2" <?php if ($data['age_of_caregiver'] == 1) echo 'selected' ?>> 18 - 30</option>
         <option value="3" <?php if ($data['age_of_caregiver'] == 2) echo 'selected' ?>> 30 - 60</option>
         <option value="4" <?php if ($data['age_of_caregiver'] == 2) echo 'selected' ?>> 60+ </option>
     </select>
 </div>