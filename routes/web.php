<?php

Route::get('/', function () {
    return view('welcome');
});

// auth routes

Route::post('/login', 'LoginCtrl@login');


Route::post('/logout', 'LoginCtrl@logout');

// System Admin routes
Route::group(['middleware' => 'sysadmin'], function(){
  Route::get('/system/admin', 'System\homeCtrl@index');

  Route::get('/system/register', 'RegisterCtrl@register');

  Route::post('/system/register', 'RegisterCtrl@postRegister');

  Route::get('/system/view/users', 'System\viewusersCtrl@viewUsers');

  Route::get('/send', 'SmsCtrl@sms');

  Route::post('/send', 'SmsCtrl@smsPost');
});


// end system admin routes



// County Admin routes
Route::group(['middleware' => 'countyadmin'], function(){
  Route::get('/accounting/admin', 'AdminCtrl@index');

  Route::get('/accounting/schools/create', 'SchoolCtrl@create');

  Route::post('/accounting/schools/create', 'SchoolCtrl@postCreate');

  Route::get('/accounting/schools/view', 'SchoolCtrl@view');

  Route::delete('/accounting/school/{id}', 'SchoolCtrl@destroy');

  Route::get('/accounting/school/{id}', 'SchoolCtrl@edit');

  Route::put('/accounting/school/{id}', 'SchoolCtrl@update');

  Route::get('/countyadmin/tutors/view', 'TutorCtrl@viewTutors');

  Route::get('/countyadmin/students/view', 'StudentCtrl@students');

  Route::get('/countyadmin/expenses/viewall', 'ExpenseCtrl@allExpenses');

  Route::delete('/countyadmin/expense/{id}/delete', 'ExpenseCtrl@destroy');
});

// end accounting admin routes


// School Admin routes
Route::group(['middleware' => 'schooladmin'], function(){
  Route::get('/school/admin', 'SchminCtrl@index');

  Route::get('/schooladmin/departments/view', 'DeptCtrl@index');

  Route::get('/schooladmin/department/add', 'DeptCtrl@add');

  Route::post('/schooladmin/department/add', 'DeptCtrl@postAdd');

  Route::get('/schooladmin/department/{id}/edit', 'DeptCtrl@edit');

  Route::put('/schooladmin/department/{id}/edit', 'DeptCtrl@update');

    Route::get('/schooladmin/levels/view', 'LevelCtrl@index');

    Route::get('/schooladmin/level/add', 'LevelCtrl@add');

    Route::post('/schooladmin/level/add', 'LevelCtrl@postAdd');

    Route::get('/schooladmin/level/{id}/edit', 'LevelCtrl@edit');

    Route::put('/schooladmin/level/{id}/edit', 'LevelCtrl@update');

  Route::get('/schooladmin/course/new', 'CourseCtrl@index');

  Route::post('/schooladmin/course/new', 'CourseCtrl@newCourse');

  Route::get('/schooladmin/courses/view', 'CourseCtrl@viewCourses');

  Route::delete('/schooladmin/course/{id}/delete', 'CourseCtrl@destroy');

    Route::get('/schooladmin/unit/new', 'UnitCtrl@index');

    Route::post('/schooladmin/unit/new', 'UnitCtrl@newUnit');

    Route::get('/schooladmin/units/view', 'UnitCtrl@viewUnits');

    Route::get('/schooladmin/unit/{id}/edit', 'UnitCtrl@edit');

    Route::put('/schooladmin/unit/{id}/edit', 'UnitCtrl@update');

    Route::delete('/schooladmin/unit/{id}/delete', 'UnitCtrl@destroy');

  Route::get('/schooladmin/tutor/add', 'TutorCtrl@index');

  Route::post('/schooladmin/tutor/add', 'TutorCtrl@addTutor');

  Route::get('/schooladmin/tutor/view', 'TutorCtrl@viewTutor');

  Route::delete('/schooladmin/tutor/{id}/delete', 'TutorCtrl@destroy');

  Route::get('/schooladmin/tutor/{id}/edit', 'TutorCtrl@edit');

  Route::put('/schooladmin/tutor/{id}/edit', 'TutorCtrl@update');

  Route::get('/schooladmin/expenses/add', 'ExpenseCtrl@index');

  Route::post('/schooladmin/expenses/add', 'ExpenseCtrl@addExpense');

  Route::get('/schooladmin/expenses/view', 'ExpenseCtrl@viewExpense');

  Route::get('/schooladmin/assets/request', 'AssetCtrl@index');

  Route::post('/schooladmin/assets/request', 'AssetCtrl@reqAsset');

  Route::get('/schooladmin/assets/view', 'AssetCtrl@viewAssets');

  Route::get('/schooladmin/students/enroll', 'StudentCtrl@index');

  Route::post('/schooladmin/students/enroll', 'StudentCtrl@enrollStudent');

  Route::get('/schooladmin/students/view', 'StudentCtrl@viewStudent');

  Route::get('/schooladmin/student/{id}', 'StudentCtrl@view_student');

  Route::get('/schooladmin/student/{id}/edit', 'StudentCtrl@edit');

  Route::put('/schooladmin/student/{id}/edit', 'StudentCtrl@update');

  Route::delete('/schooladmin/students/{id}/delete', 'StudentCtrl@destroy');

  Route::get('schooladmin/students/report', 'StudentCtrl@downloadStudents');
//examinations

    Route::get('/schooladmin/exams/view', 'ExamCtrl@index');

    Route::get('/schooladmin/exam/new', 'ExamCtrl@new');

    Route::post('/schooladmin/exam/new', 'ExamCtrl@newPost');

    Route::get('/schooladmin/exam/{id}/edit', 'ExamCtrl@edit');

    Route::put('/schooladmin/exam/{id}/edit', 'ExamCtrl@Update');

    Route::delete('/schooladmin/exam/{id}/delete', 'ExamCtrl@destroy');

        Route::get('/schooladmin/exam-rules/view', 'ExamCtrl@ruleIndex');

        Route::get('/schooladmin/exam-rule/new', 'ExamCtrl@addRule');

        Route::post('/schooladmin/exam-rule/new', 'ExamCtrl@postRule');

        Route::get('/schooladmin/exam-rule/{id}/edit', 'ExamCtrl@editRule');

        Route::put('/schooladmin/exam-rule/{id}/edit', 'ExamCtrl@setDistribution');

        Route::delete('/schooladmin/exam-rule/{id}/delete', 'ExamCtrl@destroyRule');

            Route::get('/schooladmin/results', 'ResultCtrl@index');

            Route::get('/schooladmin/result/{id}/entry', 'ResultCtrl@resultEntry');

            Route::post('/schooladmin/unit/registration/{id}', 'ResultCtrl@registerUnits');

            Route::put('/schooladmin/marks/{id}/submit', 'ResultCtrl@updateMarks');

            Route::get('/schooladmin/generate/{id}/results', 'ResultCtrl@resultGenerate');

  Route::get('/invoice/{id}', 'ExpenseCtrl@downloadExpense');
// end school admin routes

// sms api
});

//accounting routes
Route::get('/accounts/admin', 'Accounts\HomeCtrl@index');
