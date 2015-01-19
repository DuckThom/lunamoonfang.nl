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
                                                <li @if( Request::path() === 'aboutme' ) class="active" @endif><a href="/aboutme"> <i class="fa fa-user"></i> About Me</a></li>
                                                <li @if( Request::path() === 'projects' ) class="active" @endif><a href="/projects"><i class="fa @if( Request::path() === 'projects' ) fa-folder-open @else fa-folder @endif "></i> Projects</a></li>
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
                                                        <li @if( Request::path() === 'aboutme' ) class="active" @endif><a href="/aboutme"><i class="fa fa-user"></i> About Me</a></li>
                                                        <li @if( Request::path() === 'projects' ) class="active" @endif><a href="/projects"><i class="fa @if( Request::path() === 'projects' ) fa-folder-open @else fa-folder @endif "></i> Projects</a></li>
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

                        <div class="container text-center">
                                <span><i class="fa fa-copyright"></i> Thomas Wiringa - 2015 - <a href="/licenses">Licenses</a></span>
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