<!DOCTYPE html>
<html lang="en">
<head>
    <title>Luna Moonfang @if( request()->path() !== '/' ) | {{ ucfirst(request()->path()) }} @endif</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="google-site-verification" content="yetKC6_E20fGvYECsvMjegkw44OZSVHQMEFYojlaYT4"/>
    <meta charset="UTF-8">
    <meta name="description" content="A website about me">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript,Luna,Moonfang,DuckThom,Thomas,Wiringa">
    <meta name="author" content="Thomas Wiringa">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">

    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-41373177-4', 'auto');
        ga('send', 'pageview');
    </script>

    @yield('extraCSS')
</head>

<body>
<nav class="navbar">
    <div class="container">
        <div class="navbar-brand">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/image/logo.png') }}" alt="Site logo">
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
                <li @if( request()->path() === 'info' ) class="active" @endif>
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
                            <a href="https://plus.google.com/+ThomasWiringa" target="_blank"><i class="fa fa-google-plus"></i></a>
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
                <a href="https://last.fm/user/DuckThom" target="_blank"><i class="fa fa-lastfm"></i></a>
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
    </div>
</nav>

<div class="backdrop hidden"></div>

<div class="content">
    @yield('content')
</div>

<footer class="container footer">
    <hr/>

    <div class="row">
        <div class="col-md-4 col-xs-6">
            <p class="lead"><i class="fa fa-copyright"></i> Copyright</p>
            2015-2016 - Thomas Wiringa
        </div>
        <div class="col-md-4 hidden-sm hidden-xs">
            <p class="lead"><i class="fa fa-power-off"></i> Powered by</p>
            <ul class="list-unstyled">
                <li><a href="http://laravel.com">Laravel Framework</a></li>
                <li><a href="http://jquery.com">jQuery</a></li>
                <li><a href="http://fontawesome.io/">Font Awesome</a></li>
            </ul>
        </div>
        <div class="col-md-4 col-xs-6">
            <p class="lead"><i class="fa fa-gavel"></i> Licenses</p>
            This website is licensed under the <a
                    href="https://github.com/DuckThom/lunamoonfang.nl/blob/master/LICENSE">MIT License</a><br/>
            The other licenses can be found <a href="{{ url('licenses') }}">here</a>
        </div>
    </div>
</footer>

<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>

<script>
    function hideBackdrop() {
        var bd = $('.backdrop');

        // If the backdrop is already hidden, don't add another class
        if (!$(bd).hasClass('hidden')) {
            $(bd).addClass('hidden');
        }
    }

    function showBackdrop() {
        var bd = $('.backdrop');

        if ($(bd).hasClass('hidden')) {
            $(bd).removeClass('hidden');
        }
    }

    // Make sure only this click handler is bound
    $('.navbar-toggle-button').unbind('click').click(function(event) {
        var sender   = event.currentTarget;
        var links    = $(sender).attr('data-target');

        if ($(links).hasClass('collapsed'))
        { // Show the mobile navigation
            $(links).removeClass('collapsed');
        } else
        { // Hide the mobile navigation
            $(links).addClass('collapsed');
        }
    });
</script>

@yield('extraJS')
</body>
</html>
