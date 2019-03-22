@extends('system.dashboard')

@section('content')
<div class="col-lg-8 col-md-8">
  <h3>Users with Roles</h3>
  <table class="table">
    <thead class="imondblack">
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email Address</th>
        <th>User Role</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
        <tr>
          <td>{{ $user->first_name }}</td>
          <td>{{ $user->last_name }}</td>
          <td>{{ $user->email }}</td>
          @foreach($user->roles as $role)
            <td>{{ $role->name }} Admin</td>
          @endforeach
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div class="col-lg-4 col-md-4">

</div>
@endsection
