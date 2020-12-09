<?php

namespace App\Http\Controllers;

use App\Pagamento;
use App\Socio;
use App\PagamentoForma;
use Illuminate\Http\Request;

class PagamentosController extends Controller
{
    public function create()
    {
        return view('pagamentos.create');
    }

    public function store(Request $request)
    {
        $pagamento = Pagamento::create([
            'dataPagamento' => $request->get('dataPagamento'),
            'anoReferencia' => $request->get('anoReferencia'),
            'valorTotal' => $request->get('valorTotal'),
            'socio_id' => $request->get('socio_id'),
        ]);

        $formas = $request->formas;
        foreach ($formas as $d => $value) {
            PagamentoForma::create([
                'pagamento_id' => $pagamento->id,
                'forma_id' => $formas[$d]
            ]);
        }

        return redirect()->route('pagamentos');
    }

    public function index(Request $filtro) {
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null)
            $pagamentos = Pagamento::orderBy('dataPagamento')->paginate(20);
        else
            $pagamentos = Pagamento::where('dataPagamento', 'ilike', '%'.$filtragem.'%')->orderBy("dataPagamento")->paginate(20);
        return view('pagamentos.index', ['pagamentos'=>$pagamentos, 'filtro'=>$filtro->get('desc_filtro')]);
    }


    public function destroy($id)
    {
        try {
            Pagamento::find($id)->delete();
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

        $pagamento = Pagamento::find($id);
        return view('pagamentos.edit', compact('pagamento'));
    }

    public function update(Request $request, $id)
    {
        Pagamento::find($id)->update($request->all());
        return redirect()->route('pagamentos');

        $formas = $request->formas;
        foreach ($formas as $f => $value) {
            PagamentoForma::update([
                'pagamento_id' => $pagamento->id,
                'forma_id' => $formas[$f]
            ]);
        }

    }
}
