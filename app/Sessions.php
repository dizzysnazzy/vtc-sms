<?php

namespace vtc;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Builder;
use Sentinel;

class Sessions extends Model
{
  public $table = 'sessions';

  public $timestamps = false;

  public function user()
  {
      return $this->belongsTo('Cartalyst\Sentinel\Users\EloquentUser');
  }

  public function scopeActivity($query, $limit = 10)
  {
      $lastActivity = strtotime(Carbon::now()->subMinutes($limit));

      return $query->where('last_activity', '>=', $lastActivity);
  }

  public function scopeGuests(Builder $query)
  {
      return $query->whereNull('user_id');
  }

  public function scopeRegistered(Builder $query)
  {
      return $query->whereNotNull('user_id')->with('user');
  }

  public function scopeUpdateCurrent(Builder $query)
  {
      $user = Sentinel::check();

      return $query->where('id', Session::getId())->update([
          'user_id' => $user ? $user->id : null
      ]);
  }
}
