<?php

namespace App\Http\Controllers\Admin;

use App\Models\Demande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandes=Demande::all();
        return view('admin.layouts.demande.liste-demande', compact('demandes'));
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
        $demande=Demande::find($id);
        return view('admin.layouts.demande.details', compact('demande'));
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
    public function destroy(string $id)
    {
        //
    }

    public function validateDemande($id){
        $demande=Demande::find($id);
        $demande->statut='En cours de traitement';
        $demande->save();

        return redirect()->back();
    }

    public function rejectDemande($id){
        $demande=Demande::find($id);
        $demande->statut='Rejetée';
        $demande->save();

        return redirect()->back();
    }

    public function getDemandesTraitees(){
        $demandesTraitees=Demande::where('statut','En cours de traitement')->get();
        return view('admin.layouts.demande.liste-Traitees', compact('demandesTraitees'));
    }

    public function getDemandesRejetees(){
        $demandesRejetees=Demande::where('statut','Rejetée')->get();
        return view('admin.layouts.demande.liste-Rejetees', compact('demandesRejetees'));
    }
}
