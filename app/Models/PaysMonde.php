<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaysMonde extends Model
{
    use HasFactory;

    // Nom de la table
    protected $table = 'pays_monde';

    // Champs à remplir
    protected $fillable = ['nom', 'code'];
}
