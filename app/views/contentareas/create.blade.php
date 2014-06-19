@extends('layout.admin')
@section('content')
			@if(!$instance->id)
		    {{ Form::model($instance, array('url' => URL::action('ContentAreaController@postStore'), 'files' => true)) }}
		    @else
		    {{ Form::model($instance, array('url' => URL::action('ContentAreaController@postUpdate', $instance->id), 'files' => true)) }}
		    @endif
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<legend>@if(!$instance->id) Add @else Edit @endif a Content Area</legend>
						<div class="form-group">
							{{ Form::label('name', 'Content Area Name') }}
							<p class="bg-danger">{{ $errors->first('name') }}</p>
							{{ Form::text('name', $instance->name, array('class' => 'form-control', 'placeholder' => 'Name of Content Area')) }}
						</div>
						<div class="form-group">
							<?php
							$types = array('Content Area' => 'Content Area', 'Page' => 'Page');
							?>
							{{ Form::label('type', 'Type of Content Area') }}
							{{ Form::select('type', $types, $instance->type, array('class' => 'form-control')) }}
						</div>
						<div class="form-group">
							{{ Form::label('description', 'Content Area Content') }}
							<p class="bg-danger">{{ $errors->first('description') }}</p>
							{{ Form::textarea('description', $instance->description, array('id' => 'descriptionTextarea', 'class' => 'form-control', 'placeholder' => 'Content of the Content Area')) }}
						</div>
						<div class="form-group">
							{{ Form::label('hero_image', 'Hero Image') }}
							<p class="bg-danger">{{ $errors->first('hero_image') }}</p>
							{{ Form::file('hero_image'/*, $instance->hero_image*/, array('class' => 'form-control')) }}
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