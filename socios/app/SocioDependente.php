<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocioDependente extends Model
{
    protected $table = "socio_dependentes";
    protected $fillable = ['socio_id', 'dependente_id'];

    public function dependente()
    {
        return $this->belongsTo("App\Dependente");
    }

}
