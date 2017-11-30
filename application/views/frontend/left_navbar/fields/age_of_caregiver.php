<div style="font-size:12px">
 	<label style="font-size:13px; font-weight:600; margin-bottom:6px;">Care Provider Age</label>
 	<select name="age_of_caregiver" style="width:80%" id="age_of_caregiver">
 	    <option value="" <?php if ($data['age_of_caregiver'] == 0) echo 'selected' ?>> Any </option>
         <option value="1_18" <?php if ($data['age_of_caregiver'] == '1_18') echo 'selected' ?>> 0 - 18</option>
         <option value="18_30" <?php if ($data['age_of_caregiver'] == '18_30') echo 'selected' ?>> 18 - 30</option>
         <option value="30_60" <?php if ($data['age_of_caregiver'] == '30_60') echo 'selected' ?>> 30 - 60</option>
         <option value="60_100" <?php if ($data['age_of_caregiver'] == '60_100') echo 'selected' ?>> 60+ </option>
     </select>
 </div>