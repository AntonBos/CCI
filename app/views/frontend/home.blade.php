@extends('layout.homepage')
@section('content')
		<section class="introWrap block">
            <div class="container">

                <div class="row">
                    
                    <div class="col9">
                        <h2>About <span>CCI</span></h2>
                        {{ ContentArea::getbyName('Home About CCI')->description }}
                    </div>

                    <div class="col3"><a href="/about" class="button button-big button-primary">Read More <i class="fa fa-chevron-right"></i></a></div>
                
                </div>

            </div>
        </section>

        <!-- CTA Slider -->
        <section class="sliderWrap block">
            <div class="container">

                <div class="row">
                    
                    <div class="col12">
                        <div class="slider-wrapper">
                            <?php
                            $ourServicesContent = ContentArea::getByName('Our Services');
                            ?>
                            <div id="slider" class="nivoSlider">
                                <img src="/img/slide-cabling.png" data-thumb="Our Services" alt="" title="#ourServices">
                                @foreach(Service::orderBy('id')->isEnabled()->isTopLevel()->get() as $service)
                                <img src="/img/slide-cabling.png" data-thumb="{{ $service->name }}" alt="" title="#{{ explode(' ',$service->name)[0] }}">
                                @endforeach
                            </div>
                            <div id="ourServices" class="nivo-html-caption">
                                <h3><span>Our</span> Services</h3>
                                {{ $ourServicesContent->description }}
                            </div>
                            @foreach(Service::orderBy('id')->isEnabled()->isTopLevel()->get() as $service)

                                <?php
                                $nameComps = explode(' ',$service->name);
                                $i = 0;
                                $title = '';
                                foreach($nameComps as $nameComp){

                                    if($i%2 != 0){

                                        $title .= '<span>'.$nameComp.'</span> ';

                                    }else{

                                         $title .= $nameComp.' ';
                                    }

                                    $i++;
                                }
                                ?>
                            <div id="{{ explode(' ',$service->name)[0] }}" class="nivo-html-caption">
                                <h3>{{ $title }}</h3>
                                <p>{{ $service->short_description }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                
                </div>

            </div>
        </section>
        <?php
        $highlights = Highlight::isEnabled()->orderBy('date', 'DESC')->get();
        ?>
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
                            <h4><a href="/highlights/{{ $highlight->slug }}">{{ $highlight->name }}</a></h4>
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