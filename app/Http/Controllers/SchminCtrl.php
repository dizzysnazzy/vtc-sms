<?php

namespace vtc\Http\Controllers;

use Illuminate\Http\Request;
use vtc\Department;
use vtc\School;
use vtc\Student;
use vtc\Expense;
use vtc\Tutor;
use vtc\Charts\SchoolChart;
use Sentinel;

class SchminCtrl extends Controller
{
  public function index() {
    $email = Sentinel::getUser()->email;

    $students = Student::all();
    $expenses = Expense::all();
    $tutors = Tutor::all();
    $depts = Department::all();

      $today_users = Student::whereDate('created_at', today())->count();
      $yesterday_users = Student::whereDate('created_at', today()->subDays(1))->count();
      $users_2_days_ago = Student::whereDate('created_at', today()->subDays(2))->count();

      $chart = new SchoolChart();
      $chart->labels(['2 days ago', 'Yesterday', 'Today']);
      $chart->dataset('My dataset', 'line', [$users_2_days_ago, $yesterday_users, $today_users]);

    return view('school-admin.home', compact('students', 'expenses', 'tutors', 'chart', 'depts'));
  }
}
