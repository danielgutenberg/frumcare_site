<div style="font-size:12px">
 	<label style="font-size:13px; font-weight:600; margin-bottom:6px;">Gender</label>
 	<select name="gender_of_caregiver" style="width:80%">
         <option value="3" <?php if ($data['gender_of_caregiver'] == 3) echo 'selected' ?>> Any</option>
         <option value="1" <?php if ($data['gender_of_caregiver'] == 1) echo 'selected' ?>> Male</option>
         <option value="2" <?php if ($data['gender_of_caregiver'] == 2) echo 'selected' ?>> Female</option>
     </select>
 </div>