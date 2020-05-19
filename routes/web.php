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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
  Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});
/* uitleg bovenstaande code ^
1) omdat we de prefix hebben van 'admin', is het niet meer nodig om /admin voor /users te zetten
1) omdat we de namespace hebben van 'Admin' is het niet meer nodig om Admin te zetten voor \Userscontroller
1) met de optie ->name('admin.') wordt er in elke admin route die nog geplaatst gaat worden binnen bovenstaande groep
1) in plaats van users.index, users.create etc. nu admin.users.index of admin.users.create aangemaakt.
! # ^ Om alle routes in te zien gebruik je het commando "php artisan route:list" # !
! # ^ let op hoofdletters of kleine letters # !

2) /admin/users is de URL die gebruikt wordt om de user index te bereiken.
3) Admin\UsersController is de controller die gebruikt wordt.
4) met de except parameter wordt aangegevn dat de functies 'show', 'create' en 'store' niet geburikt worden (disabled)
*/
