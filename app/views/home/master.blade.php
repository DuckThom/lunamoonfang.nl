<!DOCTYPE html>
<html lang="en">
        <head>
                <title>Luna Moonfang</title>

                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

                <style type="text/css">
                        @import url(//fonts.googleapis.com/css?family=Lato:700,600,500,400,300,200,100);
                        @import url(//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css);
                        @import url('/assets/css/font-awesome.min.css');
                        @import url('/assets/css/app.min.css');
                </style>

                @yield('extraCSS')
        </head>

        <body data-spy="scroll" data-target=".sidebar">
                <nav class="navbar navbar-luna header navbar-static-top" id="top">
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
                                                                <li><a href="https://last.fm/DuckThom" target="_blank"><i class="fa fa-lastfm"></i> LastFM</a></li>
                                                                <li><a href="https://steamcommunity.com/id/Luna_Moonfang" target="_blank"><i class="fa fa-steam"></i> Steam</a></li>
                                                                <li><a href="https://twitter.com/real_duckthom" target="_blank"><i class="fa fa-twitter"></i> Twitter</a></li>
                                                                <li><a href="https://youtube.com/user/DuckThom" target="_blank"><i class="fa fa-youtube"></i> YouTube</a></li>
                                                        </ul>
                                                </li>
                                        </ul>

                                        <ul class="nav navbar-nav header-social pull-right hidden-sm hidden-xs">
                                                <li><a href="https://github.com/DuckThom" target="_blank" data-toggle="tooltip" data-placement="bottom" title="GitHub"><i class="fa fa-github"></i></a></li>
                                                <li><a href="https://plus.google.com/+ThomasWiringa" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Google+"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="https://last.fm/DuckThom" target="_blank" data-toggle="tooltip" data-placement="bottom" data-title="LastFM"><i class="fa fa-lastfm"></i></a></li>
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
                                                </ul>
                                                <a class="back-to-top" href="#top">
                                                        Back to top
                                                </a>
                                        </nav>
                                </div>
                        </div>
                </div>

                <footer class="container footer">
                        <hr />

                        <div class="row">
                                <div class="col-md-4">
                                        <p class="lead"><i class="fa fa-copyright"></i> Copyright</p>
                                        Thomas Wiringa - 2015
                                </div>
                                <div class="col-md-4">
                                        <p class="lead"><i class="fa fa-power-off"></i> Powered by</p>
                                        <ul class="list-unstyled">
                                                <li><a href="http://getbootstrap.com">Twitter Bootstrap</a></li>
                                                <li><a href="http://laravel.com">Laravel Framework</a></li>
                                                <li><a href="http://jquery.com">jQuery</a></li>
                                                <li><a href="http://fortawesome.github.io/Font-Awesome/">Font Awesome</a></li>
                                        </ul>
                                </div>
                                <div class="col-md-4">
                                        <p class="lead"><i class="fa fa-gavel"></i> Licenses</p>
                                        This website is licensed under the <a href="https://github.com/DuckThom/lunamoonfang.nl/blob/master/LICENSE">MIT License</a><br />
                                        The other licenses can be found <a href="/licenses">here</a>
                                </div>
                        </div>
                </footer>

                <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

                <script type="text/javascript">
                        $(document).ready(function() {
                                $('[data-toggle="tooltip"]').tooltip();
                        });
                </script>

                @yield('extraJS')
        </body>
</html>