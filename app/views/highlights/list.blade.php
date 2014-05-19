@extends('layout.frontend')
@section('content')
        @if(!empty($highlights))
        <section class="highlightsWrap block">
            <div class="container">

                <div class="row">
                    <div class="col12"><h2>Highlights</h2></div>
                </div>
                
                <div class="row">
                @foreach($highlights as $highlight)
                    <div class="col4">
                        <div class="highImage"><img src="{{ $highlight->hero_image }}" alt=""></div>
                        <div class="highWrap">
                            <h4><a href="">{{ $highlight->name }}</a></h4>
                            <time>{{ date('j F Y', strtotime($highlight->date)) }}</time>
                            <p>{{ $highlight->short_description }}</p>
                            <a href="/highlights/{{ $highlight->slug }}" class="button button-primary">Read More<i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </section>
        @endif
@endsection