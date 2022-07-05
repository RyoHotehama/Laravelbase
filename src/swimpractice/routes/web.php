<?php

use App\Http\Middleware\SwimMiddleware;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'TopController@index')->name('top');
Route::get('/logout', 'TopController@logout');
Route::get('/swim', 'SwimController@index');
Route::get('/swim/practice', 'SwimController@practice');
Route::post('/swim/complete', 'SwimController@complete')->middleware(SwimMiddleware::class);
Route::get('/swim/edit', 'SwimController@edit');
Route::post('/swim/edit', 'SwimController@update')->middleware(SwimMiddleware::class);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
