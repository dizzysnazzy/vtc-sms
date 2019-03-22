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
        <div class="col-md-8">
            <div class="panel-heading">Examination Entry</div>


            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
                  action="/schooladmin/exam/new">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-md-4 control-label"> Exam Name</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="exam_name" value="{{ old('exam_name') }}" placeholder="e.g End Term/2019" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Exam Period</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="exam_period" value="{{ old('exam_period') }}" placeholder="term/year" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Exam Status</label>
                    <div class="col-md-6">
                        <select name="exam_status" id="" class="form-control">
                            <option value="pending">Pending</option>
                            <option value="in-progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">Register Exam</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
