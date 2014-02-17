@extends('layout.login')

@section('content')
		<div class="content">
            <div class="container">
                <div class="row noShadow">
                    <div class="col4">&nbsp;</div>
                    <div class="col4">
                        <h2>Administrator Login</h2>
                    {{ Form::open(array('url' => '/login')) }}
                        <div class="form-group">
                            {{ Form::label('email', 'E-Mail Address') }}
                            {{ Form::text('email', Input::old('email'), array('class'=>'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'Password') }}
                            {{ Form::password('password', array('class'=>'form-control')) }}
                        </div>
                    @if(Session::has('message'))
                        <div class="msg msg-alert">{{ Session::get('message') }}</div>
                    @endif
                        {{ Form::submit('Log In', array('class'=>'button button-primary')) }}
                    {{ Form::close() }}
                    </div>
                    <div class="col4">&nbsp;</div>
                </div>
            </div>
        </div>
@endsection