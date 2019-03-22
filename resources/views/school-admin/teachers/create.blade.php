@extends('school-admin.dashboard')

@section('content')

  <div class="col-md-6">
    <div class="panel-heading">New Tutor Details</div>


        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
              action="{{ url('/schooladmin/tutor/add') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-md-4 control-label"> Department</label>
                <div class="col-md-6">
                    <select name="departments_id" id="" class="form-control">
                        @foreach($depts as $dept)
                            <option value="{{$dept->id}}">{{$dept->dept_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"> First Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"> Last Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Tutor Email</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">National ID</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="national_id" value="{{ old('national_id') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"> Gender</label>
                <div class="col-md-6">
                    <select class="form-control" name="gender">
                      <option></option>
                      <option>Male</option>
                      <option>Female</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Date of Birth</label>
                <div class="col-md-6">
                    <input type="date" class="form-control" placeholder="Y-M-D" name="dob" value="{{ old('dob') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Mobile Number</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Postal Address</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"> Profile Photo</label>
                <div class="col-md-6">
                    <input type="file" class="form-control" name="photo" value="{{ old('photo') }}">
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
