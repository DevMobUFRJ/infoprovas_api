<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Exam
 *
 * @property int $id
 * @property string $periodo
 * @property string $arquivo
 * @property string|null $google_id
 * @property int $denuncias
 * @property int $subject_id
 * @property int $professor_id
 * @property int $exam_types_id
 * @property-read \App\Subject $subject
 * @property-read \App\Professor $professor
 * @property-read \App\ExamType $exam_type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereArquivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereDenuncias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereProfessorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereGoogleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam wherePeriodo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereExamTypesId($value)
 * @mixin \Eloquent
 */
class Exam extends Model
{
    protected $fillable = [
        'id', 'periodo', 'arquivo', 'google_id', 'denuncias', 'subject_id', 'professor_id', 'exam_types_id'
    ];

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function professor()
    {
        return $this->belongsTo('App\Professor');
    }

    public function exam_type()
    {
        return $this->belongsTo('App\ExamType');
    }
}
