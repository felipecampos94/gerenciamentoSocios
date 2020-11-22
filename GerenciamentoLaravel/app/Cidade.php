<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    //
    protected $table = "cidades";
    protected $fillable = ['nome', 'siglaEstado', 'cep'];

    public function socios()
    {
        return $this->hasMany("App\Socio");
    }

    public function dependentes()
    {
        return $this->hasMany("App\Dependente");
    }
}
