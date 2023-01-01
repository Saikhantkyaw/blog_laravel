<?php
use App\test;
use App\container;
use App\TestFacade;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\logout_controller;

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

Route::get('/',function(){
   return view('welcome');
});
Route::resource('posts', HomeController::class)->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
]);
Route::get('logout',[logout_controller::class,'logout']);

Route::get('/dashboard',[HomeController::class,'index'])->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
]);