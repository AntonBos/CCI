<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>CCI - Providers of IT Connectivity Solutions</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="/css/global.css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">

        <script src="/js/vendor/modernizr-2.6.2.min.js"></script>
        <!--[if lt IE 9]> <script src="/js/vendor/selectivizr-min.js"></script> <![endif]-->
    </head>
	<body class="inner">
        
        <!-- Header -->
        <header class="other block">
            
            <div class="container">
                <div class="row">
                    
                    <div class="col12">
                        <div class="logo"><a href="/"><img src="/img/CCI-logo-color.svg" alt="CCI - Providers of IT Connectivity Solutions"></a></div>

                        <ul class="socialBar">
                            <li><a href=""><i class="fa fa-facebook-square"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin-square"></i></a></li>
                        </ul>

                        <nav>
                            <div class="expander"><a href="#"><i class="fa fa-bars"></i></a></div>
                            <?php  
                            $baseURL = Request::segments()[0];
                            //dd($baseURL);
                            $mainMenuItems = array('about' => 'About', 'services' => 'Services', 'black-empowerment' => 'BEE', 'news' => 'News', 'contact' => 'Contact');
                            ?>
                            <ul>
                                <li><a href="/">Home</a></li>
                                <?php
                                foreach($mainMenuItems as $url => $display){

                                    ?><li {{ $baseURL == $url ? 'class="active"' : '' }}><a href="/{{ $url }}">{{ $display }}</a></li><?php
                                }
                                ?>  
                            </ul>
                        </nav>
                    </div>
                
                </div>
            </div>

            <div class="sloganStrip">
                <div class="container">
                    
                    <div class="row">
                        <div class="col12">Providers of IT <span>Connectivity Solutions</span></div>
                    </div>

                </div>
            </div>

        </header>
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col12">
                        @yield('message')
                        @yield('content')
                    </div>
                </div>
                <div class="row">
                    <div class="col12">
                        <div class="contentBody contentBody-2">
                            <!-- Client Strip -->
                            <aside class="clientStrip block">
                                <h4>Some of our <span>Clients</span></h4>
                                <h5>We’re not the only ones excited about our services. Meet our clients.</h5>
                                <div class="list_carousel">
                                    <ul id="clients">
                                        @foreach(Logo::orderBy('order_by', 'ASC')->get() as $logo)
                                        <li><img src="{{ $logo->filename }}" alt=""></li>
                                        @endforeach
                                    </ul>
                                    <!-- <a id="prev2" class="prev" href="#">&lt;</a>
                                    <a id="next2" class="next" href="#">&gt;</a> -->
                                </div>
                            </aside>

                            <!-- Footer -->
                            <footer class="block">
                                        
                                <div class="col8">
                                    <h6>Contact Details</h6>
                                    
                                    <div class="office-wrap">
                                        <p class="detail-head">Cape Town Head Office</p>
                                        <ul class="details">
                                            <li><strong>Tel: </strong>+27 (0) 21 531 0850</li>
                                            <li><strong>Fax: </strong>+27 (0) 21 531 0851</li>
                                            <li><strong>Email: </strong><a href="mailto:contact@cci.co.za?Subject=Website Enquiry">contact@cci.co.za</a></li>
                                        </ul>
                                        <p class="copyright">Unit A3O Pinelands Business Park, Avonduur Road, Pinelands, 7405, CAPE TOWN</p>
                                    </div>

                                    <div class="office-wrap">
                                        <p class="detail-head">Johannesburg Offices</p>
                                        <ul class="details">
                                            <li><strong>Tel: </strong>+27 (0) 11 664 6055</li>
                                            <li><strong>Fax: </strong>+27 (0) 11 664 6194</li>
                                            <li><strong>Email: </strong><a href="mailto:contact@cci.co.za?Subject=Website Enquiry">contact@cci.co.za</a></li>
                                        </ul>
                                        <p class="copyright">Unit A Krynaiuw Office Park, 14 Ontdekkers Road, Roodepoort, GAUTENG</p>
                                    </div>
                                </div>

                                <div class="col4">
                                    <img class="footerLogo" src="/img/footer-logo.svg" alt="">
                                    <p class="copyright" style="float: right;">Copyright &copy; <span class="placeYear"></span> CCI.</p>
                                </div>

                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="//code.jquery.com/jquery.js"></script>
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->
        <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="/js/vendor/jquery.nivo.slider.js"></script>
        <script src="/js/vendor/jquery.carouFredSel-6.2.1-packed.js"></script>
        
        <!-- helper plugins -->
        <script src="/js/vendor/helper-plugins/jquery.touchSwipe.min.js"></script>
        <script src="/js/vendor/helper-plugins/jquery.transit.min.js"></script>
        <script src="/js/vendor/helper-plugins/jquery.ba-throttle-debounce.min.js"></script>

        <script src="/js/main.js"></script>

        <!--<script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>-->
    </body>
</html>