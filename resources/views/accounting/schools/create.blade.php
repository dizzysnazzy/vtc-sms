@extends('accounting.dashboard')

@section('content')

  <div class="col-md-6">
    <div class="panel-heading">Fill in School Details</div>


        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
              action="{{ url('accounting') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-md-4 control-label">VTC Reg No</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="registration" value="{{ old('registration') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">VTC Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">VTC Email</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">VTC Location</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="location" value="{{ old('location') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Date of Registration</label>
                <div class="col-md-6">
                    <input type="date" class="form-control" placeholder="Y-M-D" name="reg_date" value="{{ old('reg_date') }}">
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Submit Entry</button>
                </div>
            </div>
        </form>

  </div>

@endsection
