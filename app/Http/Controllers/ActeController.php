<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActeAcademique;
use Illuminate\Support\Facades\Auth;

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
        $admin = Auth::user();
        $notifications = $admin->unreadNotifications;
        
        return view('admin.layouts.acteacademique.index', compact('actes','notifications'));
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
    public function update(Request $request, ActeAcademique $acte)
    {
        $acte->type_acte = $request->input('type_acte');
        $acte->description = $request->input('description');
        $acte->save();
        return redirect()->route('actes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
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
