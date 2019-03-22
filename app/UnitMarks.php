<?php

namespace vtc;

use Illuminate\Database\Eloquent\Model;

class UnitMarks extends Model
{
    protected $fillable = [
      'units_id',
      'tutors_id',
      'students_id',
      'exams_id',
      'levels_id',
      'marks',
      'grade',
      'remarks'
    ];

    public function units()
    {
        return $this->belongsTo('vtc\Unit', 'units_id');
    }

    public function tutors()
    {
        return $this->belongsTo('vtc\Tutor', 'tutors_id');
    }

    public function students()
    {
        return $this->belongsTo('vtc\Student', 'students_id');
    }

    public function exams()
    {
        return $this->belongsTo('vtc\Exam', 'exams_id');
    }

    public function levels()
    {
        return $this->belongsTo('vtc\Level', 'levels_id');
    }
}
