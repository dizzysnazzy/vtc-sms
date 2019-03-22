<?php

namespace vtc;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
      'student_id',
      'level_id',
      'unit_code',
      'unit_name',
      'unit_score_aggregate',
      'unit_score_grade',
      'result_status'
    ];

    public function students()
    {
        return $this->belongsTo('vtc\Student', 'student_id');
    }

    public function levels()
    {
        return $this->belongsTo('vtc\Level', 'level_id');
    }
}
