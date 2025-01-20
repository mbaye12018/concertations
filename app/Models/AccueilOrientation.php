<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccueilOrientation extends Model
{
    use HasFactory;

    protected $table = 'accueil_orientation';

    protected $fillable = [
        'evaluation_accueil', 'raisons_accueil',
        'clarte_signaletique', 'orientation_correcte',
        'suggestions_accueil'
    ];
}
