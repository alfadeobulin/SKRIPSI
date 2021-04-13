<?php

use Illuminate\Support\Facades\Route;


//role admin
    Route::get('/home','HomeController@index');
    Route::get('/kecamatan','KecamatanController@index');
    Route::get('/kabupaten','KabupatenController@index');
    Route::post('/createmember', 'UmkmController@createmember');
    Route::get('/daftarmemberumkm','UmkmController@index');
    Route::get('/member/{mbr}/edit','UmkmController@editmember');
    Route::get('/member/{mbr}/update','UmkmController@updatemember');
    
    
//berita
Route::get('/berita','BeritaController@index');


//galeri
Route::get('/galeri','GaleriController@index');


