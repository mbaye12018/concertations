<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoutService extends Model
{
    use HasFactory;

    protected $table = 'cout_service';

    protected $fillable = [
        'evaluation_cout', 'cout_justifie', 'mecanisme_paiement', 'suggestions_cout'
    ];
}
