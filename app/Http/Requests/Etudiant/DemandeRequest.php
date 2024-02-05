<?php

namespace App\Http\Requests\Etudiant;

use Illuminate\Foundation\Http\FormRequest;

class DemandeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            "nom" => ['required', 'min:3'],
            "prenom" => ['required', 'min:3'],
            "matricule" => ["required",'numeric'],
            "option" => ['required', 'min:3'],
            "email" => ["required", 'email'],
            "numero" => ["required", 'required', 'min:3'],
            "fichepre_valid" => ['required', 'extensions:pdf'],
            "acte_nais" => ['required', 'extensions:pdf'],
            "cip" => ['required', 'extensions:pdf'],
            "fiche_prederniere" => ['required', 'extensions:pdf'],
            "releve_sem1" => ['required', 'extensions:pdf'],
            "releve_sem2" => ['required', 'extensions:pdf'],
            "releve_sem3" => ['required', 'extensions:pdf'],
            "releve_sem4" => ['required', 'extensions:pdf'],
            "releve_sem5" => ['required', 'extensions:pdf'],
            "releve_sem6" => ['required', 'extensions:pdf'],
            "quit_memo" => ['required', 'extensions:pdf'],
            "copie_attes" => ['required', 'extensions:pdf'],
            "copie_dipl" => ['required', 'extensions:pdf'],
            "demande_diro" => ['required', 'extensions:pdf'],
            "copie_act" => ['required', 'extensions:pdf'],
            "pay_num" => ['required', 'numeric'],
            "preuve" => ['required', 'extensions:pdf'],
        ];
    }
}
