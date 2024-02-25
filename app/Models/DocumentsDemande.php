<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentsDemande extends Model
{
    use HasFactory;

    protected $fillable = [
        'acte_nais',
        'fichepre_valid',
        'cip',
        'fiche_prederniere',
        'releve_sem1',
        'releve_sem2',
        'releve_sem3',
        'releve_sem4',
        'releve_sem5',
        'releve_sem6',
        'quit_memo',
        'copie_attes',
        'copie_dipl',
        'copie_act',
        'demande_diro',
        'cert_perte',
    ];
}
