<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioBanido extends Model
{
    protected $table = 'usuarios_banidos';

    protected $fillable = [
        'id', 'google_id',
    ];
}
