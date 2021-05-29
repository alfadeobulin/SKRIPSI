<?php

use Illuminate\Support\Facades\Route;


//DashBoard

//Login & Logout
// Route::get('/login','AuthController@login')->name('login');
// Route::post('/postlogin','AuthController@postlogin');
 

Auth::routes();

    //All role (user, member, admin)
    //halaman utama
    Route::get('/','DashboardController@index');
    Route::get('/dashboard','DashboardController@index');
    //Informasi
    Route::get('/informasi', 'InformasiController@index');
    //daftar member
    Route::get('/daftarmemberumkm', 'MemberController@index');
    //galeri semua
    Route::get('/galeri', 'GaleriController@index');
    //umkm terdaftar
    Route::get('/umkm', 'UmkmController@index');
    //berita 
    Route::get('/berita', 'BeritaController@index');
    //role lihat wilayah
    Route::get('/kecamatan', 'KecamatanController@index');
    Route::get('/kelurahan', 'KecamatanController@index');
    //logout
    Route::get('/logout','AuthController@logout');
    

Route::group(['middleware' => ['auth','checkRole:admin,member']], function () {
    // profile member
    Route::get('/profilemember/profile/{id_member}', 'MemberController@profile');
    
    
});

Route::group(['middleware' => ['auth','checkRole:admin']], function () {

    //create member
    Route::post('/createmember', 'MemberController@createmember');
    //create berita 
    Route::get('/berita/delete/{brt}', 'BeritaController@delete');
    Route::post('/createberita', 'BeritaController@createberita');
    //create admin
    Route::post('/createadmin', 'AdminController@createadmin');
    Route::get('/daftaradmin/delete/{id_admin}', 'AdminController@delete');
    //delete usaha
    Route::get('/umkm/delete/{ush}', 'UmkmController@delete');
    //delete member
    Route::get('/daftarmemberumkm/delete/{id_member}', 'MemberController@delete');
    //daftar admin
    Route::get('/daftaradmin', 'AdminController@index');
});

Route::group(['middleware' => ['auth','checkRole:member']], function () {
    //edit member
    Route::get('/daftarmemberumkm/edit/{id_member}', 'MemberController@editmember');
    Route::post('/daftarmemberumkm/update/{id_member}', 'MemberController@update');
    //create usaha
    Route::post('/createusaha', 'UmkmController@create');
});