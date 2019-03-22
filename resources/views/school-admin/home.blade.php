@extends('school-admin.dashboard')

@section('content')
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{$depts->count()}}</h3>

        <p>Departments</p>
      </div>
      <div class="icon">
        <i class="fa fa-tasks"></i>
      </div>
      <a href="/schooladmin/departments/view" class="small-box-footer">Add More <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{$students->count()}}</h3>

        <p>Stundents</p>
      </div>
      <div class="icon">
        <i class="fa fa-graduation-cap"></i>
      </div>
      <a href="/schooladmin/students/view" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{$tutors->count()}}</h3>

        <p>Tutors</p>
      </div>
      <div class="icon">
        <i class="fa fa-user"></i>
      </div>
      <a href="/schooladmin/tutors/view" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{$expenses}}</h3>

        <p>Institute Expenses</p>
      </div>
      <div class="icon">
        <i class="ion ion-cash"></i>
      </div>
      <a href="/schooladmin/expenses/view" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
<hr>
<div class="row">
  <div class="col-md-4">
  </div>
  <div class="col-md-4">
    {!! $chart->container() !!}
  </div>

</div>
  @push('js')
    {!! $chart->script() !!}
  @endpush
@endsection
