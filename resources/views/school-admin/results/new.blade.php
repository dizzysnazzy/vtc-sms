@extends('school-admin.dashboard')

@section('content')
    <div class="col-md-10">
        <table id="listDataTableWithSearch" class="table table-bordered table-striped list_view_table display responsive no-wrap">
            <thead>
            <tr>
                <th> ID</th>
                <th> Admission Number</th>
                <th> Student Name</th>
                <th> Gender</th>
                <th> Actions </th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->reg_no}}</td>
                    <td>{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</td>
                    <td>{{$student->gender}}</td>
                    <td> <a onclick="return confirm('Result Submission. are you sure?')" href="/schooladmin/result/{{$student->id}}/entry"><i class="fa fa-edit"></i></a> </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
