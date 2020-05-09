<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'id', 'nome',
    ];

    public function disciplinas()
    {
        return $this->hasMany('App\Disciplina');
    }

    public function docentes()
    {
        return $this->hasMany('App\Docente');
    }
}
