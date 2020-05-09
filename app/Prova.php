<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prova extends Model
{
    protected $fillable = [
        'id', 'periodo', 'arquivo', 'google_id', 'denuncias', 'disciplina_id', 'docente_id', 'tipos_provas_id'
    ];

    public function disciplina()
    {
        return $this->belongsTo('App\Disciplina');
    }

    public function docente()
    {
        return $this->belongsTo('App\Docente');
    }

    public function tipo_prova()
    {
        return $this->belongsTo('App\TipoProva');
    }
}
