<?php

namespace vtc\Http\Controllers;

use Illuminate\Http\Request;
use vtc\Department;
use vtc\Tutor;
use Sentinel;

class TutorCtrl extends Controller
{
    public function index()
    {
        $depts = Department::all();

      return view('school-admin.teachers.create', compact('depts'));
    }

    public function addTutor(Request $request) {
      $tutor = new Tutor();

      $email = Sentinel::getUser()->email;

      $tutor->departments_id = $request->input('departments_id');
      $tutor->first_name = $request->input('first_name');
      $tutor->last_name = $request->input('last_name');
      $tutor->email = $request->input('email');
      $tutor->national_id = $request->input('national_id');
      $tutor->gender = $request->input('gender');
      $tutor->dob = $request->input('dob');
      $tutor->phone = $request->input('phone');
      $tutor->address = $request->input('address');
        $photo = $request->file('photo');
        $solution = time().'.'.$photo->getClientOriginalExtension();

        $photo->move(public_path('photo'), $solution);

        $tutor->photo = $solution;
      $tutor->save();

      $user = Sentinel::registerAndActivate([
        'email'=>$tutor->email,
        'password'=>$tutor->national_id,
        'first_name'=>$tutor->first_name,
        'last_name'=>$tutor->last_name,
      ]);

      $role = Sentinel::findRoleBySlug('tutor');
      $role->users()->attach($user);

      return redirect('/schooladmin/tutor/view');
    }

    public function viewTutor() {
      $email = Sentinel::getUser()->email;

      $tutors = Tutor::all();

      return view('school-admin.teachers.view')->with('tutors', $tutors);
    }

    public function edit($id)
    {
        $tutor = Tutor::findOrFail($id);

        $depts = Department::all();

        return view('school-admin.teachers.edit', compact('tutor', 'depts'));
    }

    public function update(Request $request, $id)
    {
        $tutor = Tutor::findOrFail($id);

        $tutor->departments_id = $request->input('departments_id');
        $tutor->first_name = $request->input('first_name');
        $tutor->last_name = $request->input('last_name');
        $tutor->email = $request->input('email');
        $tutor->national_id = $request->input('national_id');
        $tutor->gender = $request->input('gender');
        $tutor->dob = $request->input('dob');
        $tutor->phone = $request->input('phone');
        $tutor->address = $request->input('address');
        if ($request->hasFile('photo'))
        {
            $photo = $request->file('photo');
            $solution = time().'.'.$photo->getClientOriginalExtension();

            $photo->move(public_path('photo'), $solution);

            $tutor->photo = $solution;
        }
        $tutor->save();

        return redirect('/schooladmin/tutor/view');

    }

    public function destroy($id) {
      $tutor = Tutor::findOrFail($id);

      $email = [
        'login' => $tutor->email,
      ];

      $user = Sentinel::findByCredentials($email);

      $user->delete();

      $tutor->delete();

      return redirect()->back();
    }

    public function viewTutors() {
      $tutors = Tutor::all();

      return view('accounting.teachers.view')->with('tutors', $tutors);
    }
}
