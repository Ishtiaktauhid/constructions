<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthenticationController as auth;
use App\Http\Controllers\Backend\UserController as user;
use App\Http\Controllers\Backend\RoleController as role;
use App\Http\Controllers\Backend\DashboardController as dashboard;
use App\Http\Controllers\Backend\PermissionController as permission;
use App\Http\Controllers\Backend\LandController as land;
use App\Http\Controllers\Backend\ProjectController as project;
use App\Http\Controllers\Backend\ClientController as client;
use App\Http\Controllers\Backend\SupplierController as supplier;
use App\Http\Controllers\Backend\EmployeeController as employee;
use App\Http\Controllers\Backend\MaterialController as material;
use App\Http\Controllers\Backend\AssetController as asset;
use App\Http\Controllers\Backend\ProjectMaterialController as pm;
use App\Http\Controllers\Backend\FloorController as floor;
use App\Http\Controllers\Backend\FlatController as flat;
use App\Http\Controllers\Backend\ProjectMaterialIssueController as pmissue;
use App\Http\Controllers\Backend\PaymentController as payment;
use App\Http\Controllers\Backend\PurchaseMaterialController as purchase;
 

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
    Route::post('permission/{role}', [permission::class, 'save'])->name('permission.save');
    Route::post('project-file/{id}', [project::class, 'storeFile'])->name('project_file.save');
    Route::get('project-file/delete', [project::class, 'destroyFile'])->name('project_file.delete');



    //from Tauhid bhai
    Route::get('/product_search', [purchase::class,'product_search'])->name('pur.product_search');
        Route::get('/product_search_data', [purchase::class,'product_search_data'])->name('pur.product_search_data');
});
Route::middleware(['checkrole'])->prefix('admin')->group(function(){
    Route::resource('user', user::class);
    Route::resource('role', role::class);
    Route::get('permission/{role}', [permission::class, 'index'])->name('permission.list');
    Route::resource('land', land::class);
    Route::resource('project', project::class);
    Route::get('project-file/{id}', [project::class, 'addFile'])->name('project_file.create');
    Route::resource('client', client::class);
    Route::resource('supplier', supplier::class);
    Route::resource('employee', employee::class);
    Route::resource('material', material::class);
    Route::resource('asset', asset::class); 
    Route::resource('pm', pm::class);
    Route::resource('floor', floor::class);
    Route::resource('pmissue', pmissue::class);
    Route::resource('payment', payment::class);
    Route::resource('flat', flat::class);
      // Route Purchases
      Route::resource('purchase', purchase::class);
});
    
Route::get('/', function () {
    return view('welcome');
});

