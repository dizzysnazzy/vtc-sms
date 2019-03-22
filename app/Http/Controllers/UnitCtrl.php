<?php

namespace vtc\Http\Controllers;

use Illuminate\Http\Request;
use vtc\CombinedSubject;
use vtc\Course;
use vtc\Department;
use vtc\Level;
use vtc\Tutor;
use vtc\Unit;

class UnitCtrl extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $levels = Level::all();
        $tutors = Tutor::all();
        $courses = Course::all();
        $subjects = CombinedSubject::all();

        return view('school-admin.units.create', compact('departments', 'levels', 'tutors', 'courses', 'subjects'));
    }

    public function newUnit(Request $request)
    {
        $unit = new Unit();

        $unit->departments_id = $request->input('departments_id');
        $unit->levels_id = $request->input('levels_id');
        $unit->tutors_id = $request->input('tutors_id');
        $unit->courses_id = $request->input('courses_id');
        $unit->combined_subjects_id = $request->input('combined_subjects_id');
        $unit->unit_name = $request->input('unit_name');
        $unit->unit_code = $request->input('unit_code');
        $unit->unit_status = $request->input('unit_status');
        $unit->save();

        return redirect('/schooladmin/units/view');
    }

    public function viewUnits()
    {
        $units = Unit::all();

        return view('school-admin.units.view', compact('units'));
    }

    public function edit($id)
    {
        $unit = Unit::findOrFail($id);

        $departments = Department::all();
        $levels = Level::all();
        $tutors = Tutor::all();
        $courses = Course::all();
        $subjects = CombinedSubject::all();

        return view('school-admin.units.edit', compact('unit', 'departments', 'levels', 'tutors', 'courses', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $unit = Unit::findOrFail($id);

        $unit->departments_id = $request->input('departments_id');
        $unit->levels_id = $request->input('levels_id');
        $unit->tutors_id = $request->input('tutors_id');
        $unit->courses_id = $request->input('courses_id');
        $unit->combined_subjects_id = $request->input('combined_subjects_id');
        $unit->unit_name = $request->input('unit_name');
        $unit->unit_code = $request->input('unit_code');
        $unit->unit_score_max = $request->input('unit_score_max');
        $unit->unit_status = $request->input('unit_status');
        $unit->save();

        return redirect('/schooladmin/units/view');
    }

    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);

        $unit->delete();

        return redirect('/schooladmin/units/view');
    }
}
