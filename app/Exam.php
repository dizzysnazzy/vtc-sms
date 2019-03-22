<?php

namespace vtc;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'exam_name',
        'academic_year',
        'exam_period',
        'exam_status',
        'entry_by'
    ];

    public function unit_marks()
    {
        return $this->hasMany('vtc\UnitMark');
    }
}
