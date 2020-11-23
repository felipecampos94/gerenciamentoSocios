<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependente extends Model
{
    protected $table = "dependentes";
    protected $fillable = ['nome', 'dataNascimento', 'endereco', 'telefone', 'cidade_id', 'socio_id'];

    public function cidade()
    {
        return $this->belongsTo("App\Cidade");
    }

    public function socio()
    {
        return $this->belongsTo("App\Socio");
    }
}
