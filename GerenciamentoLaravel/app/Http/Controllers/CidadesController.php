<?php

namespace App\Http\Controllers;

use App\Cidade;
use Illuminate\Http\Request;

class CidadesController extends Controller
{
    //
    public function index(){
        $cidades = Cidade::All();
        return view('cidades.index', ['cidades' =>$cidades]);
    }

    public function create(){
        return view('cidades.create');
    }

    public function store(Request $request){
        $nova_cidade = $request->all();
        Cidade::create($nova_cidade);

        return redirect('cidades');
    }
}
