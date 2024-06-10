<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Demande;
use Illuminate\Http\Request;

class SuvieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = collect(session('etudiant_notifications', []))->map(function ($notification) {
            return [
                'type_acte_demande' => $notification->demande->acteAcademique->type_acte,
                'heure_demande' => $notification->heure_demande->format('h:i a'),
            ];
        })->toArray();
        return view('student.Suvie.suvie', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Demande::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'regex:/^[A-Za-z0-9]{4}-\d{4}$/'],
        ]);

        $otp = $request->otp;
        $demande = Demande::where('code', $otp)->first();

        if ($demande) {
            // Afficher une SweetAlert avec le statut de la demande
            session()->flash('success', "Statut de votre demande: $demande->statut");
        } else {
            // Afficher une SweetAlert indiquant que la demande n'existe pas
            session()->flash('error', "Aucune demande correspondant à ce code n'a été trouvée.");
        }
        return redirect()->route('student.suivie.index');
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
