@extends('layout.frontend')
@section('content')
        <div class="contentHead">
            <h1>Latest News</h1>
            <ul>
                <li class="empty-item"><a href="#">&nbsp;</a></li>
            </ul>
        </div>

        <div class="contentBody">
            
            <div class="catImage"></div>
            <div class="subCatCont" style="padding: 40px 0px 10px 0;">
                <?php
                $highlights = Highlight::isEnabled()->orderBy('date', 'DESC')->get();
                ?>
                @if(!empty($highlights))
                <section class="highlightsWrap block">
                        
                        <div class="row">
                        @foreach($highlights as $highlight)
                            <div class="col4">
                                <div class="highImage"><img src="{{ $highlight->hero_image }}" alt=""></div>
                                <div class="highWrap" style="margin-bottom: 30px;">
                                    <h4><a href="/highlights/{{ $highlight->slug }}">{{ $highlight->name }}</a></h4>
                                    <time>{{ date('j F Y', strtotime($highlight->date)) }}</time>
                                    <p>
                                        <?php
                                            $string = $highlight->short_description;
                        
                                            if (strlen($string) > 120) {
                                              $stringCut = substr($string, 0, 120);
                                              $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
                                            }
                                        echo $string; ?>
                                    </p>
                                    <a href="/highlights/{{ $highlight->slug }}" class="button button-primary">Read More<i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        @endforeach
                        </div>

                </section>
                @endif
            </div>
        
        </div>
@endsection