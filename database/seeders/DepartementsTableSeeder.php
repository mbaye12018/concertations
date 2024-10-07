<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartementsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('departements')->insert([
            // Région Dakar (ID: 1)
            ['nom' => 'Dakar', 'region_id' => 1],
            ['nom' => 'Pikine', 'region_id' => 1],
            ['nom' => 'Rufisque', 'region_id' => 1],
            ['nom' => 'Guédiawaye', 'region_id' => 1],
            ['nom' => 'Keur Massar', 'region_id' => 1],

            // Région Diourbel (ID: 2)
            ['nom' => 'Bambey', 'region_id' => 2],
            ['nom' => 'Diourbel', 'region_id' => 2],
            ['nom' => 'Mbacké', 'region_id' => 2],

            // Région Fatick (ID: 3)
            ['nom' => 'Fatick', 'region_id' => 3],
            ['nom' => 'Foundiougne', 'region_id' => 3],
            ['nom' => 'Gossas', 'region_id' => 3],

            // Région Kaffrine (ID: 4)
            ['nom' => 'Kaffrine', 'region_id' => 4],
            ['nom' => 'Birkelane', 'region_id' => 4],
            ['nom' => 'Koungheul', 'region_id' => 4],
            ['nom' => 'Malem-Hodar', 'region_id' => 4],

            // Région Kaolack (ID: 5)
            ['nom' => 'Kaolack', 'region_id' => 5],
            ['nom' => 'Nioro du Rip', 'region_id' => 5],
            ['nom' => 'Guinguinéo', 'region_id' => 5],

            // Région Kédougou (ID: 6)
            ['nom' => 'Kédougou', 'region_id' => 6],
            ['nom' => 'Salemata', 'region_id' => 6],
            ['nom' => 'Saraya', 'region_id' => 6],

            // Région Kolda (ID: 7)
            ['nom' => 'Kolda', 'region_id' => 7],
            ['nom' => 'Vélingara', 'region_id' => 7],
            ['nom' => 'Médina Yoro Foulah', 'region_id' => 7],

            // Région Louga (ID: 8)
            ['nom' => 'Kébémer', 'region_id' => 8],
            ['nom' => 'Linguère', 'region_id' => 8],
            ['nom' => 'Louga', 'region_id' => 8],

            // Région Matam (ID: 9)
            ['nom' => 'Kanel', 'region_id' => 9],
            ['nom' => 'Matam', 'region_id' => 9],
            ['nom' => 'Ranérou', 'region_id' => 9],

            // Région Saint-Louis (ID: 10)
            ['nom' => 'Dagana', 'region_id' => 10],
            ['nom' => 'Podor', 'region_id' => 10],
            ['nom' => 'Saint-Louis', 'region_id' => 10],

            // Région Sédhiou (ID: 11)
            ['nom' => 'Sédhiou', 'region_id' => 11],
            ['nom' => 'Bounkiling', 'region_id' => 11],
            ['nom' => 'Goudomp', 'region_id' => 11],

            // Région Tambacounda (ID: 12)
            ['nom' => 'Bakel', 'region_id' => 12],
            ['nom' => 'Tambacounda', 'region_id' => 12],
            ['nom' => 'Goudiry', 'region_id' => 12],
            ['nom' => 'Koumpentoum', 'region_id' => 12],

            // Région Thiès (ID: 13)
            ['nom' => 'Mbour', 'region_id' => 13],
            ['nom' => 'Thiès', 'region_id' => 13],
            ['nom' => 'Tivaouane', 'region_id' => 13],

            // Région Ziguinchor (ID: 14)
            ['nom' => 'Bignona', 'region_id' => 14],
            ['nom' => 'Oussouye', 'region_id' => 14],
            ['nom' => 'Ziguinchor', 'region_id' => 14],
        ]);
    }
}
