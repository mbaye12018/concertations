<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diligence extends Model
{
    use HasFactory;

    protected $table = 'diligence';

    protected $fillable = [
        'pourquoi_longues', 'raisons_delais', 'suggestions_delais',
        'formalites_complexes', 'raisons_formalites', 'suggestions_formalites'
    ];
}
