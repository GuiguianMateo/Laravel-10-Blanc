<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SousMenuController;
use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('index');
}); */

//Route::get('/', [AccueilController::class, 'index'])->name('accueil');

Route::resource('/', Controller::class);

Route::resource('menu', MenuController::class);
Route::resource('sousmenu', SousMenuController::class);
Route::resource('page', PageController::class);



