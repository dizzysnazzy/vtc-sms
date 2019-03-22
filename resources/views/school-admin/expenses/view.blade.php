@extends('schools.dashboard')

@section('content')
    <div class="col-md-6">
      <a class="btn btn-success btn-lg pull-right" href="/schooladmin/expenses/add">Add Expense</a>
        <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Expenditure Name</th>
                <th>Expenditure Amount</th>
                <th>Expenditure Date</th>
                <th>Download PDF</th>
              </tr>
            </thead>
            <tbody>
              @foreach($expenses as $expense)
                <tr>
                  <td>{{$expense->id}}</td>
                  <td>{{$expense->expense_name}}</td>
                  <td>{{$expense->amount}}</td>
                  <td>{{$expense->expense_date}}</td>
                  <td><a href="{{action('ExpenseCtrl@downloadExpense', $expense->id)}}">DownloadPDF</a></td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
@endsection
