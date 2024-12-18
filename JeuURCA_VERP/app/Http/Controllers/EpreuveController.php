<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEpreuveRequest; // Ajout de l'import pour la classe de demande de validation
use App\Http\Requests\UpdateEpreuveRequest;

use Illuminate\Http\Request;
use App\Models\Epreuve;
use Barryvdh\Debugbar\Facade as DebugBar;


class EpreuveController extends Controller
{
    public function index()
    {
        $epreuve = Epreuve::all();
        return view('epreuves.menu_epreuves', compact('epreuve'));
    }

    public function create()
    {
        return view('epreuves.epreuve_create');
    }

    public function store(StoreEpreuveRequest $request) // Utilisation de la classe de demande de validation
    {

        $epreuve = Epreuve::create([
            'name' => $request->input('name'),
            
        ]);

        $epreuve->save();

        return redirect()->route('menu_epreuves')->with('success', 'Épreuve créée avec succès!');
    }

    public function show(string $id)
    {
        $epreuve = Epreuve::findOrFail($id);
        return view('epreuves.classement_epreuve', ['epreuve' => Epreuve::findOrFail($id)]);
    }

    public function edit(string $id)
    {
        $epreuve = Epreuve::findOrFail($id);
        return view('epreuves.edit_epreuve', compact('epreuve'));
    }

    public function update(StoreEpreuveRequest $request, $id) // Utilisation de la classe de demande de validation
    {
        $epreuve = Epreuve::findOrFail($id);

        $epreuve->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('menu_epreuves')->with('success', 'Épreuve mise à jour avec succès!');
    }

    public function destroy(string $id)
    {
        $epreuve = Epreuve::findOrFail($id);
        $epreuve->delete();

        return redirect()->route('menu_epreuves')->with('success', 'Épreuve supprimée avec succès!');
    }
}
