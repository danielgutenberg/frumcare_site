<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class='left-search-panel row' style="padding:0px; background:white">
        <h4 style="padding: 10px;background: #6a6a6a;color: #cecaca;">Filters</h4>
        <div id="left-nav" style="padding:20px 12px 20px 15px">
        
        <?php
            if ($s1 == 'jobs') {
        	    $this->load->view('frontend/left_navbar/fields/job_start_date', array('data' => $data));
        	    $this->load->view('frontend/left_navbar/fields/job_languages', array('data' => $data));
                $this->load->view('frontend/left_navbar/fields/wage', array('data' => $data));
            } else {
                $this->load->view('frontend/left_navbar/fields/gender_of_caregiver', array('data' => $data));
            	$this->load->view('frontend/left_navbar/fields/age_of_caregiver', array('data' => $data));
            	$this->load->view('frontend/left_navbar/fields/observance_of_caregiver', array('data' => $data));
            	$this->load->view('frontend/left_navbar/fields/languages', array('data' => $data));
                $this->load->view('frontend/left_navbar/fields/when_you_need_care', array('data' => $data));
                $this->load->view('frontend/left_navbar/fields/references', array('data' => $data));
            }
	 	?>
        </div>
        <h4 style="padding: 10px;background: #6a6a6a;color: #cecaca; height:47px;"></h4>
            <script src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=b995b62a-2c1a-4adc-94b4-639eb2be9af6"></script>

    </div>
</div>



