<?php

namespace App\Http\Controllers;

use App\Dependente;
use App\Http\Requests\DependenteRequest;
use Illuminate\Http\Request;


class DependentesController extends Controller
{
    public function index(Request $filtro) {
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null)
            $dependentes = Dependente::orderBy('nome')->paginate(10);
        else
            $dependentes = Dependente::where('nome', 'ilike', '%'.$filtragem.'%')->orderBy("nome")->paginate(20);
        return view('dependentes.index', ['dependentes'=>$dependentes, 'filtro'=>$filtro->get('desc_filtro')]);
    }

    public function create()
    {
        return view('dependentes.create');
    }

    public function store(DependenteRequest $request)
    {
        $nova_dependente = $request->all();
        Dependente::create($nova_dependente);

        return redirect()->route('dependentes');
    }

    public function destroy($id)
    {
        try {
            Dependente::find($id)->delete();
            $ret = array('status' => 200, 'msg' => "null");

        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }

    public function edit(Request $request)
    {
        $dependente = Dependente::find(\Crypt::decrypt($request->get('id')));
        return view('dependentes.edit', compact('dependente'));
    }

    public function update(DependenteRequest $request, $id)
    {
        Dependente::find($id)->update($request->all());
        return redirect()->route('dependentes');
    }
}
