<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "welcome";
$route['404_override'] = '';
$route['advice-and-tips/families'] = 'cms/tipsandtoolsfamilies';
// $route['advice-and-tips/employers'] = 'cms/tipsandtoolsemployers';
$route['advice-and-tips/caregivers'] = 'cms/tipsandtoolscaregivers';
$route['safety-guide/families'] = 'cms/stayingsafefamilies';
$route['safety-guide/caregivers'] = 'cms/stayingsafecaregivers';
$route['rate-calculator'] = 'cms/ratecalculator';
$route['faq'] = 'cms/faq';
$route['background-check'] = 'cms/backgroundcheck';
$route['signup/resend-verification'] = 'signup/resend_verification';
$route['signup-successful'] = 'signup/success';
$route['admin'] = "admin/dashboard";
$route['admin/logout'] = "admin/admin/logout";
$route['admin/user/(:num)'] = "admin/user/index";
$route['admin/user-dashboard/(:any)'] = 'admin/user/dashboard/$1';

$route['forgot-password'] = 'login/forgot_password';
$route['changepassword'] = 'login/changepassword';
$route['login/get-password/(:any)'] = 'login/get_password/$1';
$route['logout'] = 'login/logout';
$route['ad/caregiver/(:any)'] = 'ad/index/$1/$2';
$route['ad/careseeker/(:any)'] = 'ad/index/$1/$2';
$route['about-us'] = 'cms/aboutus';
$route['terms-of-use'] = 'cms/termsofuse';
$route['privacy-policy'] = 'cms/privacypolicy';
// $route['staying-safe'] = 'cms/stayingsafe';
// $route['tips-and-tools'] = 'cms/tipsandtools';
$route['user/upgrademembership'] = 'payment/upgrademembership';
$route['sserddaliameyfirev/(:any)'] = 'user/verifyemailaddress';
//$route['caregivers/details(:any)'] = 'caregivers/details/$1';
$route['admin/user/logs/views/(:any)'] = 'admin/user/viewlog/$1';
$route['admin/user/logs/delete/(:any)'] = 'admin/user/deletelog/$1';
$route['admin/user/profile/view/(:any)'] = 'admin/user/viewprofile/$1';
//$route['caregivers/organization']	     = 'caregivers';
$route['careseekers/organization']	     = 'careseekers';

//Routes by kiran
$route['caregivers/all'] = 'caregivers';
$route['caregivers/babysitter'] = 'babysitter';
$route['caregivers/nanny-au-pair'] = 'nanny';
$route['caregivers/nursery-playgroup-drop-off-gan'] = 'nursery';
$route['caregivers/tutor-private-lessons'] = 'tutor';
$route['caregivers/senior-caregiver'] = 'senior_caregiver';
$route['caregivers/special-needs-caregiver'] = 'special_needs_caregiver';
$route['caregivers/therapists'] = 'therapists';
$route['caregivers/cleaning-household-help'] = 'cleaning';
$route['caregivers/errand-runner-odd-jobs-personal-assistant-driver'] = 'errand_runner';

$route['caregivers/organizations'] = 'organizations';
$route['caregivers/organizations/(:any)'] = 'organizations';
 
$route['caregivers/day-care-center-day-camp-afternoon-activities'] = 'daycarecenter';
$route['caregivers/senior-care-agency'] = 'seniorcareagency';
$route['caregivers/special-needs-center'] = 'specialneedscenter';
$route['caregivers/cleaning-household-help-company'] = 'cleaninghousehold';
$route['caregivers/assisted-living-senior-care-center-nursing-home'] = 'seniorcarecenter';

$route['jobs/all'] = 'careseekers';
$route['jobs/babysitter'] = 'careseeker_babysitter';
$route['jobs/nanny-au-pair'] = 'careseeker_nanny';
$route['jobs/tutor-private-lessons'] = 'careseeker_tutor';
$route['jobs/senior-caregiver'] = 'careseeker_seniorcaregiver';
$route['jobs/special-needs-caregiver'] = 'careseeker_specialneedscaregiver';
$route['jobs/therapists'] = 'careseeker_therapist';
$route['jobs/cleaning-household-help'] = 'careseeker_cleaninghousehold';
$route['jobs/errand-runner-odd-jobs-personal-assistant-driver'] = 'careseeker_errandrunner';

$route['jobs/workers-staff-for-childcare-facility'] = 'careseeker_childcarefacility';
$route['jobs/workers-staff-for-senior-care-facility'] = 'careseeker_seniorcarefacility';
$route['jobs/workers-staff-for-special-needs-facility'] = 'careseeker_specialneedsfacility';
$route['jobs/workers-for-cleaning-company'] = 'careseeker_cleaningcompany';

$route['caregivers/workers-staff-for-childcare-facility'] = 'careseeker_childcarefacility';
$route['caregivers/workers-staff-for-senior-care-facility'] = 'careseeker_seniorcarefacility';
$route['caregivers/workers-staff-for-special-needs-facility'] = 'careseeker_specialneedsfacility';
$route['caregivers/workers-for-cleaning-company'] = 'careseeker_cleaningcompany';

$route['jobs/details/(:any)'] = 'careseekers/details';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
