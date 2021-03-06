@extends('layout.admin')
@section('content')
			@if(!$instance->id)
		    {{ Form::model($instance, array('url' => URL::action('ServiceController@postStore'), 'files' => true)) }}
		    @else
		    {{ Form::model($instance, array('url' => URL::action('ServiceController@postUpdate', $instance->id), 'files' => true)) }}
		    @endif
			<div class="row">
				<div class="col-md-6">
					<fieldset>
						<legend>@if(!$instance->id) Add @else Edit @endif a Service</legend>
						<div class="form-group">
							{{ Form::label('name', 'Service Name') }}
							<p class="bg-danger">{{ $errors->first('name') }}</p>
							{{ Form::text('name', $instance->name, array('class' => 'form-control', 'placeholder' => 'Name of Service')) }}
						</div>
						<div class="form-group">
							<?php
							$services = array(0 => 'Top Level Service');

							foreach (Service::all() as $service)
							{
							    $services[] = array($service->id => $service->name);
							}
							?>
							{{ Form::label('service_id', 'Parent Service') }}
							{{ Form::select('service_id', $services, $instance->service_id, array('class' => 'form-control')) }}
						</div>
						<div class="form-group">
							{{ Form::label('hero_image', 'Hero Image') }}
							<p class="bg-danger">{{ $errors->first('hero_image') }}</p>
							{{ Form::file('hero_image'/*, $instance->hero_image*/, array('class' => 'form-control')) }}
						</div>
						<div class="form-group">
							{{ Form::label('short_description', 'Short description of Service') }}
							<p class="bg-danger">{{ $errors->first('short_description') }}</p>
							{{ Form::textarea('short_description', $instance->short_description, array('id' => 'shortDescriptionTextarea', 'class' => 'form-control', 'placeholder' => 'Short description of service')) }}
						</div>
						<div class="form-group">
							{{ Form::label('description', 'Service Content') }}
							<p class="bg-danger">{{ $errors->first('description') }}</p>
							{{ Form::textarea('description', $instance->description, array('id' => 'descriptionTextarea', 'class' => 'form-control', 'placeholder' => 'Content of the service page')) }}
						</div>
						<div class="form-group">
							{{ Form::label('order_by', 'Order By') }}
							<p class="bg-danger">{{ $errors->first('order_by') }}</p>
							{{ Form::text('order_by', $instance->order_by, array('class' => 'form-control', 'placeholder' => 'Order of the service page')) }}
						</div>
						<div class="form-group">
							{{ Form::label('enabled', 'Enabled') }}
							<p class="bg-danger">{{ $errors->first('enabled') }}</p>
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