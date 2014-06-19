@extends('layout.admin')
@section('content')
			@if(!$instance->id)
		    {{ Form::model($instance, array('url' => URL::action('LogoController@postStore'), 'files' => true)) }}
		    @else
		    {{ Form::model($instance, array('url' => URL::action('LogoController@postUpdate', $instance->id), 'files' => true)) }}
		    @endif
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<legend>@if(!$instance->id) Add @else Edit @endif a Logo</legend>
						
						<div class="form-group">
							{{ Form::label('filename', 'Logo Image') }}
							<p class="bg-danger">{{ $errors->first('filename') }}</p>
							{{ Form::file('filename', array('class' => 'form-control')) }}
						</div>
						<div class="form-group">
							{{ Form::label('order_by', 'Order By') }}
							<p class="bg-danger">{{ $errors->first('order_by') }}</p>
							{{ Form::text('order_by', $instance->order_by, array('class' => 'form-control', 'placeholder' => 'Order of the service page')) }}
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a class="btn btn-default" href="{{ URL::action('LogoController@getIndex') }}">Cancel</a>
						</div>
					</fieldset>
				</div>
			</div>
			{{ Form::close() }}
@endsection