<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassementRequest; // Ajout de l'import pour la classe de demande de validation
use App\Http\Requests\UpdateClassementRequest;

use Illuminate\Http\Request;
use App\Models\Epreuve;

use App\Models\Classement;
class ClassementController extends Controller
{
    public function index()
    {
        $classement = Classement::all();
            return view('', compact('classement'));
        }

        public function create(Request $request, $id_epreuve)
        {
            $epreuve = Epreuve::find($id_epreuve);

            return view('epreuves.classement_create', compact('epreuve'));
        }

        public function store(StoreClassementRequest $request, $id) // Utilisation de la classe de demande de validation
        {
            $epreuve = Epreuve::findOrFail($id);

            $classement = Classement::create([
                'epreuve_id' => $epreuve->id,
                'medaille' => $request->input('medaille'),
                'equipe' => $request->input('equipe'),
                'points' => $request->input('points'),


            ]);

            $epreuve->classement()->save($classement);

            return redirect()->route('classement_epreuve', $epreuve->id)->with('success', 'Épreuve créée avec succès!');
        }

        public function show(string $id)
        {
            $classement = Classement::findOrFail($id);
            return view('', ['classement' => Classement::findOrFail($id)]);
        }

        public function edit(Request $request, $id_epreuve)
        {
            // Vous pouvez également récupérer les détails de l'équipe si nécessaire
            $epreuve = Epreuve::find($id_epreuve);

            // Passez l'ID de l'équipe à la vue du formulaire
            return view('epreuves.classemnt_update', compact('epreuve'));
        }

        public function update(UpdateClassementRequest $request, $epreuveId) // Utilisation de la classe de demande de validation
        {
            $classement = Classement::findOrFail($epreuveId);

            $classement->update([
                'medaille' => $request->input('medaille'),
                'equipe' => $request->input('equipe'),
                'points' => $request->input('points'),        
            
            ]);

            $epreuve = $classement->epreuve;


            return redirect()->route('classement_epreuve', $epreuve->id)->with('success', 'Épreuve mise à jour avec succès!');
        }

        public function destroy(string $id)
        {
            $classement = Classement::findOrFail($id);
            $classement->delete();

            return redirect()->route('classement_epreuve')->with('success', 'Épreuve supprimée avec succès!');
        }

        
    }
