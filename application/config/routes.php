<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//$route['default_controller'] = "underconstruction";

//$route['default_controller'] = "underconstruction";
$route['default_controller'] = "dashboard";
$route['404_override'] = 'errorpage';

$route['login/verify'] = "login/Verify";
$route['logout'] = "login/Logout";



//authen/init-user


$route['authen/init-user'] = "user/index";
$route['authen/create-user'] = "user/createUser";
$route['authen/update-user/(:any)'] = "user/updateUser/$1";
$route['authen/delete-user/(:any)'] = "user/deleteUser/$1";
$route['role/init-role'] = "role/index";
$route['role/create-role'] = "role/createRole";
