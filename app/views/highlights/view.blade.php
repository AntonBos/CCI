@extends('layout.frontend')
@section('content')
						<div class="contentHead">
                            <h1>Highlights</h1>
                        </div>

                        <div class="contentBody">

                            <div class="catImage">
                                <h2>{{ $content->name }}</h2>
                                <img src="/imageuploads/cabling-temp.jpg" alt="">
                            </div>
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