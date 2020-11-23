<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parcela;
use App\Http\Requests\ParcelaRequest;

class ParcelasController extends Controller
{
    public function index()
    {
        $parcelas = Parcela::orderBy('dataVencimento')->paginate(5);
        return view('parcelas.index', ['parcelas' => $parcelas]);
    }

    public function create()
    {
        return view('parcelas.create');
    }

    public function store(ParcelaRequest $request)
    {
        $nova_parcela = $request->all();
        Parcela::create($nova_parcela);

        return redirect()->route('parcelas');
    }

    public function destroy($id)
    {
        Parcela::find($id)->delete();
        return redirect()->route('parcelas');
    }

    public function edit($id)
    {
        $parcela = Parcela::find($id);
        return view('parcelas.edit', compact('parcela'));
    }

    public function update(ParcelaRequest $request, $id)
    {
        Parcela::find($id)->update($request->all());
        return redirect()->route('parcelas');
    }
}
