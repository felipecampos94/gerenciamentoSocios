<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ctg;
use App\Http\Requests\CtgRequest;

class CtgsController extends Controller
{
    public function index(Request $filtro) {
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null)
            $ctgs = Ctg::orderBy('nome')->paginate(10);
        else
            $ctgs = Ctg::where('nome', 'ilike', '%'.$filtragem.'%')->orderBy("nome")->paginate(20);
        return view('ctgs.index', ['ctgs'=>$ctgs, 'filtro'=>$filtro->get('desc_filtro')]);
    }

    public function create()
    {
        return view('ctgs.create');
    }

    public function store(CtgRequest $request)
    {
        $nova_ctg = $request->all();
        Ctg::create($nova_ctg);

        return redirect()->route('ctgs');
    }

    public function destroy($id)
    {
        try {
            Ctg::find($id)->delete();
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
        $ctg = Ctg::find($id);
        return view('ctgs.edit', compact('ctg'));
    }

    public function update(CtgRequest $request, $id)
    {
        Ctg::find($id)->update($request->all());
        return redirect()->route('ctgs');
    }
}
