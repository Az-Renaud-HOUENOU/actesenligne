<?php

namespace App\Http\Controllers\Admin;

use App\Models\Demande;
use Illuminate\Http\Request;
use App\Models\ReponseDemande;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReponseDemandeMail;
use Illuminate\Support\Facades\Storage;

class ReponseController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:demande-reponse', ['only' => ['index','store']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store($demande,Request $request)
    {

        $request->validate([
            'acte_traite' => 'required|file|mimes:pdf|max:5000', // Le fichier doit être un PDF et ne pas dépasser 5 Mo
        ]);

        $reponse = ReponseDemande::create([
            'demande_id' => $demande,
            'fichier_acte' => $request->file('acte_traite')->store('reponses', 'public'),
        ]);

        $reponse->save();

        // Récupérer les détails de l'étudiant et de la demande
        $etudiant = $reponse->demande->etudiant;
        $demande = $reponse->demande->acteAcademique;
        $chemin_fichier_complet = storage_path('{{asset("/storage/reponses/")}}' . $reponse['fichier_acte']);

        // Envoyer l'e-mail à l'étudiant
        Mail::to($etudiant->email)->send(new ReponseDemandeMail($etudiant, $demande, $chemin_fichier_complet));

        $demande=Demande::find($demande);
        $demande->statut='Traitée';
        $demande->save();

        return redirect()->route('demandes')->with('success', 'La réponse a été envoyée avec succès.');
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
    public function destroy(string $id)
    {
        //
    }
}
