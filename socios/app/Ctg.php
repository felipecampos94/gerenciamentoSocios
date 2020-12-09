<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ctg extends Model
{
    protected $table = "ctgs";
    protected $fillable = ['nome', 'cnpj', 'endereco', 'telefone', 'email', 'cidade_id'];

    public function cidade(){
        return $this->belongsTo("App\Cidade");
    }
}
