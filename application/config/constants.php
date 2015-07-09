<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

//added by Satish
define('FRONTEND_TEMPLATE', 'frontend/includes/template');
define('BACKEND_TEMPLATE', 'admin/includes/template');
define('SITE_EMAIL', 'info@frumcare.com');
define('SITE_NAME', 'FrumCare.com');
define('SITE_REPLY_TO_EMAIL', 'noreply@frumcare.com');

//social keys
/*define('FACEBOOK_APPID', '554559531322339');
define('FACEBOOK_APPSECRET', '10652d67c2d14af9a1b499074a678036');
define('FB_LOGOUT', 'http://localhost/frumcare/logout');*/


// live details test details
define('FACEBOOK_APPID', '472573562884263');
define('FACEBOOK_APPSECRET', '3f0c3212d314ba75b3059771cc832541');
define('FB_LOGOUT', 'http://newedgedesign.com/clients/frumcare/logout');



define('YOUR_CONSUMER_KEY', '3yGklg12KlOqgekhq1ew7Mhuh');
define('YOUR_CONSUMER_SECRET', 'Pv8SE5oaPGOz5PPXpaFBfxS8P9qHNfqwgD0m6bSjWOD9duG71I');
define('YOUR_ACCESS_TOKEN', '2511689761-DuyzHV3BHJ3iuoiFfzJrxGnK38qaY8VOpKDQ66I');
define('YOUR_SECRET_ACCESS_TOKEN', 'PQZ3frEs9XHF8vPOMzpcvGh1HakTye8CVhN6rl1AWLNuq');


/* End of file constants.php */
/* Location: ./application/config/constants.php */
