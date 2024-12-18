<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Composante;


class ComposanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nomsComposantes = ['SEN', 'LSH', 'STAPS', 'EiSINe', 'SESG', 'Médecine', 'Pharma', 'Odonto', 'DSP', 'CdC', 'ESIReims', 'IUT RCC', 'IUT Troyes', 'Institut G.Chappaz', 'Inspé', 'Siège'];

     

        // Insérer les données dans la table epreuve
        foreach ($nomsComposantes as $nom) {
            Composante::create([
                'name' => $nom,
            ]);
        }
    }
}
