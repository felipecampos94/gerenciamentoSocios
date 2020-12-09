<?php

namespace App\Http\Controllers;

use App\Forma;
use App\Http\Requests\FormaRequest;
use Illuminate\Http\Request;

class FormasController extends Controller
{
    public function index(Request $filtro) {
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null)
            $formas = Forma::orderBy('nome')->paginate(10);
        else
            $formas = Forma::where('nome', 'ilike', '%'.$filtragem.'%')->orderBy("nome")->paginate(20);
        return view('formas.index', ['formas'=>$formas, 'filtro'=>$filtro->get('desc_filtro')]);
    }

    public function create()
    {
        return view('formas.create');
    }

    public function store(FormaRequest $request)
    {
        $nova_forma = $request->all();
        Forma::create($nova_forma);

        return redirect()->route('formas');
    }

    public function destroy($id)
    {
        try {
            Forma::find($id)->delete();
            $ret = array('status' => 200, 'msg' => "null");

        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }

    public function edit($id)
    {
        $forma = Forma::find($id);
        return view('formas.edit', compact('forma'));
    }

    public function update(FormaRequest $request, $id)
    {
        Forma::find($id)->update($request->all());
        return redirect()->route('formas');
    }
}
