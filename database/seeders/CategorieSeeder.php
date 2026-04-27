<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategorieSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'nom'         => 'Plats de résistance',
                'description' => 'Les grands plats traditionnels sénégalais à base de riz, de poisson ou de viande.',
            ],
            [
                'nom'         => 'Entrées et soupes',
                'description' => 'Soupes chaudes et entrées légères pour commencer le repas.',
            ],
            [
                'nom'         => 'Grillades et brochettes',
                'description' => 'Viandes et poissons grillés au charbon de bois.',
            ],
            [
                'nom'         => 'Boissons traditionnelles',
                'description' => 'Jus naturels et boissons typiquement sénégalaises.',
            ],
        ];

        foreach ($categories as $categorie) {
            Categorie::create($categorie);
        }
    }
}
