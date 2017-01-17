<?php

if ( !defined("ACTIVECAMPAIGN_URL") || (!defined("ACTIVECAMPAIGN_API_KEY") && !defined("ACTIVECAMPAIGN_API_USER") && !defined("ACTIVECAMPAIGN_API_PASS")) ) {
	require_once(dirname(__FILE__) . "/includes/config.php");
}

require_once(dirname(__FILE__) . "/includes/Connector.class.php");
class ActiveCampaign extends AC_Connector {

	public $url_base;
	public $url;
	public $api_key;
	public $track_email;
	public $track_actid;
	public $track_key;
	public $version = 1;
	public $debug = false;
	public $curl_response_error = "";
	public $tags = [
		1 => '[CT] Caregiver',
		2 => '[CT] Organization - Advertising',
		3 => '[CT] Family/Parent',
		4 => '[CT] Organization - Hiring'
	];


	public function __construct($url = 'https://frumcare.api-us1.com', $api_key = '66a8082b09a58163ff5c73a8377aee206b572872c2d9eaaec4b68cf8dc76272320daa640', $api_user = "", $api_pass = "") {
		$this->url_base = $this->url = $url;
		$this->api_key = $api_key;
		parent::__construct($url, $api_key, $api_user, $api_pass);
	}

	public function version($version) {
		$this->version = (int)$version;
		if ($version == 2) {
			$this->url_base = $this->url_base . "/2";
		}
	}

	public function api($path, $post_data = array()) {
		// IE: "contact/view"
		$components = explode("/", $path);
		$component = $components[0];

		if (count($components) > 2) {
			// IE: "contact/tag/add?whatever"
			// shift off the first item (the component, IE: "contact").
			array_shift($components);
			// IE: convert to "tag_add?whatever"
			$method_str = implode("_", $components);
			$components = array($component, $method_str);
		}

		if (preg_match("/\?/", $components[1])) {
			// query params appended to method
			// IE: contact/edit?overwrite=0
			$method_arr = explode("?", $components[1]);
			$method = $method_arr[0];
			$params = $method_arr[1];
		}
		else {
			// just a method provided
			// IE: "contact/view
			if ( isset($components[1]) ) {
				$method = $components[1];
				$params = "";
			}
			else {
				return "Invalid method.";
			}
		}

		// adjustments
		if ($component == "list") {
			// reserved word
			$component = "list_";
		}
		elseif ($component == "branding") {
			$component = "design";
		}
		elseif ($component == "sync") {
			$component = "contact";
			$method = "sync";
		}
		elseif ($component == "singlesignon") {
			$component = "auth";
		}

		$class = ucwords($component); // IE: "contact" becomes "Contact"
		$class = "AC_" . $class;
		// IE: new Contact();

		$add_tracking = false;
		if ($class == "AC_Tracking") $add_tracking = true;
		if ($class == "AC_Tags") {
			$class = "AC_Tag";
		}

		$class = new $class($this->version, $this->url_base, $this->url, $this->api_key);
		// IE: $contact->view()

		if ($add_tracking) {
			$class->track_email = $this->track_email;
			$class->track_actid = $this->track_actid;
			$class->track_key = $this->track_key;
		}

		if ($method == "list") {
			// reserved word
			$method = "list_";
		}

		$class->debug = $this->debug;

		$response = $class->$method($params, $post_data);
		return $response;
	}

}

require_once(dirname(__FILE__) . "/includes/Account.class.php");
require_once(dirname(__FILE__) . "/includes/Auth.class.php");
require_once(dirname(__FILE__) . "/includes/Automation.class.php");
require_once(dirname(__FILE__) . "/includes/Campaign.class.php");
require_once(dirname(__FILE__) . "/includes/Contact.class.php");
require_once(dirname(__FILE__) . "/includes/Deal.class.php");
require_once(dirname(__FILE__) . "/includes/Design.class.php");
require_once(dirname(__FILE__) . "/includes/Form.class.php");
require_once(dirname(__FILE__) . "/includes/Group.class.php");
require_once(dirname(__FILE__) . "/includes/List.class.php");
require_once(dirname(__FILE__) . "/includes/Message.class.php");
require_once(dirname(__FILE__) . "/includes/Segment.class.php");
require_once(dirname(__FILE__) . "/includes/Settings.class.php");
require_once(dirname(__FILE__) . "/includes/Subscriber.class.php");
require_once(dirname(__FILE__) . "/includes/Tag.class.php");
require_once(dirname(__FILE__) . "/includes/Tracking.class.php");
require_once(dirname(__FILE__) . "/includes/User.class.php");
require_once(dirname(__FILE__) . "/includes/Webhook.class.php");

?>