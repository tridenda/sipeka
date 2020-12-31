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
$route['default_controller'] = 'cashier/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Login links
$route['masuk'] = 'auth/login';
$route['tamu'] = 'auth/guest';

// Cashier Links
$route['beranda'] = 'cashier';

// Material Links
$route['bahan_baku'] = 'materials';
$route['daftar_bahan'] = 'materials';
$route['daftar_bahan/tambah'] = 'materials/add';
$route['daftar_bahan/ubah/(:num)'] = 'materials/edit/$1';
$route['daftar_bahan/hapus'] = 'materials/delete';

// Category Links
$route['kategori'] = 'categories';
$route['kategori/tambah'] = 'categories/add';
$route['kategori/ubah/(:num)'] = 'categories/edit/$1';
$route['kategori/hapus/(:num)'] = 'categories/delete/$1';

// Unit Links
$route['satuan'] = 'units';
$route['satuan/tambah'] = 'units/add';
$route['satuan/ubah/(:num)'] = 'units/edit/$1';
$route['satuan/hapus/(:num)'] = 'units/delete/$1';

// Supplier Links
$route['pemasok'] = 'suppliers';
$route['pemasok/tambah'] = 'suppliers/add';
$route['pemasok/ubah/(:num)'] = 'suppliers/edit/$1';
$route['pemasok/hapus/(:num)'] = 'suppliers/delete/$1';

// Stock-in Links
$route['persediaan/masuk'] = 'stocks/stock_in_index';
$route['persediaan/masuk/tambah'] = 'stocks/stock_in_add';
$route['persediaan/masuk/hapus/(:num)'] = 'stocks/stock_in_delete/$1';

// Stock-out Links
$route['persediaan/keluar'] = 'stocks/stock_out_index';
$route['persediaan/keluar/tambah'] = 'stocks/stock_out_add';
$route['persediaan/keluar/hapus/(:num)'] = 'stocks/stock_out_delete/$1';

// Stock-missing Links
$route['persediaan/hilang'] = 'stocks/stock_missing_index';
$route['persediaan/hilang/tambah'] = 'stocks/stock_missing_add';
$route['persediaan/hilang/hapus/(:num)'] = 'stocks/stock_missing_delete/$1';

// Stock-founded Links
$route['persediaan/ditemukan'] = 'stocks/stock_founded_index';
$route['persediaan/ditemukan/tambah'] = 'stocks/stock_founded_add';
$route['persediaan/ditemukan/hapus/(:num)'] = 'stocks/stock_founded_delete/$1';