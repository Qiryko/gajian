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

Route::get('/getDataJson', 'AdminController@getDataJson')->name('getDataJson');

Route::get('/getDataJson1', 'RiwayatController@getDataJson1')->name('getDataJson1');
Route::get('/riwayat', 'RiwayatController@index')->name('riwayat');

Route::get('/dashboard','AdminController@dashboard')->name('dashboard');
Route::get('/dashboard/create','AdminController@create')->name('dashboard/create');
Route::post('/dashboard/input','AdminController@input')->name('dashboard/input');
Route::get('/dashboard/edit/{id}','AdminController@edit')->name('dashboard/edit');
Route::post('/dashboard/update/','AdminController@update')->name('dashboard/update');

Route::get('/pendidikan','PendidikanController@index')->name('pendidikan');
Route::post('/pendidikan/create','PendidikanController@create')->name('pendidikan/create');
Route::get('/pendidikan/edit/{id}','PendidikanController@edit')->name('pendidikan/edit');
Route::post('/pendidikan/update','PendidikanController@update')->name('pendidikan/update');
Route::get('/pendidikan/destroy/{id}','PendidikanController@destroy')->name('pendidikan/destroy');

Route::get('/jabatan','JabatanController@index')->name('jabatan');
Route::post('/jabatan/create','JabatanController@create')->name('jabatan/create');
Route::get('/jabatan/edit/{id}','JabatanController@edit')->name('jabatan/edit');
Route::post('/jabatan/update','JabatanController@update')->name('jabatan/update');
Route::get('/jabatan/destroy/{id}','JabatanController@destroy')->name('jabatan/destroy');

Route::get('/pengalaman','PengalamanController@index')->name('pengalaman');
Route::post('/pengalaman/create','PengalamanController@create')->name('pengalaman/create');
Route::get('/pengalaman/edit/{id}','PengalamanController@edit')->name('pengalaman/edit');
Route::post('/pengalaman/update','PengalamanController@update')->name('pengalaman/update');
Route::get('/pengalaman/destroy/{id}','PengalamanController@destroy')->name('pengalaman/destroy');

Route::get('/masa','MasaController@index')->name('masa');
Route::post('/masa/create','MasaController@create')->name('masa/create');
Route::get('/masa/edit/{id}','MasaController@edit')->name('masa/edit');
Route::post('/masa/update','MasaController@update')->name('masa/update');
Route::get('/masa/destroy/{id}','MasaController@destroy')->name('masa/destroy');

Route::get('/kelompok','KelompokController@index')->name('kelompok');
Route::post('/kelompok/create','KelompokController@create')->name('kelompok/create');
Route::get('/kelompok/edit/{id}','KelompokController@edit')->name('kelompok/edit');
Route::post('/kelompok/update','KelompokController@update')->name('kelompok/update');
Route::get('/kelompok/destroy/{id}','KelompokController@destroy')->name('kelompok/destroy');

Route::get('/bobot','BobotController@index')->name('bobot');
Route::post('/bobot/create','BobotController@create')->name('bobot/create');
Route::get('/bobot/edit/{id}','BobotController@edit')->name('bobot/edit');
Route::post('/bobot/update','BobotController@update')->name('bobot/update');


Route::get('/pegawai','PegawaiController@index')->name('pegawai');
Route::post('/pegawai/create','PegawaiController@create')->name('pegawai/create');
Route::get('/pegawai/edit/{id}','PegawaiController@edit')->name('pegawai/edit');
Route::post('/pegawai/update','PegawaiController@update')->name('pegawai/update');
Route::get('/pegawai/destroy/{id}','PegawaiController@destroy')->name('pegawai/destroy');

Route::get('/pkwt','PkwtController@index')->name('pkwt');
Route::post('/pkwt/create','PkwtController@create')->name('pkwt/create');
Route::get('/pkwt/edit/{id}','PkwtController@edit')->name('pkwt/edit');
Route::post('/pkwt/update','PkwtController@update')->name('pkwt/update');
Route::get('/pkwt/destroy/{id}','PkwtController@destroy')->name('pkwt/destroy');

Route::get('/tunjangan','LainController@index')->name('tunjangan');
Route::post('/tunjangan/create','LainController@create')->name('tunjangan/create');
Route::get('/tunjangan/edit/{id}','LainController@edit')->name('tunjangan/edit');
Route::post('/tunjangan/update','LainController@update')->name('tunjangan/update');
Route::get('/tunjangan/destroy/{id}','LainController@destroy')->name('tunjangan/destroy');

Route::get('/gaji','GajiController@index')->name('gaji');
Route::post('/gaji/simpan','GajiController@simpan')->name('gaji/simpan');