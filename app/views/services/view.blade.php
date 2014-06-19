@extends('layout.frontend')
@section('content')
						<div class="contentHead">
                            <h1>Services</h1>
                        <?php if( !empty($layoutAllTopLevelServices) && count($layoutAllTopLevelServices) >= 1 ) { ?>
                            <ul>
                            <?php foreach( $layoutAllTopLevelServices as $layoutServiceItem ) {
                                if ( $layoutServiceItem->slug == $layoutTopLevelServiceSlug) {
                                    $class = 'class="active"';
                                } else {
                                    $class = '';
                                } ?>
                                <li {{ $class }}><a href="/services/{{ $layoutServiceItem->slug }}">{{ $layoutServiceItem->name }}</a></li>
                            <?php } ?>
                            </ul>
                        <?php } else { ?>
                            <ul>
                                <li class="empty-item"><a href="#">&nbsp;</a></li>
                            </ul>
                        <?php } ?>
                        </div>

                        <div class="contentBody">

                            <div class="catImage">
                                @if(!empty($content->hero_image))
                                <img src="{{ $content->hero_image }}" alt="">
                                @elseif(!empty($content->service->hero_image))
                                <img src="{{ $content->service->hero_image }}" alt="">
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
                            <?php

                            ?>
                            <div class="subCatCont">
                                @if($layoutTopLevelService)
                            	<h1>{{ $content->name }}</h1>
                                @endif
                            	{{ $content->description }}
                            </div>
                        </div>

@endsection