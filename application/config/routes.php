<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



/*================= Universal Routes =====================
			For all Application by Alamgir Kobir
*/
$route['login'] = 'Authenticator/index';
$route['signup'] = 'Authenticator/signup';
$route['download/(:any)'] = 'super_admin/download/$1';




//==================  =======================
$route['result'] = 'home/result';
$route['result/(:any)'] = 'home/result_info/$1';
$route['details/(:any)'] = 'welcome/details/$1';
$route['page/(:any)'] = 'home/page/$1';
$route['centerdetails/(:any)'] = 'home/centerdetails/$1';












