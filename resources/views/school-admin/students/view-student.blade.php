@extends('school-admin.dashboard')

@section('content')
  <div class="row">
    <div class="col-md-2">
      <ul class="sidebar-menu">
        <li class="header">Student NAVIGATION</li>

        <li>
          <a href="/schooladmin/student/exams">
            <i class="fa fa-tasks"></i> <span>Performance</span>
          </a>
        </li>
        <li>
          <a href="/schooladmin/student/exams">
            <i class="fa fa-tasks"></i> <span>Finance</span>
          </a>
        </li>
        <li>
          <a href="/schooladmin/student/exams">
            <i class="fa fa-tasks"></i> <span>Reports</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="col-md-8">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#student" data-toggle="tab">Student Profile</a></li>
          <li><a href="#marks" data-toggle="tab">Exams</a></li>
          <li><a href="#invoice" data-toggle="tab">Invoice</a></li>
          <li><a href="#payment" data-toggle="tab">Payment</a></li>
        </ul>
      </div>
      <div class="tab-content">
        <div class="tab-pane active" id="student">
          <img src="/students/{{$student->photo}}" style="border-radius: 50%;" width="150px">
          <p class="text-info" style="font-size: 16px;border-bottom: 1px solid #eee;">Personal Info:</p>
          <div class="row">
            <div class="col-md-3">
              <label for="">Full Name</label>
            </div>
            <div class="col-md-3">
              <p for="">: {{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</p>
            </div>
            <div class="col-md-3">
              <label for="">Date of Birth</label>
            </div>
            <div class="col-md-3">
              <p for="">: {{$student->dob}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <label for="">Gender</label>
            </div>
            <div class="col-md-3">
              <p for="">: {{$student->gender}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <label for="">Blood Group</label>
            </div>
            <div class="col-md-3">
              <p for="">: {{$student->blood_group}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <label for="">Email</label>
            </div>
            <div class="col-md-3">
              <p for="">: {{$student->email}}</p>
            </div>
            <div class="col-md-3">
              <label for="">Phone No.</label>
            </div>
            <div class="col-md-3">
              <p for="">: {{$student->mobile}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <label for="">Extra Curricular Activities </label>
            </div>
            <div class="col-md-3">
              <p for="">: {{$student->extra_curicular}}</p>
            </div>
            <div class="col-md-3">
              <label for="">Sponsorship</label>
            </div>
            <div class="col-md-3">
              <p for="">: {{$student->sponsorship}}</p>
            </div>
          </div>
          <p class="text-info" style="font-size: 16px;border-bottom: 1px solid #eee;">Parents Info:</p>
          <div class="row">
            <div class="col-md-3">
              <label for="">Guardian Name </label>
            </div>
            <div class="col-md-3">
              <p for="">: {{$student->parent_name}}</p>
            </div>
            <div class="col-md-3">
              <label for="">Guardian Phone No.</label>
            </div>
            <div class="col-md-3">
              <p for="">: {{$student->parent_mobile}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <label for="">Address </label>
            </div>
            <div class="col-md-3">
              <p for="">: {{$student->mobile}}</p>
            </div>
            <div class="col-md-3">
              <label for="">Permanent Address</label>
            </div>
            <div class="col-md-3">
              <p for="">: {{$student->address}}</p>
            </div>
          </div>
          <p class="text-info" style="font-size: 16px;border-bottom: 1px solid #eee;">Academic Info:</p>
          <div class="row">
            <div class="col-md-3">
              <label for="">Academic Year</label>
            </div>
            <div class="col-md-3">
              <p for="">: {{\Carbon\Carbon::now()->format('Y')}}</p>
            </div>
            <div class="col-md-3">
              <label for="">Registraton No </label>
            </div>
            <div class="col-md-3">
              <p for="">: {{$student->reg_no}}</p>
            </div>

          </div>
          <div class="row">
            <div class="col-md-3">
              <label for="">Department</label>
            </div>
            <div class="col-md-3">
              <p for="">: {{$student->classes->course_name}}</p>
            </div>
            <div class="col-md-3">
              <label for="">Level </label>
            </div>
            <div class="col-md-3">
              <p for="">: {{$student->levels->level_name}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <label for="">Mode of Study</label>
            </div>
            <div class="col-md-3">
              <p for="">: {{$student->mode_of_study}}</p>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="marks">
          <a class="btn btn-success btn-lg pull-right" href="#">
            <form class="form" enctype="multipart/form-data" action="/schooladmin/exam/submit/{{$student->id}}" method="post">
              {{ csrf_field() }}
              <input type="file" name="solution" value="" placeholder="Upload solution">
              <input type="submit" class="btn btn-primary" value="Submit">
            </form>
          </a>
          <a class="btn btn-success btn-lg pull-left" href="/schooladmin/examination/{{$student->id}}/entry">Exam Entry</a>
          <br><br><hr style="border-right: 1px solid #F20000;"></hr>

          <div class="col-md-10">
            <h4> <span class="badge custom-badge pull-left">Exam Details</span> </h4>
            <table class="table table-bordered table-striped">
              <thead>
              <th>ID</th>
              <th>Unit Name</th>
              <th>Unit Code</th>
              <th>Term</th>
              <th>Cat</th>
              <th>End Term Score</th>
              <th>Average</th>
              </thead>
              <tbody>
              
            </table>
          </div>
          <p class="imondfont" align="justify">

          </p>
        </div>

      </div>

    </div>
  </div>
@endsection
