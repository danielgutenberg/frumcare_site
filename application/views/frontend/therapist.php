<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
            <div><h3>Therapist</h3></div>
            <h4>Refine Result</h4>
            <div>Choose a care type</div>
            <div>
                <select>
                    <option>Babysitter</option>
                    <option>Nanny/Au-Pair</option>
                    <option>Nursery/PlayGroup/Drop off/Gan</option>
                    <option>Tutor/Private lesson</option>
                    <option>Senior Caregiver</option>
                    <option>Special Needs Caregiver</option>
                    <option selected>Therapist</option>
                    <option>Cleaning/household help</option>
                    <option>Errand Runner/OddJobs</option>
                </select>
            </div>
            <div>
                <label>Neighborhood / Street</label>
                <div><input type="text" name="neighbour"/></div>
            </div>
            <!--<div>
                <label>Age of Therapist</label>
                <div>
                    <input type="text" size="5"/> to <input type="text" size="5"/>
                </div>-->
            </div>
            <div>
                <label>Gender of Therapist</label>
                <div class="radio"><input type="radio" name="gender_of_caregiver"/>Male</div> 
                <div class="radio"><input type="radio" name="gender_of_caregiver"/>Female </div>
                <div class="radio"><input type="radio" name="gender_of_caregiver"/>Any</div>
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
                <label>Level of observance(Check one or more)</label>
                <div class="checkbox"><input type="checkbox" name="level_of_observance[]" value="Yeshivis/Chasidish"/>Yeshivish/Chasidish</div>
                <div class="checkbox"><input type="checkbox" name="level_of_observance[]" value="Orthodox/Modern orthodox"/>Orthodox/Modern orthodox</div>
                <div class="checkbox"><input type="checkbox" name="level_of_observance[]" value="Other"/>Other</div>
                <div class="checkbox"><input type="checkbox" name="level_of_observance[]" value="Not Jewish"/>Not Jewish</div>
                <div class="checkbox"><input type="checkbox" name="level_of_observance[]" value="Any"/>Any</div>
                <div class="checkbox"><input type="checkbox" name="level_of_observance[]" value="Familiar with jewish tradition"/>Familiar with jewish tradition</div>
            </div>
            <div>
                <label>Accepts Insurance</label>
                <div class="radio"><input type="radio" value="1" name="accept_insurance"/>Yes</div>
                <div class="radio"><input type="radio" value="0" name="accept_insurance"/>No</div>
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