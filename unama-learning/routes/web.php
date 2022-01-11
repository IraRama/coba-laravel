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

Route::prefix('guru')->middleware(['auth', 'guru'])->group(function(){
    Route::get('beranda', 'GuruController@beranda');
    Route::resource('kelas', 'GuruKelasController', ['as' => 'guru']);

    Route::get('kelas-materi/form', 'GuruKelasController@kelasMateriForm');
    Route::post('kelas-materi/store', 'GuruKelasController@kelasMateriStore');
    Route::get('kelas-materi/delete/{id}', 'GuruKelasController@kelasMateriDelete');
    Route::get('kelas-materi/detail/{id}', 'GuruKelasController@kelasMateriDetail');
    
    Route::get('kelas-peserta/form', 'GuruKelasController@kelasPesertaForm');
    Route::post('kelas-peserta/store', 'GuruKelasController@kelasPesertaStore');
    Route::get('kelas-peserta/delete/{id}', 'GuruKelasController@kelasPesertaDelete');

    Route::resource('materi', 'GuruMateriController', ['as' => 'guru']);
});

Route::prefix('siswa')->middleware(['auth', 'siswa'])->group(function(){
    Route::get('beranda', 'SiswaController@beranda');
    

    Route::resource('kelas', 'SiswaKelasController');
    Route::get('kelas/materi/detail/{id}', 'SiswaKelasController@detail');
    
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
