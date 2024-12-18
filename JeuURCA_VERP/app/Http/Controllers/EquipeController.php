<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquipeRequest; // Ajout de l'import pour la classe de demande de validation
use App\Http\Requests\UpdateEquipeRequest;

use Illuminate\Http\Request;
use App\Models\Equipe;
use Barryvdh\Debugbar\Facade as DebugBar;


class EquipeController extends Controller
{
    public function index()
    {
        $equipe = Equipe::all();
        return view('equipes.menu_equipes', compact('equipe'));
    }

    public function create()
    {
        return view('equipes.equipe_create');
    }

    public function store(StoreEquipeRequest $request) // Utilisation de la classe de demande de validation
    {
        $logoPath = NULL;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo');
            $logoPath = $logoPath->store('logos', 'public');
        }

        $equipe = Equipe::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'logoPath' => $logoPath,
        ]);

        $equipe->save();

        return redirect()->route('menu_equipes')->with('success', 'Équipe créée avec succès!');
    }

    public function show(string $id)
    {
        $equipe = Equipe::findOrFail($id);
        return view('equipes.detail_equipe', ['equipe' => Equipe::findOrFail($id)]);
    }

    public function edit(string $id)
    {
        $equipe = Equipe::findOrFail($id);
        return view('equipes.edit_equipe', compact('equipe'));
    }

    public function update(StoreEquipeRequest $request, $id) // Utilisation de la classe de demande de validation
    {
        $equipe = Equipe::findOrFail($id);

        $logoPath = $equipe->logo;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->store('logos', 'public');
        }

        $equipe->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'logo' => $logoPath,
        ]);

        return redirect()->route('menu_equipes')->with('success', 'Équipe mise à jour avec succès!');
    }

    public function destroy(string $id)
    {
        $equipe = Equipe::findOrFail($id);
        $equipe->delete();

        return redirect()->route('menu_equipes')->with('success', 'Équipe supprimée avec succès!');
    }
}
