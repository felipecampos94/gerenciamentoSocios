<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $table = "pagamentos";
    protected $fillable = ['dataPagamento', 'anoReferencia', 'valorTotal','socio_id'];

    public function formas() {
        return $this->hasMany("App\PagamentoForma");
    }

    public function socio()
    {
        return $this->belongsTo("App\Socio");
    }
}
