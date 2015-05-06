<div class="container">
	<div class="edit_availability_time">
<h2>Available Time</h2>
<?php echo $this->session->flashdata('success');?>
<form action="<?php echo site_url();?>user/edit_availability_time" method="post">
<table border="1" width="100%">
	<tr>
		<th></th>
		<th>Sun</th>
		<th>Mon</th>
		<th>Tue</th>
		<th>Wed</th>
		<th>Thur</th>
		<th>Fri</th>
		<th>Sat</th>
	</tr>
	<tr>
		<td align="right">Early Morning</td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_morning_sun'] == 1){?> checked <?php } ?> name="early_morning_sun"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_morning_mon'] == 1){?> checked <?php } ?> name="early_morning_mon"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_morning_tue'] == 1){?> checked <?php } ?> name="early_morning_tue"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_morning_wed'] == 1){?> checked <?php } ?> name="early_morning_wed"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_morning_thur'] == 1){?> checked <?php } ?> name="early_morning_thur"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_morning_fri'] == 1){?> checked <?php } ?> name="early_morning_fri"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_morning_sat'] == 1){?> checked <?php } ?> name="early_morning_sat"></td>
	</tr>
	<tr>
		<td align="right">Late Morning</td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_morning_sun'] == 1){?> checked <?php } ?> name="late_morning_sun"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_morning_mon'] == 1){?> checked <?php } ?> name="late_morning_mon"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_morning_tue'] == 1){?> checked <?php } ?> name="late_morning_tue"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_morning_wed'] == 1){?> checked <?php } ?> name="late_morning_wed"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_morning_thur'] == 1){?> checked <?php } ?> name="late_morning_thur"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_morning_fri'] == 1){?> checked <?php } ?>name="late_morning_fri"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_morning_sat'] == 1){?> checked <?php } ?> name="late_morning_sat"></td>
	</tr>
	<tr>
		<td align="right">Early Afternoon</td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_afternoon_sun'] == 1){?> checked <?php } ?> name="early_afternoon_sun"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_afternoon_mon'] == 1){?> checked <?php } ?> name="early_afternoon_mon"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_afternoon_tue'] == 1){?> checked <?php } ?> name="early_afternoon_tue"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_afternoon_wed'] == 1){?> checked <?php } ?> name="early_afternoon_wed"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_afternoon_thur'] == 1){?> checked <?php } ?> name="early_afternoon_thur"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_afternoon_fri'] == 1){?> checked <?php } ?> name="early_afternoon_fri"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_afternoon_sat'] == 1){?> checked <?php } ?> name="early_afternoon_sat"></td>
	</tr>
	<tr>
		<td align="right">Late Afternoon</td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_afternoon_sun'] == 1){?> checked <?php } ?> name="late_afternoon_sun"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_afternoon_mon'] == 1){?> checked <?php } ?> name="late_afternoon_mon"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_afternoon_tue'] == 1){?> checked <?php } ?> name="late_afternoon_tue"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_afternoon_wed'] == 1){?> checked <?php } ?> name="late_afternoon_wed"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_afternoon_thur'] == 1){?> checked <?php } ?> name="late_afternoon_thur"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_afternoon_fri'] == 1){?> checked <?php } ?> name="late_afternoon_fri"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_afternoon_sat'] == 1){?> checked <?php } ?> name="late_afternoon_sat"></td>
	</tr>
	<tr>
		<td align="right">Early Evening</td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_evening_sun'] == 1){?> checked <?php } ?> name="early_evening_sun"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_evening_mon'] == 1){?> checked <?php } ?> name="early_evening_mon"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_evening_tue'] == 1){?> checked <?php } ?> name="early_evening_tue"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_evening_wed'] == 1){?> checked <?php } ?> name="early_evening_wed"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_evening_thur'] == 1){?> checked <?php } ?> name="early_evening_thur"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_evening_fri'] == 1){?> checked <?php } ?> name="early_evening_fri"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['early_evening_sat'] == 1){?> checked <?php } ?> name="early_evening_sat"></td>
	</tr>
	<tr>
		<td align="right">Late Evening</td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_evening_sun'] == 1){?> checked <?php } ?> name="late_evening_sun"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_evening_mon'] == 1){?> checked <?php } ?> name="late_evening_mon"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_evening_tue'] == 1){?> checked <?php } ?> name="late_evening_tue"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_evening_wed'] == 1){?> checked <?php } ?> name="late_evening_wed"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_evening_thur'] == 1){?> checked <?php } ?> name="late_evening_thur"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_evening_fri'] == 1){?> checked <?php } ?> name="late_evening_fri"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['late_evening_sat'] == 1){?> checked <?php } ?> name="late_evening_sat"></td>
	</tr>
	<tr>
		<td align="right">Over Night</td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['overnight_sun'] == 1){?> checked <?php } ?> name="overnight_sun"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['overnight_mon'] == 1){?> checked <?php } ?> name="overnight_mon"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['overnight_tue'] == 1){?> checked <?php } ?> name="overnight_tue"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['overnight_wed'] == 1){?> checked <?php } ?> name="overnight_wed"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['overnight_thur'] == 1){?> checked <?php } ?> name="overnight_thur"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['overnight_fri'] == 1){?> checked <?php } ?> name="overnight_fri"></td>
		<td align="center"><input type="checkbox" value="1" <?php if($time_table['overnight_sat'] == 1){?> checked <?php } ?> name="overnight_sat"></td>
	</tr>
</table>
<input type="hidden" name="user_id" value="<?php echo $this->session->userdata['current_user'];?>">
<input type="submit" name="upate_timetable" value="Update" class="btn btn-primary">
</form>
</div>
</div>