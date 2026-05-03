<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. D'abord les catégories (les plats en dépendent via categorie_id)
        $this->call(CategorieSeeder::class);

        // 2. Ensuite les plats
        $this->call(PlatSeeder::class);

        // 3. Ensuite les tables de restaurant
        $this->call(TableRestaurantSeeder::class);

        // 3. Utilisateur de test (admin)
        User::factory()->create([
            'name'     => 'Admin Restaurant',
            'email'    => 'admin@restaurant.com',
            'password' => bcrypt('password'),
            'role'     => 'admin',
        ]);
    }
}
