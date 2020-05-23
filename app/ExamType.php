<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ExamType
 *
 * @property int $id
 * @property string $name
 * @property int $order
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Exam[] $Exams
 * @property-read int|null $exams_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExamType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExamType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExamType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExamType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExamType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ExamType whereOrder($value)
 * @mixin \Eloquent
 */
class ExamType extends Model
{
    protected $table = 'exam_types';
    public $timestamps = false;

    protected $fillable = [
        'id', 'name', 'order',
    ];

    public function Exams()
    {
        return $this->hasMany('App\Exam');
    }
}
