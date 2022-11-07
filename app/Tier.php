<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Bien; 

class Tier extends Model
{
    use HasFactory;

    protected $fillable = ['nom_complet', 'adresse', 'telephone', 'email', 'type_tiers']; 

    public function biens()
    {
        return $this->hasMany(Bien::class, 'tiers_id'); 
    }
}
