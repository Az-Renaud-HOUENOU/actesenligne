<?php

namespace App\Models;

use App\Models\Demande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActeAcademique extends Model
{
    use HasFactory;


    protected $fillable = [
        'type_acte',
        'description'
    ];

     // Relation : Un acte peut être associé à plusieurs demandes
     public function demandes()
     {
         return $this->hasMany(Demande::class);
     }
}
