<?php

namespace App\Models; // Ceci doit être la première ligne du fichier

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnqueteRapporteur extends Model
{
    use HasFactory;

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
