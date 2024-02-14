<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Http\Request;

class ListeUtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants=Etudiant::all(); //latest()->get()
        $administrateurs=User::all();
        return view('admin.layouts.utilisateurs.liste-utilisateur', compact('etudiants','administrateurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_admin()
    {
        return view('admin.layouts.utilisateurs.create-admin');
    }

    public function create_etudiant()
    {
        return view('admin.layouts.utilisateurs.create-etudiant');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_etudiant(Request $request)
    {
        $etudiant=new Etudiant();
        $etudiant->matricule = $request->input('matricule_etudiant');
        $etudiant->nom = $request->input('nom_etudiant');
        $etudiant->prenom = $request->input('prenom_etudiant');
        $etudiant->option = $request->input('option_etudiant');
        $etudiant->email = $request->input('email_etudiant');
        $etudiant->contact = $request->input('telephone_etudiant');
        $etudiant->password = $request->input('password_etudiant');
        $etudiant->save();

        return redirect()->route('utilisateur.index');
    }

    public function store_admin(Request $request)
    {
        $admin=new User();
        $admin->name = $request->input('nom_admin');
        $admin->email = $request->input('email_admin');
        $admin->fonction = $request->input('fonction_admin');
        $admin->contact = $request->input('telephone_admin');
        $admin->password = $request->input('password_admin');
        $admin->save();

        return redirect()->route('utilisateur.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.layouts.utilisateurs.show-user', compact('admin', 'etudiant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_admin(string $id)
    {
        return view('admin.layouts.utilisateurs.edit-admin', compact('admin'));
    }

    public function edit_etudiant(string $id)
    {
        return view('admin.layouts.utilisateurs.edit-etudiant', compact('etudiant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_admin(Request $request, User $admin)
    {
        $admin->name = $request->input('nom_admin');
        $admin->email = $request->input('email_admin');
        $admin->fonction = $request->input('fonction_admin');
        $admin->contact = $request->input('telephone_admin');
        $admin->password = $request->input('password_admin');
        $admin->save();

        return redirect()->route('utilisateur.index');
    }

    public function update_etudiant(Request $request, Etudiant $etudiant)
    {
        $etudiant->matricule = $request->input('matricule_etudiant');
        $etudiant->nom = $request->input('nom_etudiant');
        $etudiant->prenom = $request->input('prenom_etudiant');
        $etudiant->option = $request->input('option_etudiant');
        $etudiant->email = $request->input('email_etudiant');
        $etudiant->contact = $request->input('telephone_etudiant');
        $etudiant->password = $request->input('password_etudiant');
        $etudiant->save();

        return redirect()->route('utilisateur.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy_etudiant(string $id)
    {
        $etudiant=Etudiant::find($id);
        if ($etudiant) {
            $etudiant->delete();
            return redirect()->route('utilisateur.index')->with('success', 'Etudiant supprimé avec succès.'); //back()
        } else {
            return redirect()->route('utilisateur.index')->with('error', 'L\'Etudiant n\'existe pas.');
        }
    }

    public function destroy_admin(string $id)
    {
        $admin = User::find($id);

        if ($admin) {
            $admin->delete();
            return redirect()->route('utilisateur.index')->with('success', 'Admnistrateur supprimé avec succès.'); //back()
        } else {
            return redirect()->route('utilisateur.index')->with('error', 'L\'Admnistrateur n\'existe pas.');
        }
    }
}
