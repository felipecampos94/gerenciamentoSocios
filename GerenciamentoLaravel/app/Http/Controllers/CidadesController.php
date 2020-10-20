<?php

namespace App\Http\Controllers;

use App\Cidade;
use Illuminate\Http\Request;

class CidadesController extends Controller
{
    //
    public function index(){
        $cidades = Cidade::all();
        return view('cidades', ['cidades' =>$cidades]);
    }
}
