<?php

namespace vtc;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
  protected $fillable = [
    'departments_id',
    'first_name',
    'last_name',
    'email',
    'national_id',
    'gender',
    'dob',
    'phone',
    'address',
    'photo'
  ];

  public function departments() {
    return $this->belongsTo('vtc\Department', 'departments_id');
  }

  public function units()
  {
    return $this->hasMany('vtc\Units');
  }

    public function unit_marks()
    {
        return $this->hasMany('vtc\UnitMark');
    }
}
