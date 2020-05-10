<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Professor
 *
 * @property int $id
 * @property string $nome
 * @property int $course_id
 * @property-read \App\Course $course
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Exam[] $exams
 * @property-read int|null $exams_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Professor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Professor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Professor query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Professor whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Professor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Professor whereNome($value)
 * @mixin \Eloquent
 */
class Professor extends Model
{
    protected $fillable = [
        'id', 'nome', 'course_id'
    ];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function exams()
    {
        return $this->hasMany('App\Exam');
    }
}
