<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnqueteGenerale extends Model
{
    use HasFactory;

  
    protected $table = 'enquete_generales';

    
    protected $fillable = [
        'location',
        'country',
        'name',
        'contact',
        'fonction',
        'service_quality',
        'service_point',
        'accessible',
        'obstacle',
        'service_long',
        'service_efficace',
        'service_modernise',
        'service_outils',
        'reformes',
        'ameliorer_services',
        'transparence_responsabilite',
        'accessibilite_services',
        'simplification_procedures',
        'coordination_services',
        'technologies_numeriques',
        'formation_agents',
        'association_citoyens',
        'outils_participation',
        'additional_comments',



    
    ];
}
