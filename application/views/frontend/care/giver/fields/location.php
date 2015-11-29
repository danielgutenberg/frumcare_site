<div>
    <label>Location </label>
    <div id="locationField">
        <input type="hidden" id="lat" name="lat" value="<?php echo isset($lat)?$lat:''?>"/>
        <input type="hidden" id="lng" name="lng" value="<?php echo isset($lng)?$lng:''?>"/>
        <input type="hidden" id="cityName" name="city" value="<?php echo isset($city)?$city:''?>"/>
        <input type="hidden" id="stateName" name="state" value="<?php echo isset($state)?$state:''?>"/>
        <input type="hidden" id="countryName" name="country" value="<?php echo isset($country)?$country:''?>"/>
        <input type="text" name="location" class="required" placeholder="Please enter a street address" id="autocomplete" value="<?php echo isset($address)? $address:''; ?>" required/>
    </div> 
     <span style="color:red;" id="error"> </span>
</div>