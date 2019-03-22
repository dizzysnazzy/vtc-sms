<?php

namespace vtc;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
      'dept_name'
    ];

    public function courses()
    {
      return $this->hasMany('vtc\Courses');
    }

    public function units()
    {
      return $this->hasMany('vtc\Unit');
    }
}
