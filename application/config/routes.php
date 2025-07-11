<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['404_override'] = 'Myerror/page_missing';
$route['not-found'] = 'Myerror/page_missing';
$route['translate_uri_dashes'] = FALSE;

// #FRONT END
                                                              // LOGIN:
$route['forgot-password']     = 'Login/lupapassword';         // 1.LUPA PASSWORD FORM 
$route['verify']              = 'Login/verify';               // 2.OTP PASSWORD FORM 
$route['proses-verify']       = 'Login/proses_verify';        // 3.PROSES UPDATE STATUS TOKEN
$route['new-password']        = 'Login/form_new_password';    // 4. NEW PASSWORD FORM  
$route['proses-new-password'] = 'Login/proses_new_password';  // 5. PROSES NEW PASSWORD

  // content 
$route['gallery']        = 'Home/galery';
$route['gallery/(:num)'] = 'Home/galery/$1';

$route['blogs']        = 'Home/list_blog';
$route['blogs/(:num)'] = 'Home/list_blog/$1';
$route['blog/(:any)']  = 'Home/blog_detail/$1';







// !BE 
$route['menu-admin'] = 'Menu_admin/index';
$route['reset-password'] = 'Login/proses_lupapassword';
