<?php

namespace vtc\Http\Controllers;

use Illuminate\Http\Request;
use vtc\Department;

class DeptCtrl extends Controller
{
    public function index()
    {
        $depts = Department::all();

        return view('school-admin.departments.view', compact('depts'));
    }

    public function add()
    {
        return view('school-admin.departments.add');
    }

    public function postAdd(Request $request)
    {
        $dept = new Department();

        $dept->dept_name = $request->input('dept_name');
        $dept->save();

        return redirect('/schooladmin/departments/view');
    }

    public function edit($id)
    {
        $dept = Department::findOrFail($id);

        return view('school-admin.departments.edit', compact('dept'));
    }

    public function update(Request $request, $id)
    {
        $dept = Department::findOrFail($id);

        $dept->dept_name = $request->input('dept_name');
        $dept->save();

        return redirect('schooladmin/departments/view');
    }
}
