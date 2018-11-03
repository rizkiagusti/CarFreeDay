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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Utama';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Beranda 
$route['admin/beranda/dataacaraaktif'] = "acara/dataacaraaktif";
$route['admin/beranda/dataacarabelumaktif'] = "acara/dataacarabelumaktif";
$route['admin/profil/ubah/(:any)'] = "admin/ubah/$1";

//Kelola admin
$route['admin/kelolaadmin/tambah'] = "admin/tambah";
$route['admin/kelolaadmin/ubah/(:any)'] = "admin/ubah/$1";
$route['admin/kelolaadmin/hapus/(:any)'] = "admin/hapus/$1";

//Kelola Petugas
$route['admin/kelolapetugas'] = "petugas/kelolapetugas";
$route['admin/kelolapetugas/tambah'] = "petugas/form_tambahpetugas"; 
$route['admin/kelolapetugas/tampil/(:any)'] = "petugas/tampil/$1"; 
$route['admin/kelolapetugas/hapus/(:any)'] = "petugas/hapus/$1";

//Aktivasi Acara
$route['admin/aktivasiacara'] = "acara/kelolaacara";
$route['admin/aktivasiacara/tampil/(:any)'] = "acara/tampil/$1";
$route['admin/aktivasiacara/konfirmasi'] = "acara/konfirmasi";
$route['admin/aktivasiacara/hapus/(:any)'] = "acara/hapus/$1";

//Kelola CFD
$route['admin/kelolacfd'] = "cfd/kelolacfd";
$route['admin/kelolacfd/tambah'] = "cfd/tambah_cfd"; 
$route['admin/kelolacfd/tambahLokasi'] = "cfd/tambah_cfd_lokasi";
$route['admin/kelolacfd/ubah/(:any)'] = "cfd/ubah/$1";
$route['admin/kelolacfd/tampil/(:any)'] = "cfd/tampil/$1";
$route['admin/kelolacfd/hapus/(:any)'] = "cfd/hapus/$1";

//panitia
$route['petugas/acara/ubah/(:any)'] = "acara/ubahAcara/$1";
$route['petugas/acara/tambah'] = "acara/tambahAcara";

