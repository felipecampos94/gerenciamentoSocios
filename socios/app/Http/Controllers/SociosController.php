<?php

namespace App\Http\Controllers;

use App\Socio;
use App\SocioDependente;
use Illuminate\Http\Request;

class SociosController extends Controller
{
    public function create(){
        return view('socios.create');
    }

    public function store(Request $request)
    {
        $socio = Socio::create([
            'nome' => $request->get('nome'),
            'email' => $request->get('email'),
            'dataNascimento' => $request->get('dataNascimento'),
            'endereco' => $request->get('endereco'),
            'telefone' => $request->get('telefone'),
            'valor' => $request->get('valor'),
            'ativo' => $request->get('ativo'),
            'cidade_id' => $request->get('cidade_id'),
        ]);

        $dependentes = $request->dependentes;
        foreach ($dependentes as $d => $value) {
            SocioDependente::create([
                'socio_id' => $socio->id,
                'dependente_id' => $dependentes[$d]
            ]);
        }

        return redirect()->route('socios');
    }


    public function index(Request $filtro) {
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null)
            $socios = Socio::orderBy('nome')->paginate(10);
        else
            $socios = Socio::where('nome', 'ilike', '%'.$filtragem.'%')->orderBy("nome")->paginate(20);
        return view('socios.index', ['socios'=>$socios, 'filtro'=>$filtro->get('desc_filtro')]);
    }


    public function destroy($id)
    {
        try {

            Socio::find($id)->delete();
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

        $socio = Socio::find(\Crypt::decrypt($request->get('id')));
        return view('socios.edit', compact('socio'));
    }

    public function update(Request $request, $id)
    {
        Socio::find($id)->update($request->all());
        return redirect()->route('socios');

        $dependentes = $request->atores;
        foreach ($dependentes as $d => $value) {
            SocioDependente::update([
                'socio_id' => $socio->id,
                'dependente_id' => $dependentes[$d]
            ]);
        }

    }
}
