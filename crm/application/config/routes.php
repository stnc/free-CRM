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
$route['default_controller'] = "admin/dashboard";
//$route['default_controller'] = "admin/personal";
$route['404_override'] = '';

$route['admin'] = "admin/dashboard";
$route['admin/logout'] = "admin/logout";

// admin panel urls
//$route['admin'] = "admin/dashboard";
//$route['admin/dashboard'] = "admin/dashboard";
/*
$route['admin/add_personal'] = "admin/add_personal";
$route['admin/edit_personal/(:any)'] = "admin/edit_personal/index/$1";
$route['admin/delete_personal/(:any)'] = "admin/delete_personal/index/$1";
$route['admin/delete_personal/'] = "admin/delete_personal/index/$1";
$route['admin/settings'] = "admin/settings";
$route['admin/logout'] = "admin/admin_home/logout";
$route['(:any)'] = "page/index/$1";

$route['admin/ajax_personal/town_list'] = "admin/ajax_personal/town_list";
*/

$route['scaffolding_trigger'] = "";
/* End of file routes.php */
/* Location: ./application/config/routes.php */