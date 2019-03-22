@extends('school-admin.dashboard')

@section('content')

  <div class="col-md-6">
    <div class="panel-heading">Add Expenditure</div>


        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
              action="{{ url('/schooladmin/expenses/add') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-md-4 control-label"> Name of Expense</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="expense_name" value="{{ old('expense_name') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"> Expenditure</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="amount" value="{{ old('amount') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Date of Expenditure</label>
                <div class="col-md-6">
                    <input type="date" class="form-control datepicker" name="expense_date" value="{{ old('expense_date') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Comments/Notes</label>
                <div class="col-md-6">
                    <input type="textarea" class="form-control" name="comments" value="{{ old('comments') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"> Receipt Photo</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="photo" value="{{ old('photo') }}">
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Add Expenditure</button>
                </div>
            </div>
        </form>

  </div>

@endsection
