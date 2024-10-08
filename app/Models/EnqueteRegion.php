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
