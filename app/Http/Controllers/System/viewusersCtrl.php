<?php

namespace vtc\Http\Controllers\System;

use Illuminate\Http\Request;
use vtc\Http\Controllers\Controller;
use Sentinel;

class viewusersCtrl extends Controller
{
    public function viewUsers() {
      $users = Sentinel::getUserRepository()->with('roles')->orderBy('first_name')->get();

      return view('system.viewusers')->with('users', $users);
    }
}
