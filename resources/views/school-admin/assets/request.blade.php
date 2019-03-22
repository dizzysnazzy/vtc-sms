@extends('schools.dashboard')

@section('content')

  <div class="col-md-6">
    <div class="panel-heading">Asset Acquisition Request</div>


        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
              action="{{ url('/schooladmin/assets/request') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-md-4 control-label"> Name of Asset</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="asset_name" value="{{ old('asset_name') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"> Type of Asset</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="asset_type" value="{{ old('asset_type') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Price Estimate</label>
                <div class="col-md-6">
                    <input type="text" class="form-control datepicker" name="price" value="{{ old('price') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Manufacturer</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="manufacturer" value="{{ old('manufacturer') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"> State of Asset</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="state" value="{{ old('state') }}">
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Place Request</button>
                </div>
            </div>
        </form>

  </div>

@endsection
