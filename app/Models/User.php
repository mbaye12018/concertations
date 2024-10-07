<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Spécifiez le nom de la table
    protected $table = 'utilisateurs'; // Changer ici le nom de la table

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',  // Ajoutez username
        'email',
        'password',
        // Ajoutez d'autres champs si nécessaire
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
  

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Si vous utilisez 'username' pour l'authentification
    public function getAuthIdentifierName()
    {
        return 'username'; // Spécifiez que le champ d'authentification est 'username'
    }
}
