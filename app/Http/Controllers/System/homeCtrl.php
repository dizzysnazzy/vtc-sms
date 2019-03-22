<?php

namespace vtc\Http\Controllers\System;

use Illuminate\Http\Request;
use vtc\Http\Controllers\Controller;
use vtc\School;
use vtc\Student;
use vtc\Expense;
use vtc\Teacher;
use Charts;
use vtc\Sessions as sessions;


class homeCtrl extends Controller
{
    public function index() {
      $schools = School::all();
      $students = Student::all();
      $expenses = Expense::all()->sum('amount');
      $tutors = Teacher::all();

      $online_users = sessions::all();


      $enrollment = Charts::database(Student::all(), 'bar', 'highcharts')
              ->elementLabel("No of Students")
              ->title('Enrollment Stats')
              ->responsive(false)
              ->groupByMonth('2017', true);
      $courses = Charts::database(Student::all(), 'bar', 'highcharts')
              ->elementLabel("No. of Students")
              ->title('Students')
              ->responsive(false)
              ->groupBy('course');
     $data = Expense::all();
     $expe = Charts::create('line', 'highcharts')
              ->title('My Annual Budget')
              ->elementLabel('Expenditure')
              ->labels($data->pluck('expense_date'))
              ->values($data->pluck('amount'))
              ->responsive(true);

      return view('system.home')->with(array(
        'schools' => $schools,
        'students' => $students,
        'expenses' => $expenses,
        'tutors' => $tutors,
        'enrollment' => $enrollment,
        'courses' => $courses,
        'expe' => $expe,
        'online_users' => $online_users,
         ));
    }
}
