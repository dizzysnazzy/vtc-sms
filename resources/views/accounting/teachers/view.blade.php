@extends('accounting.dashboard')

@section('content')
    <div class="col-md-10">
      <a class="btn btn-success btn-lg pull-right" href="/countyadmin/teacher/add">add Tutors</a>
        <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th> Email</th>
                <th> Naional ID</th>
                <th> Gender</th>
                <th> Phone</th>
                <th> Address</th>
                <th> Emmployment Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tutors as $tutor)
                <tr>
                  <td>{{$tutor->id}}</td>
                  <td>{{$tutor->first_name}}</td>
                  <td>{{$tutor->last_name}}</td>
                  <td>{{$tutor->email}}</td>
                  <td>{{$tutor->national_id}}</td>
                  <td>{{$tutor->gender}}</td>
                  <td>{{$tutor->phone}}</td>
                  <td>{{$tutor->address}}</td>
                  <td>{{$tutor->created_at->format('l j F Y')}}</td>
                  <td>
                    <form class="delete" action="/countyadmin/tutor/{{ $tutor->id }}/delete" method="post">
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
