<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagamentoForma extends Model
{
    protected $table = "pagamento_formas";
    protected $fillable = ['pagamento_id', 'forma_id'];

    public function forma()
    {
        return $this->belongsTo("App\Forma");
    }
}
