<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Course
 *
 * @property int $id
 * @property string $nome
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Subject[] $subjects
 * @property-read int|null $subjects_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Professor[] $professors
 * @property-read int|null $professors_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereNome($value)
 * @mixin \Eloquent
 */
class Course extends Model
{
    protected $fillable = [
        'id', 'nome',
    ];

    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }

    public function professors()
    {
        return $this->hasMany('App\Professor');
    }
}
