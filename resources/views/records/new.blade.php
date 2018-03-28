@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Record to {{$course->name}}</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('postRecord')}}" method="POST" role="form">

                            <table class="table table-hover">
                            	<thead>
                            		<tr>
                            			<th>NAME</th>
                            			<th>CA(30)</th>
                            			<th>ATTENDANCE(10)</th>
                            			{{--<th>ASSIGNMENT(20)</th>--}}
                            			<th>EXAM(100)</th>
                            		</tr>
                            	</thead>
                            	<tbody>
                                @foreach($students as $student)

                            		<tr>
                            			<td>{{$student->name}} ({{$student->matric_No}})</td>
                            			<td><input type="number" max="30" name="ca_{{$student->id}}" value="{{isset($student->record()->where('course_id',$course->id)->first()->ca)?$student->record()->where('course_id',$course->id)->first()->ca:''}}" class="form-control" required="required" ></td>
                            			<td><input type="number" max="10" name="att_{{$student->id}}" value="{{isset($student->record()->where('course_id',$course->id)->first()->attendance)?$student->record()->where('course_id',$course->id)->first()->attendance:''}}" class="form-control" required="required" ></td>
                            			{{--<td><input type="number" max="20" name="ass_{{$student->id}}" value="{{isset($student->record()->where('course_id',$course->id)->first()->assignment)?$student->record()->where('course_id',$course->id)->first()->assignment:''}}" class="form-control" required="required" ></td>--}}
                            			<td><input type="number" max="100" name="exam_{{$student->id}}" value="{{isset($student->record()->where('course_id',$course->id)->first()->exam)?$student->record()->where('course_id',$course->id)->first()->exam:''}}" class="form-control" required="required" ></td>
                            		</tr>
                                @endforeach
                            	</tbody>
                            </table>

                            <input name="course" value="{{$course->id}}" type="hidden"/>
                    {{csrf_field()}}
<p></p>


                        	<button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
