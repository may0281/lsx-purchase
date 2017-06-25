<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//$route['default_controller'] = "underconstruction";

//$route['default_controller'] = "underconstruction";
$route['default_controller'] = "dashboard";
$route['404_override'] = 'errorpage';

$route['login/verify'] = "login/Verify";

$route['user/init-user'] = "user/index";
$route['user/create-user'] = "user/createUser";
$route['user/update/(:any)'] = "user/updateUser/$1";
$route['user/delete/(:any)'] = "user/deleteUser/$1";
$route['role/init-role'] = "role/index";
