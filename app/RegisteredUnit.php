<?php

namespace vtc;

use Illuminate\Database\Eloquent\Model;

class RegisteredUnit extends Model
{
    protected $fillable = [
      'student_id',
      'level_id',
      'unit_name',
      'unit_score_max',
      'unit_score_cat',
      'unit_score_main',
      'unit_score_aggregate',
      'unit_score_grade',
      'combined_subjects_id',
      'unit_status'
    ];

    public function students()
    {
        return $this->belongsTo('vtc\Student', 'student_id');
    }

    public function levels()
    {
        return $this->belongsTo('vtc\Level', 'level_id');
    }

    public function combined_subjects()
    {
        return $this->belongsTo('vtc\CombinedSubject', 'combined_subjects_id');
    }
}
