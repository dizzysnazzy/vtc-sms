<?php

namespace vtc\Http\Controllers;

use Illuminate\Http\Request;
use vtc\RegisteredUnit;
use vtc\Result;
use vtc\Student;
use vtc\Unit;

class ResultCtrl extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('school-admin.results.new', compact('students'));
    }

    public function resultEntry(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $level = $student->level_id;
        $course = $student->courses_id;

        $unit_registered = RegisteredUnit::where('level_id', $level)
            ->where('student_id', $student->id)->get();
        $units_registered = RegisteredUnit::where('level_id', $level)
            ->where('student_id', $student->id)->get();

        $units = Unit::where('levels_id', $level)
            ->where('courses_id', $course)
            ->get();

        return view('school-admin.results.view', compact('units', 'student', 'unit_registered', 'units_registered'));
    }

    public function registerUnits($id)
    {
        $student = Student::findOrFail($id);

        $level = $student->level_id;
        $course = $student->courses_id;

        $units = Unit::where('levels_id', $level)
            ->where('courses_id', $course)
            ->get();



        foreach($units as $unit)
        {
            $unit_register = new RegisteredUnit();
            $unit_register->student_id = $student->id;
            $unit_register->level_id = $student->level_id;
            $unit_register->unit_name = $unit->unit_name;
            $unit_register->unit_score_max = $unit->unit_score_max;
            $unit_register->unit_status = $unit->unit_status;
            $unit_register->combined_subjects_id = $unit->combined_subjects_id;
            $unit_register->save();
//            dd($unit_register);
        }



        return redirect()->back();
    }

    public function updateMarks(Request $request, $id)
    {
        $mark = RegisteredUnit::findOrFail($id);

        $cat = $request->input('unit_score_cat');
        $end_term = $request->input('unit_score_main');

        $aggregate = $cat + $end_term;

        $grade = '';
        if ($aggregate >= 70)
            $grade= 'A';
        elseif ($aggregate >= 60)
            $grade = 'B';
        elseif ($aggregate >= 50)
            $grade = 'C';
        elseif ($aggregate >= 40)
            $grade = 'D';
        else
            $grade = "E";

        $mark->unit_score_cat = $request->input('unit_score_cat');
        $mark->unit_score_main = $request->input('unit_score_main');
        $mark->unit_score_aggregate = $aggregate;
        $mark->unit_score_grade = $grade;
        $mark->save();

        return redirect()->back();
    }

    public function resultGenerate($id)
    {
        $student = Student::findOrFail($id);

        $level = $student->level_id;
        $course = $student->id;

        $units_registered = RegisteredUnit::where('level_id', $level)
            ->where('student_id', $course)
            ->get();

        foreach ($units_registered as $unit)
        {
            $result = new Result();
            $result->student_id = $id;
            $result->level_id = $id;
            if ($unit->unit_status === 'combined')
            {
                $aggregate_score = $unit->where('student_id', $student->id)->where('unit_status', 'combined')->sum('unit_score_aggregate');
                $aggregate_max = $unit->where('student_id', $student->id)->where('unit_status', 'combined')->sum('unit_score_max');
                $aggregate_count = $unit->where('student_id', $student->id)->where('unit_status', 'combined')->count();

//                calculate the totals and find average #just awesomeness
                $aggregate = ($aggregate_score ) / ($aggregate_max +30 * $aggregate_count) * 100;

                $grade = '';
                if ($aggregate >= 70)
                    $grade= 'A';
                elseif ($aggregate >= 60)
                    $grade = 'B';
                elseif ($aggregate >= 50)
                    $grade = 'C';
                elseif ($aggregate >= 40)
                    $grade = 'D';
                else
                    $grade = "E";

                $result->unit_code = $unit->combined_subjects->combined_code->unique();
                $result->unit_name = $unit->combined_subjects->combined_name;
                $result->unit_score_aggregate = $aggregate;
                $result->unit_score_grade = $grade;
                $result->result_status = 'pending';

            }
            elseif ($unit->unit_status === 'single')
            {
                $unit_code = Unit::where('unit_name', $unit->unit_name)->get()->first();
                $result->unit_code = $unit_code->unit_code;
                $result->unit_name = $unit->unit_name;
                $result->unit_score_aggregate = $unit->unit_score_aggregate;
                $result->unit_score_grade = $unit->unit_score_grade;
                $result->result_status = 'pending';
            }

            $result->save();

            print_r($result);

        }
        die();
    }
}
