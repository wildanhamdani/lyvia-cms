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
    return Redirect::to('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*ADMIN*/
Route::resource('/admin/user', 'Admin\UserController')->middleware('auth');
Route::post('/admin/user/store', 'Admin\UserController@store')->middleware('auth');
Route::post('/admin/user/update/{id}', 'Admin\UserController@update')->middleware('auth');


Route::resource('/admin/roles', 'Admin\RolesController')->middleware('auth');
Route::post('/admin/roles/store', 'Admin\RolesController@store')->middleware('auth');
Route::post('/admin/roles/update/{id}', 'Admin\RolesController@update')->middleware('auth');

/*DATA*/
Route::resource('/data/exchange', 'Data\ExchangeController')->middleware('auth');
Route::post('/data/exchange/store', 'Data\ExchangeController@store')->middleware('auth');
Route::post('/data/exchange/update/{ExchangeID}', 'Data\ExchangeController@update')->middleware('auth');

Route::resource('/data/userexchange', 'Data\UserExchangeController')->middleware('auth');
Route::post('/data/userexchange/store', 'Data\UserExchangeController@store')->middleware('auth');
Route::post('/data/userexchange/update/{UserExchangeID}', 'Data\UserExchangeController@update')->middleware('auth');

Route::resource('/data/currencytype', 'Data\CurrencyTypeController')->middleware('auth');
Route::post('/data/currencytype/store', 'Data\CurrencyTypeController@store')->middleware('auth');
Route::post('/data/currencytype/update/{CurrencyTypeID}', 'Data\CurrencyTypeController@update')->middleware('auth');

Route::resource('/data/currency', 'Data\CurrencyController')->middleware('auth');
Route::post('/data/currency/store', 'Data\CurrencyController@store')->middleware('auth');
Route::post('/data/currency/update/{CurrencyID}', 'Data\CurrencyController@update')->middleware('auth');

Route::resource('/data/symbol', 'Data\SymbolController')->middleware('auth');
Route::post('/data/symbol/store', 'Data\SymbolController@store')->middleware('auth');
Route::post('/data/symbol/update/{SymbolID}', 'Data\SymbolController@update')->middleware('auth');

/*JOB*/
Route::resource('/job/job', 'Job\JobController')->middleware('auth');
Route::post('/job/job/store', 'Job\JobController@store')->middleware('auth');
Route::post('/job/job/update/{id}', 'Job\JobController@update')->middleware('auth');

Route::resource('/job/session', 'Job\JobSessionController')->middleware('auth');

/*TRANSACTION*/
Route::resource('/transaction/transaction', 'Transaction\TransactionController')->middleware('auth');
