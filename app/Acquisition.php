<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Tier; 
use App\Espace; 

class Acquisition extends Model
{
    use HasFactory;

    protected $fillable = ['tiers_id', 'espace_id', 'date', 'type', 'etat']; 

    public function tiers()
    {
        return $this->belongsTo(Tier::class); 
    }

    public function espace()
    {
        return $this->belongsTo(Espace::class); 
    }
    
}
