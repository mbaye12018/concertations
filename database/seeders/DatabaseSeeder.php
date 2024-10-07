<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder; // Ajoutez cette ligne
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            // D'autres seeders si nécessaire
        ]);
    }
}
