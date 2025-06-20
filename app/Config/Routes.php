<?php

namespace Config;

$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth'); // Mengatur controller default ke Auth
$routes->setDefaultMethod('index');    // Mengatur method default ke index
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false); // Pastikan ini false untuk keamanan dan kinerja


/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Rute default, mengarah ke halaman login
$routes->get('/', 'Auth::index');

// Rute untuk Otentikasi (Login/Logout) - TETAP ADA UNTUK FUNGSIONALITAS
$routes->get('/login', 'Auth::index'); // Halaman login
$routes->post('/login/process', 'Auth::processLogin'); // Memproses form login
$routes->get('/logout', 'Auth::logout'); // Logout

// Rute untuk Users (SEKARANG BISA DIAKSES TANPA LOGIN)
$routes->get('/users', 'Users::index'); // Menampilkan daftar pengguna
$routes->get('/users/(:num)', 'Users::detail/$1'); // Menampilkan detail pengguna berdasarkan ID

// Rute untuk Contacts (SUDAH DAPAT DIAKSES TANPA LOGIN)
$routes->get('/contacts', 'Contacts::index'); // Menampilkan daftar kontak
$routes->get('/contact', 'Contacts::submit'); // Menampilkan form kontak (GET request)
$routes->post('/contacts/submit', 'Contacts::submit'); // Memproses submit form kontak (POST request)

// Rute untuk Dashboard (SEKARANG BISA DIAKSES TANPA LOGIN)
$routes->get('/dashboard', 'Dashboard::index'); // Contoh dashboard user

// Rute untuk Admin Dashboard (SEKARANG BISA DIAKSES TANPA LOGIN)
// Jika Anda ingin mempertahankan pemisahan admin/user tapi tanpa login,
// Anda bisa memindahkan logika pengecekan role ke dalam controller itu sendiri
$routes->get('/admin/dashboard', 'Admin::index'); // Contoh dashboard admin


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}