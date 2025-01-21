<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corruption extends Model
{
    use HasFactory;

    protected $table = 'corruption';
    protected $primaryKey = 'id_corruption'; // Définition de la clé primaire

    public $timestamps = false; // 🚨 Désactive `created_at` et `updated_at` si absents dans la migration

    protected $fillable = [
        'id_soumission',  // ✅ Ajouté pour éviter l'erreur !
        'corruption_existante',
        'niveau_gravite',
        'types_corruption',
        'autres_corruption',
        'suggestions_integrite',
    ];

    protected $casts = [
        'types_corruption' => 'array',
    ];
}
