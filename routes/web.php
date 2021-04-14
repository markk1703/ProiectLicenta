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

Route::group([ 'middleware' => ['guest']], function() {//TOTI (INC GUEST)
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/auth/{provider}','Auth\LoginController@redirectToProvider');//pt logare cu Facebook/Google
    Route::get('/auth/{provider}/callback','Auth\LoginController@handleProviderCallback');
});

Route::group([ 'middleware' => ['auth','verified']], function() {//USERS+ADMIN verified
    //PROFIL
Route::get('profile', 'ProfileController@index');
Route::post('profile/update/avatar', 'ProfileController@updateAvatar');//update avatar
Route::post('profile/update/info', 'ProfileController@updateProfile');//update nume+prenume
Route::post('profile/update/username', 'ProfileController@updateUsername');//update username
Route::post('profile/update/email', 'ProfileController@updateEmail');//update mail
Route::post('profile/update/password', 'ProfileController@updatePassword');//update parola
    //ORAS
Route::get('get-city-list','JudetOrasController@getLocalitati');//lista orase din judet
    //ADRESA
Route::resource('adresa','AdreseController');//update adresa
    //RETETE
Route::get('retete/create','RetetaController@create')->name('retete.create');//create
Route::post('retete','RetetaController@store')->name('retete.store');//store
Route::get('retete/{id}/edit','RetetaController@edit')->name('retete.edit');//edit
Route::post('retete/{id}','RetetaController@update')->name('retete.update');//update
Route::delete('retete/{id}','RetetaController@destroy')->name('retete.destroy');//destroy
    //IMAGINI
Route::post('images/store','ImagesController@store')->name('images.store');//adaugare imagini
Route::post('images/{id}/edit','ImagesController@delete')->name('images.delete');;
Route::get('images/create','ImagesController@create')->name('images.create');;
Route::post('images/create','ImagesController@create')->name('images.create');;
Route::get('images/{id}/edit','ImagesController@edit')->name('images.edit');;
Route::post('images/{id}','ImagesController@update')->name('images.update');;
    //FOLLOWSHIP
Route::get('followship','FollowshipController@index')->name('followship.index');//afisare urmariri/urmaritori
Route::get('followship/search','FollowshipController@search')->name('followship.search');//search users
    //DASHBOARD
Route::get('dashboard','HomeController@dashboard')->name('home.dashboard');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');//home


    //RETETE
Route::get('retete','RetetaController@index')->name('retete.index');//afisare retete
Route::get('retete/{id}','RetetaController@show')->name('retete.show');//show reteta
Route::get('discover','RetetaController@discover')->name('retete.discover');//descopera retete
    //SEARCH
Route::get('search','SearchController@index')->name('search.index');//sectiune cautare
    //NUTRITIE
Route::match(array('get','post'),'nutritie/scan','NutritieController@scan')->name('nutritie.scan');//scanare cod de bare

Auth::routes(['verify'=>true]);