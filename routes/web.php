<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthenticationController as auth;
use App\Http\Controllers\Backend\UserController as user;
use App\Http\Controllers\Backend\RoleController as role;
use App\Http\Controllers\Backend\DashboardController as dashboard;
use App\Http\Controllers\Backend\PermissionController as permission;
use App\Http\Controllers\Backend\LandController as land;
use App\Http\Controllers\Backend\ProjectController as project;
use App\Http\Controllers\Backend\PropertyImageController as property_image;
use App\Http\Controllers\Backend\ClientController as client;
use App\Http\Controllers\Backend\EmployeeController as employee;
use App\Http\Controllers\Backend\MaterialController as material;
use App\Http\Controllers\Backend\AssetController as asset;
use App\Http\Controllers\Backend\ProjectMaterialController as pm;
use App\Http\Controllers\Backend\PaymentController as payment;
 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/register', [auth::class,'signUpForm'])->name('register');
Route::post('/register', [auth::class,'signUpStore'])->name('register.store');
Route::get('/login', [auth::class,'signInForm'])->name('login');
Route::post('/login', [auth::class,'signInCheck'])->name('login.check');
Route::get('/logout', [auth::class,'singOut'])->name('logOut');

Route::middleware(['checkauth'])->prefix('admin')->group(function(){
    Route::get('dashboard', [dashboard::class,'index'])->name('dashboard');
});
Route::middleware(['checkrole'])->prefix('admin')->group(function(){
    Route::resource('user', user::class);
    Route::resource('role', role::class);
    Route::get('permission/{role}', [permission::class, 'index'])->name('permission.list');
    Route::post('permission/{role}', [permission::class, 'save'])->name('permission.save');
    Route::resource('land', land::class);
    Route::resource('project', project::class);
    Route::resource('property', property_image::class);
    Route::resource('client', client::class);
    Route::resource('employee', employee::class);
    Route::resource('material', material::class);
    Route::resource('asset', asset::class); 
    Route::resource('pm', pm::class);
    Route::resource('payment', payment::class);
});
    
Route::get('/', function () {
    return view('welcome');
});

