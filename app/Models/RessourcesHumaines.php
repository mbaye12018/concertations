<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RessourcesHumaines extends Model
{
    use HasFactory;

    protected $table = 'ressources_humaines';

    protected $fillable = [
        'relations_agents_usagers', 'raisons_relations'
    ];
}
