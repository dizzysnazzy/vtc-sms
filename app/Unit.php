<?php

namespace vtc;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
      'departments_id',
      'levels_id',
      'tutors_id',
      'courses_id',
      'combined_subjects_id',
      'unit_name',
      'unit_code',
      'unit_status',
      'unit_score_max'
    ];

    public function departments()
    {
      return $this->belongsTo('vtc\Department', 'departments_id');
    }

    public function levels()
    {
      return $this->belongsTo('vtc\Level', 'levels_id');
    }

    public function tutors()
    {
      return $this->belongsTo('vtc\Tutor', 'tutors_id');
    }

    public function courses()
    {
      return $this->belongsTo('vtc\Course', 'courses_id');
    }

    public function combined_subjects()
    {
        return $this->belongsTo('vtc\CombinedSubject', 'combined_subjects_id');
    }

    public function unit_marks()
    {
        return $this->hasMany('vtc\UnitMark');
    }
}
