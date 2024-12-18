<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Epreuve;
use App\Models\Poule;
use App\Models\Classement;
use Illuminate\Support\Facades\View;




use App\Http\Requests\StorePouleRequest;
use App\Http\Requests\UpdatePouleRequest;



class PouleController extends Controller
{

    public function index($epreuveId)
    {
        $epreuve = Epreuve::findOrFail($epreuveId);

        $poule = Poule::where('epreuve_id', $epreuveId)->get();

        $classement = Classement::where('epreuve_id', $epreuveId)->get();


        return view('epreuves.classement_epreuve', compact('epreuve', 'poule', 'classement'));
    }
    
    public function create(Request $request, $id_epreuve)
    {
        // Vous pouvez également récupérer les détails de l'équipe si nécessaire
        $epreuve = Epreuve::find($id_epreuve);

        // Passez l'ID de l'équipe à la vue du formulaire
        return view('epreuves.poule_create', compact('epreuve'));
    }

    public function store(StorePouleRequest $request, $epreuveId)
    {
        $epreuve = Epreuve::findOrFail($epreuveId);


        $poule = new Poule([
            'name' => $request->input('name'),
            'equipe1' => $request->input('equipe1'),
            'equipe2' => $request->input('equipe2'),
            'equipe3' => $request->input('equipe3'),
            'equipe4' => $request->input('equipe4'),
        ]);

        $epreuve->poule()->save($poule);

        return redirect()->route('classement_epreuve', $epreuve->id)->with('success', 'Poule créé avec succès!');
    }

    public function show($id)
    {
        $poule = Poule::findOrFail($id);
        return view('epreuves.classement_epreuve', compact('poule'));
    }

    public function edit($id)
    {
        $poule = Poule::findOrFail($id);
        return view('epreuves.poule_create', compact('poule'));
    }

    public function update(UpdatePouleRequest $request, $id)
    {
        $poule = Poule::findOrFail($id);

        $poule->update([
            'name' => $request->input('name'),
            'equipe1' => $request->input('equipe1'),
            'equipe2' => $request->input('equipe2'),
            'equipe3' => $request->input('equipe3'),
            'equipe4' => $request->input('equipe4'),
        ]);

        $epreuve = $poule->epreuve;


        return redirect()->route('classement_epreuve', $epreuve->id)->with('success', 'Poule créé avec succès!');
    }

    public function destroy($id)
    {
        $poule = Poule::findOrFail($id);
        $poule->delete();

        return redirect()->route('classement_epreuve')->with('success', 'Poule supprimé avec succès!');
    }
    
}
