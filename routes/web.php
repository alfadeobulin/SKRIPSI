<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//DashBoard

//Login & Logout
//  Route::get('/login','AuthController@login');
//  Route::post('/postlogin','AuthController@postlogin');
 

Auth::routes();

    //All role (guest user)
    //halaman utama
    Route::get('/','HomeController@home');
    Route::get('/dashboard','DashboardController@index');
    //Informasi
    Route::get('/informasi', 'InformasiController@index');
    //daftar member
    Route::get('/daftarmemberumkm', 'MemberController@index');
    //galeri semua
    Route::get('/galeri', 'GaleriController@index');
    Route::get('/lihatgaleri', 'GaleriController@LihatGaleri');
    //umkm terdaftar
    Route::get('/umkm', 'UmkmController@index');
    Route::get('/lihatumkm', 'UmkmController@LihatUmkm');
    Route::get('/lihatgaleriumkm/{id_galeri}', 'UmkmController@LihatUmkmGaleri');
    //maps
    Route::get('/lihatmaps', 'UmkmController@LihatMaps');
    Route::get('/titik/json', 'UmkmController@titik');
    //berita
    Route::get('/lihatberita', 'BeritaController@LihatBerita');
    Route::get('/berita/{id_berita}', 'BeritaController@IsiBerita');

    

Route::group(['middleware' => ['auth','checkRole:admin,member,superadmin']], function () {
    // profile member
    Route::get('/profilemember/profile/{id_users}', 'MemberController@profile');
    //profil admin & member login
    Route::get('/user/profile/{id}', 'ProfileController@show');
    
    //logout
    Route::get('/logout','AuthController@logout');
    //role lihat wilayah
    Route::get('/kecamatan', 'KecamatanController@index');
    Route::get('/kelurahan', 'KelurahanController@index');
    Route::get('/sebaranumkm', 'UmkmController@Sebaran');
    //reset password
    Route::get('/gantipassword', 'ResetPasswordController@index');
    Route::post('/gantipassword', 'ResetPasswordController@store')->name('ganti.password');


    
});

Route::group(['middleware' => ['auth','checkRole:superadmin']], function () {
      //daftar admin
    Route::get('/daftaradmin', 'AdminController@index');
      //create admin
    Route::post('/createadmin', 'AdminController@createadmin');
    Route::get('/daftaradmin/delete/{id_users}', 'AdminController@delete');
});

Route::group(['middleware' => ['auth','checkRole:admin,superadmin']], function () {
    //create member
    Route::post('/createmember', 'MemberController@createmember');
    //create berita 
    Route::get('/berita/delete/{brt}', 'BeritaController@delete');
    Route::post('/createberita', 'BeritaController@createberita');
    Route::get('/berita', 'BeritaController@index');
    //delete usaha
    Route::get('/umkm/delete/{ush}', 'UmkmController@delete');
    //delete member
    Route::get('/daftarmemberumkm/delete/{id_users}', 'MemberController@delete');
    //create kecamatan
    Route::post('/createkecamatan', 'KecamatanController@createkecamatan');
    Route::get('/kecamatan/delete/{id_kec}', 'KecamatanController@delete');
     //create kelurahan
     Route::post('/createkelurahan', 'KelurahanController@createkelurahan');
     Route::get('/kelurahan/delete/{id_kel}', 'KelurahanController@delete');
     //profile
     Route::get('/profileadmin/profile/{id_users}', 'AdminController@profile');
     //export pdf & xls
    Route::get('/member/exportexcel','MemberController@exportExcel');
    Route::get('/member/exportpdf','MemberController@exportPdf');
    Route::get('/umkm/exportexcel','UmkmController@exportExcel');
    Route::get('/umkm/exportpdf','UmkmController@exportPdf');
    });

Route::group(['middleware' => ['auth','checkRole:member']], function () {
    //create usaha
    Route::get('/usaha/create', 'UmkmController@create');
    Route::post('/usaha/store', 'UmkmController@store');
    //create galeri
    Route::get('/galeri/delete/{glr}', 'GaleriController@delete');
    Route::get('/galeriku','GaleriController@galeriku');
    Route::post('/creategaleri', 'GaleriController@creategaleri');
    Route::get('/galeri/edit/{id_galeri}', 'GaleriController@editgaleri');
    Route::post('/galeri/update/{id_galeri}', 'GaleriController@update');
    //edit member
    Route::get('/daftarmemberumkm/edit/{id_users}', 'MemberController@editmember');
    Route::post('/daftarmemberumkm/update/{id_users}', 'MemberController@update');
    //edit usaha
    Route::get('/umkm/edit/{id_usaha}', 'UmkmController@editusaha');
    Route::post('/umkm/update/{id_usaha}', 'UmkmController@update');
    
    
});