<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $fillable = [
        'id', 'codigo', 'nome', 'periodo', 'curso_id'
    ];

    public function curso()
    {
        return $this->belongsTo('App\Curso');
    }

    public function provas()
    {
        return $this->hasMany('App\Prova');
    }
}
