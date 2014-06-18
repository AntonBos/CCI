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
	<body>
        
        <!-- Header -->
        <header class="home block">

            <div class="headerGraphic">
                <img src="/img/home-header-graphic.jpg" alt="">
            </div>
            
            <div class="container">
                <div class="row">
                    
                    <div class="col12">
                        
                        <div class="logo"><a href="#"><img src="/img/CCI-logo.svg" alt="CCI - Providers of IT Connectivity Solutions"></a></div>

                        <nav>
                            <div class="expander"><a href="#"><i class="fa fa-bars"></i></a></div>
                            <ul>
                                <li class="active"><a href="/">Home</a></li>
                                <li><a href="/about">About</a></li>
                                <li><a href="/services">Services</a></li>
                                <li><a href="/black-empowerment">BEE</a></li>
                                <li><a href="/news">News</a></li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </nav>

                    </div>
                
                </div>
            </div>

            <div class="caption block">

                <div class="container">
                    <div class="row">
                        
                        <div class="col9">
                            <h1>Providers of IT <span>Connectivity Solutions</span></h1>
                        </div>

                        <div class="col3">
                            <p class="cta">Get a free quotation today.
                                <a href="#">Get Started</a>
                            </p>
                        </div>
                    
                    </div>
                </div>
            </div>

        </header>
        @yield('message')
        @yield('content')
        
        <!-- Client Strip -->
        <aside class="clientStrip block">
            
            <div class="container">

                <div class="row">
                    <div class="col12">
                        <h4>Some of our <span>Clients</span></h4>
                        <h5>We’re not the only ones excited about our services. Meet our clients.</h5>
                        <div class="list_carousel">
                            <ul id="clients">
                                <li><img src="/img/client-logo-1.jpg" alt=""></li>
                                <li><img src="/img/client-logo-2.jpg" alt=""></li>
                                <li><img src="/img/client-logo-3.jpg" alt=""></li>
                                <li><img src="/img/client-logo-4.jpg" alt=""></li>
                                <li><img src="/img/client-logo-5.jpg" alt=""></li>
                                <li><img src="/img/client-logo-6.jpg" alt=""></li>
                                <li><img src="/img/client-logo-1.jpg" alt=""></li>
                                <li><img src="/img/client-logo-2.jpg" alt=""></li>
                                <li><img src="/img/client-logo-3.jpg" alt=""></li>
                                <li><img src="/img/client-logo-4.jpg" alt=""></li>
                                <li><img src="/img/client-logo-5.jpg" alt=""></li>
                                <li><img src="/img/client-logo-6.jpg" alt=""></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </aside>

        <footer class="block">
            
            <div class="container">
                <div class="row">
                    
                    <div class="col8">
                        <h6>Contact Details</h6>
                        <ul class="details">
                            <li><strong>Tel: </strong>+27 (0) 21 531 0850</li>
                            <li><strong>Fax: </strong>+27 (0) 21 531 0851</li>
                            <li><strong>Email: </strong><a href="mailto:contact@cci.co.za?Subject=Website Enquiry">contact@cci.co.za</a></li>
                        </ul>
                        <p class="copyright">Copyright &copy; <span class="placeYear"></span> CCI. Unit A3O, Pinelands Business Park, Avonduur Road, Pinelands, 7405, CAPE TOWN</p>
                    </div>

                    <div class="col4">
                        <img class="footerLogo" src="/img/footer-logo.svg" alt="">
                    </div>
                
                </div>
            </div>

        </footer>

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