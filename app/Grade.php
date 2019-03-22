<?php

namespace vtc;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
      'grade_name',
      'grades'
    ];

    public function exam_rules()
    {
        return $this->hasMany('vtc\ExamRule');
    }
}
