<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Curso
 *
 * @property int $id
 * @property string $nome
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Disciplina[] $disciplinas
 * @property-read int|null $disciplinas_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Docente[] $docentes
 * @property-read int|null $docentes_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Curso newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Curso newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Curso query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Curso whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Curso whereNome($value)
 * @mixin \Eloquent
 */
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
