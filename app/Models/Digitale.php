<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Digitale extends Model
{
    use HasFactory;

    protected $table = 'digitale';

    protected $fillable = [
        'id_soumission',
        'utilise_services_digitaux',
        'services_digitaux_frequents',
        'autres_services_digitaux', // ✅ Ajout ici
        'evaluation_accessibilite',
        'rencontree_problemes',
        'types_problemes',
        'autres_problemes',
        'suggestions_digitale',
    ];

    protected $casts = [
        'services_digitaux_frequents' => 'array',
        'types_problemes' => 'array',
    ];
}
