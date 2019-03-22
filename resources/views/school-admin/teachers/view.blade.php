@extends('school-admin.dashboard')

@section('content')
    <div class="col-md-10">
      <a class="btn btn-success btn-lg pull-right" href="/schooladmin/tutor/add">Add Tutor</a>
        <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tutor Img</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th> Email</th>
                <th> Naional ID</th>
                <th> Gender</th>
                <th> Phone</th>
                <th> Address</th>
                <th> Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tutors as $tutor)
                <tr>
                  <td>{{$tutor->id}}</td>
                  <td><img src="/photo/{{$tutor->photo}}" width="50px" style="border-radius: 50%;"> </td>
                  <td>{{$tutor->first_name}}</td>
                  <td>{{$tutor->last_name}}</td>
                  <td>{{$tutor->email}}</td>
                  <td>{{$tutor->national_id}}</td>
                  <td>{{$tutor->gender}}</td>
                  <td>{{$tutor->phone}}</td>
                  <td>{{$tutor->address}}</td>
                  <td> <a href="/schooladmin/tutor/{{$tutor->id}}"><i class="fa fa-eye fa-2x"></i></a> </td>
                  <td> <a href="/schooladmin/tutor/{{$tutor->id}}/edit"><i class="fa fa-edit fa-2x"></i></a> </td>
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
