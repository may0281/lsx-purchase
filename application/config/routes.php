<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//$route['default_controller'] = "underconstruction";

//$route['default_controller'] = "underconstruction";
$route['default_controller'] = "dashboard";
$route['404_override'] = 'errorpage';

$route['login/verify'] = "login/Verify";
$route['logout'] = "login/Logout";



//authen/init-user


$route['authen/init-user'] = "user/index";
$route['authen/init-user/create'] = "user/createUser";
$route['authen/init-user/update/(:any)'] = "user/updateUser/$1";
$route['authen/delete-user/(:any)'] = "user/deleteUser/$1";
$route['authen/init-role'] = "role/index";
$route['authen/init-role/create'] = "role/createRole";
$route['authen/createRoleAction'] = "role/createAction";
$route['authen/init-role/update/(:any)'] = "role/updateRole/$1";
$route['authen/delete-role/(:any)'] = "role/deleteRole/$1";
$route['authen/updateRoleAction'] = "role/updateAction";

$route['purchase/request/create'] = "purchase/createRequest";
$route['purchase/request/update'] = "purchase/updateRequest";
$route['purchase/request/update/(:num)'] = "purchase/getUpdate/$1";
$route['purchase/report/(:num)'] = "purchase/getDetail/$1";
$route['purchase/report/list/(:num)/(:any)'] = "purchase/getList/$1/$2";
$route['purchase/request/delete/(:num)'] = "purchase/deletePurchase/$1";
$route['purchase/approve'] = "purchase/approvePurchaseRequest";
$route['purchase/change-status'] = "purchase/changeStatus";
$route['purchase/get-change-status/(:num)/(:any)'] = "purchase/getChangeStatus/$1/$2";


$route['purchase/pre-order'] = "purchaseorder/preOrder";
$route['purchase/po-report'] = "purchaseorder/index";
$route['purchase/pre-order/create'] = "purchaseorder/createPreOrder";
$route['purchaseorder/change-status'] = "purchaseorder/changeStatus";
$route['purchaseorder/delete/(:num)'] = "purchaseorder/delete/$1";
$route['purchase/po-report/list/(:any)'] = "purchaseorder/getList/$1";
$route['purchase/po-report/detail/(:any)'] = "purchaseorder/getDetail/$1";
$route['report/forecast-receive'] = "report/forecastReceive";




/// API ///
$route['api/item-list'] = "api/itemList";



