@extends('layout.frontend')
@section('content')
						<div class="contentHead">
                            <h1>About CCI</h1>
                            <ul>
                            	<?php
                            	foreach($layoutAllAbouts as $layoutAboutItem){

                            		if($layoutAboutItem->slug == $layoutAboutSlug){

                            			$class = 'class="active"';
                            		}else{

                            			$class = '';
                            		}

                            		?><li {{ $class }}><a href="/about/{{ $layoutAboutItem->slug }}">{{ $layoutAboutItem->name }}</a></li><?php
                            	}
                            	?>
                            </ul>
                        </div>

                        <div class="contentBody">

                            <div class="catImage">
                                <h2>{{ $content->name }}</h2>
                                <img src="{{ $content->hero_image }}" alt="">
                            </div>
                            <div class="subCatCont">
                            	<h1>{{ $content->name }}</h1>
                            	{{ $content->description }}
                            </div>
                        </div>

@endsection