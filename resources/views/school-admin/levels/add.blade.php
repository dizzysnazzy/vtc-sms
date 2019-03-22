@extends('school-admin.dashboard')

@section('content')

    <div class="col-md-6">
        <div class="panel-heading"><h2>New Level</h2></div>


        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
              action="{{ url('/schooladmin/level/add') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-md-4 control-label">Level Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="level_name" value="{{ old('level_name') }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Level Code</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="level_code" value="{{ old('level_code') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">New Level</button>
                </div>
            </div>
        </form>

    </div>

@endsection
