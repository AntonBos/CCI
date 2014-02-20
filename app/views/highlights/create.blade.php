@extends('layout.admin')
@section('content')
			@if(!$instance->id)
		    {{ Form::model($instance, array('url' => URL::action('HighlightController@postStore'), 'files' => true)) }}
		    @else
		    {{ Form::model($instance, array('url' => URL::action('HighlightController@postUpdate', $instance->id), 'files' => true)) }}
		    @endif
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<legend>@if(!$instance->id) Add @else Edit @endif a Highlight</legend>
						<div class="form-group">
							{{ Form::label('name', 'Highlight Name') }}
							{{ $errors->first('name') }}
							{{ Form::text('name', $instance->name, array('class' => 'form-control', 'placeholder' => 'Name of Highlight')) }}
						</div>
						<div class="form-group">
							{{ Form::label('date', 'Highlight Date') }}
							{{ $errors->first('date') }}
							{{ Form::text('date', $instance->date, array('class' => 'form-control datepicker', 'placeholder' => 'Date of Highlight')) }}
						</div>
						<div class="form-group">
							{{ Form::label('hero_image', 'Hero Image') }}
							{{ $errors->first('hero_image') }}
							{{ Form::file('hero_image', array('class' => 'form-control')) }}
						</div>
						<div class="form-group">
							{{ Form::label('short_description', 'Short description of Highlight') }}
							{{ $errors->first('short_description') }}
							{{ Form::textarea('short_description', $instance->short_description, array('id' => 'shortDescriptionTextarea', 'class' => 'form-control', 'placeholder' => 'Short description of highlight')) }}
						</div>
						<div class="form-group">
							{{ Form::label('description', 'Service Highlight') }}
							{{ $errors->first('description') }}
							{{ Form::textarea('description', $instance->description, array('id' => 'descriptionTextarea', 'class' => 'form-control', 'placeholder' => 'Content of the highlight page')) }}
						</div>
						<div class="form-group">
							{{ Form::label('enabled', 'Enabled') }}
							{{ $errors->first('enabled') }}
							{{ Form::radio('enabled', 1, $instance->enabled); }} Yes
							{{ Form::radio('enabled', 0, !$instance->enabled); }} No
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a class="btn btn-default" href="{{ URL::action('HighlightController@getIndex') }}">Cancel</a>
						</div>
					</fieldset>
				</div>
			</div>
			{{ Form::close() }}
@endsection