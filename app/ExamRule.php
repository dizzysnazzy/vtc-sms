<?php

namespace vtc;

use Illuminate\Database\Eloquent\Model;

class ExamRule extends Model
{
    protected $casts = [
        'subjects_distribution' => 'array',
        'marks_distribution' => 'array'
    ];

    protected $fillable = [
        'grades_id',
        'exam_rule_name',
        'subject_distribution',
        'marks_distribution',
        'entry_by'
    ];

    public function grades()
    {
        return $this->belongsTo('vtc\Grade', 'grades_id');
    }
}
