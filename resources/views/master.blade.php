<!DOCTYPE html>
<html lang="en">
<head>
    <title>Luna Moonfang @if( request()->path() !== '/' ) | {{ ucfirst(request()->path()) }} @endif</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="google-site-verification" content="yetKC6_E20fGvYECsvMjegkw44OZSVHQMEFYojlaYT4"/>
    <meta charset="UTF-8">
    <meta name="description" content="A place where I test code and designs.">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript,Luna,Moonfang,DuckThom,Thomas,Wiringa">
    <meta name="author" content="Thomas Wiringa">
    <meta name="theme-color" content="#132028">

    <link rel="apple-touch-icon" href="{{ asset('assets/image/logo.png') }}">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="{{ elixir('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-41373177-4', 'auto');
        ga('send', 'pageview');
    </script>

    @if( request()->path() !== 'ie_warning')
        <!--[if lte IE 9]>
            <meta http-equiv="refresh" content="0; url={{ url('ie_warning') }}">
        <![endif]-->
    @endif

    @yield('extraCSS')
</head>

<body>
<nav class="navbar top {{ auth()->check() ? 'authed' : '' }}">
    <div class="navbar-backdrop" data-target="#navLinks"></div>

    <div class="navbar-brand">
        <a href="{{ auth()->check() ? url('account') : url('/') }}">
            <img src="{{ asset('assets/image/navbar-logo.png') }}" alt="Site logo">
        </a>
    </div>

    <div class="navbar-links collapsed" id="navLinks">
        <ul class="navbar-links-list">
            <li @if( request()->path() === '/' ) class="active" @endif>
                <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
            </li>
            <li @if( request()->path() === 'music' ) class="active" @endif>
                <a href="{{ url('music') }}"> <i class="fa fa-music"></i> Music</a>
            </li>
            <li @if( request()->path() === 'about' ) class="active" @endif>
                <a href="{{ url('about') }}"><i class="fa fa-user"></i> About</a>
            </li>
            <li @if( request()->path() === 'projects' ) class="active" @endif>
                <a href="{{ url('projects') }}"><i class="fa @if( request()->path() === 'projects' ) fa-folder-open @else fa-folder @endif "></i> Projects</a>
            </li>
            <li class="{{ request()->path() === 'social' ? 'active' : '' }} hidden-xs hidden-md hidden-lg">
                <a href="{{ url('social') }}"><i class="fa fa-users"></i> Social</a>
            </li>

            <li class="mobile-social-icons">
                <ul class="mobile-social-icons-list">
                    <li>
                        <a href="https://github.com/DuckThom" target="_blank"><i class="fa fa-github"></i></a>
                    </li>
                    <li>
                        <a href="https://linkedin.com/in/thomaswiringa" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/real_duckthom" target="_blank"><i class="fa fa-twitter"></i></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <ul class="navbar-social-icons hidden-sm hidden-xs">
        <li>
            <a href="https://github.com/DuckThom" target="_blank"><i class="fa fa-github"></i></a>
        </li>
        <li>
            <a href="https://plus.google.com/+ThomasWiringa" target="_blank"><i class="fa fa-google-plus"></i></a>
        </li>
        <li>
            <a href="https://linkedin.com/in/thomaswiringa" target="_blank"><i class="fa fa-linkedin"></i></a>
        </li>
        <li>
            <a href="https://steamcommunity.com/id/Luna_Moonfang" target="_blank"><i class="fa fa-steam"></i></a>
        </li>
        <li>
            <a href="https://twitter.com/real_duckthom" target="_blank"><i class="fa fa-twitter"></i></a>
        </li>
        <li>
            <a href="https://youtube.com/user/DuckThom" target="_blank"><i class="fa fa-youtube"></i></a>
        </li>
    </ul>

    <div class="navbar-toggle visible-xs">
        <button type="button" class="navbar-toggle-button" data-target="#navLinks">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
    </div>
</nav>

<header class="{{ request()->path() === "/" ? 'home-header' : 'sub-header' }}">
    <div class="container header-content">
        <div class="column-sm-2 text-center hidden-xs">
            <div class="title">
                {{ $title or 'untitled' }}
            </div>
        </div>

        @if (request()->path() === "/")
            <div class="column-sm-2 text-center logo">
                <img src="{{ asset('assets/image/logo.png') }}" alt="Site Logo">
            </div>
        @else
            <div class="column-sm-2 text-center">
                @yield('header')
            </div>
        @endif
    </div>
</header>

<div class="content">
    @yield('content')
</div>

<footer class="footer">
    <div class="container">
        <div class="column-sm-3">
            <p class="lead"><i class="fa fa-copyright"></i> Copyright</p>
            2015-2016 - <a href="https://linkedin.com/in/thomaswiringa" target="_blank">Thomas Wiringa</a>
        </div>
        <div class="column-sm-3">
            <p class="lead"><i class="fa fa-power-off"></i> Powered by</p>
            <ul class="list-unstyled">
                <li><a href="http://laravel.com">Laravel Framework</a></li>
                <li><a href="http://jquery.com">jQuery</a></li>
                <li><a href="http://fontawesome.io/">Font Awesome</a></li>
            </ul>
        </div>
        <div class="column-sm-3">
            <p class="lead"><i class="fa fa-gavel"></i> Licenses</p>
            This website is licensed under the <a href="https://github.com/DuckThom/lunamoonfang.nl/blob/master/LICENSE">MIT License</a><br/>
            The other licenses can be found <a href="{{ url('licenses') }}">here</a>
        </div>
    </div>
</footer>

<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>

<script>
    /**
     * Toggle mobile navigation
     *
     * @param event
     */
    function toggleNavigation(event) {
        var sender  = event.currentTarget;
        var links   = $(sender).attr('data-target');
        var bd      = $('.navbar-backdrop');

        if ($(links).hasClass('collapsed'))
        { // Show the mobile navigation
            $('body').addClass('noscroll');
            $(bd).fadeIn(200);
            $(links).removeClass('collapsed');
        } else
        { // Hide the mobile navigation
            $('body').removeClass('noscroll');
            $(bd).fadeOut(200);
            $(links).addClass('collapsed');
        }
    }

    // Make sure only this click handler is bound
    $('.navbar-toggle-button').click(toggleNavigation);
    $('.navbar-backdrop').click(toggleNavigation);
</script>

@yield('extraJS')
</body>
</html>
