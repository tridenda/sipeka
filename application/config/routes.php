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

$route['default_controller'] = 'members/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Beranda links
$route['beranda'] = 'home/index';

// Users Login links
$route['kasir'] = 'auth/login_cashier';
$route['pelanggan'] = 'auth/login_members';
$route['tamu'] = 'auth/login_guests';

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
$route['kategori/hapus'] = 'categories/delete';

// Unit Links
$route['satuan'] = 'units';
$route['satuan/tambah'] = 'units/add';
$route['satuan/ubah/(:num)'] = 'units/edit/$1';
$route['satuan/hapus'] = 'units/delete';

// Supplier Links
$route['pemasok'] = 'suppliers';
$route['pemasok/tambah'] = 'suppliers/add';
$route['pemasok/ubah/(:num)'] = 'suppliers/edit/$1';
$route['pemasok/hapus'] = 'suppliers/delete';

// Stock-in Links
$route['persediaan/masuk'] = 'stocks/stock_in_index';
$route['persediaan/masuk/tambah'] = 'stocks/stock_in_add';

// Stock-out Links
$route['persediaan/keluar'] = 'stocks/stock_out_index';
$route['persediaan/keluar/tambah'] = 'stocks/stock_out_add';

// Stock-missing Links
$route['persediaan/hilang'] = 'stocks/stock_missing_index';
$route['persediaan/hilang/tambah'] = 'stocks/stock_missing_add';

// Stock-founded Links
$route['persediaan/ditemukan'] = 'stocks/stock_founded_index';
$route['persediaan/ditemukan/tambah'] = 'stocks/stock_founded_add';

// Stock-in, stock-out, stock-missing, and stock-founded delete
$route['persediaan/hapus/(:num)/(:num)/(:num)/(:any)'] = 'stocks/delete/$1/$2/$3/$4';

// Users links
$route['pengguna'] = 'users';
$route['pengguna/tambah'] = 'users/add';
$route['pengguna/ubah/(:num)'] = 'users/edit/$1';
$route['pengguna/hapus'] = 'users/delete';

// Salaries links
$route['gaji'] = 'salaries';
$route['gaji/tambah'] = 'salaries/add';
$route['gaji/ubah/(:num)'] = 'salaries/edit/$1';
$route['gaji/hapus'] = 'salaries/delete';

