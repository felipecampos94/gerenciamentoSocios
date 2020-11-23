<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Socio;
use App\Http\Requests\SocioRequest;

class SociosController extends Controller
{
    public function index()
    {
        $socios = Socio::orderBy('nome')->paginate(5);
        return view('socios.index', ['socios' => $socios]);
    }

    public function create()
    {
        return view('socios.create');
    }

    //método que vai armazenar na base de dados um novo registro
    public function store(SocioRequest $request)
    {
        $novo_socio = $request->all();
        Socio::create($novo_socio);

        return redirect()->route('socios');
    }

    //método que vai excluir os registros na base de dados
    public function destroy($id)
    {
        Socio::find($id)->delete();
        return redirect()->route('socios');
    }


    public function edit($id)
    {
        $socio = Socio::find($id);
        return view('socios.edit', compact('socio'));
    }

    public function update(SocioRequest $request, $id)
    {
        Socio::find($id)->update($request->all());
        return redirect()->route('socios');
    }

}
