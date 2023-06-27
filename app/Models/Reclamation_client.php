<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type_anomolie;
class Reclamation_client extends Model
{
    use HasFactory;
    protected $fillable = ["ref","id_anomalie", "commentaire","reponse","email","image"];
    protected $table = "reclamation_client";

    public function anomalie()
    {
        return $this->belongsTo(Type_anomolie::class, "id_anomalie");
    }
}
