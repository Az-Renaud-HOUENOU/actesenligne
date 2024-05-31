<?php

namespace App\Models;

use App\Models\Etudiant;
use App\Models\Paiement;
use App\Models\ActeAcademique;
use App\Models\ReponseDemande;
use App\Models\DocumentsDemande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'annee',
        'etudiant_id',
        'acte_id',
        'documents_id',
        'paiement_id',
        'statut',
    ];

    /**
     * Relation: Une demande appartient à un seul étudiant.
     */
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'etudiant_id');
    }

    /**
     * Relation: Une demande est associée à un seul acte académique.
     */
    public function acteAcademique()
    {
        return $this->belongsTo(ActeAcademique::class, 'acte_id');
    }

    /**
     * Relation: Une demande est associée à un seul paiement.
     */
    public function paiement()
    {
        return $this->belongsTo(Paiement::class, 'paiement_id');
    }

    /**
     * Relation: Une demande est associée à un seul document.
     */
    public function documentDemande()
    {
        return $this->belongsTo(DocumentsDemande::class, 'documents_id');
    }

    // Relation : une demande a une réponse
    public function reponseDemande()
    {
        return $this->hasOne(ReponseDemande::class);
    }
}
