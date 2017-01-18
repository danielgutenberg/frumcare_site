<div class="locationAddress1">
    <label>Location </label>
    <div id="locationField">
        <input type="hidden" id="lat" name="lat" value="<?php echo isset($location['lat'])?$location['lat']:''?>"/>
        <input type="hidden" id="lng" name="lng" value="<?php echo isset($location['lng'])?$location['lng']:''?>"/>
        <input type="hidden" id="cityName" name="city" value="<?php echo isset($location['city'])?$location['city']:''?>"/>
        <input type="hidden" id="stateName" name="state" value="<?php echo isset($location['state'])?$location['state']:''?>"/>
        <input type="hidden" id="countryName" name="country" value="<?php echo isset($location['country'])?$location['country']:''?>"/>
        <input type="hidden" id="locationName" name="location" value="<?php echo isset($location['location'])?$location['location']:''?>"/>
        <input type="text" class="required" placeholder="Please enter a street address" id="autocomplete" value="<?php echo isset($location['location'])? $location['location']:''; ?>"/>
        <b class="profileLocationCaret caret"></b>
    </div> 
     <span style="color:red;" id="error"> </span>
     <p>Can't find your address? <a class="noAddress" style="cursor:pointer">Click here</a></p>
</div>
<div id="cityField" style="display:none">
    <label>Location</label>
    <span class="first-names">
        <input type="text" class="required" placeholder="Please enter a city and state/country" id="autocomplete1" value="<?php echo isset($address)? $address:''; ?>"/>
    </span>
    <span style="color:red;" id="error1"> </span>
</div> 
<script>
    $(function(){
    
        $('.noAddress').on('click',function(e){
            alert("Please start typing your city name and click on it from the dropdown");
            $('#cityField').css('display','block');
            $('.locationAddress1').css('display','none');
        });
    })
</script>
<script>
    $("#cityField").ready(function(){
        var cityAutocomplete = new google.maps.places.Autocomplete($("#autocomplete1")[0], {types: ['(cities)']});
        google.maps.event.addListener(cityAutocomplete, 'place_changed', function() {
            $("#locationName").val($("#autocomplete1").val());
            $("#cityName").val('');
            $("#stateName").val('');
            $("#countryName").val('');
            var place = cityAutocomplete.getPlace();
            $('.locationName').val(place.formatted_address)
            var lat = place.geometry.location.lat();
            var lng = place.geometry.location.lng();
            var i = 0;
            var len = place.address_components.length;
            while (i < len) {
                var ac = place.address_components[i];
                if (ac.types.indexOf('locality') >= 0 || ac.types.indexOf('sublocality') >=0 ) {
                    $("#cityName").val(ac.long_name);
                }
                if (ac.types.indexOf('administrative_area_level_1') >= 0) {
                    $("#stateName").val(ac.short_name);
                }
                if (ac.types.indexOf('country') >= 0) {
                    $("#countryName").val(ac.long_name);
                }
                i++;
            }
            $("#lat").val(lat);
            $("#lng").val(lng);
            document.getElementById("error").innerHTML="";
        });
        
        $("#cityField").keypress(function(event){
            if ((event.charCode >= 47 && event.charCode <= 57) || // 0-9
                (event.charCode >= 65 && event.charCode <= 90) || // A-Z
                (event.charCode >= 97 && event.charCode <= 122)||
                (event.charCode == 32 || event.charCode == 92)){
                    return true
                } 
            else {
                alert("Please use only english letters in the location search");
                event.preventDefault()
            }
        });
        
        $('#cityField').on('click', function(){
            $('#autocomplete').val('')
            $('#lat').val('')
        });
    });
    
</script>
<style>
.profileLocationCaret {
    margin-top: -28px;
    margin-left: 479px;
    position: absolute;
}
</style>