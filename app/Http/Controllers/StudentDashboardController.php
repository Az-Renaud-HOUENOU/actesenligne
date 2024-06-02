<?php

namespace App\Http\Controllers;

use App\Models\ActeAcademique;
use Illuminate\Support\Facades\Auth;


class StudentDashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('check.etudiant.auth');
    }

    public function index () {
        $actes=ActeAcademique::all();
        
        $notifications = collect(session('etudiant_notifications', []))->map(function ($notification) {
            return [
                'type_acte_demande' => $notification->demande->acteAcademique->type_acte,
                'heure_demande' => $notification->heure_demande->format('h:i a'),
            ];
        })->toArray(); 
          
        return view('student.dashboard', compact('actes','notifications'));
    }

    public function profil () {
        $notifications = collect(session('etudiant_notifications', []))->map(function ($notification) {
            return [
                'type_acte_demande' => $notification->demande->acteAcademique->type_acte,
                'heure_demande' => $notification->heure_demande->format('h:i a'),
            ];
        })->toArray(); 
        $etudiant=Auth::guard('etudiant')->user();

        return view('student.profil', compact('etudiant','notifications'));
    }

}
