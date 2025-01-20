<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccesServicesPublics extends Model
{
    use HasFactory;

    protected $table = 'acces_services_publics';

    protected $primaryKey = 'id_acces';

    // ✅ Indiquer les champs remplissables
    protected $fillable = [
        'id_soumission',
        'services_frequentes',
        'accessibilite',
        'pourquoi_accessibilite',
        'suggestions_acces',
        'mode_information',
        'created_at',
        'updated_at'
    ];

    // ✅ Assurer que Laravel traite `services_frequentes` comme un tableau JSON
    protected $casts = [
        'services_frequentes' => 'array',
        'mode_information' => 'array',
    ];
}

