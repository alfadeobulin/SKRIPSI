<?php

use Illuminate\Support\Facades\Route;


//role admin
    Route::get('/home','HomeController@index');
    Route::get('/kecamatan','KecamatanController@index');
    Route::get('/kabupaten','KabupatenController@index');
    Route::post('/createmember', 'MemberController@createmember');
    Route::get('/daftarmemberumkm','MemberController@index');
    Route::get('/daftarmemberumkm/edit/{id}','MemberController@editmember');
    Route::post('/daftarmemberumkm/update/{id}','MemberController@update');
    Route::get('/daftarmemberumkm/delete/{id}','MemberController@delete');
    
    
//berita
Route::get('/berita','BeritaController@index');


//galeri
Route::get('/galeri','GaleriController@index');


