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

Route::get('/planselect','HomeController@plan')->name('planselect');

Route::post('/subscribe','HomeController@payment');

Route::get('/premium','HomeController@pre')->middleware('check-subscription');

Route::get('/cancelsubscription','HomeController@deletesub')->name('cancel');

Route::get('/invoice','HomeController@ind')->name('invoice');

Route::get('/change','HomeController@planchange');


Route::get('/user/{id}','HomeController@download');





Route::get('/scademo', 'HomeController@sca');



Route::post('/checkout','PayController@payment');



Route::get('/payinteger','PayController@index');

Route::post('/paynow','PayController@dopay')->name('paynow');

