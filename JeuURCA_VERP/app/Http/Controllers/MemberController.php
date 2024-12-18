<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;
use App\Models\Member;
use App\Models\Composante;



use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;



class MemberController extends Controller
{

    public function index($equipeId)
    {
        $equipe = Equipe::findOrFail($equipeId);

        $member = Member::where('equipe_id', $equipeId)->get();

        return view('equipes.detail_equipe', compact('equipe', 'member'));
    }
    
    public function create(Request $request, $id_equipe)
    {
        // Vous pouvez également récupérer les détails de l'équipe si nécessaire
        $equipe = Equipe::find($id_equipe);
        $composante = Composante::all();

        // Passez l'ID de l'équipe à la vue du formulaire
        return view('equipes.membre_create', compact('equipe', 'composante'));
    }

    public function store(StoreMemberRequest $request, $equipeId)
    {
        $equipe = Equipe::findOrFail($equipeId);


        $member = new Member([
            'name' => $request->input('name'),
            'prenom' => $request->input('prenom'),
            'composante' => $request->input('composante'),
            'genre' => $request->input('genre'),
            'handicap' => $request->has('handicap') ? 1 : 0,
        ]);

        $equipe->members()->save($member);

        return redirect()->route('detail_equipe', $equipe->id)->with('success', 'Membre créé avec succès!');
    }

    public function show($id)
    {
        $member = Member::findOrFail($id);
        return view('equipes.menu_equipes', compact('member'));
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('equipes.edit_member', compact('member'));
    }

    public function update(UpdateMemberRequest $request, $id)
    {
        $member = Member::findOrFail($id);

        $member->update([
            'name' => $request->input('name'),
            'prenom' => $request->input('prenom'),
            'composante' => $request->input('composante'),
            'genre' => $request->input('genre'),
            'handicap' => $request->has('handicap') ? true : false,
        ]);

        $equipe = $member->equipe;


        return redirect()->route('detail_equipe', $equipe->id)->with('success', 'Membre créé avec succès!');
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('menu_equipes')->with('success', 'Membre supprimé avec succès!');
    }
    
}
