<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $fillable = [
        'id', 'nome', 'curso_id'
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
