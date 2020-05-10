<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UsuarioBanido
 *
 * @property int $id
 * @property string $google_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsuarioBanido newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsuarioBanido newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsuarioBanido query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsuarioBanido whereGoogleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UsuarioBanido whereId($value)
 * @mixin \Eloquent
 */
class UsuarioBanido extends Model
{
    protected $table = 'usuarios_banidos';

    protected $fillable = [
        'id', 'google_id',
    ];
}
