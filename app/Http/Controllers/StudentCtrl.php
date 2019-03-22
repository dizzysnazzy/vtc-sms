<?php

namespace vtc\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use vtc\School;
use vtc\Student;
use Sentinel;
use PDF;
use vtc\Course;
use vtc\Exam;
use vtc\Level;
use vtc\Department;

class StudentCtrl extends Controller
{
    public function index() {
      $courses = Course::all();
      $levels = Level::all();

      return view('school-admin.students.enroll', compact('courses', 'levels'));
    }

    public function enrollStudent(Request $request) {
      $student = new Student();

      $email = Sentinel::getUser()->id;

      $totalStudents = Student::all()->count();

      $course = Course::where('id', $request->input('courses_id'))->get()->first();

      $course_initials = $course->course_initials;

      $year = $course_initials."/".++$totalStudents."/".Carbon::now()->format('y');

      $student->courses_id = $request->input("courses_id");
      $student->level_id = $request->input("level_id");
      $student->level_of_study = $request->input("level_of_study");
      $student->adm_date = $request->input('adm_date');
      $student->reg_no = $year;
      $student->first_name = $request->input('first_name');
      $student->middle_name = $request->input('middle_name');
      $student->last_name = $request->input('last_name');
      $student->national_id = $request->input('national_id');
      $student->gender = $request->input('gender');
      $student->dob = $request->input('dob');
      $student->email = $request->input('email');
      $student->mobile = $request->input('mobile');
      $student->address = $request->input('address');
      $student->county = $request->input('county');
      $student->ward = $request->input('ward');
      $student->location = $request->input('location');
      $student->village = $request->input('village');
      $student->disability = $request->input('disability');
      $student->previous_school = $request->input('previous_school');
      $student->extra_curicular = $request->input('extra_curicular');
      $student->parent_name = $request->input('parent_name');
      $student->parent_mobile = $request->input('parent_mobile');
      $student->parent_address = $request->input('parent_address');
      $student->mode_of_study = $request->input('mode_of_study');
      $student->sponsorship = $request->input('sponsorship');
      $student->blood_group = $request->input('blood_group');
      $student->enrolled_by = $email;
        $photo = $request->file('photo');
        $solution = time().'.'.$photo->getClientOriginalExtension();

        $photo->move(public_path('students'), $solution);

        $student->photo = $solution;
      $student->save();

      // return json_encode($student);
      return redirect()->back();
    }

    public function viewStudent() {
      $email = Sentinel::getUser()->email;

      $students = Student::simplePaginate('15');

      return view('school-admin.students.view')->with('students', $students);
    }

    public function downloadStudents() {
      $email = Sentinel::getUser()->email;

      $students = Student::all();

      $pdf = PDF::loadView('school-admin.students.report', compact('students'))->setPaper('a4', 'landscape');
      return $pdf->download('students.pdf');
    }

    public function students() {
      $students = School::with('students')->get();

      return view('accounting.students.view')->with('students', $students);
    }

    public function view_student($id)
    {
      $student = Student::findOrFail($id);

      $course_id = $student->courses_id;

      $course = Course::where('id', $course_id)->get()->first();

      return view('school-admin.students.view-student', compact('student', 'course'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        $courses = Course::all();
        $levels = Level::all();

        return view('school-admin.students.edit', compact('student', 'courses', 'levels'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $student->level_id = $request->input("level_id");
        $student->adm_date = $request->input('adm_date');
        $student->first_name = $request->input('first_name');
        $student->middle_name = $request->input('middle_name');
        $student->last_name = $request->input('last_name');
        $student->national_id = $request->input('national_id');
        $student->gender = $request->input('gender');
        $student->dob = $request->input('dob');
        $student->email = $request->input('email');
        $student->mobile = $request->input('mobile');
        $student->address = $request->input('address');
        $student->county = $request->input('county');
        $student->ward = $request->input('ward');
        $student->location = $request->input('location');
        $student->village = $request->input('village');
        $student->disability = $request->input('disability');
        $student->previous_school = $request->input('previous_school');
        $student->extra_curicular = $request->input('extra_curicular');
        $student->parent_name = $request->input('parent_name');
        $student->parent_mobile = $request->input('parent_mobile');
        $student->parent_address = $request->input('parent_address');
        $student->mode_of_study = $request->input('mode_of_study');
        $student->sponsorship = $request->input('sponsorship');
        $student->blood_group = $request->input('blood_group');
        $photo = $request->file('photo');
        $solution = time().'.'.$photo->getClientOriginalExtension();

        $photo->move(public_path('students'), $solution);

        $student->photo = $solution;
        $student->save();

        return redirect('/schooladmin/students/view');
    }

    public function destroy($id) {
      $student = Student::findOrFail($id);

      $student->delete();

      return redirect()->back();
    }




}
