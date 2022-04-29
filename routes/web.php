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
use Inertia\Inertia;
//use App\Http\Controllers\UserController;

Route::get('/', function () {
    return Inertia::render('Index');
});
Route::get('/about', function () {
    return Inertia::render('About');
});

//Route::resource('/user',[UserController::class]);
Route::resource('/user',\App\Http\Controllers\UserController::class);

