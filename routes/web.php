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

    Route::get('/auth/{provider}','Auth\LoginController@redirectToProvider');//pt logare cu Facebook
    Route::get('/auth/{provider}/callback','Auth\LoginController@handleProviderCallback');
});

Route::group([ 'middleware' => ['auth']], function() {//USERS+ADMIN
    //PROFIL
Route::get('profile', 'ProfileController@index');
Route::post('profile', 'ProfileController@updateAvatar');
Route::post('profile/update', 'ProfileController@updateProfile');
Route::post('profile/password', 'ProfileController@updatePassword');
});

Route::group([ 'middleware' => ['user']], function() {//USERS
});

Route::group([ 'middleware' => ['admin']], function() {//ADMINISTRATOR
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');