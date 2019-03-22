<?php

namespace vtc;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
     protected $fillable = ['school_id', 'expense_name', 'amount', 'expense_date', 'comments', 'photo'];

     public function schools() {
       return $this->belongsTo('vtc\School', 'school_id');
     }
}
