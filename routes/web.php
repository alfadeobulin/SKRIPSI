<?php

use Illuminate\Support\Facades\Route;


//role admin
    Route::get('/home','HomeController@index');
    Route::get('/kecamatan','KecamatanController@index');
    Route::get('/kabupaten','KabupatenController@index');
    Route::post('/createmember', 'UmkmController@createmember');
    Route::get('/daftarmemberumkm','UmkmController@index');
    Route::get('/member/{id}/edit','UmkmController@editmember');
    Route::post('/member/{id}/update','UmkmController@updatemember');
    
    
//berita
Route::get('/berita','BeritaController@index');


//galeri
Route::get('/galeri','GaleriController@index');


