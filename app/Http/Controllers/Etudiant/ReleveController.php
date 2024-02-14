<?php

namespace App\Http\Controllers\Etudiant;

use App\Models\Demande;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Notifications\DemandeNotifcation;
use Illuminate\Notifications\Notification;
use App\Http\Requests\Etudiant\DemandeRequest;
use App\Notifications\DemandeApprouveeNotification;

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
    public function index(Request $request)
    {
        $etudiant=Auth::guard('etudiant')->user();
        $typeActe = $request->input('typeActe');
        $champsDemande = $this->getChampsDemandeSelonTypeActe($typeActe); // À implémenter
        return view('student.Demande.demande', compact('etudiant', 'champsDemande'));
    }

    private function getChampsDemandeSelonTypeActe($typeActe)
    {
        // À implémenter : Retourne les champs du formulaire selon le type d'acte
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
    public function store(DemandeRequest $request)
    {
        $validatedData = $request->validated();
        dd($validatedData);
        $demande = new Demande();
        $demande->nom = $request->input('nom');
        $demande->prenom = $request->input('prenom');
        $demande->matricule = $request->input('matricule');
        $demande->option = $request->input('option');
        $demande->annee = $request->input('annee-academique');
        /*$demande->fichepre_valid = $request->input('fichepre_valid');
        $demande->acte_nais = $request->input('acte_nais');
        $demande->cip = $request->input('cip');
        $demande->fiche_prederniere = $request->input('fiche_prederniere');
        $demande->releve_sem1 = $request->input('releve_sem1');
        $demande->releve_sem2 = $request->input('releve_sem2');
        $demande->releve_sem3 = $request->input('releve_sem3');
        $demande->releve_sem4 = $request->input('releve_sem4');
        $demande->releve_sem5 = $request->input('releve_sem5');
        $demande->releve_sem6 = $request->input('releve_sem6');
        $demande->quit_memo = $request->input('quit_memo');
        $demande->copie_attes = $request->input('copie_attes');
        $demande->copie_dipl = $request->input('copie_dipl');
        $demande->copie_act = $request->input('copie_act');
        $demande->demande_diro = $request->input('demande_diro');*/
        $demande->pay_num = $request->input('pay_num');
    
        if ($request->hasFile('preuve')) {
            $preuve = $request->file('preuve');
            $filename = time().'_'.$preuve->getClientOriginalName();
            $preuve->move(public_path('Demande/Photos/'), $filename);
            $demande->preuve = $filename;
        }
    
        if ($request->hasFile('acte_nais')) {
            $acte_nais = $request->file('acte_nais');
            $filename = time().'_'.$acte_nais->getClientOriginalName();
            $acte_nais->move(public_path('Demande/Photos/'), $filename);
            $demande->acte_nais = $filename;
        }

        if ($request->hasFile('fichepre_valid')) {
            $fichepre_valid = $request->file('fichepre_valid');
            $filename = time().'_'.$fichepre_valid->getClientOriginalName();
            $fichepre_valid->move(public_path('Demande/Photos/'), $filename);
            $demande->fichepre_valid = $filename;
        }

        if ($request->hasFile('cip')) {
            $cip = $request->file('cip');
            $filename = time().'_'.$cip->getClientOriginalName();
            $cip->move(public_path('Demande/Photos/'), $filename);
            $demande->cip = $filename;
        }

        if ($request->hasFile('fiche_prederniere')) {
            $fiche_prederniere = $request->file('fiche_prederniere');
            $filename = time().'_'.$fiche_prederniere->getClientOriginalName();
            $fiche_prederniere->move(public_path('Demande/Photos/'), $filename);
            $demande->fiche_prederniere = $filename;
        }

        if ($request->hasFile('releve_sem1')) {
            $releve_sem1 = $request->file('releve_sem1');
            $filename = time().'_'.$releve_sem1->getClientOriginalName();
            $releve_sem1->move(public_path('Demande/Photos/'), $filename);
            $demande->releve_sem1 = $filename;
        }

        if ($request->hasFile('releve_sem2')) {
            $releve_sem2 = $request->file('releve_sem2');
            $filename = time().'_'.$releve_sem2->getClientOriginalName();
            $releve_sem2->move(public_path('Demande/Photos/'), $filename);
            $demande->releve_sem2 = $filename;
        }

        if ($request->hasFile('releve_sem3')) {
            $releve_sem3 = $request->file('releve_sem3');
            $filename = time().'_'.$releve_sem3->getClientOriginalName();
            $releve_sem3->move(public_path('Demande/Photos/'), $filename);
            $demande->releve_sem3 = $filename;
        }

        if ($request->hasFile('releve_sem4')) {
            $releve_sem4 = $request->file('releve_sem4');
            $filename = time().'_'.$releve_sem4->getClientOriginalName();
            $releve_sem4->move(public_path('Demande/Photos/'), $filename);
            $demande->releve_sem4 = $filename;
        }

        if ($request->hasFile('releve_sem5')) {
            $releve_sem5 = $request->file('releve_sem5');
            $filename = time().'_'.$releve_sem5->getClientOriginalName();
            $releve_sem5->move(public_path('Demande/Photos/'), $filename);
            $demande->releve_sem5 = $filename;
        }

        if ($request->hasFile('releve_sem6')) {
            $releve_sem6 = $request->file('releve_sem6');
            $filename = time().'_'.$releve_sem6->getClientOriginalName();
            $releve_sem6->move(public_path('Demande/Photos/'), $filename);
            $demande->releve_sem6 = $filename;
        }

        if ($request->hasFile('quit_memo')) {
            $quit_memo = $request->file('quit_memo');
            $filename = time().'_'.$quit_memo->getClientOriginalName();
            $quit_memo->move(public_path('Demande/Photos/'), $filename);
            $demande->quit_memo = $filename;
        }

        if ($request->hasFile('copie_attes')) {
            $copie_attes = $request->file('copie_attes');
            $filename = time().'_'.$copie_attes->getClientOriginalName();
            $copie_attes->move(public_path('Demande/Photos/'), $filename);
            $demande->copie_attes = $filename;
        }

        if ($request->hasFile('copie_dipl')) {
            $copie_dipl = $request->file('copie_dipl');
            $filename = time().'_'.$copie_dipl->getClientOriginalName();
            $copie_dipl->move(public_path('Demande/Photos/'), $filename);
            $demande->copie_dipl = $filename;
        }

        if ($request->hasFile('copie_act')) {
            $copie_act = $request->file('copie_act');
            $filename = time().'_'.$copie_act->getClientOriginalName();
            $copie_act->move(public_path('Demande/Photos/'), $filename);
            $demande->copie_act = $filename;
        }

        if ($request->hasFile('demande_diro')) {
            $demande_diro = $request->file('demande_diro');
            $filename = time().'_'.$demande_diro->getClientOriginalName();
            $demande_diro->move(public_path('Demande/Photos/'), $filename);
            $demande->demande_diro = $filename;
        }

      
        $otp = rand(100000, 999999);
        $demande->otp = $otp;
         // Envoi d'une notification à l'utilisateur pour la nouvelle demande
       //  $etudiant = $demande->etudiant();
        // $etudiant->notify(new DemandeNotifcation($demande));
         // Envoi d'une notification à l'administrateur pour l'approbation de la demande
        // $adminEmail = 'admin@example.com'; 
//Notification::route('mail', $adminEmail)->notify(new DemandeApprouveeNotification($demande));
    $demande->save();
    dd($demande);

    


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

    
    // ... Autres méthodes du contrôleur

  public function verification()
  {
    
  }

  public function track(Request $request, $demande)
  {
    $demande = Demande::findOrFail($demande);
 // Vérification de l'OTP
 if ($request->otp == $demande->otp) {
    // Récupération du statut de la demande
    $statut = $demande->statut;

    // Affichage des informations sur la demande
    return view('student.Demande.verification', [
        'demande' => $demande,
        'statut' => $statut
    ]);
} else {
    // Affichage d'un message d'erreur
    return redirect()->back()->withErrors(['otp' => 'OTP invalide']);
}

  }
    
}
