@extends('accounting.dashboard')

@section('content')
    <div class="">
      <div class="">
        <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>School Registration</th>
                <th>School Name</th>
                <th>School Email</th>
                <th>Location</th>
                <th>EDIT</th>
                <th>Deregister</th>
              </tr>
            </thead>
            <tbody>
              @foreach($schools as $school)
                <tr>
                  <td>{{$school->id}}</td>
                  <td>{{$school->registration}}</td>
                  <td>{{$school->name}}</td>
                  <td>{{$school->email}}</td>
                  <td>{{$school->location}}</td>
                  <td><a class="btn btn-primary" href="/county/school/{{$school->id}}">Edit</a></td>
                  <td>
                    <form class="delete" action="/county/school/{{ $school->id }}" method="post">
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
