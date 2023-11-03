<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supprimez les données existantes de la table
        DB::table('communes')->truncate();

        // Ajoutez des communes fictives
        $communes = [
            ['name' => 'Bandalungwa', 'price' => 100, 'kilometrage' => 50],
            ['name' => 'Barumbu', 'price' => 100, 'kilometrage' => 50],
            ['name' => 'Bumbu', 'price' => 100, 'kilometrage' => 50],
            ['name' => 'Gombe', 'price' => 100, 'kilometrage' => 50],
            // Ajoutez d'autres communes ici
        ];

        DB::table('communes')->insert($communes);
    }
}
