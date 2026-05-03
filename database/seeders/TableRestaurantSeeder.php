<?php

namespace Database\Seeders;

use App\Models\TableRestaurant;
use Illuminate\Database\Seeder;

class TableRestaurantSeeder extends Seeder
{
    public function run(): void
    {
        $tables = [
            ['numero' => 1, 'capacite' => 2, 'statut' => 'libre'],
            ['numero' => 2, 'capacite' => 4, 'statut' => 'libre'],
            ['numero' => 3, 'capacite' => 4, 'statut' => 'libre'],
            ['numero' => 4, 'capacite' => 6, 'statut' => 'libre'],
            ['numero' => 5, 'capacite' => 6, 'statut' => 'libre'],
            ['numero' => 6, 'capacite' => 8, 'statut' => 'libre'],
        ];

        foreach ($tables as $table) {
            TableRestaurant::create($table);
        }
    }
}