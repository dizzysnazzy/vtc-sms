@extends('accounting.dashboard')

@section('content')
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{$students->count()}}</h3>

        <p>Students</p>
      </div>
      <div class="icon">
        <i class="ion ion-home"></i>
      </div>
      <a href="/county/schools/view" class="small-box-footer">Add More <i class="fa fa-arrow-circle-right"></i></a>
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
        <i class="ion ion-university"></i>
      </div>
      <a href="/countyadmin/students/view" class="small-box-footer">Add More <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-blue">
      <div class="inner">
        <h3>{{$tutors->count()}}</h3>

        <p>Tutors</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-people"></i>
      </div>
      <a href="/countyadmin/tutors/view" class="small-box-footer">Add More <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>{{$expenses}}</h3>

        <p>Total VTC Expenditure</p>
      </div>
      <div class="icon">
        <i class="ion ion-cash"></i>
      </div>
      <a href="/countyadmin/expenses/viewall" class="small-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
<hr>
<div class="row">
  <div class="col-md-4">
  </div>
  <div class="col-md-4">
  </div>

  <div class="col-md-4">
  </div>

</div>
@endsection
