@extends('school-admin.dashboard')

@push('js')
    <script>
        $(function() {
            $('select').selectize({});
        });
    </script>
@endpush
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
        <div class="col-md-8">
            <div class="panel-heading">Exam Rule</div>


            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                  action="/schooladmin/exam-rule/new">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-md-4 control-label"> Grade System</label>
                    <div class="col-md-6">
                        <select name="grades_id" id="select-one">
                            @foreach($grades as $grade)
                                <option value="{{$grade->id}}">{{$grade->grade_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Rule Name</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="exam_rule_name" value="{{ old('exam_rule_name') }}" placeholder="e.g Support Subjects" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Subjects</label>
                    <div class="col-md-6">
                        <select name="subjects_distribution[]" id="" multiple>
                            @foreach($units as $unit)
                                <option value="{{$unit->unit_name}}">{{$unit->unit_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">Register Rule</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
