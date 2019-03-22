@extends('school-admin.dashboard')

@section('content')
    <div class="col-md-10">
      <a class="btn btn-success btn-lg pull-right" href="/schooladmin/unit/new">New Unit</a>
        <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th> Department</th>
                <th> Level</th>
                <th> Tutor</th>
                <th> Course</th>
                <th> Unit Name</th>
                <th> Unit Code</th>
                <th> Unit Status</th>
                <th> Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($units as $unit)
                <tr>
                  <td>{{$unit->id}}</td>
                  <td>{{$unit->departments->dept_name}}</td>
                  <td>{{$unit->levels->level_name}}</td>
                  <td>{{$unit->tutors->first_name}} {{$unit->tutors->last_name}}</td>
                  <td>{{$unit->courses->course_name}}</td>
                  <td>{{$unit->unit_name}}</td>
                  <td>{{$unit->unit_code}}</td>
                  <td>{{$unit->unit_status}}</td>
                  <td> <a href="/schooladmin/unit/{{$unit->id}}"><i class="fa fa-eye fa-2x"></i></a> </td>
                  <td> <a href="/schooladmin/unit/{{$unit->id}}/edit"><i class="fa fa-edit fa-2x"></i></a> </td>
                  <td>
                    <form class="deletestu" action="/schooladmin/unit/{{ $unit->id }}/delete" method="post">
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
