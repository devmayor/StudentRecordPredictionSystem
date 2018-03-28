@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Record</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped table-hover">
                        	<thead>
                        		<tr>
                        			<th>Course</th>
                        			<th>Open</th>
                        		</tr>
                        	</thead>
                        	<tbody>
                            @foreach($courses as $course)
                        		<tr>
                        			<td>{{$course->name}} ({{$course->code}})</td>
                        			<td>
                                        <a href="{{route('fillRecords',['course'=>$course->id])}}"><button type="button" class="btn btn-primary">View</button></a>
                                        <a href="{{route('deleteCourse',['id'=>$course->id])}}"><button type="button" class="btn btn-danger" >
                                                Delete Course
                                            </button></a>
                                    </td>

                        		</tr>
                            @endforeach
                        	</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
