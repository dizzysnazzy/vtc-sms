@extends('school-admin.dashboard')

@section('content')

    <div class="col-md-6">
        <div class="panel-heading"><h2>Update Department</h2></div>


        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
              action="/schooladmin/department/{{$dept->id}}/edit">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group">
                <label class="col-md-4 control-label">Department Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="dept_name" value="{{ $dept->dept_name }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Update Department</button>
                </div>
            </div>
        </form>

    </div>

@endsection
