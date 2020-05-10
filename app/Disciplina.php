<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Disciplina
 *
 * @property int $id
 * @property string $codigo
 * @property string $nome
 * @property int|null $periodo
 * @property int $curso_id
 * @property-read \App\Curso $curso
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Prova[] $provas
 * @property-read int|null $provas_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Disciplina newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Disciplina newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Disciplina query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Disciplina whereCodigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Disciplina whereCursoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Disciplina whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Disciplina whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Disciplina wherePeriodo($value)
 * @mixin \Eloquent
 */
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
