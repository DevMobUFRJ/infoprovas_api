<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TipoProva
 *
 * @property int $id
 * @property string $nome
 * @property int $ordem
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Prova[] $provas
 * @property-read int|null $provas_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TipoProva newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TipoProva newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TipoProva query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TipoProva whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TipoProva whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TipoProva whereOrdem($value)
 * @mixin \Eloquent
 */
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
