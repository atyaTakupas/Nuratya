<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');

$routes->get('/login', 'AuthController::login');
$routes->post('/auth/login', 'AuthController::processLogin');
$routes->get('/register', 'AuthController::register');
$routes->post('/auth/register', 'AuthController::processRegister');
$routes->get('/logout', 'AuthController::logout');


$routes->get('/admin/dashboard', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/customer/dashboard', 'Customer::index', ['filter' => 'role:customer']);

$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    
    // Dashboard
    $routes->get('home', 'DashboardController::index'); // Halaman dashboard
    // Pelanggan
    $routes->get('pelanggan', 'PelangganController::index'); // Tampilkan semua
    $routes->get('admin/pelanggan/create', 'PelangganController::create'); // Form tambah data
    $routes->post('pelanggan/store', 'PelangganController::store'); // Simpan data
    $routes->get('pelanggan/edit/(:num)', 'PelangganController::edit/$1'); // Form edit data
    $routes->post('pelanggan/update/(:num)', 'PelangganController::update/$1'); // Update data
    $routes->get('pelanggan/delete/(:num)', 'PelangganController::delete/$1'); // Hapus data
    // Kategori
    $routes->get('kategori', 'KategoriController::index'); // Tampilkan semua
    $routes->get('admin/kategori/create', 'KategoriController::create'); // Form tambah data
    $routes->post('kategori/store', 'KategoriController::store'); // Simpan data
    $routes->get('kategori/edit/(:num)', 'KategoriController::edit/$1'); // Form edit data
    $routes->post('kategori/update/(:num)', 'KategoriController::update/$1'); // Update data
    $routes->get('kategori/delete/(:num)', 'KategoriController::delete/$1'); // Hapus data
    // Produk
    $routes->get('produk', 'ProdukController::index'); // Tampilkan semua
    $routes->get('produk/create', 'ProdukController::create'); // Form tambah data
    $routes->post('produk/store', 'ProdukController::store'); // Simpan data
    $routes->get('produk/edit/(:num)', 'ProdukController::edit/$1'); // Form edit data
    $routes->post('produk/update/(:num)', 'ProdukController::update/$1'); // Update data
    $routes->post('produk/delete/(:num)', 'ProdukController::delete/$1'); // Hapus data

    // Detail Pesanan
    $routes->get('detail_pesanan', 'DetailPesananController::index'); // Tampilkan semua
    $routes->get('detail_pesanan/create', 'DetailPesananController::create'); // Form tambah data
    $routes->post('detail_pesanan/store', 'DetailPesananController::store'); // Simpan data
    $routes->get('detail_pesanan/edit/(:num)', 'DetailPesananController::edit/$1'); // Form edit data
    $routes->post('detail_pesanan/update/(:num)', 'DetailPesananController::update/$1'); // Update data
    $routes->get('detail_pesanan/delete/(:num)', 'DetailPesananController::delete/$1'); // Hapus data


    

    // Pembayaran
    $routes->get('pembayaran', 'PembayaranController::index'); // Tampilkan semua
    $routes->get('pembayaran/create', 'PembayaranController::create'); // Form tambah data
    $routes->post('pembayaran/store', 'PembayaranController::store'); // Simpan data
    $routes->get('pembayaran/edit/(:num)', 'PembayaranController::edit/$1'); // Form edit data
    $routes->post('pembayaran/update/(:num)', 'PembayaranController::update/$1'); // Update data
    $routes->get('pembayaran/delete/(:num)', 'PembayaranController::delete/$1'); // Hapus data

    // Pesanan
    $routes->get('pesanan', 'PesananController::index'); // Tampilkan semua
    $routes->get('pesanan/create', 'PesananController::create'); // Form tambah data
    $routes->post('pesanan/store', 'PesananController::store'); // Simpan data
    $routes->get('pesanan/detail/(:num)', 'PesananController::detail/$1'); // Detail pesanan
    $routes->get('pesanan/edit/(:num)', 'PesananController::edit/$1'); // Form edit data
    $routes->post('pesanan/update/(:num)', 'PesananController::update/$1'); // Update data
    $routes->get('pesanan/delete/(:num)', 'PesananController::delete/$1'); // Hapus data
    $routes->get('pesanan/bayar/(:num)', 'PesananController::bayar/$1'); // Form pembayaran

});