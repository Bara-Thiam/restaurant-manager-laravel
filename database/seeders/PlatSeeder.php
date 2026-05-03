<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plat;
use App\Models\Categorie;

class PlatSeeder extends Seeder
{
    public function run(): void
    {
        // On récupère les IDs des catégories par leur nom
        $resistance   = Categorie::where('nom', 'Plats de résistance')->first()->id;
        $entrees      = Categorie::where('nom', 'Entrées et soupes')->first()->id;
        $grillades    = Categorie::where('nom', 'Grillades et brochettes')->first()->id;
        $boissons     = Categorie::where('nom', 'Boissons traditionnelles')->first()->id;

        $plats = [
            // --- Plats de résistance ---
            [
                'nom'          => 'Thiéboudienne Rouge',
                'description'  => 'Le plat national sénégalais : riz brisé cuit dans une sauce tomate avec du poisson yeet, légumes (navet, manioc, aubergine) et bissap.',
                'prix'         => 3500.00,
                'image'        => "plats/Thiéboudienne_Rouge.jpg",
                'categorie_id' => $resistance,
            ],
            [
                'nom'          => 'Thiéboudienne Blanc',
                'description'  => 'Riz au poisson sans sauce tomate, cuit dans un bouillon de poisson parfumé avec des légumes variés.',
                'prix'         => 3000.00,
                'image'        => "plats/Thiéboudienne_Blanc.png",
                'categorie_id' => $resistance,
            ],
            [
                'nom'          => 'Yassa Poulet',
                'description'  => 'Poulet mariné dans une sauce oignon-citron et moutarde, mijoté jusqu\'à caramélisation. Servi avec du riz blanc.',
                'prix'         => 3500.00,
                'image'        => "plats/Yassa_Poulet.jpg",
                'categorie_id' => $resistance,
            ],
            [
                'nom'          => 'Mafé Bœuf',
                'description'  => 'Ragoût de bœuf mijoté dans une riche sauce à base de pâte d\'arachide avec pommes de terre et carottes. Servi avec du riz.',
                'prix'         => 4000.00,
                'image'        => "plats/Mafé_Boeuf.jpg",
                'categorie_id' => $resistance,
            ],
            [
                'nom'          => 'Thiéré Mboum',
                'description'  => 'Couscous de mil servi avec une sauce légume enrichie de viande d\'agneau et de yaourt lait caillé.',
                'prix'         => 3500.00,
                'image'        => "plats/Thiéré_Mboum.jpg",
                'categorie_id' => $resistance,
            ],
            [
                'nom'          => 'Caldou Poisson',
                'description'  => 'Soupe légère de poisson au citron et piment, typique des régions côtières. Accompagnée de riz blanc.',
                'prix'         => 3000.00,
                'image'        => "plats/Caldou.jpg",
                'categorie_id' => $resistance,
            ],

            // --- Entrées et soupes ---
            [
                'nom'          => 'Soupe Yëll',
                'description'  => 'La soupe yëll est une soupe sénégalaise traditionnelle à base de pied de veau ou de pied de mouton, souvent cuisinée avec de la viande, des légumes et un bon assaisonnement.',
                'prix'         => 1500.00,
                'image'        => "plats/Soupe.jpg",
                'categorie_id' => $entrees,
            ],
            [
                'nom'          => 'Fataya',
                'description'  => 'Beignets frits fourrés au thon épicé, oignon et persil. Entrée populaire de la street food dakaroise.',
                'prix'         => 500.00,
                'image'        => "plats/Fataya.jpg",
                'categorie_id' => $entrees,
            ],

            // --- Grillades et brochettes ---
            [
                'nom'          => 'Brochettes Agneau Dibi',
                'description'  => 'Brochettes d\'agneau grillées au charbon, marinées à la moutarde et aux épices sénégalaises. Servies avec pain et oignons.',
                'prix'         => 2500.00,
                'image'        => "plats/Brochettes.jpg",
                'categorie_id' => $grillades,
            ],
            [
                'nom'          => 'Poisson Braisé Yekh',
                'description'  => 'Poisson entier (capitaine ou daurade) braisé au charbon avec une marinade citron-piment-ail. Servi avec attieké.',
                'prix'         => 4500.00,
                'image'        => "plats/Poisson_Braisé.jpg",
                'categorie_id' => $grillades,
            ],

            // --- Boissons traditionnelles ---
            [
                'nom'          => 'Bissap (Hibiscus)',
                'description'  => 'Jus de fleurs d\'hibiscus rouge sucré, légèrement acidulé. Boisson nationale du Sénégal.',
                'prix'         => 500.00,
                'image'        => "plats/Bissap.jpg",
                'categorie_id' => $boissons,
            ],
            [
                'nom'          => 'Bouye (Pain de Singe)',
                'description'  => 'Jus de baobab crémeux et naturellement sucré. Riche en vitamine C, très apprécié au Sénégal.',
                'prix'         => 600.00,
                'image'        => "plats/Bouye.jpg",
                'categorie_id' => $boissons,
            ],
        ];

        foreach ($plats as $plat) {
            Plat::create($plat);
        }
    }
}
