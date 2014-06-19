@extends('layout.frontend')
@section('content')
						<div class="contentHead">
                            <h1>About CCI</h1>
                        <?php if( !empty($layoutAllAbouts) && count($layoutAllAbouts) >= 1 ) { ?>
                            <ul>
                            <?php foreach( $layoutAllAbouts as $layoutAboutItem ) {
                                if ( $layoutAboutItem->slug == $layoutAboutSlug) {
                                    $class = 'class="active"';
                                } else {
                                    $class = '';
                                } ?>
                                <li {{ $class }}><a href="/about/{{ $layoutAboutItem->slug }}">{{ $layoutAboutItem->name }}</a></li>
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
                                <img src="{{ !empty($content->hero_image) ? /*Image::make(Request::root().$content->hero_image)->crop(1024,240)->encode('png', 75)*/ $content->hero_image : '/imageuploads/cabling-temp.jpg' }}" alt="">
                            </div>
                            <div class="subCatCont">
                                @if($layoutAboutSlug)
                            	<h1>{{ $content->name }}</h1>
                                @endif
                            	{{ $content->description }}
                            </div>
                        </div>

@endsection