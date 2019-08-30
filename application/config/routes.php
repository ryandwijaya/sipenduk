<?php
defined('BASEPATH') OR exit('No direct script access allowed');


  	$route['dashboard'] = 'DashboardController/index';
    

    $route['rt'] = 'RtController/index';
  	$route['rt/tambah'] = 'RtController/tambah';
    $route['rt/delete/(:any)'] = 'RtController/hapus/$1';

  	$route['user'] = 'UserController/index';
    $route['user/tambah'] = 'UserController/tambah';


    $route['rw'] = 'RwController/index';
  	$route['rw/tambah'] = 'RwController/tambah';
    $route['rw/delete/(:any)'] = 'RwController/hapus/$1';

    $route['kk'] = 'KkController/index';
    $route['kk/tambah'] = 'KkController/tambah';
    $route['lihat/kk/(:any)'] = 'KkController/lihat/$1';

    
    $route['ajax/rt/(:any)'] = 'PendudukController/ajaxGetRT/$1';
    $route['ajax/kk/(:any)'] = 'BantuanController/ajax_get_kk/$1';

    $route['kel'] = 'KelController/index';
    $route['kel/tambah'] = 'KelController/tambah';
    $route['kel/delete/(:any)'] = 'KelController/delete/$1';


    $route['bantuan'] = 'BantuanController/index';
    $route['bantuan/tambah'] = 'BantuanController/tambah';
    $route['bantuan/ajukan'] = 'BantuanController/ajukan';
    $route['bantuan/delete/(:any)'] = 'BantuanController/delete/$1';
    $route['bantuan/detail/(:any)'] = 'BantuanController/detail/$1';
    $route['bantuan/export'] = 'BantuanController/export';
  	

  	$route['penduduk'] = 'PendudukController/index';
  	$route['penduduk/tambah'] = 'PendudukController/tambah';
    $route['lihat/(:any)'] = 'PendudukController/lihat_detail/$1';
    $route['laporan/export'] = 'LaporanController/export';

    $route['laporan'] = 'LaporanController/index';

    $route['konfirmasi/(:any)'] = 'BantuanController/confirm_status/$1';
    $route['konfirm/penduk/(:any)'] = 'PendudukController/confirm/$1';


  	$route['login'] = 'AuthController/index';
    $route['auth/login'] = 'AuthController/login';
    $route['register'] = 'AuthController/register';
    $route['register/tambah'] = 'KkController/register';
    $route['auth/logout'] = 'AuthController/logout';
  	$route['default_controller'] = 'AuthController/index';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;

