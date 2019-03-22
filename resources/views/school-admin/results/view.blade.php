@extends('school-admin.dashboard')

@section('content')
  <div class="row">
    {{--<div class="col-md-2">--}}
      {{--<ul class="sidebar-menu">--}}
        {{--<li class="header">Student NAVIGATION</li>--}}

        {{--<li>--}}
          {{--<a href="/schooladmin/exams/view">--}}
            {{--<i class="fa fa-tasks"></i> <span>Exam</span>--}}
          {{--</a>--}}
        {{--</li>--}}
        {{--<li>--}}
          {{--<a href="/schooladmin/exam-rules/view">--}}
            {{--<i class="fa fa-tasks"></i> <span>Exam Rule</span>--}}
          {{--</a>--}}
        {{--</li>--}}
        {{--<li>--}}
          {{--<a href="/schooladmin/grades/view">--}}
            {{--<i class="fa fa-tasks"></i> <span>Grading</span>--}}
          {{--</a>--}}
        {{--</li>--}}
      {{--</ul>--}}
    {{--</div>--}}
    <div class="col-md-11">

          @if($units_registered->count() === 0)
            <div class="pull-right">
              <a class="btn btn-success btn-lg btn-flat" href="/schooladmin/unit/registration/{{$student->id}}"
                 onclick="event.preventDefault();
                                  document.getElementById('units-form').submit();">
                Register Units
              </a>

              <form id="units-form" action="/schooladmin/unit/registration/{{$student->id}}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </div>
          @endif

      <table id="example2" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th> ID </th>
          <th> Student Name </th>
          <th> Reg No </th>
          <th> Units </th>
          <th> Entry By </th>
          <th> Action </th>
        </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->first_name}}</td>
            <td>{{$student->reg_no}}</td>
              <td>
                  <table class="table table-bordered table-striped">
                     <thead>
                        <th>The Subject</th>
                        <th>Max Marks</th>
                        <th>Cat Marks</th>
                        <th>End Term Marks</th>
                        <th>Aggregate </th>
                        <th>Grade </th>
                        <th>Submit Marks</th>
                     </thead>
                      <tbody>
                      @foreach( $units_registered as $unit)
                        <tr>
                          <td>{{$unit->unit_name}}</td>
                          <td>{{$unit->unit_score_max}}</td>
                          <form class="" action="/schooladmin/marks/{{ $unit->id }}/submit" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <td>
                            <input type="text" name="unit_score_cat" value="{{ $unit->unit_score_cat }}">
                          </td>
                          <td>
                            <input type="text" name="unit_score_main" value="{{ $unit->unit_score_main }}">
                          </td>
                          <td>{{$unit->unit_score_aggregate}}</td>
                          <td>{{$unit->unit_score_grade}}</td>
                          <td>
                             <button onclick="return confirm('Result Submission. are you sure?')" class="btn btn-skin" type="submit"> <i class="fa fa-edit fa-2x" style="color: forestgreen;"></i> </button>
                          </form>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                  </table>
              </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endsection
