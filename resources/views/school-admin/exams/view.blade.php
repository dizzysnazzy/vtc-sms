@extends('school-admin.dashboard')

@section('content')
  <div class="row">
    <div class="col-md-2">
      <ul class="sidebar-menu">
        <li class="header">Student NAVIGATION</li>

        <li>
          <a href="/schooladmin/exams/view">
            <i class="fa fa-tasks"></i> <span>Exam</span>
          </a>
        </li>
        <li>
          <a href="/schooladmin/exam-rules/view">
            <i class="fa fa-tasks"></i> <span>Exam Rule</span>
          </a>
        </li>
        <li>
          <a href="/schooladmin/grades/view">
            <i class="fa fa-tasks"></i> <span>Grading</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="col-md-10">
      <a class="btn btn-success btn-lg pull-right" href="/schooladmin/exam/new">New Exam</a>
      <table id="example2" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th> ID</th>
          <th> Exam Name</th>
          <th> Academic Year</th>
          <th> Exam Period</th>
          <th> Exam Status</th>
          <th> Entry By</th>
          <th> Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($exams as $exam)
          <tr>
            <td>{{$exam->id}}</td>
            <td>{{$exam->exam_name}}</td>
            <td>{{$exam->academic_year}}</td>
            <td>{{$exam->exam_period}}</td>
            <td>{{$exam->exam_status}}</td>
            <td>{{$exam->entry_by}}</td>
            <td> <a href="/schooladmin/exam/{{$exam->id}}"><i class="fa fa-eye fa-2x"></i></a> </td>
            <td> <a href="/schooladmin/exam/{{$exam->id}}/edit"><i class="fa fa-edit fa-2x"></i></a> </td>
            <td>
              <form class="delete" action="/countyadmin/exam/{{ $exam->id }}/delete" method="post">
                <input type="hidden" name="_method" value="delete">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="btn btn-danger" value="Delete">
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
