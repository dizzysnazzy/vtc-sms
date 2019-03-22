@extends('schools.dashboard')

@section('content')
    <div class="col-md-6">
      <a class="btn btn-success btn-lg pull-right" href="/schooladmin/expenses/add">Add Expense</a>
        <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Asset Name</th>
                <th>Asset Type</th>
                <th>Estimated Price</th>
                <th>Manufacturer</th>
                <th>State</th>
                <th>Status</th>

              </tr>
            </thead>
            <tbody>
              @foreach($assets as $asset)
                <tr>
                  <td>{{$asset->id}}</td>
                  <td>{{$asset->asset_name}}</td>
                  <td>{{$asset->amount}}</td>
                  <td>{{$asset->expense_date}}</td>
                  <td>
                    <form class="delete" action="/schooladmin/{{ $expense->id }}" method="post">
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
