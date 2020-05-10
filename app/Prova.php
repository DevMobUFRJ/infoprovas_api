<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Prova
 *
 * @property int $id
 * @property string $periodo
 * @property string $arquivo
 * @property string|null $google_id
 * @property int $denuncias
 * @property int $disciplina_id
 * @property int $docente_id
 * @property int $tipos_provas_id
 * @property-read \App\Disciplina $disciplina
 * @property-read \App\Docente $docente
 * @property-read \App\TipoProva $tipo_prova
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Prova newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Prova newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Prova query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Prova whereArquivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Prova whereDenuncias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Prova whereDisciplinaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Prova whereDocenteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Prova whereGoogleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Prova whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Prova wherePeriodo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Prova whereTiposProvasId($value)
 * @mixin \Eloquent
 */
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
