@extends('accounting.dashboard')

@section('content')
    <div class="col-md-8">
      <!-- <a class="btn btn-success btn-lg pull-right" href="/schooladmin/students/enroll">Enroll Student</a> -->
        <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th> School</th>
                <th> Expenditure Name</th>
                <th> Amount</th>
                <th> Date</th>
                <th> Comments</th>
                <th> Purge</th>

              </tr>
            </thead>
            <tbody>
              @foreach($schools as $school)
                @foreach($school->expenses as $expense )
                <tr>
                  <td>{{$expense->id}}</td>
                  <td>{{$school->name}}</td>
                  <td>{{$expense->expense_name}}</td>
                  <td>{{$expense->amount}}</td>
                  <td>{{$expense->expense_date}}</td>
                  <td>{{$expense->comments}}</td>
                  <td>
                    <form class="deletexp" action="/countyadmin/expense/{{ $expense->id }}/delete" method="post">
                      <input type="hidden" name="_method" value="delete">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                  </td>
                </tr>
                @endforeach
              @endforeach
            </tbody>
        </table>
    </div>
@endsection
