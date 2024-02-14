<?php

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
Route::get('/etudiant/profil', [StudentDashboardController::class, 'profil'])->name('etudiant.profil');

Route::middleware(['check.admin.super'])->prefix('admin')->group(function(){
    Route::get('utilisateurs', [App\Http\Controllers\Admin\ListeUtilisateurController::class, 'index'])->name('utilisateur.index');
    Route::post('utilisateurs/admin', [App\Http\Controllers\Admin\ListeUtilisateurController::class, 'store_admin'])->name('utilisateur.storeadmin');
    Route::post('utilisateurs/etudiant', [App\Http\Controllers\Admin\ListeUtilisateurController::class, 'store_etudiant'])->name('utilisateur.storeetudiant');
    Route::get('utilisateurs/create-admin', [App\Http\Controllers\Admin\ListeUtilisateurController::class, 'create_admin'])->name('utilisateur.addadmin');
    Route::get('utilisateurs/create-etudiant', [App\Http\Controllers\Admin\ListeUtilisateurController::class, 'create_etudiant'])->name('utilisateur.addetudiant');
    Route::get('utilisateurs/{utilisateur}', [App\Http\Controllers\Admin\ListeUtilisateurController::class, 'show'])->name('utilisateur.show');
    Route::put('utilisateurs/{admin}', [App\Http\Controllers\Admin\ListeUtilisateurController::class, 'update_admin'])->name('utilisateur.upadmin');
    Route::put('utilisateurs/{etudiant}', [App\Http\Controllers\Admin\ListeUtilisateurController::class, 'update_etudiant'])->name('utilisateur.upetudiant');
    Route::delete('utilisateurs/{admin}', [App\Http\Controllers\Admin\ListeUtilisateurController::class, 'destroy_admin'])->name('utilisateur.supadmin');
    Route::delete('utilisateurs/{etudiant}', [App\Http\Controllers\Admin\ListeUtilisateurController::class, 'destroy_etudiant'])->name('utilisateur.supetudiant');
    Route::get('utilisateurs/{admin}/edit', [App\Http\Controllers\Admin\ListeUtilisateurController::class, 'edit_admin'])->name('utilisateur.editadmin');
    Route::get('utilisateurs/{etudiant}/edit', [App\Http\Controllers\Admin\ListeUtilisateurController::class, 'edit_etudiant'])->name('utilisateur.editetudiant');
});
Route::get('admin/demandes', [App\Http\Controllers\Admin\DemandeController::class, 'index'])->name('demandes');
Route::get('admin/demande/{id}/recapitulatif', [App\Http\Controllers\Admin\DemandeController::class, 'show'])->name('demande.details');
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

Route::get('actes', [App\Http\Controllers\ActeController::class, 'index'])->name('actes.index');
Route::post('actes', [App\Http\Controllers\ActeController::class, 'store'])->name('actes.store');
Route::get('actes/create', [App\Http\Controllers\ActeController::class, 'create'])->name('actes.create');
Route::get('actes/{acte}', [App\Http\Controllers\ActeController::class, 'show'])->name('actes.show');
Route::put('actes/{acte}', [App\Http\Controllers\ActeController::class, 'update'])->name('actes.update');
Route::delete('actes/{acte}', [App\Http\Controllers\ActeController::class, 'destroy'])->name('actes.destroy');
Route::get('actes/{acte}/edit', [App\Http\Controllers\ActeController::class, 'edit'])->name('actes.edit');
