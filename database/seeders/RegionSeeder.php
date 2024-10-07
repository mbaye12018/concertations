<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    public function run()
    {
        $regions = [
            ['nom' => 'Dakar'],
            ['nom' => 'Diourbel'],
            ['nom' => 'Fatick'],
            ['nom' => 'Kaffrine'],
            ['nom' => 'Kaolack'],
            ['nom' => 'Kédougou'],
            ['nom' => 'Kolda'],
            ['nom' => 'Louga'],
            ['nom' => 'Matam'],
            ['nom' => 'Saint-Louis'],
            ['nom' => 'Sédhiou'],
            ['nom' => 'Tambacounda'],
            ['nom' => 'Thiès'],
            ['nom' => 'Ziguinchor'],
        ];

        DB::table('regions')->insert($regions);
    }
}
