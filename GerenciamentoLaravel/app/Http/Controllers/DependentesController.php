<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dependente;
use App\Http\Requests\DependenteRequest;

class DependentesController extends Controller
{
    public function index()
    {
        $dependentes = Dependente::orderBy('nome')->paginate(5);
        return view('dependentes.index', ['dependentes' => $dependentes]);
    }

    public function create()
    {
        return view('dependentes.create');
    }

    //método que vai armazenar na base de dados um novo registro
    public function store(DependenteRequest $request)
    {
        $novo_dependente = $request->all();
        Dependente::create($novo_dependente);

        return redirect()->route('dependentes');
    }

    //método que vai excluir os registros na base de dados
    public function destroy($id)
    {
        Dependente::find($id)->delete();
        return redirect()->route('dependentes');
    }


    public function edit($id)
    {
        $dependente = Dependente::find($id);
        return view('dependentes.edit', compact('dependente'));
    }

    public function update(DependenteRequest $request, $id)
    {
        Dependente::find($id)->update($request->all());
        return redirect()->route('dependentes');
    }
}
