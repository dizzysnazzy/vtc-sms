<?php

namespace vtc;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
      'courses_id',
      'level_id',
      'adm_date',
      'reg_no',
      'level_of_study',
      'first_name',
      'middle_name',
      'last_name',
      'national_id',
      'gender',
      'dob',
      'email',
      'mobile',
      'address',
      'county',
      'ward',
      'location',
      'village',
      'disability',
      'previous_school',
      'extra_curicular',
      'parent_name',
      'parent_mobile',
      'parent_address',
      'mode_of_study',
      'sponsorship',
      'blood_group',
      'enrolled_by',
      'photo'
    ];

    public function classes() {
      return $this->belongsTo('vtc\Course', 'courses_id');
    }

    public function levels()
    {
        return $this->belongsTo('vtc\Level', 'level_id');
    }

    public function exams()
    {
        return $this->hasMany('vtc/Exam');
    }

    public function registered_units()
    {
        return $this->hasMany('vtc\RegisteredUnit');
    }

    public function unit_marks()
    {
        return $this->hasMany('vtc\UnitMark');
    }

    public function results()
    {
        return $this->hasMany('vtc\Result');
    }
}
