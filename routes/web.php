<?php

use Illuminate\Support\Facades\Route;

//DashBoard
    Route::get('/','HomeController@index');

//role admin
    Route::get('/home','HomeController@index');
    Route::get('/kecamatan','KecamatanController@index');
    Route::post('/createmember', 'AdminController@createmember');
    Route::get('/daftarmemberumkm','AdminController@index');
    Route::get('/daftarmemberumkm/edit/{id_member}','AdminController@editmember');
    Route::post('/daftarmemberumkm/update/{id_member}','AdminController@update');
    Route::get('/daftarmemberumkm/delete/{id_member}','AdminController@delete');
//role admin -> daftar admin
    Route::get('/daftaradmin','AdminlistController@index');
    Route::post('/createadmin', 'AdminlistController@createadmin');
    Route::get('/daftaradmin','AdminlistController@index');
    Route::get('/daftaradmin/delete/{id}','AdminlistController@delete');
//berita admin
    Route::get('/berita','BeritaController@index');
    Route::get('/berita/delete/{brt}','BeritaController@delete');
    Route::post('/createberita','BeritaController@createberita');
//galeri
Route::get('/galeri','GaleriController@index');


