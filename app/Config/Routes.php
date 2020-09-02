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
$routes->addRedirect('/', 'siswa');
$routes->group('bio', function ($routes) {
	$routes->add('/', 'Baru::index', ['as' => 'bio']);
	$routes->add('show', 'Baru::index');
	$routes->add('add', 'Baru::add_bio', ['as' => 'addbio']);
	$routes->post('save', 'Baru::save_bio', ['as' => 'savebio']);
	$routes->patch('update', 'Baru::update_bio', ['as' => 'updatebio']);
	$routes->add('edit/(:num)', 'Baru::edit_bio/$1', ['as' => 'editbio']);
	$routes->delete('hapus/(:num)', 'Baru::hapus_bio/$1', ['as' => 'hapusbio']);
});
$routes->group('siswa', function ($routes) {
	$routes->add('/', 'Siswa::index', ['as' => 'siswa_list']);
	$routes->add('tambah', 'Siswa::tambah', ['as' => 'siswa_add']);
	$routes->post('simpan', 'Siswa::simpan', ['as' => 'siswa_save']);
	$routes->patch('perbarui', 'Siswa::perbarui', ['as' => 'siswa_update']);
	$routes->delete('hapus/(:num)', 'Siswa::hapus/$1', ['as' => 'siswa_hapus']);
	$routes->add('(:num)/detail', 'Siswa::detail/$1', ['as' => 'siswa_detail']);
	$routes->add('(:num)/detail/pribadi', 'Siswa::ubah/$1', ['as' => 'siswa_edit']);
	$routes->add('(:num)/detail/alamat', 'Siswa::alamat/$1', ['as' => 'siswa_alamat']);
	$routes->post('(:num)/detail/alamat/simpan', 'Siswa::simpan_alamat/$1', ['as' => 'siswa_alamat_save']);
	$routes->add('(:num)/detail/kesehatan', 'Siswa::penyakit/$1', ['as' => 'siswa_penyakit']);
	$routes->post('(:num)/detail/penyakit/simpan', 'Siswa::simpan_penyakit/$1', ['as' => 'siswa_penyakit_save']);
	$routes->add('(:num)/detail/pendidikan', 'Siswa::pendidikan/$1', ['as' => 'siswa_pendidikan']);
	$routes->post('(:num)/detail/pendidikan/simpan', 'Siswa::simpan_pendidikan/$1', ['as' => 'siswa_pendidikan_save']);
	$routes->add('(:num)/detail/orangtua', 'Siswa::orangtua/$1', ['as' => 'siswa_orangtua']);
	$routes->add('(:num)/detail/kegemaran', 'Siswa::kegemaran/$1', ['as' => 'siswa_kegemaran']);
	$routes->add('(:num)/detail/perkembangan', 'Siswa::perkembangan/$1', ['as' => 'siswa_perkembangan']);
	$routes->post('(:num)/detail/perkembangan/simpan', 'Siswa::simpan_perkembangan/$1', ['as' => 'siswa_perkembangan_save']);
	$routes->add('(:num)/detail/tracker', 'Siswa::tracker/$1', ['as' => 'siswa_tracker']);
	$routes->post('(:num)/detail/tracker/simpan', 'Siswa::simpan_tracker/$1', ['as' => 'siswa_tracker_save']);
});

$routes->group('penyakit', function ($routes) {
	$routes->add('tambah/(:num)', 'Penyakit::simpan/$1', ['as' => 'penyakit_save']);
	$routes->add('perbarui/(:num)', 'Penyakit::perbarui/$1', ['as' => 'penyakit_update']);
	$routes->add('hapus/(:num)', 'Penyakit::hapus/$1', ['as' => 'penyakit_hapus']);
});
$routes->group('orangtua', function ($routes) {
	$routes->add('(:num)', 'Orangtua::index/$1', ['as' => 'orangtua_index']);
	$routes->add('tambah/(:num)', 'Orangtua::simpan/$1', ['as' => 'orangtua_save']);
	$routes->add('perbarui/(:num)', 'Orangtua::perbarui/$1', ['as' => 'orangtua_update']);
	$routes->add('hapus/(:num)', 'Orangtua::hapus/$1', ['as' => 'orangtua_hapus']);
});
$routes->group('kegemaran', function ($routes) {
	$routes->add('(:num)', 'Kegemaran::index/$1', ['as' => 'kegemaran_index']);
	$routes->add('tambah/(:num)', 'Kegemaran::simpan/$1', ['as' => 'kegemaran_save']);
	$routes->add('perbarui/(:num)', 'Kegemaran::perbarui/$1', ['as' => 'kegemaran_update']);
	$routes->add('hapus/(:num)', 'Kegemaran::hapus/$1', ['as' => 'kegemaran_hapus']);
});
$routes->group('beasiswa', function ($routes) {
	$routes->add('(:num)', 'Beasiswa::index/$1', ['as' => 'beasiswa_index']);
	$routes->add('tambah/(:num)', 'Beasiswa::simpan/$1', ['as' => 'beasiswa_save']);
	$routes->add('perbarui/(:num)', 'Beasiswa::perbarui/$1', ['as' => 'beasiswa_update']);
	$routes->add('hapus/(:num)', 'Beasiswa::hapus/$1', ['as' => 'beasiswa_hapus']);
});
$routes->group('tracker', function ($routes) {
	$routes->add('(:num)', 'Tracker::index/$1', ['as' => 'tracker_index']);
	$routes->add('tambah/(:num)', 'Tracker::simpan/$1', ['as' => 'tracker_save']);
	$routes->add('perbarui/(:num)', 'Tracker::perbarui/$1', ['as' => 'tracker_update']);
	$routes->add('hapus/(:num)', 'Tracker::hapus/$1', ['as' => 'tracker_hapus']);
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
