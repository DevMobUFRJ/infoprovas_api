<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Exam
 *
 * @property int $id
 * @property string $semester
 * @property string $file
 * @property string|null $google_id
 * @property int $reports
 * @property int $subject_id
 * @property int $professor_id
 * @property int $exam_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\ExamType $exam_type
 * @property-read \App\Professor $professor
 * @property-read \App\Subject $subject
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Exam onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereExamTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereGoogleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereProfessorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereReports($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereSemester($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Exam withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Exam withoutTrashed()
 * @mixin \Eloquent
 */
class Exam extends Model
{
    /**
     * The soft delete allows the Exam to be removed when reported multiple times, without deleting the file
     * or row from the database.
     * Initially, nothing will be automatically deleted or removed, only manually.
     */
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'id', 'semester', 'file', 'google_id', 'reports', 'subject_id', 'professor_id', 'exam_type_id'
    ];

    /** @var string[]
     * Fields that don't need to be shown on a JSON response
     */
    protected $hidden = ['google_id', 'file'];


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

    /**
     * Generate a new path where to save the file, if it's not set yet.
     * @param $exam
     * @return string
     */
    static public function generate_or_get_file_path($exam){
        if(!empty($exam->file)) {
            return $exam->file;
        }
        $file_name = Exam::generate_file_name($exam);
        return 'app/exams/' . $exam->subject->course_id . '/' . $exam->subject->code . '/' . $file_name;
    }

    static private function generate_file_name($exam){
        $professor_name = str_replace(" ", "", strtolower($exam->professor->name));
        $professor_name = str_split($professor_name, 10); // Corta a string em 10 caracteres
        if(empty($professor_name) || sizeof($professor_name) < 1){
            $professor_name = "professor";
        } else {
            $professor_name = $professor_name[0];
        }

        return $exam->id . '_' . $professor_name . '_' . $exam->semester . '_' . $exam->exam_type->name . '.pdf';
    }
}
