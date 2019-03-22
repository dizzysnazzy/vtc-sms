<?php

namespace vtc\Http\Controllers;

use Illuminate\Http\Request;
use vtc\Level;

class LevelCtrl extends Controller
{
    public function index()
    {
        $levels = Level::all();

        return view('school-admin.levels.view', compact('levels'));
    }

    public function add()
    {
        return view('school-admin.levels.add');
    }

    public function postAdd(Request $request)
    {
        $level = new Level();

        $level->level_name = $request->input('level_name');
        $level->level_code = $request->input('level_code');
        $level->save();

        return redirect('/schooladmin/levels/view');
    }

    public function edit($id)
    {
        $level = Level::findOrFail($id);

        return view('school-admin.levels.edit', compact('level'));
    }

    public function update(Request $request, $id)
    {
        $level = Level::findOrFail($id);

        $level->level_name = $request->input('level_name');
        $level->level_code = $request->input('level_code');
        $level->save();

        return redirect('schooladmin/levels/view');
    }
}
