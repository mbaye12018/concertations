<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soumission extends Model
{
    use HasFactory;

    protected $table = 'soumissions'; // Nom correct de la table

    protected $primaryKey = 'id_soumission'; // Assurer l'utilisation de la bonne clé

    public $timestamps = false; // Car `date_soumission` est géré manuellement

    protected $fillable = [
        'tranche_age',
        'sexe',
        'lieu_residence',
        'region_id',
        'departement_id',
        'pays_diaspora',
        'date_soumission'
    ];
}
