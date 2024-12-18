<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComposanteRequest; // Ajout de l'import pour la classe de demande de validation
use App\Http\Requests\UpdateComposanteRequest;

use Illuminate\Http\Request;
use App\Models\Composante;
use Barryvdh\Debugbar\Facade as DebugBar;


class ComposanteController extends Controller
{
    public function index()
    {
        $composante = Composante::all();
        return view('', compact('composante'));
    }

    public function create()
    {
        return view('');
    }

    public function store(StoreComposanteRequest $request) // Utilisation de la classe de demande de validation
    {

        $composante = Composante::create([
            'name' => $request->input('name'),
            
        ]);

        $composante->save();

        return redirect()->route('')->with('success', 'Épreuve créée avec succès!');
    }

    public function show(string $id)
    {
        $composante = Composante::findOrFail($id);
        return view('', ['composante' => Composante::findOrFail($id)]);
    }

    public function edit(string $id)
    {
        $composante = Composante::findOrFail($id);
        return view('', compact('composante'));
    }

    public function update(StoreComposanteRequest $request, $id) // Utilisation de la classe de demande de validation
    {
        $composante = Composante::findOrFail($id);

        $composante->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('')->with('success', 'Épreuve mise à jour avec succès!');
    }

    public function destroy(string $id)
    {
        $composante = Composante::findOrFail($id);
        $composante->delete();

        return redirect()->route('menu_Composantes')->with('success', 'Épreuve supprimée avec succès!');
    }
}
