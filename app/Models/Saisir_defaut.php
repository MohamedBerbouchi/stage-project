<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Utilisateur;
use  App\Models\Type_defaut;

class Saisir_defaut extends Model
{
    use HasFactory;
     protected $fillable = ["operatrice", "of", "N_programme", "id_defaut", "id_utilisateur","quantite"];
    protected $table = "saisir_defaut";
    
    public function Utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, "id_utilisateur");
    }
    
    public function type_defaut()
    {
        return $this->belongsTo(Type_defaut::class, "id_defaut");
    }
}
