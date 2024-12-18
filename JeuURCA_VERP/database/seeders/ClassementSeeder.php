<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classement; // Assurez-vous de mettre le bon chemin vers votre modèle

class ClassementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     for($i = 1; $i<13; $i++){   
        Classement::create([
            'epreuve_id' => $i,
            'points' => 0,
            'medaille' => 0,
            'equipe' => 'équipe 1',
        ]);

        Classement::create([
            'epreuve_id' => $i,
            'points' => 0,
            'medaille' => 0,
            'equipe' => 'équipe 2',
        ]);

        Classement::create([
            'epreuve_id' => $i,
            'points' => 0,
            'medaille' => 0,
            'equipe' => 'équipe 3',
        ]);}
    }
}
