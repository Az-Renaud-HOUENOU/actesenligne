<?php

namespace App\Http\Controllers\Admin;

use App\Models\Demande;
use Illuminate\Http\Request;
use App\Models\ReponseDemande;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReponseDemandeMail;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

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
            'fichier_acte' => $request->file('acte_traite')->store('reponses', 'public')
        ]);

        $reponse->save();

        $demande = Demande::find($demande);

        $data = [
            'etudiant_mail' => $demande->etudiant->email ?? null,
            'nom' => $demande->etudiant->nom,
            'prenoms' => $demande->etudiant->prenom,
            'actedemande' => $demande->acteAcademique->type_acte,
            'codedemande' => $demande->code,
            'chemin_fichier_complet' => public_path('storage/'.$reponse->fichier_acte)
        ];

        Mail::to($data['etudiant_mail'])->send(new ReponseDemandeMail($data));

        $client = new Client([
            'base_uri' => "https://ppr4pl.api.infobip.com/",
            'headers' => [
                'Authorization' => "App 090a4ef9cb3100d5253f5883b6c239ce-cd51ed61-03f0-462e-ae05-3a6b335367b6",
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]
        ]);

        $client->request(
            'POST',
            'sms/2/text/advanced',
            [
                RequestOptions::JSON => [
                    'messages' => [
                        [
                            'from' => 'IFRI-UAC',
                            'destinations' => [
                                ['to' => "'.$request->numero.'"]
                            ],
                            'text' => 'Votre demande de '.$demande->acteAcademique->type_acte.' à IFRI-UAC enregistreé sous le code de demande '. $demande->code. 'a été déjà traitée. Consultez votre boite mail pour télécharger votre acte demandé.',
                        ]
                    ]
                ],
            ]
        );

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
