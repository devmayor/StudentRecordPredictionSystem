@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Records</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                    <table class="table table-striped table-hover">
                    	<thead>
                    		<tr>
                    			<th>Student</th>
                                @foreach($courses as $course)
                    			    <th>{{$course->code}}</th>
                                @endforeach
                    		</tr>
                    	</thead>
                    	<tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{$student->name}} ({{$student->matric_No}})</td>
                                    @foreach($courses as $course)
                                        <th>{{isset($course->record()->where('matric_id',$student->id)->first()->total)?$course->record()->where('matric_id',$student->id)->first()->total:0}}</th>
                                    @endforeach
                                    <td>
                                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal{{$student->id}}">
                                            Predict
                                        </button>
                                    </td>
                                </tr>

                            @endforeach

                    	</tbody>
                    </table>

                            <!-- Modal -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach($students as $student)
    <!-- Modal -->
    <div class="modal fade" id="myModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('predict',['student'=>$student->id])}}" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">New Course Prediction</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">CA</label>
                            <input type="number" required="required" class="form-control" name="ca" max="40">
                        </div>
                        <div class="form-group">
                            <label for="">Assignment</label>
                            <input type="number" required="required" class="form-control" name="ass" max="20">
                        </div>
                        <div class="form-group">
                            <label for="">Attendance</label>
                            <input type="number" required="required" class="form-control" name="att"max="10" >
                        </div>
                {{csrf_field()}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@endsection
