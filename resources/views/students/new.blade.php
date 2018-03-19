@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Student</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('postStudent')}}" method="POST" role="form">

                        	<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        		<label for="">Name</label>
                        		<input type="text" class="form-control" name="name"  placeholder="Name">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        	</div>
                            <div class="form-group {{ $errors->has('matric') ? ' has-error' : '' }}">
                        		<label for="">Matric No</label>
                        		<div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3">CAND</span>
                                    <input type="number" value="0{{$no+1}}" name="matric" class="form-control" id="basic-url" aria-describedby="basic-addon3">

                                </div>
                                @if ($errors->has('matric'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('matric') }}</strong>
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
