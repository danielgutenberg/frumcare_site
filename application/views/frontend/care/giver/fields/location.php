<div>
    <label>Location</label>
    <div id="locationField">
        <input type="hidden" id="lat" name="lat"/>
        <input type="hidden" id="lng" name="lng"/>
        <input type="hidden" id="cityName" name="city"/>
        <input type="hidden" id="stateName" name="state"/>
        <input type="hidden" id="countryName" name="country"/>
        <input type="text" name="location" class="required" placeholder="Please enter a street address" id="autocomplete" value="<?php echo isset($address)? $address:''; ?>" required/>
    </div>
    <span style="color:red;" id="error"> </span>
</div>