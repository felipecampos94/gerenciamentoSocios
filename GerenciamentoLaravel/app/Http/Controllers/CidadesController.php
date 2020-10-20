<?php

namespace App\Http\Controllers;

use App\Cidade;
use Illuminate\Http\Request;

class CidadesController extends Controller
{
    //
    public function index(){
        $cidades = Cidade::all();
        return view('cidades.index', ['cidades' =>$cidades]);
    }

    public function create(){
        return view('cidades.create');
    }
}
