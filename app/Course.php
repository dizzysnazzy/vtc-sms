<?php

namespace vtc;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $fillable = [
    'departments_id',
    'course_name',
    'course_code',
    'course_initials',
    'course_period'
  ];

  public function students() {
    return $this->hasMany('vtc\Student');
  }

  public function departments()
  {
    return $this->belongsTo('vtc\Department', 'departments_id');
  }
}
