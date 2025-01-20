<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corruption extends Model
{
    use HasFactory;

    protected $table = 'corruption';

    protected $fillable = [
        'perception_corruption', 'niveau_gravite', 'types_corruption', 'suggestions_transparence'
    ];

    protected $casts = [
        'types_corruption' => 'array',
    ];
}
