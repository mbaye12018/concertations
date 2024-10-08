<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquete extends Model
{
    use HasFactory;

  
    protected $table = 'enquetes_generales';

 
    protected $fillable = [
        'location',
        'country', 
        'firstname',
        'lastname',
        'phone',
        'email',
        'position',
        'service_quality',
        'serviceFeedback',
        'reforms',
        'citizenInvolvement',
        'additionalComments',
    ];
}
