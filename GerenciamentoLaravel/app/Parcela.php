<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    protected $table = "parcelas";
    protected $fillable = ['dataPagamento', 'anoReferencia', 'valorTotal', 'qtdParcela',
        'dataVencimento', 'valorParcela', 'situacao', 'socio_id'];

    public function socio()
    {
        return $this->belongsTo("App\Socio");
    }
}
