@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Course</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('postCourse')}}" method="POST" role="form">

                        	<div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                        		<label for="">Code</label>
                                <input type="text" class="form-control" name="code"  placeholder="Course Code">
                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                        	</div>
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        		<label for="">Course Name</label>
                                <input type="text" class="form-control" name="name"  placeholder="Course Full Name">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                </div>
                            <div class="form-group {{ $errors->has('semester') ? ' has-error' : '' }}">
                                <label for="">Semester</label>
                                <select class="form-control" name="semester">
                                    @foreach($semesters as $semester)
                                        <option value="{{$semester->id}}">{{$semester->name}} ({{$semester->year}})</option>
                                    @endforeach
                                    </select>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
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
