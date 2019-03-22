<?php

namespace vtc\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Sentinel;
use Illuminate\Http\Request;
use vtc\ExamRule;
use vtc\Grade;
use vtc\Student;
use vtc\Exam;
use vtc\Unit;

class ExamCtrl extends Controller
{
    public function index()
    {
        $exams = Exam::all();

        return view('school-admin.exams.view', compact('exams'));
    }

    public function new()
    {
        return view('school-admin.exams.new');
    }

    public function newPost(Request $request)
    {
        $user = Sentinel::getUser()->email;

        $exam = new Exam();

        $acYear = Carbon::now()->format('Y');

        $exam->exam_name = $request->exam_name;
        $exam->academic_year = $acYear;
        $exam->exam_period = $request->exam_period;
        $exam->exam_status = $request->exam_status;
        $exam->entry_by = $user;
        $exam->save();

        return redirect('/schooladmin/exams/view');
    }

    public function edit($id)
    {
        $exam = Exam::findOrFail($id);

        return view('school-admin.exams.edit', compact('exam'));
    }

    public function Update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);

        $exam->exam_name = $request->exam_name;
        $exam->exam_period = $request->exam_period;
        $exam->exam_status = $request->exam_status;
        $exam->save();

        return redirect()->back();
    }

    public function ruleIndex()
    {
        $rules = ExamRule::all();

        return view('school-admin.exam-rules.view', compact('rules'));
    }

    public function addRule(Request $request)
    {
        $grades = Grade::all();
        $units = Unit::all();

        return view('school-admin.exam-rules.new', compact('grades', 'units'));
    }

    public function postRule(Request $request)
    {
        $rule = new ExamRule();

        $user = Sentinel::getUser()->email;

        $subject_dist = [];
        foreach ($request->get('subjects_distribution') as $subject){
            $subject_dist[] = [
                'subject' => $subject,
                'mark' => null
            ];
        }
//
        $rule->grades_id = $request->input('grades_id');
        $rule->exam_rule_name = $request->input('exam_rule_name');
        $rule->subjects_distribution = $subject_dist;
        $rule->entry_by = $user;
        $rule->save();

//        dd($rule);

        return redirect('/schooladmin/exam-rules/view');
    }

    public function setDistribution(Request $request,$id)
    {
        $rule = ExamRule::findOrFail($id);

        $subs = $request->all();
        $marks = $request->get('dist_marks');

        $rul = array_values($request->get('dist_marks'));
        $ru = json_encode($rul);
        $r = json_decode($ru);

        $sub = array_values($request->get('dist_subs'));
        $su = json_encode($sub);
        $s = json_decode($su);
        $i = 0;
        $j = 1;

        foreach( $r as $sub ){
            foreach ($s as $su)
                $rula = [
                    'subject' => $su,
                    'mark' => $sub
                ];
        }

        $rule->subjects_distribution = $rula;
//        $rule->save();
        dd($rula);

        return redirect('/schooladmin/exam-rules/view');
    }
}
