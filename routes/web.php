<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::match(['GET', 'POST'], '/register', function(){
    return redirect('/login');
});

Route::get('/home', 'HomeController@index')->name('home');

//User
Route::get('/user', 'KlinikController@userIndex')->name('userIndex');
Route::get('/addUser', 'KlinikController@addUser')->name('addUser');
Route::get('/editUser/{id}', 'KlinikController@editUser')->name('editUser');
Route::post('/saveUser', 'KlinikController@saveUser')->name('saveUser');
Route::post('/updateUser/{id}', 'KlinikController@updateUser')->name('updateUser');
Route::delete('/deleteUser/{id}', 'KlinikCOntroller@deleteUser')->name('deleteUser');

//Pasien
Route::get('/pasien', 'KlinikController@pasienIndex')->name('pasienIndex');
Route::get('/addPasien', 'KlinikController@addPasien')->name('addPasien');
Route::get('/editPasien/{id}', 'KlinikController@editPasien')->name('editPasien');
Route::post('/savePasien', 'KlinikController@savePasien')->name('savePasien');
Route::post('/updatePasien/{id}', 'KlinikController@updatePasien')->name('updatePasien');
Route::delete('/deletePasien/{id}', 'KlinikCOntroller@deletePasien')->name('deletePasien');

//Rawat
Route::get('/periksaPasien', 'KlinikController@periksaPasien')->name('periksaPasien');
Route::get('/doPeriksaPasien/{id}', 'KlinikController@doPeriksaPasien')->name('doPeriksaPasien');
Route::post('/daftarPasien', 'KlinikController@daftarPasien')->name('daftarPasien');
Route::post('/periksaUpdate/{id}', 'KlinikController@periksaUpdate')->name('periksaUpdate');

//Berkas
Route::get('/dokterBerkas', 'KlinikController@dokterBerkas')->name('dokterBerkas');
Route::post('/dokterPrint', 'KlinikController@dokterPrint')->name('dokterPrint');

//ajax
Route::get('/periksa/getData/{id}', 'KlinikController@getData');
Route::post('/periksaEdit', 'KlinikController@periksaEdit')->name('periksaEdit');
