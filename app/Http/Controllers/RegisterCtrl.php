<?php

namespace vtc\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class RegisterCtrl extends Controller
{
  public function register() {
    return view('auths.register');
  }

  public function postRegister(Request $request) {
    $user = Sentinel::registerAndActivate([
      'email'=>$request->input('email'),
      'password'=>$request->input('password'),
      'first_name'=>$request->input('first_name'),
      'last_name'=>$request->input('last_name'),
    ]);

    $system = Sentinel::findRoleBySlug('system');
    $admin = Sentinel::findRoleBySlug('admin');
    $tutor = Sentinel::findRoleBySlug('tutor');
    $student = Sentinel::findRoleBySlug('student');

    $role = $request->input('role');

    if($role =='system'){
      $system->users()->attach($user);
    }
    elseif($request->input('role')=='admin'){
      $admin->users()->attach($user);
    }
    elseif($request->input('role')=='tutor'){
      $tutor->users()->attach($user);
    }
    elseif($request->input('role')=='student'){
      $student->users()->attach($user);
    }

    return redirect('/');

  }
}
