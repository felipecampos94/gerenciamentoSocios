<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    //
    protected $table = "socios";
    protected $fillable = ['nome', 'email', 'dataNascimento', 'endereco', 'cidade_id', 'telefone', 'valor', 'ativo'];

    public function cidade()
    {
        return $this->belongsTo("App\Cidade");
    }


    public function dependentes()
    {
        return $this->hasMany("App\Dependente");
    }

    public function parcelas()
    {
        return $this->hasMany("App\Parcela");
    }
}
