<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Acquisition;
use App\Bien; 

class Espace extends Model
{
    use HasFactory;

    protected $fillable = ['bien_id', 'type', 'numero', 'prix']; 

    public function acquisition()
    {
        return $this->hasMany(Acquision::class); 
    }
    public function bien()
    {
        return $this->belongsTo(Bien::class); 
    }
}
