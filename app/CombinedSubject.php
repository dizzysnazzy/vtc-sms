<?php

namespace vtc;

use Illuminate\Database\Eloquent\Model;

class CombinedSubject extends Model
{
    protected $fillable = [
        'combined_name',
        'combined_code'
    ];

    public function units()
    {
        return $this->hasMany('vtc\Unit');
    }
}
