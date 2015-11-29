<div class="rate-select">
    <label>Wage</label>
    <div class="form-field">
        <select name="rate" class="">
            <option value="">Select rate</option>
            <option value="5-10" <?php echo isset($rate) && $rate == '5-10' ? 'selected' : '' ?>>$5-$10 / Hr</option>
            <option value="10-15" <?php echo isset($rate) && $rate == '10-15' ? 'selected' : '' ?>>$10-$15 / Hr</option>
            <option value="15-25" <?php echo isset($rate) && $rate == '15-25' ? 'selected' : '' ?>>$15-$25 / Hr</option>
            <option value="25-35" <?php echo isset($rate) && $rate == '25-35' ? 'selected' : '' ?>>$25-$35 / Hr</option>
            <option value="35-45" <?php echo isset($rate) && $rate == '35-45' ? 'selected' : '' ?>>$35-$45 / Hr</option>
            <option value="45-55" <?php echo isset($rate) && $rate == '45-55' ? 'selected' : '' ?>>$45-$55 / Hr</option>
            <option value="55+" <?php echo isset($rate) && $rate == '55+' ? 'selected' : '' ?>>$55+ / Hr</option>
        </select>
    </div>
</div>

 <div>
    <div class="checkbox"><input type="checkbox" name="rate_type[]" value="2">Monthly Rate Available</div>
</div>

<div class="rate-select">
    <label>Currency</label>
    <div class="form-field">
        <select name="currency" class="txt rate">
		  <!--<option value="">Select Currency</option>-->
		  <!--<option value="AUD">Australian Dollar</option>-->
		  <!--<option value="BRL">Brazilian Real </option>-->
		  <!--<option value="CAD">Canadian Dollar</option>-->
		  <!--<option value="CZK">Czech Koruna</option>-->
		  <!--<option value="DKK">Danish Krone</option>-->
		  <!--<option value="EUR">Euro</option>-->
		  <!--<option value="HKD">Hong Kong Dollar</option>-->
		  <!--<option value="HUF">Hungarian Forint </option>-->
		  <option value="ILS">&#8362; Israeli New Sheqel</option>
		  <!--<option value="JPY">Japanese Yen</option>-->
		  <!--<option value="MYR">Malaysian Ringgit</option>-->
		  <!--<option value="MXN">Mexican Peso</option>-->
		  <!--<option value="NOK">Norwegian Krone</option>-->
		  <!--<option value="NZD">New Zealand Dollar</option>-->
		  <!--<option value="PHP">Philippine Peso</option>-->
		  <!--<option value="PLN">Polish Zloty</option>-->
		  <!--<option value="GBP">Pound Sterling</option>-->
		  <!--<option value="SGD">Singapore Dollar</option>-->
		  <!--<option value="SEK">Swedish Krona</option>-->
		  <!--<option value="CHF">Swiss Franc</option>-->
		  <!--<option value="TWD">Taiwan New Dollar</option>-->
		  <!--<option value="THB">Thai Baht</option>-->
		  <!--<option value="TRY">Turkish Lira</option>-->
		  <option value="USD" SELECTED="YES">&#36; U.S. Dollar</option>
        </select>
    </div>
</div>