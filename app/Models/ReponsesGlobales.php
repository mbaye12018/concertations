<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReponsesGlobales extends Model
{
    use HasFactory;

    protected $table = 'reponses_globales';

    protected $primaryKey = 'id_soumission'; // 📌 Définit la clé primaire

    public $incrementing = false; // 📌 Désactive l'auto-incrémentation (car `id_soumission` est un identifiant spécifique)

    protected $fillable = ['id_soumission', 'contenu_json', 'derniere_mise_a_jour'];

    protected $casts = [
        'contenu_json' => 'array',
    ];

    public $timestamps = false; // Désactive created_at et updated_at
}
