<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccesServicesPublics extends Model
{
    use HasFactory;

    protected $table = 'acces_services_publics';

    protected $fillable = [
        'services_frequents', 'accessibilite', 'raisons_accessibilite',
        'suggestions', 'modes_information'
    ];

    protected $casts = [
        'services_frequents' => 'array',
        'modes_information' => 'array',
    ];
}
