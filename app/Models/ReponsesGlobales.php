<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReponsesGlobales extends Model
{
    use HasFactory;

    protected $table = 'reponses_globales';

    protected $fillable = ['data'];

    protected $casts = [
        'data' => 'array',
    ];
}
