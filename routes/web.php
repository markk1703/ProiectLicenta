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

Route::group([ 'middleware' => ['guest']], function() {//GUEST
    Route::get('/', function () {
        return view('welcome.index');
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
Route::get('followship/userAction','FollowshipController@userAction')->name('followship.userAction');//unfollow user
Route::get('followship/checkNotification','FollowshipController@checkNotification')->name('followship.checkNotification');//send notifications
Route::get('followship/reloadFollowers','FollowshipController@reloadFollowers')->name('followship.reloadFollowers');//reload followers page
Route::get('followship/reloadNotifications','FollowshipController@reloadNotifications')->name('followship.reloadNotifications');//reload notifications
Route::get('followship/markAsRead','FollowshipController@markAsRead')->name('followship.markAsRead');//mark as read
    //RATING
Route::post('/rating/{post}', 'RatingController@postStar')->name('postStar');//adaugare rating
Route::post('/rating/delete/{post}', 'RatingController@deleteStar')->name('deleteStar');//stergere rating
    //DASHBOARD
Route::get('dashboard','HomeController@dashboard')->name('home.dashboard');

});
Route::group([ 'middleware' => ['admin']], function() {//ADMIN 
    
    Route::get('admin/users','UsersController@index')->name('admin.users'); //administrare users
    Route::get('admin/users/create','UsersController@create')->name('admin.users.create');//create
    Route::post('admin/users','UsersController@store')->name('admin.users.store');//store
    Route::get('admin/users/{id}','UsersController@show')->name('admin.users.show');
    Route::get('admin/users/{id}/edit','UsersController@edit')->name('admin.users.edit');
    Route::post('admin/users/{id}','UsersController@update')->name('admin.users.update');
    Route::delete('admin/users/{id}','UsersController@destroy')->name('admin.users.destroy');//destroy

    Route::get('admin/posts','ContentController@index')->name('admin.posts'); //administrare postari
    Route::get('admin/posts/create','ContentController@create')->name('admin.posts.create');//create
    Route::post('admin/posts','ContentController@store')->name('admin.posts.store');//store
    Route::get('admin/posts/{id}','ContentController@show')->name('admin.posts.show');
    Route::get('admin/posts/{id}/edit','ContentController@edit')->name('admin.posts.edit');
    Route::post('admin/posts/{id}','ContentController@update')->name('admin.posts.update');
    Route::delete('admin/posts/{id}','ContentController@destroy')->name('admin.posts.destroy');//destroy

    Route::get('admin/ratings','AdminRatingsController@index')->name('admin.ratings'); //administrare ratings
    Route::delete('admin/ratings/{id}','AdminRatingsController@destroy')->name('admin.ratings.destroy');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');//home


    //RETETE
Route::get('retete','RetetaController@index')->name('retete.index');//afisare retete
Route::get('retete/{id}','RetetaController@show')->name('retete.show');//show reteta
Route::get('discover','RetetaController@discover')->name('retete.discover');//descopera retete
    //SEARCH
Route::get('search','SearchController@index')->name('search.index');//sectiune cautare
Route::get('search/result','SearchController@search')->name('search.search');//cautare dupa nume
Route::get('search/ingredients','SearchController@searchByIngredient')->name('search.searchByIngredient');//cautare dupa ingredient
    //NUTRITIE
Route::get('nutritie/calculator','NutritieController@index')->name('nutritie.calculator');//pagina scanare
Route::post('nutritie/calculator','NutritieController@scan')->name('nutritie.calculator');//scanare cod de bare

Auth::routes(['verify'=>true]);