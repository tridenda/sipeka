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


// Begin: Others
// Default links
$route['default_controller'] = 'auth/login_cashier';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// Beranda links
$route['beranda'] = 'home/index';
// Users Login links
$route['kasir'] = 'auth/login_cashier';
// End: Others


// Begin: Sales
// New order links
$route['penjualan/pesanan_baru'] = 'sal_neworders';
$route['penjualan/pesanan_baru/hapus/(:num)'] = 'sal_neworders/delete/$1';
// Cart links
$route['penjualan/keranjang/(:num)'] = 'sal_cart/index/$1';
$route['penjualan/keranjang/cetak_struk/(:num)'] = 'sal_cart/receipt_print/$1';
$route['penjualan/keranjang/cetak_pesanan/(:num)'] = 'sal_cart/request_print/$1';
// Sale list links
$route['penjualan/daftar_penjualan'] = 'sal_sales';
// End: Sales


// Begin: Products
// Product Links
$route['produk'] = 'pro_products';
$route['produk/daftar_produk'] = 'pro_products';
$route['produk/daftar_produk/tambah'] = 'pro_products/add';
$route['produk/daftar_produk/ubah/(:num)'] = 'pro_products/edit/$1';
$route['produk/daftar_produk/hapus'] = 'pro_products/delete';
// Category Links
$route['produk/kategori'] = 'pro_categories';
$route['produk/kategori/tambah'] = 'pro_categories/add';
$route['produk/kategori/ubah/(:num)'] = 'pro_categories/edit/$1';
$route['produk/kategori/hapus'] = 'pro_categories/delete';
// End Products


// Begin: Materials
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
// End: Materials


// Begin: Stocks
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
// Supplier Links
$route['pemasok'] = 'suppliers';
$route['pemasok/tambah'] = 'suppliers/add';
$route['pemasok/ubah/(:num)'] = 'suppliers/edit/$1';
$route['pemasok/hapus'] = 'suppliers/delete';
// End: Stocks


// Begin: Attendance
// Attendances links
$route['pengisian_kehadiran'] = 'attendances/attendance';
// Overtime links
$route['pengisian_lembur'] = 'attendances/overtime';
$route['pengisian_lembur/tambah'] = 'attendances/add_overtime';
$route['pengisian_lembur/ubah/(:num)'] = 'attendances/edit_overtime/$1';
$route['pengisian_lembur/hapus'] = 'attendances/delete_overtime';
// Annual leave links
$route['pengisian_cuti'] = 'attendances/annual_leave';
$route['pengisian_cuti/tambah'] = 'attendances/add_annual_leave';
$route['pengisian_cuti/ubah/(:num)'] = 'attendances/edit_annual_leave/$1';
$route['pengisian_cuti/hapus'] = 'attendances/delete_annual_leave';
// End: Attendance


// Begin: Salaries
// Salaries links
$route['gaji'] = 'salaries';
$route['gaji/tambah'] = 'salaries/add';
$route['gaji/ubah/(:num)'] = 'salaries/edit/$1';
$route['gaji/hapus/(:num)'] = 'salaries/delete/$1';
// Salaries/annual leave payment links
$route['pembayaran_gaji'] = 'salaries/salary_payment';
$route['pembayaran_gaji/form'] = 'salaries/salary_payment_form';
$route['pembayaran_cuti'] = 'salaries/annual_leave_payment';
$route['pembayaran_cuti/form'] = 'salaries/annual_leave_payment_form';
// End: Salaries


// Begin: Users
// Users links
$route['pengguna/pramuniaga'] = 'users';
$route['pengguna/pramuniaga/tambah'] = 'users/add';
$route['pengguna/pramuniaga/ubah/(:num)'] = 'users/edit/$1';
$route['pengguna/pramuniaga/hapus'] = 'users/delete';
$route['pengguna/pengaturan'] = 'users/settings';
$route['pengguna/bantuan'] = 'users/helper';
// Members links
$route['pengguna/pelanggan'] = 'members';
$route['pengguna/pelanggan/tambah'] = 'members/add';
$route['pengguna/pelanggan/ubah/(:num)'] = 'members/edit/$1';
$route['pengguna/pelanggan/hapus'] = 'members/delete';
// End: Users


// Begin: Reports
// Stock Reports links
$route['laporan_persediaan'] = 'Stock_reports/index';
// End: Reports