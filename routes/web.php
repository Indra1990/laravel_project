<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/panel', 'UserController@panel');
Route::get('/logintest', 'HomeController@logintest');

Route::group(['middleware' => ['web']], function() {
	//user backend
Route::get('/profile', 'UserController@profile');
Route::get('/edit_user/{id}', 'UserController@edit_user');
Route::PATCH('edit_user/{id}', 'UserController@update_user');
Route::get('barang_order', 'UserController@barang_order');
Route::post('barang_order/', 'UserController@barang_order_store');
//Route::get('barang_order/create', 'UserController@create_order');

Route::get('riwayat/history/{id}', 'UserController@riwayat');
//Route::get('login', 'Auth\LoginController@login');


});


Route::group(['middleware' => 'admin'],function () {
Route::get('/admin', 'AdminController@dashboard');
Route::get('admin/user_profile', 'AdminController@search_user');

Route::get('admin/home', 'adminController@home');
Route::get('admin/user_profile', 'adminController@user_profile');
Route::get('admin/user_single/{id}', 'adminController@user_single');
Route::get('admin/user_edit/{id}', 'adminController@user_edit');
Route::PATCH('admin/user_edit/{id}', 'adminController@user_update');
Route::get('admin/user_profile/{id}', 'AdminController@user_delete');
Route::get('admin/downloadExcelUser', 'AdminController@downloadExcelUser');

//merchandise
Route::get('admin/merchandise_profile', 'AdminController@search_merchandise');
Route::get('admin/merchandise_profile', 'AdminController@merchandise_profile');
Route::get('admin/merchandise_tambah', 'AdminController@merchandise_tambah');
Route::post('admin/', 'AdminController@merchandise_tambahh');
Route::get('admin/downloadExcelBarang', 'AdminController@downloadExcelBarang');
Route::get('admin/merchandise_single/{id}', 'AdminController@merchandise_single');
Route::get('admin/merchandise_edit/{id}', 'AdminController@merchandise_edit');
Route::PATCH('admin/merchandise_edit/{id}', 'AdminController@merchandise_update');
Route::get('admin/merchandise_profile/{id}', 'AdminController@merchandise_delete');

//cek barang order
Route::get('admin/cek_barang_order', 'AdminController@cek_barang_order');
Route::get('admin/edit_cek_barang_order/{id}', 'AdminController@edit_cek_barang_order');
Route::PATCH('admin/edit_cek_barang_order/{id}', 'AdminController@update_cek_barang_order');

Route::get('admin/selesai_cek_order_barang/{id}', 'AdminController@selesaiedit_cek_barang_order');
Route::PATCH('admin/selesai_cek_order_barang/{id}', 'AdminController@selesai_cek_barang_order');
Route::get('admin/cek_barang_order', 'AdminController@search_cek_barang_order');

//laporan 
Route::get('admin/laporan', 'AdminController@laporan_order');
Route::get('admin/laporan', 'AdminController@search_laporan');
Route::get('admin/downloadExcelLaporan', 'AdminController@downloadExcelLaporan');

//logout
Route::get('logout', 'Auth\LoginController@logout');

});