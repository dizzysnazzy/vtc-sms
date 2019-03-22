@extends('school-admin.dashboard')

@section('content')

  <div class="col-md-6">
    <div class="panel-heading"><h2>New Course</h2></div>


        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
              action="{{ url('/schooladmin/course/new') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">


            <div class="form-group">
                <label class="col-md-4 control-label"> Department </label>
                <div class="col-md-6">
                    <select class="form-control" name="departments_id">
                        @foreach($depts as $dept)
                            <option class="form-control" value="{{ $dept->id }}">{{ $dept->dept_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Course Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="course_name" value="{{ old('course_name') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Course Code</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="course_code" value="{{ old('course_code') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Course Initials/Slug</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="course_initials" value="{{ old('course_initials') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Course Duration</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="course_period" value="{{ old('course_period') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">New Course</button>
                </div>
            </div>
        </form>

  </div>

@endsection
