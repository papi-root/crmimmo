<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Tiers; 

class Bien extends Model
{
    use HasFactory;

    protected $fillable = ['tiers_id', 'image', 'adresse', 'localisation', 'quartier', 'commune']; 

    public function tiers()
    {
        return $this->belongsTo(Tiers::class); 
    }
}
