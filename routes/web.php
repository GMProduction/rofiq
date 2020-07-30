<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Main\MainController@index');
Route::get('/product/{id}', 'Main\MainController@detail');
Route::post('/ajax/addToCart', 'Main\TransactionController@addToCart');
Route::get('/cart', 'Main\TransactionController@cartPage');
Route::get('/ajax/ongkir', 'Main\TransactionController@getOngkir');
Route::get('/kontak', function () {
    return view('kontak');
});



Route::get('/payment', function () {
    return view('payment');
});
//ADMIN

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/admin/produk', function () {
    return view('admin.produk.produk');
});

Route::get('/admin/kategori', function () {
    return view('admin.kategori.kategori');
});

Route::get('/admin/tambahkategori', function () {
    return view('admin.kategori.tambahkategori');
});

Route::get('/admin/ongkir', function () {
    return view('admin.ongkir.ongkir');
});

Route::get('/admin/tambahongkir', function () {
    return view('admin.ongkir.tambahongkir');
});

Route::get('/admin/tambahproduk', function () {
    return view('admin.produk.tambahproduk');
});

Route::get('/admin/pesanan', function () {
    return view('admin.pesanan.pesanan');
});

Route::get('/admin/detailpesanan', function () {
    return view('admin.pesanan.detailPesanan');
});

Route::get('/admin/user', function () {
    return view('admin.user.user');
});


//USER


Route::get('/user', function () {
    return view('user.dashboard');
});

Route::get('/user/pesanan', function () {
    return view('user.pesanan.pesanan');
});

Route::get('/user/detailpesanan', function () {
    return view('user.pesanan.detailpesanan');
});

Route::get('/user/profil', function () {
    return view('user.profil.profil');
});


//LOGIN

Route::get('/login', function () {
    return view('login.login');
});

Route::get('/daftaruser', function () {
    return view('login.daftaruser');
});
Route::post('/post-register', 'Auth\AuthController@register');
Route::post('/post-login', 'Auth\AuthController@login');
Route::get('/logout', 'Auth\AuthController@logout');


//CETAK


Route::get('/admin/pesanan/cetak', 'LaporanController@cetakAdminDatapesanan')->name('cetakAdminDatapesanan');
