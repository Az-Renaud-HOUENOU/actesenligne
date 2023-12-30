<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('accueil');
})->name('accueil');

Route::get('/dashboard', function () {
    return view('admin.layouts.index');
})->name('dashboard')->middleware('admin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/etudiant', [App\Http\Controllers\Etudiant\LoginController::class, 'login'])->name('etudiant.login');
