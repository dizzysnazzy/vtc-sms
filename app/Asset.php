<?php

namespace vtc;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = ['school_id', 'asset_name', 'asset_type', 'price', 'manufacturer', 'state', 'status'];

    public function schools() {
      return $this->belongsTo('vtc\School', 'school_id');
    }
}
