<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;


    protected $fillable = [
            "nom",
            "prenom",
            "matricule",
            "option",
            "dnais",
            "lnais",
            "email",
            "numero",
            "dpts",
            "acte_nais",
            "fiche_preins",
            "origin_act",
            "copie_act",
            "pay_num",
            "preuve",
            "status",
    ];

    public function getStatusAttribute()
    {
        return $this->status;
    }

    public function setStatusAttribute($status) {
        
        $this->status = $status;
        
    }

}
