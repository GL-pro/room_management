<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['index'] = 'main/index';    
$route['login'] = 'main/login'; 
$route['logincheck'] = 'main/logincheck';

// Superadmin
$route['dashboard'] = 'Superadmin/dashboard'; 
$route['room_enquiry'] = 'Superadmin/room_enquiry'; 

$route['room_enquiry1'] = 'Superadmin/room_enquiry1'; 
$route['booked_enquiry'] = 'Superadmin/booked_enquiry'; 
$route['booked_enquiry/(:any)'] = 'Superadmin/booked_enquiry/$1'; 
$route['occupied_enquiry'] = 'Superadmin/occupied_enquiry'; 

$route['hotel_room_add_staff'] = 'Superadmin/hotel_room_add_staff';
$route['hotel_added_rooms_staff'] = 'Superadmin/hotel_added_rooms_staff';
$route['hotel_room_edit_staff/(:any)'] = 'Superadmin/hotel_room_edit_staff/$1';
$route['item_creation'] = 'Superadmin/item_creation';
$route['item_reg'] = 'Superadmin/item_reg';
$route['all_item'] = 'Superadmin/all_item';
$route['item_edit/(:any)'] = 'Superadmin/item_edit/$1';
$route['itemupdate'] = 'Superadmin/itemupdate';
$route['category_creation'] = 'Superadmin/category_creation';
$route['category_reg'] = 'Superadmin/category_reg';
$route['all_category'] = 'Superadmin/all_category';
$route['category_edit/(:any)'] = 'Superadmin/category_edit/$1';
$route['categoryupdate'] = 'Superadmin/categoryupdate';
$route['subcategory_creation'] = 'Superadmin/subcategory_creation';
$route['subcategory_reg'] = 'Superadmin/subcategory_reg';
$route['all_subcategory'] = 'Superadmin/all_subcategory';
$route['subcategory_edit/(:any)'] = 'Superadmin/subcategory_edit/$1';
$route['subcategoryupdate'] = 'Superadmin/subcategoryupdate';
$route['get_subcategories'] = 'Superadmin/get_subcategories';
$route['insert_hotel_room_staff'] = 'Superadmin/insert_hotel_room_staff';
$route['all_bookings'] = 'Superadmin/all_bookings';
$route['get_booked_dates'] = 'Superadmin/get_booked_dates';
$route['change_booking_status'] = 'Superadmin/change_booking_status';
$route['settlement'] = 'Superadmin/settlement';
$route['hotel_creation'] = 'Superadmin/hotel_creation';
$route['membhotelreg'] = 'Superadmin/membhotelreg';
$route['create'] = 'Superadmin/create';

$route['add_customer'] = 'Superadmin/add_customer';
$route['add_agent'] = 'Superadmin/add_agent';
// Superadmin

//ADMIN
$route['admin_dashboard'] = 'admin/admin_dashboard';
$route['logout'] = 'admin/logout';
$route['room_type_creation'] = 'admin/room_type_creation';
$route['all_room_type'] = 'admin/all_room_type';
$route['room_type_reg'] = 'admin/room_type_reg';
$route['roomtype_edit/(:any)'] = 'admin/roomtype_edit/$1';
$route['roomtypeupdate'] = 'admin/roomtypeupdate';
$route['hotel_room_add'] = 'admin/hotel_room_add';
$route['hotel_facilitys'] = 'admin/hotel_facilitys';
$route['hotel_add_facility'] = 'admin/hotel_add_facility';
$route['saveFacility'] = 'admin/saveFacility';
$route['insert_hotel_room'] = 'admin/insert_hotel_room';
$route['hotel_added_rooms'] = 'admin/hotel_added_rooms';
$route['hotel_room_edit/(:any)'] = 'admin/hotel_room_edit/$1';
$route['update_room_fields111'] = 'admin/update_room_fields111';
$route['update_subfacility_status111'] = 'admin/update_subfacility_status111';
//ADMIN
//Auth
$route['unauthorized'] = 'auth/unauthorized';