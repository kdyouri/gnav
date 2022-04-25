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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('shuttles', 'App\Http\Controllers\ShuttleController');
Route::resource('companies', 'App\Http\Controllers\CompanyController');
Route::resource('cities', 'App\Http\Controllers\CityController');
Route::resource('vehicles', 'App\Http\Controllers\VehicleController');
Route::resource('company_vehicles', 'App\Http\Controllers\CompanyVehicleController');
Route::resource('company_shuttles', 'App\Http\Controllers\CompanyShuttleController');
Route::resource('memberships', 'App\Http\Controllers\MembershipController');

Auth::routes();
