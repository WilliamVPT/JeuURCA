<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Epreuve;

class EpreuveSeeder extends Seeder
{
    public function run()
    {
        // Liste des noms d'épreuves
        $nomsEpreuves = ['Handball', 'SUMO', 'Badminton', 'Basket', 'Relais Crossfit', 'Relais Marathon', 'Relais Bloc Escalade', 'Palets Bretons', 'Touch Rugby', 'Volley', 'Laser Run', 'Futsal'];

     

        // Insérer les données dans la table epreuve
        foreach ($nomsEpreuves as $nom) {
            Epreuve::create([
                'name' => $nom,
            ]);
        }
    }
}
