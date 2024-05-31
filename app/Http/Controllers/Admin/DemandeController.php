<?php

namespace App\Http\Controllers\Admin;

use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemandeRejeterMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class DemandeController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:demande-list|demande-delete|demande-validate|demande-reject|demande-delete', ['only' => ['index','show']]);
         $this->middleware('permission:demande-validate', ['only' => ['validateDemande']]);
         $this->middleware('permission:demande-reject', ['only' => ['rejectDemande']]);
         $this->middleware('permission:demande-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandes=Demande::all();

        $admin = Auth::user();
        $notifications = $admin->unreadNotifications;
        return view('admin.layouts.demande.liste-demande', compact('demandes','notifications'));
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
        $demande=Demande::findOrFail($id);

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

    public function rejectDemande($id, Request $request){
        $request->validate([
            'motif_rejet' => 'required|string|max:500'
        ]);
        $demande=Demande::find($id);
        $demande->statut='Rejetée';
        $demande->save();

        $data = [
            'code_demande' => $demande->code,
            'nom' => $demande->etudiant->nom,
            'prenoms' => $demande->etudiant->prenom,
            'actedemande' => $demande->acteAcademique->type_acte,
            'motif_rejet' => $request->motif_rejet
        ];

        $email = $demande->etudiant->email ?? null;
        
        Mail::to($email)->send(new DemandeRejeterMail($data));

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
                            'text' => 'Votre demande de '.$demande->acteAcademique->type_acte.' à IFRI-UAC enregistreé sous le code de demande '. $demande->code. 'a été réjetée pour '.$request->motif_rejet .'.',
                        ]
                    ]
                ],
            ]
        );

        Alert::success('Succès!','La réponse à la demande a été bien envoyé à l\'étudiant');

        return redirect()->back();
    }
}
