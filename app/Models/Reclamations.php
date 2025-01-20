<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamations extends Model
{
    use HasFactory;

    protected $table = 'reclamations';

    protected $fillable = [
        'a_depose_reclamation', 'service_concerne', 'mode_reclamation',
        'clarte_processus', 'delai_traitement', 'commentaires_supplementaires'
    ];
}
