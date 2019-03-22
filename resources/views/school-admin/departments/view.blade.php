@extends('school-admin.dashboard')

@section('content')
    <div class="col-md-8">
        <a class="btn btn-success btn-lg pull-right" href="/schooladmin/department/add">New Department</a>
        <table id="example2" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th> Department Name</th>
                <th> Actions </th>
            </tr>
            </thead>
            <tbody>
            @foreach($depts as $dept)
                <tr>
                    <td>{{$dept->id}}</td>
                    <td>{{$dept->dept_name}}</td>
                    <td> <a href="/schooladmin/department/{{$dept->id}}"><i class="fa fa-eye"></i></a> </td>
                    <td> <a href="/schooladmin/department/{{$dept->id}}/edit"><i class="fa fa-edit"></i></a> </td>
                    <td>
                        <form class="deletestu" action="/schooladmin/department/{{ $dept->id }}/delete" method="post">
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
