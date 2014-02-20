@extends('layout.frontend')
@section('content')
						<div class="contentHead">
                            <h1>Services</h1>
                            <ul>
                            	<?php
                            	foreach($layoutAllTopLevelServices as $layoutServiceItem){

                            		if($layoutServiceItem->slug == $layoutTopLevelServiceSlug){

                            			$class = 'class="active"';
                            		}else{

                            			$class = '';
                            		}

                            		?><li {{ $class }}><a href="/services/{{ $layoutServiceItem->slug }}">{{ $layoutServiceItem->name }}</a></li><?php
                            	}
                            	?>
                            </ul>
                        </div>

                        <div class="contentBody">

                            <div class="catImage">
                                <h2>{{ $content->name }}</h2>
                                <img src="{{ !empty($content->hero_image) ? $content->hero_image : $content->service->hero_image }}" alt="">
                            </div>
                            @if(!empty($layoutSubServices))
                            <div class="subCatNav">
                                <ul>
                                <?php
                            	foreach($layoutSubServices as $layoutServiceItem){

                            		if($layoutServiceItem->slug == $layoutSubServiceSlug){

                            			$class = 'class="active"';
                            		}else{

                            			$class = '';
                            		}

                            		?><li {{ $class }}><a href="/services/{{ $layoutTopLevelService->slug }}/{{ $layoutServiceItem->slug }}">{{ $layoutServiceItem->name }}</a></li><?php
                            	}
                            	?>
                                </ul>
                            </div>
                            @endif
                            <div class="subCatCont">
                            	<h1>{{ $content->name }}</h1>
                            	{{ $content->description }}
                            </div>
                        </div>

@endsection