@extends('layout.admin')
@section('content')
			@if(!$instance->id)
		    {{ Form::model($instance, array('url' => URL::action('UserController@postStore'))) }}
		    @else
		    {{ Form::model($instance, array('url' => URL::action('UserController@postUpdate', $instance->id))) }}
		    @endif
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<legend>@if(!$instance->id) Add @else Edit @endif a User</legend>
						<div class="form-group">
							{{ Form::label('email', 'Email address') }}
							{{ $errors->first('email') }}
							<div class="input-group">
								<span class="input-group-addon">@</span>
								{{ Form::email('email', $instance->email, array('class' => 'form-control', 'placeholder' => 'Email address')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('first_name', 'First Name') }}
							{{ $errors->first('first_name') }}
							{{ Form::text('first_name', $instance->first_name, array('class' => 'form-control', 'placeholder' => 'First Name')) }}
						</div>
						<div class="form-group">
							{{ Form::label('last_name', 'Last Name') }}
							{{ $errors->first('last_name') }}
							{{ Form::text('last_name', $instance->last_name, array('class' => 'form-control', 'placeholder' => 'Last Name')) }}
						</div>
						<div class="form-group" id="PasswordContainer">
							<label for="password">Password</label>
							{{ $errors->first('password') }}
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" />
							<br />
							<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" />
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a class="btn btn-default" href="{{ URL::action('UserController@getIndex') }}">Cancel</a>
						</div>
					</fieldset>
				</div>
			</div>
			{{ Form::close() }}
@endsection