@extends('school-admin.dashboard')

@section('content')

    <div class="col-md-6">
        <div class="panel-heading"><h2>Update Unit</h2></div>


        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
              action="/schooladmin/unit/{{$unit->id}}/edit">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group">
                <label class="col-md-4 control-label"> Department </label>
                <div class="col-md-6">
                    <select class="form-control" name="departments_id">
                        <option class="form-control" value="{{ $unit->departments_id }}">{{ $unit->departments->dept_name }}</option>
                        @foreach($departments as $dept)
                            <option class="form-control" value="{{ $dept->id }}">{{ $dept->dept_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"> Level </label>
                <div class="col-md-6">
                    <select class="form-control" name="levels_id">
                        <option class="form-control" value="{{ $unit->levels_id }}">{{ $unit->levels->level_name }}/{{ $unit->levels->level_code }}</option>
                        @foreach($levels as $level)
                            <option class="form-control" value="{{ $level->id }}">{{ $level->level_name }}/{{ $level->level_code }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"> Tutor </label>
                <div class="col-md-6">
                    <select class="form-control" name="tutors_id">
                        <option class="form-control" value="{{ $unit->tutors_id }}">{{ $unit->tutors->first_name }} {{ $unit->tutors->last_name }}</option>
                        @foreach($tutors as $tutor)
                            <option class="form-control" value="{{ $tutor->id }}">{{ $tutor->first_name }} {{ $tutor->last_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"> Course </label>
                <div class="col-md-6">
                    <select class="form-control" name="courses_id">
                        <option class="form-control" value="{{ $unit->courses_id }}">{{ $unit->courses->course_name }}</option>
                        @foreach($courses as $course)
                            <option class="form-control" value="{{ $course->id }}">{{ $course->course_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Unit Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="unit_name" value="{{ $unit->unit_name }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Unit Code</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="unit_code" value="{{ $unit->unit_code}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Unit Score Max</label>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="unit_score_max" value="{{ $unit->unit_score_max }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Unit Status</label>
                <div class="col-md-6">
                    <select name="unit_status" id="" class="form-control">
                        <option value="{{$unit->unit_status}}">{{$unit->unit_status}}</option>
                        <option value="combined">Combined</option>
                        <option value="single">Single</option>
                    </select>
                </div>
            </div>

                <div class="form-group">
                    <label class="col-md-4 control-label"> Combined To </label>
                    <div class="col-md-6">
                        <select class="form-control" name="combined_subjects_id">
                            @if($unit->unit_status == 'combined')
                            <option class="form-control" value="{{ $unit->combined_subjects_id }}">{{ $unit->combined_subjects->combined_name }}</option>
                            @endif
                            @foreach($subjects as $subject)
                                <option class="form-control" value="{{ $subject->id }}">{{ $subject->combined_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Update Unit</button>
                </div>
            </div>
        </form>

    </div>

@endsection
