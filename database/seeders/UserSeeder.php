<?php

namespace Database\Seeders; // Assurez-vous que le namespace est correct

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'mbaye.dieng',
            'password' => Hash::make('passer1234'), // Hachage du mot de passe
            'prenom' => 'Mbaye', // Ajoutez le prénom ici
            'nom' => 'Dieng',    // Ajoutez le nom ici
            'role' => 'rapporteur', // Ou tout autre rôle que vous souhaitez attribuer
        ]);
        User::create([
            'username' => 'aicha.sy',
            'password' => Hash::make('passer1234'), // Hachage du mot de passe
            'prenom' => 'Aicha', // Ajoutez le prénom ici
            'nom' => 'Sy',    // Ajoutez le nom ici
            'role' => 'admin', // Ou tout autre rôle que vous souhaitez attribuer
        ]);
    }
}
