<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquete extends Model
{
    use HasFactory;

    // Indiquez le nom de la table si ce n'est pas le pluriel de votre modèle
    protected $table = 'enquetes_generales';

    // Indiquez les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'location',
        'country', 
        'firstname',
        'lastname',
        'phone',
        'email',
        'position',
        'service_quality',
        'serviceFeedback',
        'reforms',
        'citizenInvolvement',
        'additionalComments',
    ];
}
