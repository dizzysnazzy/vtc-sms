@extends('school-admin.dashboard')

@section('content')
  <div class="row">
    <div class="col-md-2">
      <ul class="sidebar-menu">
        <li class="header">Student NAVIGATION</li>

        <li>
          <a href="/schooladmin/exams/view">
            <i class="fa fa-tasks"></i> <span>Exam</span>
          </a>
        </li>
        <li>
          <a href="/schooladmin/exam-rules/view">
            <i class="fa fa-tasks"></i> <span>Exam Rule</span>
          </a>
        </li>
        <li>
          <a href="/schooladmin/grades/view">
            <i class="fa fa-tasks"></i> <span>Grading</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="col-md-10">
      <a class="btn btn-success btn-lg pull-right" href="/schooladmin/exam-rule/new">New Exam Rule</a>
      <table id="example2" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th> ID</th>
          <th> Exam Rule Name</th>
          <th> Subjects</th>
          <th> Marks Dist</th>
          <th> Entry By</th>
          <th> Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rules as $exam)
          <tr>
            <td>{{$exam->id}}</td>
            <td>{{$exam->exam_rule_name}}</td>
              <td>
                <form class="update" action="/schooladmin/exam-rule/{{ $exam->id }}/edit" method="post">
                  <input type="hidden" name="_method" value="put">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <table class="table table-bordered table-striped">
                      <thead>
                      <th>The Subject</th>
                      <th>Marks Dist</th>
                      </thead>
                      <tbody>
                      @php
                        $rules = array_values($exam->subjects_distribution);
                        $dat = json_encode($rules);
                        $rules = json_decode($dat);
                      @endphp
                      @foreach( $rules as $rule)
                        <tr>
                          <td>{{$rule->subject}}</td>
                          <td>
                            <input type="text" name="mark_distribution[]" value="{{ $rule->mark }}">
                          </td>
                        </tr>

                      @endforeach
                      </tbody>
                    </table>
              </td>
            <td>{{$exam->exam_period}}</td>
            <td>{{$exam->exam_status}}</td>
            <td>{{$exam->entry_by}}</td>
            <td> <a href="/schooladmin/exam/{{$exam->id}}"><i class="fa fa-eye fa-2x"></i></a> </td>
            <td> <button class="btn" type="submit"> <i class="fa fa-edit fa-2x" style="color: forestgreen;"></i> </button> </td>
            </form>
            <td>
              <form class="delete" action="/countyadmin/exam/{{ $exam->id }}/delete" method="post">
                <input type="hidden" name="_method" value="delete">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class="btn" type="submit"> <i class="fa fa-trash fa-2x" style="color: #f20000;"></i> </button>

              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
