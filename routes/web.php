<?php

use Illuminate\Support\Facades\Route;

//DashBoard
    Route::get('/', function ()
    {
        return view('home');
    });

//Login & Logout
    Route::get('/login','AuthController@login')->name('login');
    Route::post('/postlogin','AuthController@postlogin');
    Route::get('/logout','AuthController@logout');

   //Route::group(['middleware'=>'auth'], function(){
    //role admin ->daftar member
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::get('/kecamatan','KecamatanController@index')->name('kecamatan');
    Route::post('/createmember', 'MemberController@createmember')->name('create member');
    Route::get('/daftarmemberumkm','MemberController@index')->name('daftar member');
    Route::get('/daftarmemberumkm/edit/{id_member}','MemberController@editmember')->name('edit member');
    Route::post('/daftarmemberumkm/update/{id_member}','MemberController@update')->name('update member');
    Route::get('/daftarmemberumkm/delete/{id_member}','MemberController@delete')->name('delete member');
//role admin -> daftar admin
    Route::get('/daftaradmin','AdminController@index')->name('daftar admin');
    Route::post('/createadmin', 'AdminController@createadmin')->name('create admin');
    Route::get('/daftaradmin','AdminController@index')->name('daftar admin');
    Route::get('/daftaradmin/delete/{id_admin}','AdminController@delete')->name('delete admin');
//berita admin
    Route::get('/berita','BeritaController@index')->name('berita');
    Route::get('/berita/delete/{brt}','BeritaController@delete')->name('delete berita');
    Route::post('/createberita','BeritaController@createberita')->name('create berita');
//galeri admin
    Route::get('/galeri','GaleriController@index')->name('galeri');
//usaha admin
    //Route::post('/createusaha', 'UmkmController@create');
    Route::get('/umkm','UmkmController@index')->name('usaha');
    Route::get('/umkm/delete/{ush}','UmkmController@delete')->name('delete usaha');
//Informasi
    Route::get('/informasi','InformasiController@index')->name('informasi ');
   //});
    




    



