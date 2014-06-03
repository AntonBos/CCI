@extends('layout.frontend')
@section('content')
						<div class="contentHead">
                            <h1>{{ $content->name }}</h1>
                            <ul>
                                <li class="empty-item"><a href="#">&nbsp;</a></li>
                            </ul>
                        </div>

                        <div class="contentBody">

                            <div class="catImage">
                                @if(!empty($content->hero_image))
                                <img src="{{ $content->hero_image }}" alt="">
                                @endif
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