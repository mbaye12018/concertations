<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Digitale extends Model
{
    use HasFactory;

    protected $table = 'digitale';

    protected $fillable = [
        'utilisation_services_digitaux', 'services_frequents', 'accessibilite_services',
        'problemes_rencontres', 'suggestions_amelioration'
    ];

    protected $casts = [
        'services_frequents' => 'array',
        'problemes_rencontres' => 'array',
    ];
}
