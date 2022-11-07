<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Tier; 

class Bien extends Model
{
    use HasFactory;

    protected $fillable = ['tiers_id', 'adresse', 'localisation', 'quartier', 'commune']; 

    public function tiers()
    {
        $this->belongsTo(App\Tier::class); 
    }
}
