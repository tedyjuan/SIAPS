<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['404_override'] = 'Myerror/page_missing';
$route['translate_uri_dashes'] = FALSE;
// #FE 
$route['gallery'] = 'Home/galery';






// !BE 
$route['menu-admin'] = 'Menu_admin/index';
