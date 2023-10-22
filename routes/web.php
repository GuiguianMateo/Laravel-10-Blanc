<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(['acces'])->group(function () {
    Route::resource('menu', MenuController::class);
    Route::resource('sousmenu', SousMenuController::class);
    Route::resource('page', PageController::class);
});

Route::get('/login', function (){
    return view('/login');
});

Route::get('/register', function (){
    return view('/register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('language/{code_iso}', [LanguageController::class, 'change'])->name('language.change');

require __DIR__.'/auth.php';


