@extends('accounting.dashboard')

@section('content')
<div class="col-md-6">
  <div class="panel-heading">Update School Details</div>


      <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
            action="/county/school/{{$school->id }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="PUT">

          <div class="form-group">
              <label class="col-md-4 control-label">VTC Name</label>
              <div class="col-md-6">
                  <input type="text" class="form-control" name="name" value="{{ $school->name }}">
              </div>
          </div>

          <div class="form-group">
              <label class="col-md-4 control-label">VTC Email</label>
              <div class="col-md-6">
                  <input type="text" class="form-control" name="email" value="{{ $school->email }}">
              </div>
          </div>

          <div class="form-group">
              <label class="col-md-4 control-label">VTC Location</label>
              <div class="col-md-6">
                  <input type="text" class="form-control" name="location" value="{{ $school->location }}">
              </div>
          </div>


          <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">Update Entry</button>
              </div>
          </div>
      </form>

</div>
@endsection
