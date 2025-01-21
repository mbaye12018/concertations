<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamations extends Model
{
    use HasFactory;

    protected $table = 'reclamations'; // ✅ Assure que le nom de la table est correct

    protected $fillable = [
        'id_soumission',
        'deja_deposee',
        'service_concerne',
        'mode_reclamation',
        'processus_clair',
        'delai_traitement',
        'commentaires_reclamation',
    ];

    protected $casts = [
        'service_concerne' => 'array', // ✅ Assurer que c'est traité comme JSON
    ];
}
