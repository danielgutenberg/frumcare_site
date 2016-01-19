<div>
    <label>Location </label>
    <div id="locationField">
        <input type="hidden" id="lat" name="lat" value="<?php echo isset($location['lat'])?$location['lat']:''?>"/>
        <input type="hidden" id="lng" name="lng" value="<?php echo isset($location['lng'])?$location['lng']:''?>"/>
        <input type="hidden" id="cityName" name="city" value="<?php echo isset($location['city'])?$location['city']:''?>"/>
        <input type="hidden" id="stateName" name="state" value="<?php echo isset($location['state'])?$location['state']:''?>"/>
        <input type="hidden" id="countryName" name="country" value="<?php echo isset($location['country'])?$location['country']:''?>"/>
        <input type="text" name="location" class="required" placeholder="Please enter a street address" id="autocomplete" value="<?php echo isset($location['location'])? $location['location']:''; ?>" required/>
    </div> 
     <span style="color:red;" id="error"> </span>
</div>