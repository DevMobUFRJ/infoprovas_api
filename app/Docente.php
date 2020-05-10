<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Docente
 *
 * @property int $id
 * @property string $nome
 * @property int $curso_id
 * @property-read \App\Curso $curso
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Prova[] $provas
 * @property-read int|null $provas_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Docente newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Docente newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Docente query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Docente whereCursoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Docente whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Docente whereNome($value)
 * @mixin \Eloquent
 */
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
