@extends('school-admin.dashboard')

@section('content')
    <div class="col-md-10">
      <a class="btn btn-success btn-lg pull-right" href="/schooladmin/students/enroll">Enroll Student</a>
      <a class="btn btn-success btn-lg pull-left" href="{{action('StudentCtrl@downloadStudents')}}">DownloadPDF</a>
        <table id="listDataTableWithSearch" class="table table-bordered table-striped list_view_table display responsive no-wrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Img</th>
                <th> Admission Number</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th> Gender</th>
                <th> DOB</th>
                <th> Email</th>
                <th> Naional ID</th>
                <th> Phone</th>
                <th> Address</th>
                <th> Actions </th>
              </tr>
            </thead>
            <tbody>
              @foreach($students as $student)
                <tr>
                  <td>{{$student->id}}</td>
                  <td><img src="/students/{{$student->photo}}" width="50px"> </td>
                  <td>{{$student->reg_no}}</td>
                  <td>{{$student->first_name}}</td>
                  <td>{{$student->middle_name}}</td>
                  <td>{{$student->last_name}}</td>
                  <td>{{$student->gender}}</td>
                  <td>{{$student->dob}}</td>
                  <td>{{$student->email}}</td>
                  <td>{{$student->national_id}}</td>
                  <td>{{$student->mobile}}</td>
                  <td>{{$student->address}}</td>
                  <td> <a href="/schooladmin/student/{{$student->id}}"><i class="fa fa-eye"></i></a> </td>
                  <td> <a onclick="return confirm('Edit button. are you sure?')" href="/schooladmin/student/{{$student->id}}/edit"><i class="fa fa-edit"></i></a> </td>
                  <td>
                    <form class="deletestu" action="/schooladmin/students/{{ $student->id }}/delete" method="post">
                      <input type="hidden" name="_method" value="delete">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button class="btn" type="submit"> <i class="fa fa-trash" style="color: #f20000;"></i> </button>
                    </form>
                  </td>

                </tr>
              @endforeach
            </tbody>
        </table>
      {{ $students->links() }}
    </div>

@endsection
