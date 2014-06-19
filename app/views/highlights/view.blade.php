@extends('layout.frontend')
@section('content')
						<div class="contentHead">
                            <h1>News</h1>
                            <ul>
                                <li class="empty-item"><a href="#">&nbsp;</a></li>
                            </ul>
                        </div>

                        <div class="contentBody">

                            <div class="catImage"></div>
                            <div class="subCatCont">
                            	<h1>{{ $content->name }}</h1>
                                <time>{{ date('j F Y', strtotime($content->date)) }}</time>
                                @if(!empty($content->hero_image))
                                <p>
                                    <img src="{{ $content->hero_image }}" alt="">
                                </p>
                                @endif
                            	{{ $content->description }}
                            </div>
                        </div>

@endsection