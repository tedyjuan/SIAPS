<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['404_override'] = 'Myerror/page_missing';
$route['not-found'] = 'Myerror/page_missing';
$route['translate_uri_dashes'] = FALSE;
// #FE 
$route['forgot-password'] = 'Login/lupapassword';
$route['verify'] = 'Login/verify';
$route['proses-verify'] = 'Login/proses_verify';
$route['gallery'] = 'Home/galery';
$route['blog/(:any)'] = 'Home/blog_detail/$1';
$route['blogs'] = 'Home/list_blog';






// !BE 
$route['menu-admin'] = 'Menu_admin/index';
$route['reset-password'] = 'Login/proses_lupapassword';
