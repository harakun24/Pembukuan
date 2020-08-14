<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->add('/', 'Baru::index');
$routes->group('bio', function ($routes) {
	$routes->add('/', 'Baru::index',['as' => 'bio']);
	$routes->add('show', 'Baru::index');
	$routes->add('add', 'Baru::add_bio', ['as' => 'addbio']);
	$routes->post('save', 'Baru::save_bio', ['as' => 'savebio']);
	$routes->patch('update', 'Baru::update_bio', ['as' => 'updatebio']);
	$routes->add('edit/(:num)', 'Baru::edit_bio/$1', ['as' => 'editbio']);
	$routes->delete('hapus/(:num)', 'Baru::hapus_bio/$1', ['as' => 'hapusbio']);
});
$routes->group('siswa',function($routes){
	$routes->add('/', 'Siswa::index',['as'=>'siswa_list']);
	$routes->add('tambah', 'Siswa::tambah',['as'=>'siswa_add']);
	$routes->add('ubah/(:num)', 'Siswa::ubah/$1',['as'=>'siswa_edit']);
	$routes->post('simpan', 'Siswa::simpan',['as'=>'siswa_save']);
	
});


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
