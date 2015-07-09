<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
            <div><h3>Senior Caregiver</h3></div>
            <h4>Refine Result</h4>
            <div>Choose a care type</div>
            <div>
                <select>
                    <option>Babysitter</option>
                    <option>Nanny / Au-Pair</option>
                    <option>Nursery / PlayGroup / Drop off / Gan</option>
                    <option>Tutor / Private lesson</option>
                    <option selected>Senior Caregiver</option>
                    <option>Therapist</option>
                    <option>Cleaning / household help</option>
                    <option>Errand Runner / Odd Jobs</option>
                </select>
            </div>
            <div>
                <label>Neighborhood</label>
                <div><input type="text" name="neighbour"/></div>
            </div>
            <div>
                <label>Gender of Caregiver</label>
                <div class="radio"><input type="radio" name="gender_of_caregiver"/>Male</div> 
                <div class="radio"><input type="radio" name="gender_of_caregiver"/>Female </div>
                <div class="radio"><input type="radio" name="gender_of_caregiver"/>Any</div>
            </div>
            <div>
                <label>Age of caregiver</label>
                <div>
                    <input type="text" size="5"/> to <input type="text" size="5"/>
                </div>
            </div>
            <div>
                <label>Languages</label>
                <div class="checkbox" ><input type="checkbox" name="language[]" value="English"> English</div>
                <div class="checkbox" ><input type="checkbox" name="language[]" value="Yiddish"> Yiddish</div>
                <div class="checkbox" ><input type="checkbox" name="language[]" value="Hebrew"> Hebrew</div>
                <div class="checkbox" ><input type="checkbox" name="language[]" value="Russian"> Russian</div>
                <div class="checkbox" ><input type="checkbox" name="language[]" value="French"> French</div>
                <div class="checkbox" ><input type="checkbox" name="language[]" value="Other"> Other</div>
                
            </div>
            <div>
                <label>Level of observance</label>
                <div class="checkbox"><input type="checkbox" name="level_of_observance[]" value="Yeshivis/Chasidish"/>Yeshivish / Chasidish</div>
                <div class="checkbox"><input type="checkbox" name="level_of_observance[]" value="Orthodox/Modern orthodox"/>Orthodox / Modern orthodox</div>
                <div class="checkbox"><input type="checkbox" name="level_of_observance[]" value="Other"/>Other</div>
                <div class="checkbox"><input type="checkbox" name="level_of_observance[]" value="Not Jewis"/>Not Jewish</div>
                <div class="checkbox"><input type="checkbox" name="level_of_observance[]" value="Any"/>Any</div>
                <div class="checkbox"><input type="checkbox" name="level_of_observance[]" value="Familiar with jewish tradition"/>Familiar with jewish tradition</div>
            </div>
            <div>
                <label>Care location / type</label>
                <div class="checkbox"><input type="checkbox" name="looking_to_work[]" value="Home of Senior"/>Home of Senior</div>
                <div class="checkbox"><input type="checkbox" name="looking_to_work[]" value="v"/>Caregiving institution</div>
                <div class="checkbox"><input type="checkbox" name="looking_to_work[]" value="Live In"/>Live In</div>
                <div class="checkbox"><input type="checkbox" name="looking_to_work[]" value="Live Out"/>Live Out</div>
            </div>
            <div>
                <label>Minimum Experience</label>
               	<div class="form-field">
					<select name="experience" class="required">
						<option value="">Select years of experience</option>
						<option value="1" >1 year</option>
						<option value="2" >2 years</option>
						<option value="3" >3 years</option>
						<option value="4" >4 years</option>
						<option value="5+" >5+ years</option>
					</select>
				</div>  
            </div>
            <div>
                <label>Training</label>
                <div class="checkbox"><input type="checkbox" name="training[]" value="CPR"/>CPR</div>
                <div class="checkbox"><input type="checkbox" name="training[]" value="First Aid"/>First Aid</div>
                <div class="checkbox"><input type="checkbox" name="training[]" value="Senior Care Training"/>Senior Care Training</div>
                <div class="checkbox"><input type="checkbox" name="training[]" value="Nurse"/>Nurse</div>
                <div class="checkbox"><input type="checkbox" name="training[]" value="Other"/>Other</div>
            </div>
            <div>
                <label>Able to work with</label>
                <div class="checkbox"><input type="checkbox" name="willing_to_work[]" value="Alz./dementia"/>Alz. / dementia</div>
                <div class="checkbox"><input type="checkbox" name="willing_to_work[]" value="Sight Loss"/>Sight Loss</div>
                <div class="checkbox"><input type="checkbox" name="willing_to_work[]" value="Hearing Loss"/>Hearing Loss</div>
                <div class="checkbox"><input type="checkbox" name="willing_to_work[]" value="Wheelchair Bound"/>Wheelchair Bound</div>
                <div class="checkbox"><input type="checkbox" name="willing_to_work[]" value="Able to tend to personal hygiene of senior"/>Able to tend to personal hygiene of senior</div>
            </div>
            <div>
                <label>Availability</label>
                <div class="checkbox"><input type="checkbox" name="availability[]" value="Immediate"/>Immediate</div>
                <div class="checkbox"><input type="checkbox" name="availability[]" value="Start Date"/>Start Date</div>
                <div class="checkbox"><input type="checkbox" name="availability[]" value="Occasionally"/>Occasionally</div>
                <div class="checkbox"><input type="checkbox" name="availability[]" value="Regularly"/>Regularly</div>
                <div class="checkbox"><input type="checkbox" name="availability[]" value="Morning"/>Morning</div>
                <div class="checkbox"><input type="checkbox" name="availability[]" value="Afternoon"/>Afternoon</div>
                <div class="checkbox"><input type="checkbox" name="availability[]" value="Evening"/>Evening</div>                
                <div class="checkbox"><input type="checkbox" name="availability[]" value="Weekends fri/sun."/>Weekends fri / sun.</div>
                <div class="checkbox"><input type="checkbox" name="availability[]" value="Shabbos"/>Shabbos</div>                
                <div class="checkbox"><input type="checkbox" name="availability[]" value="24 hour care"/>24 hour care</div>
            </div>
            <div>
                <label>Abilities and skills</label>
                <div class="checkbox"><input type="checkbox" value="1" name="driver_license"/>Drivers License</div>
                <div class="checkbox"><input type="checkbox" value="1" name="vehicle"/>Vehicle</div>                
                <div class="checkbox"><input type="checkbox" value="1" name="on_short_notice"/>Available on short notice</div>                
            </div>
            <div>
                <input type="submit" value="Search" class="btn btn-info"/>
            </div>
     
        </div>
        <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12">
            <div>
                <h3>Search Results</h3>
                <p>Under construction</p>
            </div>
        </div>
    </div>
</div>
