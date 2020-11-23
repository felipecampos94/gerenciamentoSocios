<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormaRequest;
use Illuminate\Http\Request;
use App\Forma;

class FormasController extends Controller
{
    public function index()
    {
        $formas = Forma::orderBy('nome')->paginate(5);
        return view('formas.index', ['formas' => $formas]);
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
        Forma::find($id)->delete();
        return redirect()->route('formas');
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
