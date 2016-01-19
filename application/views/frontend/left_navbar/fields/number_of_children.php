<div>
    <label>Number of children requiring care</label>
    <select name="number_of_children" class="number_of_children">
        <option value="">--select--</option>
        <option <?php if ($data['number_of_children'] == 1) echo 'selected' ?> value="1">1</option>
        <option <?php if ($data['number_of_children'] == 2) echo 'selected' ?> value="2">2</option>
        <option <?php if ($data['number_of_children'] == 3) echo 'selected' ?> value="3">3</option>
        <option <?php if ($data['number_of_children'] == 4) echo 'selected' ?> value="4">4</option>
        <option <?php if ($data['number_of_children'] == 5) echo 'selected' ?> value="5">5</option>
        <option <?php if ($data['number_of_children'] == 6) echo 'selected' ?> value="6">5+</option>
    </select>
</div>
<div>
    <label></label>
    <div class="checkbox first"><input type="checkbox" value="twins" name="optional_number[]" class="morenum">Twins</div>
    <div class="checkbox"><input type="checkbox" value="triplets" name="optional_number[]" class="morenum">Triplets</div>
</div>