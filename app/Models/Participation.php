<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Participation extends Model
{
    use HasFactory;
    protected $table = 'participation';
    protected $fillable = [
        'id_soumission',
        'information_reformes',
        'satisfaction_participation',
        'facilite_numerique',
        'impact_reel',
        'suggestions_inclusion',
        'date_insertion',
    ];
}