<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquete extends Model
{
    use HasFactory;

    protected $table = 'enquetes_generales';

    protected $fillable = [
        'location',
        'country', // Ajouté pour correspondre à la migration
        'firstname',
        'lastname',
        'phone',
        'email',
        'position',
        'service_quality',
        'service_feedback', // Ajusté pour correspondre à la migration
        'reforms',
        'citizen_involvement', // Ajusté pour correspondre à la migration
        'additional_comments', // Ajusté pour correspondre à la migration
    ];
}
