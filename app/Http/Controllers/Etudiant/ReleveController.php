<?php

namespace App\Http\Controllers\Etudiant;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use App\Models\Paiement;
use App\Models\DocumentsDemande;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemandeVerificationEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\DemandeNotifcation;
use App\Notifications\DemandeApprouveeNotification;
use App\Helpers\CodeHelpers;
use App\Models\User;

class ReleveController extends Controller
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

    /**
     * Display a listing of the resource.
     */
    public function index($demande, $nomacte)
    {
        $etudiant=Auth::guard('etudiant')->user();
        $notifications = collect(session('etudiant_notifications', []));

        return view('student.Demande.demande', compact('etudiant','demande','notifications', 'nomacte'));
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
        $request->validate([
            'nom' => 'required|string|min:3',
            'prenom' => 'required|string|min:3',
            'matricule' => 'required|numeric',
            'option' => 'required|string|min:3',
            'email' => 'required|email',
            'numero' => 'required|string|max:255',
            'annee_academique' => 'required|string',
            'fichepre_valid' => 'mimes:pdf|max:2048',
            'acte_nais' => 'required|mimes:pdf|max:2048',
            'cip' => 'required|mimes:pdf|max:2048',
            'fiche_prederniere' => 'mimes:pdf|max:2048',
            'releve_sem1' => 'mimes:pdf|max:2048',
            'releve_sem2' => 'mimes:pdf|max:2048',
            'releve_sem3' => 'mimes:pdf|max:2048',
            'releve_sem4' => 'mimes:pdf|max:2048',
            'releve_sem5' => 'mimes:pdf|max:2048',
            'releve_sem6' => 'mimes:pdf|max:2048',
            'quit_memo' => 'mimes:pdf|max:2048',
            'copie_attes' => 'mimes:pdf|max:2048',
            'copie_dipl' => 'mimes:pdf|max:2048',
            'demande_diro' => 'mimes:pdf|max:2048',
            'copie_act' => 'mimes:pdf|max:2048',
            'cert_perte' => 'mimes:pdf|max:2048',
            'pay_num' => 'required|numeric',
            'montant_paye' => 'required|numeric',
            'preuve' => 'required|mimes:pdf',
        ]);
        
        $otp = CodeHelpers::generateOTP();

        $paiement = Paiement::create([
            'pay_num' => $request->pay_num,
            'preuve' => $request->hasFile('preuve') ?  $request->file('preuve')->store('documents', 'public') : null,
            'montant_paye' => $request->montant_paye,
        ]);

        $document = DocumentsDemande::create([
            'acte_nais' => $request->hasFile('acte_nais') ?  $request->file('acte_nais')->store('documents', 'public') : null,
            'cip' => $request->hasFile('cip') ?  $request->file('cip')->store('documents', 'public') : null,
            'fichepre_valid' => $request->hasFile('fichepre_valid') ?  $request->file('fichepre_valid')->store('documents', 'public') : null,
            'fiche_prederniere' => $request->hasFile('fiche_prederniere') ?  $request->file('fiche_prederniere')->store('documents', 'public') : null,
            'releve_sem1' => $request->hasFile('releve_sem1') ?  $request->file('releve_sem1')->store('documents', 'public') : null,
            'releve_sem2' => $request->hasFile('releve_sem2') ?  $request->file('releve_sem2')->store('documents', 'public') : null,
            'releve_sem3' => $request->hasFile('releve_sem3') ?  $request->file('releve_sem3')->store('documents', 'public') : null,
            'releve_sem4' => $request->hasFile('releve_sem4') ?  $request->file('releve_sem4')->store('documents', 'public') : null,
            'releve_sem5' => $request->hasFile('releve_sem5') ?  $request->file('releve_sem5')->store('documents', 'public') : null,
            'releve_sem6' => $request->hasFile('releve_sem6') ?  $request->file('releve_sem6')->store('documents', 'public') : null,
            'quit_memo' => $request->hasFile('quit_memo') ?  $request->file('quit_memo')->store('documents', 'public') : null,
            'copie_attes' => $request->hasFile('copie_attes') ?  $request->file('copie_attes')->store('documents', 'public') : null,
            'copie_dipl' => $request->hasFile('copie_dipl') ?  $request->file('copie_dipl')->store('documents', 'public') : null,
            'copie_act' => $request->hasFile('copie_act') ?  $request->file('copie_act')->store('documents', 'public') : null,
            'demande_diro' => $request->hasFile('demande_diro') ?  $request->file('demande_diro')->store('documents', 'public') : null,
            'cert_perte' => $request->hasFile('cert_perte') ?  $request->file('cert_perte')->store('documents', 'public') : null,
        ]);

        $demande = Demande::create([
            'code' => $otp,
            'annee' => $request->input('annee_academique'),
            'etudiant_id' => Auth::guard('etudiant')->user()->id,
            'acte_id' => $request->acte_id,
            'paiement_id' => $paiement->id,
            'documents_id' => $document->id,
        ]);

        $demande->save();

        $acte_demande=$demande->acteAcademique->type_acte;
        $code_demande = $demande->code;

        $data=[
            'codedemande' => $code_demande,
            'actedemande' => $acte_demande
        ];

        $email = $request->email ?? null;

        Mail::to($email)->send(new DemandeVerificationEmail($data));

        session()->flash('success', "Demande soumise avec succès! Le code de votre demande est: $code_demande");

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
                            'text' => 'Votre demande de '.$acte_demande.' à IFRI-UAC a été enregistrée sous le code de demande '. $demande['code'],
                        ]
                    ]
                ],
            ]
        );

        // Envoi d'une notification à l'utilisateur pour la nouvelle demande
        $etudiantRelation = $demande->etudiant(); // Obtenez la relation BelongsTo
        $etudiant = $etudiantRelation->first();

        if ($etudiant) {
            // Envoyez la notification à l'étudiant
            $etudiant->notify(new DemandeNotifcation($demande));
        } else {
            // Gérez le cas où l'étudiant n'existe pas
        }

        // Récupérer les notifications de l'utilisateur depuis la session
        $notifications = collect(session('etudiant_notifications', []));

        // Ajouter la nouvelle notification à la collection
        $notifications->push(new DemandeNotifcation($demande));

        // Mettre à jour la session avec les nouvelles notifications
        session(['etudiant_notifications' => $notifications->toArray()]);

        $administrateurs = User::all();

        // Envoyer la notification à chaque administrateur
        foreach ($administrateurs as $administrateur) {
            $administrateur->notify(new DemandeApprouveeNotification($demande));
        }

        return redirect()->route('student.');
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


     /**
     * verificaton the specified resource.
     */


         /**
     * Mise à jour de la route de validation
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
