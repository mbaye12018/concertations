<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnqueteGenerale extends Model
{
    use HasFactory;

    // Spécifiez le nom de la table
    protected $table = 'enquetes_generales';

    // Attributs qui peuvent être remplis
    protected $fillable = [
        'location',
        'country',
        'firstname',
        'lastname',
        'phone',
        'email',
        'position',
        'service_quality',
        'service_feedback',
        'reforms',
        'citizen_involvement',
        'additional_comments',
    ];
}
