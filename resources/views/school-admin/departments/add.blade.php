@extends('school-admin.dashboard')

@section('content')

    <div class="col-md-6">
        <div class="panel-heading"><h2>New Department</h2></div>


        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
              action="{{ url('/schooladmin/department/add') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-md-4 control-label">Department Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="dept_name" value="{{ old('dept_name') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">New Department</button>
                </div>
            </div>
        </form>

    </div>

@endsection
