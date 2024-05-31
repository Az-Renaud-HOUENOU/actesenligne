<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\ReponseController;
use App\Http\Controllers\Etudiant\TrackController;
use App\Http\Controllers\Etudiant\ProfilController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\Etudiant\NotificationController;
use App\Http\Controllers\Etudiant\VerificationController;
use App\Http\Controllers\RoleController;

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

    Route::get('statistiques', [App\Http\Controllers\Admin\StatistiqueController::class, 'index'])->name('statistique.demande');
    Route::get('exporterpdf', [App\Http\Controllers\Admin\StatistiqueController::class, 'exportPdf'])->name('exporter.statistique');
});
Route::get('admin/demandes', [App\Http\Controllers\Admin\DemandeController::class, 'index'])->name('demandes');
Route::put('admin/demande/{id}valider', [App\Http\Controllers\Admin\DemandeController::class, 'validateDemande'])->name('demande.validate');
Route::put('admin/demande/{id}/rejeter', [App\Http\Controllers\Admin\DemandeController::class, 'rejectDemande'])->name('demande.reject');
Route::get('admin/profil', [App\Http\Controllers\Admin\DashboardController::class, 'showprofil'])->name('admin.profil');
Route::post('admin/repondre/{demande}', [ReponseController::class, 'store'])->name('reponses');


Route::middleware(['check.etudiant.auth'])->prefix('student')->group(function(){
    Route::get('dashboard', [StudentDashboardController::class, 'index'])->name('student.');

    Route::get('demande/acte/{demande}/{nomacte}', [App\Http\Controllers\Etudiant\ReleveController::class, 'index'])->name('student.demande.index');
    Route::post('demande', [App\Http\Controllers\Etudiant\ReleveController::class, 'store'])->name('student.demande.store');
    Route::get('demande/create', [App\Http\Controllers\Etudiant\ReleveController::class, 'create'])->name('student.demande.create');
    Route::get('demande/{demande}', [App\Http\Controllers\Etudiant\ReleveController::class, 'show'])->name('student.demande.show');
    Route::put('demande/{demande}', [App\Http\Controllers\Etudiant\ReleveController::class, 'update'])->name('student.demande.update');
    Route::delete('demande/{demande}', [App\Http\Controllers\Etudiant\ReleveController::class, 'destroy'])->name('student.demande.destroy');
    Route::get('demande/{demande}/edit', [App\Http\Controllers\Etudiant\ReleveController::class, 'edit'])->name('student.demande.edit');

    Route::get('suivie', [App\Http\Controllers\Etudiant\SuvieController::class, 'index'])->name('student.suivie.index');
    Route::post('suivie', [App\Http\Controllers\Etudiant\SuvieController::class, 'store'])->name('student.suivie.store');
    Route::get('suivie/create', [App\Http\Controllers\Etudiant\SuvieController::class, 'create'])->name('student.suivie.create');
    Route::get('suivie/{suivie}', [App\Http\Controllers\Etudiant\SuvieController::class, 'show'])->name('student.suivie.show');
    Route::put('suivie/{suivie}', [App\Http\Controllers\Etudiant\SuvieController::class, 'update'])->name('student.suivie.update');
    Route::delete('suivie/{suivie}', [App\Http\Controllers\Etudiant\SuvieController::class, 'destroy'])->name('student.suivie.destroy');
    Route::get('suivie/{suivie}/edit', [App\Http\Controllers\Etudiant\SuvieController::class, 'edit'])->name('student.suivie.edit');

    Route::get('/notifications', [App\Http\Controllers\Etudiant\NotificationController::class, 'index'])->name('notifications.index');

 });

Route::get('actes', [App\Http\Controllers\ActeController::class, 'index'])->name('actes.index');
Route::post('actes', [App\Http\Controllers\ActeController::class, 'store'])->name('actes.store');
Route::get('actes/create', [App\Http\Controllers\ActeController::class, 'create'])->name('actes.create');
Route::get('actes/{acte}', [App\Http\Controllers\ActeController::class, 'show'])->name('actes.show');
Route::put('actes/{acte}', [App\Http\Controllers\ActeController::class, 'update'])->name('actes.update');
Route::delete('actes/{acte}', [App\Http\Controllers\ActeController::class, 'destroy'])->name('actes.destroy');
Route::get('actes/{acte}/edit', [App\Http\Controllers\ActeController::class, 'edit'])->name('actes.edit');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
