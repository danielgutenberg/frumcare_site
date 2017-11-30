<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class='left-search-panel row' style="padding:0px; background:white">
        <h4 style="padding: 10px;background: #6a6a6a;color: #cecaca;">Advanced Search</h4>
        <div id="left-nav" style="padding:20px 12px 20px 15px">
        <?php
            $this->load->view('frontend/left_navbar/fields/when_you_need_care', array('data' => $data));
	 		$this->load->view('frontend/left_navbar/fields/languages', array('data' => $data));
	 		$this->load->view('frontend/left_navbar/fields/gender_of_caregiver', array('data' => $data));
	 		$this->load->view('frontend/left_navbar/fields/age_of_caregiver', array('data' => $data));
	 		$this->load->view('frontend/left_navbar/fields/observance_of_caregiver', array('data' => $data));
        ?>
        </div>
	    <h4 style="padding: 10px;background: #6a6a6a;color: #cecaca;">Advanced Filters</h4>
	    <div id="left-nav" style="padding:20px 12px 20px 15px">
	    	<div class="advanced" style="display:none">
			    <?php
			        $this->load->view('frontend/left_navbar/' . $left_navbar, array('care_type' => $care_type));
			    ?>
			</div>
			<?php
				$this->load->view('frontend/left_navbar/fields/save_search');
			?>
	    </div>
    </div>
</div>



