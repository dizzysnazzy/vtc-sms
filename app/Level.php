<?php

namespace vtc;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
      'level_name',
      'level_code'
    ];

    public function students()
    {
      return $this->hasMany('vtc\Student');
    }

    public function units()
    {
      return $this->hasMany('vtc\Unit');
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
