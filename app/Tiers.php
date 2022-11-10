<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Bien; 
use App\Acquisition; 

class Tiers extends Model
{
    use HasFactory;

    protected $table = 'tiers'; 

    protected $fillable = ['nom_complet', 'adresse', 'telephone', 'email', 'type_tiers']; 

    public function biens()
    {
        return $this->hasMany(Bien::class, 'tiers_id'); 
    }

    public function acquisition()
    {
        return $this->hasMany(Acquisition::class, 'tiers_id'); 
    }
}
