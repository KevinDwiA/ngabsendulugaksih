<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard_userController;
use App\Http\Controllers\Dashboard_adminController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//route untuk dashboard user

Route::middleware(['auth','level:2'])->group(function(){
    

Route::get('/user',[App\Http\Controllers\Dashboard_userController::class,'index'])->name('user');
Route::get('/contack',[App\Http\Controllers\Dashboard_userController::class,'contack'])->name('contack');
Route::get('/about',[App\Http\Controllers\Dashboard_userController::class,'about'])->name('about');
 
    //semua route dalam grup ini hanya bisa diakses oleh operator
});

//route untuk dashboard admin

Route::middleware(['auth', 'level:1'])->group(function () {
    
    Route::resource('/index',App\Http\Controllers\Dashboard_adminController::class);
    Route::get('/admin',[App\Http\Controllers\Dashboard_adminController::class,'index'] )->name('admin');
    Route::get('/table', [App\Http\Controllers\Dashboard_adminController::class,'table'])->name('table');
    Route::get('/create',[App\Http\Controllers\Dashboard_adminController::class,'create'])->name('create');
    Route::get('/edit',[App\Http\Controllers\Dashboard_adminController::class,'edit'])->name('edit');
 
    //semua route dalam grup ini hanya bisa diakses oleh operator
});
 
