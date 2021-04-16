<?php

use Illuminate\Support\Facades\Route;


//role admin
    Route::get('/home','HomeController@index');
    Route::get('/kecamatan','KecamatanController@index');
    Route::get('/kabupaten','KabupatenController@index');
    Route::post('/createmember', 'UmkmController@createmember');
    Route::get('/daftarmemberumkm','UmkmController@index');
    Route::get('/daftarmemberumkm/edit/{id}','UmkmController@editmember');
    Route::post('/daftarmemberumkm/update/{id}','UmkmController@update');
    
    
//berita
Route::get('/berita','BeritaController@index');


//galeri
Route::get('/galeri','GaleriController@index');


