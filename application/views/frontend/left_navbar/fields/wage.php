<div class="select-services">
    <label style="font-size:13px; font-weight:600; margin-bottom:6px;">Wage</label>
        <select name="rate" class="rate">
            <option value="">Select wage</option>
            <option value="5-10" <?php if ($data['rate'] == '5-10') echo 'selected' ?>>5-10 / Hr</option>
            <option value="10-15" <?php if ($data['rate'] == '10-15') echo 'selected' ?>>10-15 / Hr</option>
            <option value="15-25" <?php if ($data['rate'] == '15-25') echo 'selected' ?>>15-25 / Hr</option>
            <option value="25-35" <?php if ($data['rate'] == '25-35') echo 'selected' ?>>25-35 / Hr</option>
            <option value="35-45" <?php if ($data['rate'] == '35-45') echo 'selected' ?>>35-45 / Hr</option>
            <option value="45-55" <?php if ($data['rate'] == '45-55') echo 'selected' ?>>45-55 / Hr</option>
            <option value="55+" <?php if ($data['rate'] == '55+') echo 'selected' ?>>55+ / Hr</option>
        </select>
</div>