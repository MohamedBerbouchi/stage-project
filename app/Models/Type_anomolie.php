<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Reclamation_client;

class Type_anomolie extends Model
{
    use HasFactory;
    protected $table = "type_anomalie";
    protected $guarded = [];

   
    public function reclamations(): HasMany
    {
        return $this->hasMany(Reclamation_client::class);
    }
}
