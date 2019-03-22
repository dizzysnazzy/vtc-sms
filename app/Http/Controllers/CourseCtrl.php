<?php

namespace vtc\Http\Controllers;

use Illuminate\Http\Request;
use vtc\Course;
use vtc\Department;

class CourseCtrl extends Controller
{
    public function index()
    {
        $depts = Department::all();

        return view('school-admin.courses.create', compact('depts'));
    }

    public function newCourse(Request $request)
    {
      $course = new Course();

      $course->departments_id = $request->input('departments_id');
      $course->course_name = $request->input('course_name');
      $course->course_code = $request->input('course_code');
      $course->course_initials = $request->input('course_initials');
      $course->course_period = $request->input('course_period');
      $course->save();

      return redirect()->back();
    }

    public function viewCourses()
    {
      $courses = Course::all();

      return view('school-admin.courses.view', compact('courses'));
    }

    public function destroy($id)
    {
      $course = Course::findOrFail($id);
      $course->delete();

      return redirect()->back();
    }
}
