<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Reclamation_client;

class Type_defaut extends Model
{
    use HasFactory;
    protected $table = "type_defaut";
    protected $guarded = [];

     
    public function saisir_defauts(): HasMany
    {
        return $this->hasMany(Reclamation_client::class);
    }
}
