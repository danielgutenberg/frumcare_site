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
$route['account/delete'] = "welcome/delete";
$route['invite_friends'] = "welcome/invite";
$route['invite_review'] = "welcome/invite_review";
$route['request_review'] = "welcome/request_review";
$route['invite'] = "welcome/popup";
$route['sync'] = "welcome/sync";
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

$route['review/approve/(:any)'] = 'review/approve/$1/$2/';
$route['ad/approveAd/(:num)/(:num)/(:any)'] = 'ad/approveAd/$1/$2/$3/$4/$5/';
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

$route['admin/seo/(:any)'] = 'admin/genericseo';

//Routes for Caregivers Search pages
$route['caregivers'] = 'common_care_controller';
$route['caregivers/all'] = 'common_care_controller';
$route['caregivers/babysitter'] = 'common_care_controller/babysitter';
$route['caregivers/nanny-au-pair'] = 'common_care_controller/nanny';
$route['caregivers/pediatric-baby-nurse'] = 'common_care_controller/babynurse';
$route['caregivers/nursery-playgroup-drop-off-gan'] = 'common_care_controller/nursery';
$route['caregivers/tutor-private-lessons'] = 'common_care_controller/tutor';
$route['caregivers/senior-caregiver'] = 'common_care_controller/senior_caregiver';
$route['caregivers/special-needs-caregiver'] = 'common_care_controller/special_needs_caregiver';
$route['caregivers/therapists'] = 'common_care_controller/therapist';
$route['caregivers/cleaning-household-help'] = 'common_care_controller/cleaning';
$route['caregivers/errand-runner-odd-jobs-personal-assistant-driver'] = 'common_care_controller/errand_runner';
$route['caregivers/day-care-center-day-camp-afternoon-activities'] = 'common_care_controller/daycarecenter';
$route['caregivers/senior-care-agency'] = 'common_care_controller/seniorcareagency';
$route['caregivers/special-needs-center'] = 'common_care_controller/specialneedscenter';
$route['caregivers/cleaning-household-help-company'] = 'common_care_controller/cleaninghousehold';
$route['caregivers/assisted-living-senior-care-center-nursing-home'] = 'common_care_controller/seniorcarecenter';

//Routes for Jobs Search pages
$route['jobs'] = 'common_care_controller/careseekers';
$route['jobs/all'] = 'common_care_controller/careseekers';
$route['jobs/babysitter'] = 'common_care_controller/careseeker_babysitter';
$route['jobs/nanny-au-pair'] = 'common_care_controller/careseeker_nanny';
$route['jobs/tutor-private-lessons'] = 'common_care_controller/careseeker_tutor';
$route['jobs/senior-caregiver'] = 'common_care_controller/careseeker_seniorcaregiver';
$route['jobs/special-needs-caregiver'] = 'common_care_controller/careseeker_specialneedscaregiver';
$route['jobs/therapists'] = 'careseeker_therapist';
$route['jobs/cleaning-household-help'] = 'common_care_controller/careseeker_cleaninghousehold';
$route['jobs/errand-runner-odd-jobs-personal-assistant-driver'] = 'common_care_controller/careseeker_errandrunner';
$route['jobs/pediatric-baby-nurse'] = 'common_care_controller/careseeker_babynurse';

$route['jobs/workers-staff-for-childcare-facility'] = 'common_care_controller/careseeker_childcarefacility';
$route['jobs/workers-staff-for-senior-care-facility'] = 'common_care_controller/careseeker_seniorcarefacility';
$route['jobs/workers-staff-for-special-needs-facility'] = 'common_care_controller/careseeker_specialneedsfacility';
$route['jobs/workers-for-cleaning-company'] = 'common_care_controller/careseeker_cleaningcompany';

$route['jobs/details/(:any)'] = 'caregivers/details/';

$route['caregivers/organization-workers'] = 'common_care_controller/organizationWorkers';
$route['caregivers/organization-workers/(:any)'] = 'common_care_controller/organizationWorkers/$1';
$route['caregivers/organizations'] = 'common_care_controller/organizations';
$route['caregivers/organizations/(:any)'] = 'common_care_controller/organizations/$1';

// $route['testfordaniel'] = 'user/get_model';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
