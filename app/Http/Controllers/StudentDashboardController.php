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
        return view('student.dashboard', compact('actes'));
    }

    public function profil () {
        $etudiant=Auth::guard('etudiant')->user();
        return view('student.profil', compact('etudiant'));
    }

}
