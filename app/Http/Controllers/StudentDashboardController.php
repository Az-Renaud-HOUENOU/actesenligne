<?php

namespace App\Http\Controllers;

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
        return view('student.dashboard');
    }

    public function profil () {
        $etudiant=Auth::guard('etudiant')->user();
        return view('student.profil', compact('etudiant'));
    }

}
