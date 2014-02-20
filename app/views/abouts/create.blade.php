@extends('layout.admin')
@section('content')
			@if(!$instance->id)
		    {{ Form::model($instance, array('url' => URL::action('AboutController@postStore'), 'files' => true)) }}
		    @else
		    {{ Form::model($instance, array('url' => URL::action('AboutController@postUpdate', $instance->id), 'files' => true)) }}
		    @endif
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<legend>@if(!$instance->id) Add @else Edit @endif an About Page</legend>
						<div class="form-group">
							{{ Form::label('name', 'About Page Name') }}
							{{ $errors->first('name') }}
							{{ Form::text('name', $instance->name, array('class' => 'form-control', 'placeholder' => 'Name of About Page')) }}
						</div>
						<!--<div class="form-group">
							<?php
							$abouts = array(0 => 'Top Level About Page');

							foreach (About::all() as $about)
							{
							    $abouts[] = array($about->id => $about->name);
							}
							?>
							{{ Form::label('about_id', 'Parent About Page') }}
							{{ Form::select('about_id', $abouts, $instance->about_id, array('class' => 'form-control')) }}
						</div>-->
						<div class="form-group">
							{{ Form::label('hero_image', 'Hero Image') }}
							{{ $errors->first('hero_image') }}
							{{ Form::file('hero_image'/*, $instance->hero_image*/, array('class' => 'form-control')) }}
						</div>
						<div class="form-group">
							{{ Form::label('description', 'About Page Content') }}
							{{ $errors->first('description') }}
							{{ Form::textarea('description', $instance->description, array('id' => 'descriptionTextarea', 'class' => 'form-control', 'placeholder' => 'Content of the service page')) }}
						</div>
						<div class="form-group">
							{{ Form::label('enabled', 'Enabled') }}
							{{ $errors->first('enabled') }}
							{{ Form::radio('enabled', 1, $instance->enabled); }} Yes
							{{ Form::radio('enabled', 0, !$instance->enabled); }} No
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a class="btn btn-default" href="{{ URL::action('ServiceController@getIndex') }}">Cancel</a>
						</div>
					</fieldset>
				</div>
			</div>
			{{ Form::close() }}
@endsection