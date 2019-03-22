@extends('school-admin.dashboard')

@section('content')
    <div class="col-md-8">
        <a class="btn btn-success btn-lg pull-right" href="/schooladmin/level/add">New Level</a>
        <table id="example2" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th> Level Name</th>
                <th> Level Code</th>
                <th> Actions </th>
            </tr>
            </thead>
            <tbody>
            @foreach($levels as $level)
                <tr>
                    <td>{{$level->id}}</td>
                    <td>{{$level->level_name}}</td>
                    <td>{{$level->level_code}}</td>
                    <td> <a href="/schooladmin/level/{{$level->id}}"><i class="fa fa-eye"></i></a> </td>
                    <td> <a href="/schooladmin/level/{{$level->id}}/edit"><i class="fa fa-edit"></i></a> </td>
                    <td>
                        <form class="deletestu" action="/schooladmin/level/{{ $level->id }}/delete" method="post">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-info" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
