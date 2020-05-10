<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Subject
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int|null $semester
 * @property int $course_id
 * @property-read \App\Course $course
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Exam[] $exams
 * @property-read int|null $exams_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subject query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subject whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subject whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subject whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subject whereSemester($value)
 * @mixin \Eloquent
 */
class Subject extends Model
{
    protected $fillable = [
        'id', 'codigo', 'nome', 'periodo', 'course_id'
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
