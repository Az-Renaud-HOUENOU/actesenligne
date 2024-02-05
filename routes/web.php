<?php

use App\Http\Controllers\ActeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Etudiant\SuvieController;
use App\Http\Controllers\Etudiant\TrackController;
use App\Http\Controllers\Etudiant\ProfilController;
use App\Http\Controllers\Etudiant\ReleveController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\Etudiant\VerificationController;

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

Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::delete('/etudiant/logout', [App\Http\Controllers\Etudiant\LoginController::class, 'doLogout'])->name('etudiant.logout');
Route::post('/etudiant/login', [App\Http\Controllers\Etudiant\LoginController::class, 'doLoginetu'])->name('etudiant.login');
Route::post('/etudiant/profil', [StudentDashboardController::class, 'profil'])->name('etudiant.profil');

Route::get('admin/utilisateurs', [App\Http\Controllers\Admin\ListeUtilisateurController::class, 'index'])->name('utilisateurs');
Route::get('admin/demandes', [App\Http\Controllers\Admin\DemandeController::class, 'index'])->name('demandes');
Route::get('admin/demande/{id}', [App\Http\Controllers\Admin\DemandeController::class, 'show'])->name('demande.details');
Route::get('admin/demande/{id}valider', [App\Http\Controllers\Admin\DemandeController::class, 'validateDemande'])->name('demande.validate');
Route::get('admin/demande/{id}/rejeter', [App\Http\Controllers\Admin\DemandeController::class, 'rejectDemande'])->name('demande.reject');
Route::get('admin/demande/traitees', [App\Http\Controllers\Admin\DemandeController::class, 'getDemandesTraitees'])->name('demandes.traitees');
Route::get('admin/demande/rejetees', [App\Http\Controllers\Admin\DemandeController::class, 'getDemandesRejetees'])->name('demandes.rejetees');
Route::get('admin/profil', [App\Http\Controllers\Admin\DashboardController::class, 'showprofil'])->name('admin.profil');

Route::middleware(['check.etudiant.auth'])->prefix('student')->name('student.')->group(function(){
    Route::get('dashboard', [StudentDashboardController::class, 'index']);
    Route::resource('demande',ReleveController::class);
    Route::resource('suivie',SuvieController::class);
 });

 Route::resource('actes', ActeController::class);