<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecteursTableSeeder extends Seeder
{
    public function run()
    {
        // Association des départements avec leur région
        $departementRegionMapping = [
            1 => 1,  // Dakar -> Région 1
            2 => 1,  // Pikine -> Région 1
            3 => 1,  // Rufisque -> Région 1
            4 => 1,  // Guédiawaye -> Région 1
            5 => 1,  // Keur Massar -> Région 1
            6 => 2,  // Bambey -> Région 2
            7 => 2,  // Diourbel -> Région 2
            8 => 2,  // Mbacké -> Région 2
            9 => 3,  // Fatick -> Région 3
            10 => 3, // Foundiougne -> Région 3
            11 => 3, // Gossas -> Région 3
            12 => 4, // Kaffrine -> Région 4
            13 => 4, // Birkelane -> Région 4
            14 => 4, // Koungheul -> Région 4
            15 => 4, // Malem-Hodar -> Région 4
            16 => 5, // Kaolack -> Région 5
            17 => 5, // Nioro du Rip -> Région 5
            18 => 5, // Guinguinéo -> Région 5
            19 => 6, // Kédougou -> Région 6
            20 => 6, // Salemata -> Région 6
            21 => 6, // Saraya -> Région 6
            22 => 7, // Kolda -> Région 7
            23 => 7, // Vélingara -> Région 7
            24 => 7, // Médina Yoro Foulah -> Région 7
            25 => 8, // Kébémer -> Région 8
            26 => 8, // Linguère -> Région 8
            27 => 8, // Louga -> Région 8
            28 => 9, // Kanel -> Région 9
            29 => 9, // Matam -> Région 9
            30 => 9, // Ranérou -> Région 9
            31 => 10,// Dagana -> Région 10
            32 => 10,// Podor -> Région 10
            33 => 10,// Saint-Louis -> Région 10
            34 => 11,// Sédhiou -> Région 11
            35 => 11,// Bounkiling -> Région 11
            36 => 11,// Goudomp -> Région 11
            37 => 12,// Bakel -> Région 12
            38 => 12,// Tambacounda -> Région 12
            39 => 12,// Goudiry -> Région 12
            40 => 12,// Koumpentoum -> Région 12
            41 => 13,// Mbour -> Région 13
            42 => 13,// Thiès -> Région 13
            43 => 13,// Tivaouane -> Région 13
            44 => 14,// Bignona -> Région 14
            45 => 14,// Oussouye -> Région 14
            46 => 14 // Ziguinchor -> Région 14
        ];

        // Boucle pour chaque département
        foreach ($departementRegionMapping as $departementId => $regionId) {
            for ($representant = 1; $representant <= 3; $representant++) { // 3 représentants par département
                DB::table('secteurs')->insert([
                    'nom_secteur' => 'Secteur ' . (($departementId - 1) * 3 + $representant), // Nom du secteur
                    'region_id' => $regionId, // ID de la région
                    'departement_id' => $departementId // ID du département
                ]);
            }
        }
    }
}
