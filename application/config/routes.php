<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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

$route['account'] = 'account';
$route['account/thankyou'] = 'account/thankyou';
$route['account/create_set'] = 'account/create_set';
$route['account/check_mod_name'] = 'account/check_mod_name'; /* test */
$route['account/new-trial'] = 'account/new_trial';
$route['account/sets'] = 'account/sets';
$route['account/favorite-fragrances'] = 'account/favorite_frags';
$route['account/favorite-raw-materials'] = 'account/favorite_raw_materials';
$route['account/favorite_frag'] = 'account/favorite_frag';
$route['account/favorite_mod'] = 'account/favorite_mod';
$route['account/favorite_blend'] = 'account/favorite_blend';
$route['account/favorite'] = 'account/favorite';
$route['account/mods'] = 'account/mods';
$route['account/mod_notes'] = 'account/mod_notes';
$route['account/mods/(:any)'] = 'account/view/$1';
$route['account/fragrances'] = 'account/fragrances';
$route['account/fragrances/(:any)'] = 'account/view/$1';
$route['account/orders'] = 'account/orders';
$route['account/create_fragrance'] = 'account/create_fragrance';

$route['admin'] = 'admin';
$route['admin/orders'] = 'admin/orders';
$route['admin/formulas'] = 'admin/formulas';
$route['admin/submit_lab_record'] = 'admin/submit_lab_record';
$route['admin/update_lab_record_notes'] = 'admin/update_lab_record_notes';
$route['admin/lab_records'] = 'admin/lab_records';


// Redirect to Raw Materials
$route['blends'] = 'blends';
$route['blends/add'] = 'blends/add';
$route['blends/edit'] = 'blends/edit';
$route['blends/(:any)'] = 'blends/view/$1';

$route['checkout/cart'] = 'checkout/cart';
$route['checkout/show'] = 'checkout/show';
$route['checkout/update'] = 'checkout/update';
$route['checkout/total'] = 'checkout/total';
$route['checkout/remove'] = 'checkout/remove';
$route['checkout/destroy'] = 'checkout/destroy';
$route['checkout/charge'] = 'checkout/charge';
$route['checkout/confirmation'] = 'checkout/confirmation';
$route['checkout'] = 'checkout';

// Redirect to Raw Materials
$route['fragrances'] = 'fragrances';
$route['fragrances/add'] = 'fragrances/add/';
$route['fragrances/edit'] = 'fragrances/edit/';
$route['fragrances/(:any)'] = 'fragrances/view/$1';

$route['lab'] = 'lab';
$route['lab/faq'] = 'lab/faq';
$route['lab/drops'] = 'lab/drops';
$route['lab/create'] = 'lab/create';
$route['lab/new_formula'] = 'lab/new_formula';
$route['lab/new_mod/(:any)'] = 'lab/new_mod/$1';
$route['lab/(:any)'] = 'lab/view/$1';

$route['login'] = 'auth/login';

$route['palettes'] = 'palettes';
$route['palettes/create'] = 'palettes/create';
$route['palettes/choose'] = 'palettes/choose';
$route['palettes/(:any)'] = 'palettes/view/$1';

$route['raw-materials'] = 'raw_materials';
$route['raw-materials/add'] = 'raw_materials/add';
$route['raw-materials/edit'] = 'raw_materials/edit';
$route['raw-materials/(:any)'] = 'raw_materials/view/$1';

$route['register'] = 'auth/login'; // change to 'register' to open registration
$route['invite'] = 'register/invite';

$route['scent-kits'] = 'kits';
$route['scent-kits/mailer'] = 'kits/mailer';
$route['scent-kits/(:any)'] = 'kits/view/$1';

$route['snippets/cart-link'] = 'snippets/refresh_cart';
$route['snippets/cart-link--mobile'] = 'snippets/refresh_cart_mobile';

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;