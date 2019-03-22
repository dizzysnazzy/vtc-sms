@extends('school-admin.dashboard')

@section('content')

  <div class="col-md-12">
    <div class="panel-heading" style="color: #005F91;"><h1>Update Student</h1></div>


        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
              action="/schooladmin/student/{{$student->id}}/edit">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">
            <div style="background-color: seagreen; color: white; ">
                <p class="lead  section-title">Department Info:</p>
            </div>
            <div class="form-group">
                <label class="col-md-1 control-label"> Course </label>
                <div class="col-md-1">
                    <select class="form-control" name="courses_id">
                      @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->course_name }}/{{$course->course_code}}</option>
                      @endforeach
                    </select>
                </div>
                <label class="col-md-1 control-label"> Level </label>
                <div class="col-md-2">
                    <select class="form-control" name="level_id">
                        @foreach($levels as $level)
                            <option class="form-control" value="{{ $level->id }}">{{ $level->level_name }}/{{$level->level_code}}</option>
                        @endforeach
                    </select>
                </div>
                <label class="col-md-2 control-label">Date of Admission</label>
                <div class="col-md-2">
                    <input type="date" class="form-control" placeholder="Y-M-D" name="adm_date" value="{{ $student->adm_date }}">
                </div>
            </div>
            <div style="background-color: seagreen; color: white; ">
                <p class="lead  section-title">Student Info:</p>
            </div>
            <div class="form-group">
                <label class="col-md-1 control-label"> First Name</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="first_name" value="{{ $student->first_name}}">
                </div>
                <label class="col-md-1 control-label"> Middle Name</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="middle_name" value="{{ $student->middle_name }}">
                </div>
                <label class="col-md-1 control-label"> Last Name</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="last_name" value="{{ $student->last_name }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-1 control-label">National ID</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="national_id" value="{{ $student->national_id }}">
                </div>
                <label class="col-md-1 control-label"> Gender</label>
                <div class="col-md-3">
                    <select class="form-control" name="gender" >
                      <option value="{{$student->gender}}">{{$student->gender}}</option>
                      <option>Male</option>
                      <option>Female</option>
                    </select>
                </div>
                <label class="col-md-1 control-label">Date of Birth</label>
                <div class="col-md-3">
                    <input type="date" class="form-control" placeholder="Y-M-D" name="dob" value="{{ $student->dob }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-1 control-label"> Email </label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="email" value="{{ $student->email}}">
                </div>
                <label class="col-md-1 control-label"> Mobile </label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="mobile" value="{{ $student->mobile}}">
                </div>
                <label class="col-md-1 control-label">Postal Address</label>
                <div class="col-md-3">
                    <textarea class="form-control" name="address">{{ $student->address}}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-1 control-label">County</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="county" value="{{ $student->county}}">
                </div>
                <label class="col-md-1 control-label">Ward</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="ward" value="{{ $student->ward}}">
                </div>
                <label class="col-md-1 control-label">Location</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="location" value="{{ $student->location}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1 control-label">Village</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="village" value="{{ $student->village}}">
                </div>
                <label class="col-md-1 control-label">Disability</label>
                <div class="col-md-3">
                    <textarea name="disability" id="" cols="30" rows="3" class="form-control" >{{$student->disability}}</textarea>
                </div>
                <label class="col-md-1 control-label">Previous School</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="previous_school" value="{{ $student->previous_school}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1 control-label">Mode of Study</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="mode_of_study" value="{{ $student->mode_of_study}}">
                </div>
                <label class="col-md-1 control-label">Sponsorship</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="sponsorship" value="{{ $student->sponsorship}}">
                </div>
                <label class="col-md-1 control-label">Blood Group</label>
                <div class="col-md-3">
                    <select name="blood_group" id="" class="form-control">
                        <option value="{{$student->blood_group}}">{{$student->blood_group}}</option>
                        <option value="A+">A+</option>
                        <option value="O+">O+</option>
                        <option value="B+">B+</option>
                        <option value="AB+">AB+</option>
                        <option value="A-">A-</option>
                        <option value="O-">O-</option>
                        <option value="B-">B-</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Extra-Curricular Activities</label>
                <div class="col-md-3">
                    <textarea name="extra_curicular" id="" cols="30" rows="3" class="form-control">{{$student->extra_curicular}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"> Profile Photo</label>
                <div class="col-md-3">
                    <input type="file" class="form-control" name="photo" value="{{ old('photo') }}">
                </div>
            </div>
            <div style="background-color: seagreen; color: white; ">
                <p class="lead  section-title">Guardian Info:</p>
            </div>
            <div class="form-group">
                <label class="col-md-1 control-label">Parent/Guardian Name</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="parent_name" value="{{ $student->parent_name }}">
                </div>
                <label class="col-md-1 control-label">Parent/Guardian Phone</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="parent_mobile" value="{{ $student->parent_mobile}}">
                </div>
                <label class="col-md-1 control-label"> Parent/Guardian Address</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="parent_address" value="{{ $student->parent_address}}">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-success btn-lg"> Update Student</button>
                </div>
            </div>
        </form>

  </div>

@endsection
