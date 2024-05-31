<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Demande;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Models\ActeAcademique;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Auth::user();
        $notifications = $admin->unreadNotifications;

        $all_demandes=Demande::all()->count();
        $d_tr = Demande::where('statut',"Traitée")->count();
        $d_ct = Demande::where('statut',"En Cours de Traitement")->count();
        $d_ea = Demande::where('statut',"En Attente")->count();
        $d_rj = Demande::where('statut',"Rejetée")->count();
        $all_actes = ActeAcademique::all()->count();
        $all_adm = User::all()->count();
        $all_etu = Etudiant::all()->count();
        $all_users = $all_adm + $all_etu;

        return view('admin.layouts.index', compact('notifications',
        'all_demandes',
        'd_tr',
        'd_ct',
        'd_ea',
        'd_rj',
        'all_actes',
        'all_adm',
        'all_etu',
        'all_users'));
    }

    public function showprofil()
    {
        $admin = Auth::user();
        $notifications = $admin->unreadNotifications;

        return view('admin.layouts.profil', compact('notifications'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteUser(User $userToDelete)
    {
        $this->authorize('delete', $userToDelete);
    }
}
