@extends('layouts.app')

@section('content')
<div class="">
  <form class="form-horizontal" action="/send" method="post">
    {{csrf_field()}}

    <div class="form-group">
      <label>Name</label>
      <div class="">
        <input type="text" name="name" value="">
      </div>
    </div>

    <div class="form-group">
      <label>Mobile</label>
      <div class="">
        <input type="text" name="mobile" value="">
      </div>
    </div>

    <button type="submit" class="btn btn-primary" name="Send">Send</button>

  </form>
</div>
@endsection
