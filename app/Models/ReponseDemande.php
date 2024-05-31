<?php

namespace App\Models;

use App\Models\Demande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReponseDemande extends Model
{
    use HasFactory;

    protected $fillable = [
        'demande_id',
        'fichier_acte',
    ];

    // Relation : une réponse appartient à une demande
    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
}
