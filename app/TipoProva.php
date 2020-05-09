<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProva extends Model
{
    protected $table = 'tipos_provas';

    protected $fillable = [
        'id', 'nome', 'ordem',
    ];

    public function provas()
    {
        return $this->hasMany('App\Prova');
    }
}
