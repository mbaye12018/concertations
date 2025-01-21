<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diligence extends Model
{
    use HasFactory;

    protected $table = 'diligence';
    protected $primaryKey = 'id_diligence';

    public $timestamps = true; // ✅ Activer `created_at` et `updated_at`

    protected $fillable = [
        'id_soumission',
        'procedures_longues',
        'pourquoi_longues',
        'suggestions_delai',
        'formalites_complexes',
        'pourquoi_complexes',
        'suggestions_formalites',
    ];
}
