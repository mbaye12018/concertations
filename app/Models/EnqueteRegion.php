<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnqueteRapporteur extends Model
{
    use HasFactory;

    protected $table = 'enquete_rapporteurs'; // Ajoutez cette ligne

    protected $fillable = [
       'region_id',
        'departement_id',
        'secteur_id',
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

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function secteur()
    {
        return $this->belongsTo(Secteur::class);
    }
}
