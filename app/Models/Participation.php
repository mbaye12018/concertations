<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;

    protected $table = 'participation';

    protected $fillable = [
        'informe_reformes', 'satisfaction_participation',
        'facilite_participation_numerique', 'impact_participation',
        'suggestions_inclusion'
    ];
}
