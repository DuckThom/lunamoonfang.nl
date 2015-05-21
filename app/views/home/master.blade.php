<!DOCTYPE html>
<html lang="en">
        <head>
                <title>Luna Moonfang @if( Request::path() !== '/' ) | {{ ucfirst(Request::path()) }} @endif</title>

                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
                <meta name="google-site-verification" content="yetKC6_E20fGvYECsvMjegkw44OZSVHQMEFYojlaYT4" />
                <meta charset="UTF-8">
                <meta name="description" content="A website about me">
                <meta name="keywords" content="HTML,CSS,XML,JavaScript,Luna,Moonfang,DuckThom,Thomas,Wiringa">
                <meta name="author" content="Thomas Wiringa">

                <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
                <link rel="icon" href="/favicon.ico" type="image/x-icon">

                <style type="text/css">
                        @import url(//fonts.googleapis.com/css?family=Titillium+Web:700,600,400,300,200);
                        @import url(//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css);
                        @import url('/assets/css/font-awesome.min.css');
                        @import url('/assets/css/app.min.css');
                </style>
                
                <script>
                        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
                
                        ga('create', 'UA-41373177-4', 'auto');
                        ga('send', 'pageview');
                </script>

                @yield('extraCSS')
        </head>

        <body data-spy="scroll" data-target=".sidebar">
                <nav class="navbar navbar-luna header navbar-static-top">
                        <div class="container">
                                <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headerNav">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                        </button>
                                        <a href="{{ URL::to('/') }}" class=" navbar-brand">LUNA MOONFANG</a>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="headerNav">
                                        <ul class="nav navbar-nav">
                                                <li @if( Request::path() === '/' ) class="active" @endif><a href="/"><i class="fa fa-home"></i> Home</a></li>
                                                <li @if( Request::path() === 'music' ) class="active" @endif><a href="/music"> <i class="fa fa-music"></i> Music</a></li>
                                                <li class="dropdown @if( Request::path() === 'info' ) active @endif ">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-info-circle"></i> Info <span class="caret"></span></a>
                                                        <ul class="dropdown-menu" role="menu">
                                                                <li><a href="/info"><i class="fa fa-user"></i> About me</a></li>
                                                                <li><a href="/info#contact"><i class="fa fa-book"></i> Contact</a></li>
                                                        </ul>
                                                </li>
                                                <li @if( Request::path() === 'projects' ) class="active" @endif><a href="/projects"><i class="fa @if( Request::path() === 'projects' ) fa-folder-open @else fa-folder @endif "></i> Projects</a></li>
                                                <li class="dropdown hidden-md hidden-lg">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-users"></i> Social <span class="caret"></span></a>
                                                        <ul class="dropdown-menu" role="menu">
                                                                <li><a href="https://github.com/DuckThom" target="_blank"><i class="fa fa-github"></i> GitHub</a></li>
                                                                <li><a href="https://plus.google.com/+ThomasWiringa" target="_blank"><i class="fa fa-google-plus"></i> Google+</a></li>
                                                                <li><a href="https://last.fm/user/DuckThom" target="_blank"><i class="fa fa-lastfm"></i> LastFM</a></li>
                                                                <li><a href="https://steamcommunity.com/id/Luna_Moonfang" target="_blank"><i class="fa fa-steam"></i> Steam</a></li>
                                                                <li><a href="https://twitter.com/real_duckthom" target="_blank"><i class="fa fa-twitter"></i> Twitter</a></li>
                                                                <li><a href="https://youtube.com/user/DuckThom" target="_blank"><i class="fa fa-youtube"></i> YouTube</a></li>
                                                        </ul>
                                                </li>
                                        </ul>

                                        <ul class="nav navbar-nav header-social pull-right hidden-sm hidden-xs">
                                                <li><a href="https://github.com/DuckThom" target="_blank" data-toggle="tooltip" data-placement="bottom" title="GitHub"><i class="fa fa-github"></i></a></li>
                                                <li><a href="https://plus.google.com/+ThomasWiringa" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Google+"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="https://last.fm/user/DuckThom" target="_blank" data-toggle="tooltip" data-placement="bottom" data-title="LastFM"><i class="fa fa-lastfm"></i></a></li>
                                                <li><a href="https://steamcommunity.com/id/Luna_Moonfang" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Steam"><i class="fa fa-steam"></i></a></li>
                                                <li><a href="https://twitter.com/real_duckthom" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="https://youtube.com/user/DuckThom" target="_blank" data-toggle="tooltip" data-placement="bottom" title="YouTube"><i class="fa fa-youtube"></i></a></li>
                                        </ul>
                                </div>
                        </div>
                </nav>

                <div class="container content">
                        <div class="row">
                                <div class="col-md-9">
                                        @yield('content')
                                </div>
                                <div class="col-md-3">
                                        <nav class="sidebar hidden-print hidden-xs hidden-sm" data-spy="affix" data-offset-top="100" data-offset-bottom="200">
                                                <ul class="nav sidenav">
                                                        <li @if( Request::path() === '/' ) class="active" @endif><a href="/"><i class="fa fa-home"></i> Home</a></li>
                                                        <li @if( Request::path() === 'music' ) class="active" @endif><a href="/music"> <i class="fa fa-music"></i> Music</a></li>
                                                        <li @if( Request::path() === 'info' ) class="active" @endif><a href="/info"><i class="fa fa-info-circle"></i> Info</a></li>
                                                        <li @if( Request::path() === 'projects' ) class="active" @endif><a href="/projects"><i class="fa @if( Request::path() === 'projects' ) fa-folder-open @else fa-folder @endif "></i> Projects</a></li>
                                                        <li @if( Request::path() === 'licenses' ) class="active" @endif><a href="/licenses"><i class="fa fa-gavel"></i> Licenses</a></li>
                                                        <li @if( Request::path() === 'clock' ) class="active" @endif><a href="/clock"><i class="fa fa-clock-o"></i> Clock</a></li>
                                                </ul>
                                        </nav>
                                </div>
                        </div>

                        <footer class="container footer">
                                <hr />

                                <div class="row">
                                        <div class="col-md-4 col-xs-6">
                                                <p class="lead"><i class="fa fa-copyright"></i> Copyright</p>
                                                2015 - Thomas Wiringa
                                        </div>
                                        <div class="col-md-4 hidden-sm hidden-xs">
                                                <p class="lead"><i class="fa fa-power-off"></i> Powered by</p>
                                                <ul class="list-unstyled">
                                                        <li><a href="http://getbootstrap.com">Twitter Bootstrap</a></li>
                                                        <li><a href="http://laravel.com">Laravel Framework</a></li>
                                                        <li><a href="http://jquery.com">jQuery</a></li>
                                                        <li><a href="http://fontawesome.io/">Font Awesome</a></li>
                                                </ul>
                                        </div>
                                        <div class="col-md-4 col-xs-6">
                                                <p class="lead"><i class="fa fa-gavel"></i> Licenses</p>
                                                This website is licensed under the <a href="https://github.com/DuckThom/lunamoonfang.nl/blob/master/LICENSE">MIT License</a><br />
                                                The other licenses can be found <a href="/licenses">here</a>
                                        </div>
                                </div>
                        </footer>
                </div>

                <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-555b888107d2fe84" async="async"></script>

                <script type="text/javascript">
                        $(document).ready(function() {
                                $('[data-toggle="tooltip"]').tooltip();
                        });
                </script>

                @yield('extraJS')
        </body>
</html>
