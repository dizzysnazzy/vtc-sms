<?php

namespace vtc\Http\Controllers;

use Illuminate\Http\Request;
use vtc\School;
use vtc\Student;
use vtc\Expense;
use vtc\Teacher;
use Charts;

class AdminCtrl extends Controller
{

   public function index() {
     $schools = School::all();
     $students = Student::all();
     $expenses = Expense::all()->sum('amount');
     $tutors = Teacher::all();

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

    //  $chart = Charts::database(School::all(), 'bar', 'highcharts');


     return view('accounting.home')->with(array(
       'schools' => $schools,
       'students' => $students,
       'expenses' => $expenses,
       'tutors' => $tutors,
       'enrollment' => $enrollment,
       'courses' => $courses,
       'expe' => $expe,
        ));
   }
}
