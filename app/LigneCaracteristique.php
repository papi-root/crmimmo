<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCaracteristique extends Model
{
    use HasFactory;

    protected $fillable = ['espace_id', 'libelle', 'surface', 'description']; 
}
