<?php

namespace App\Http\Controllers;

use App\Models\ActeAcademique;
use Illuminate\Http\Request;

class ActeController extends Controller
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
        $actes=ActeAcademique::latest()->get();
        return view('admin.layouts.acteacademique.index', compact('actes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.acteacademique.create-acte');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $acte=new ActeAcademique();
        $acte->type_acte = $request->input('intitule_acte');
        $acte->description = $request->input('description');
        $acte->save();
        return redirect()->route('actes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /*$acte = ActeAcademique::join('statuts', 'inscriptions.statuts_id', '=', 'statuts.id')
        ->join('formations', 'inscriptions.formations_id', '=', 'formations.id')
        ->join('categformations', 'formations.categformations_id', '=', 'categformations.id')
        ->select('inscriptions.*', 'inscriptions.created_at','statuts.libelle','formations.*','categformations.*')
        ->where('statuts.libelle','En attente')
        ->where('actes.id',$id)
        ->orderby('actes.id','esc')
        ->first();*/

        return view('admin.layouts.acteacademique.show-acte', compact('acte'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.layouts.acteacademique.edit-acte', compact('acte'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ActeAcademique $acte, string $id)
    {
        $acte->type_acte = $request->input('title');
        $acte->description = $request->input('content');
        $acte->save();
        return redirect()->route('actes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, ActeAcademique $acte)
    {
        $acte = ActeAcademique::find($id);

        if ($acte) {
            $acte->delete();
            return redirect()->route('actes.index')->with('success', 'Acte académique supprimé avec succès.'); //back()
        } else {
            return redirect()->route('actes.index')->with('error', 'L\'acte académique n\'existe pas.');
        }
    }
}
