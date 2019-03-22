@extends('school-admin.dashboard')

@section('content')
    <div class="col-md-8">
      <a class="btn btn-success btn-lg pull-right" href="/schooladmin/course/new">New Course</a>
        <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th> Department</th>
                <th> Course Name</th>
                <th> Course Code</th>
                <th> Course Duration</th>
              </tr>
            </thead>
            <tbody>
              @foreach($courses as $course)
                <tr>
                  <td>{{$course->id}}</td>
                  <td>{{$course->departments->dept_name}}</td>
                  <td>{{$course->course_name}}</td>
                  <td>{{$course->course_code}}</td>
                  <td>{{$course->course_period}}</td>
                  <td>
                    <form class="deletestu" action="/schooladmin/course/{{ $course->id }}/delete" method="post">
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
@endsection
