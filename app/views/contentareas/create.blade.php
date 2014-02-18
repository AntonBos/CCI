@extends('layout.admin')
@section('content')
			@if(!$instance->id)
		    {{ Form::model($instance, array('url' => URL::action('ContentAreaController@postStore'))) }}
		    @else
		    {{ Form::model($instance, array('url' => URL::action('ContentAreaController@postUpdate', $instance->id))) }}
		    @endif
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<legend>@if(!$instance->id) Add @else Edit @endif a Content Area</legend>
						<div class="form-group">
							{{ Form::label('name', 'Content Area Name') }}
							{{ $errors->first('name') }}
							{{ Form::text('name', $instance->name, array('class' => 'form-control', 'placeholder' => 'Name of Content Area')) }}
						</div>
						<div class="form-group">
							{{ Form::label('description', 'Content Area Content') }}
							{{ $errors->first('description') }}
							{{ Form::textarea('description', $instance->description, array('id' => 'descriptionTextarea', 'class' => 'form-control', 'placeholder' => 'Content of the Content Area')) }}
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a class="btn btn-default" href="{{ URL::action('ContentAreaController@getIndex') }}">Cancel</a>
						</div>
					</fieldset>
				</div>
			</div>
			{{ Form::close() }}
@endsection