@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Semester</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('postSemester')}}" method="POST" role="form">

                        	<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        		<label for="">Name</label>
                                <select name="name" class="form-control">
                                	<option value="1st Semester">1st Semester</option>
                                	<option value="2nd Semester">2nd Semester</option>
                                </select>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        	</div>
                            <div class="form-group {{ $errors->has('year') ? ' has-error' : '' }}">
                        		<label for="">Session Year</label>
                                <input type="text" class="form-control" name="year"  placeholder="Session Year">
                                @if ($errors->has('year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
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
