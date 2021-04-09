<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function(){
    return redirect('login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/{sucess}', [HomeController::class, 'index'])->name('home');
Route::get('/senddoc/{id}', [HomeController::class, 'output']);
Route::post('/senddoc/touser',[HomeController::class,'change']);
Route::get('/input',[HomeController::class,'input']);
Route::get('/input/acept/{id}',[HomeController::class,'acept']);
Route::get('/historic/{id}',[HomeController::class,'historic']);
Route::post('/search',[HomeController::class,'search']);
Route::get('/searchfrom/{id}',[HomeController::class,'historic']);