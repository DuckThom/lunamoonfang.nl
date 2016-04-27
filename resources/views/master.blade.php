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
</nav>

<header class="{{ request()->path() === "/" ? 'home-header' : 'sub-header' }}">
    <!--div class="star-wrapper">
        <div class="stars"></div>
        <div class="stars2"></div>
        <div class="stars3"></div>
    </div-->

    <canvas style="position: absolute; top: 70px;" id="stars-canvas"></canvas>

    <div class="container header-content">
        <div class="column-1 text-center title">
            {{ $title or 'untitled' }}
        </div>

        @if (request()->path() === "/")
            <div class="column-2 text-center logo">
                <img src="{{ asset('assets/image/logo.png') }}" alt="Site Logo">
            </div>
        @else
            <div class="column-1 text-center">
                @yield('header')
            </div>
        @endif
    </div>
</header>

<div class="content">
    <div class="container">
        @yield('content')
    </div>
</div>

<div class="separator"></div>

<footer class="footer">
    <div class="container">
        <div class="column-1">
            <p class="lead"><i class="fa fa-copyright"></i> Copyright</p>
            2015-2016 - Thomas Wiringa
        </div>
        <div class="column-1">
            <p class="lead"><i class="fa fa-power-off"></i> Powered by</p>
            <ul class="list-unstyled">
                <li><a href="http://laravel.com">Laravel Framework</a></li>
                <li><a href="http://jquery.com">jQuery</a></li>
                <li><a href="http://fontawesome.io/">Font Awesome</a></li>
            </ul>
        </div>
        <div class="column-1">
            <p class="lead"><i class="fa fa-gavel"></i> Licenses</p>
            This website is licensed under the <a href="https://github.com/DuckThom/lunamoonfang.nl/blob/master/LICENSE">MIT License</a><br/>
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
            //$(links).fadeIn(200);
            $(links).removeClass('collapsed');
        } else
        { // Hide the mobile navigation
            //$(links).fadeOut(200);
            $(links).addClass('collapsed');
        }
    });
</script>

{{-- Amazing canvas particles --}}
<script>
    var   canvas = document.getElementById('stars-canvas'),
            ctx = canvas.getContext('2d'),
            particles = [],
            patriclesNum = 50,
            w = $(document).width(), //500,
            h = $('header').height(),
            colors = ["#ffffff"];// ['#f35d4f','#f36849','#c0d988','#6ddaf1','#f1e85b'];

    canvas.width = w;
    canvas.height = h;
    //canvas.style.left = (window.innerWidth - 500)/2+'px';

    //if(window.innerHeight>500)
        //canvas.style.top = (window.innerHeight - 500)/2+'px';

    function Factory(){
        this.x =  Math.round( Math.random() * w);
        this.y =  Math.round( Math.random() * h);
        this.rad = Math.round( Math.random() * 1) + 1;
        this.rgba = colors[ Math.round( Math.random() * 3) ];
        //this.vx = Math.round( Math.random() * 3) - 1.5;
        this.vx = 0;
        this.vy = Math.abs(Math.round( Math.random() * 3) - 1.5) * -1;
    }

    function draw(){
        ctx.clearRect(0, 0, w, h);
        ctx.globalCompositeOperation = 'lighter';
        for(var i = 0;i < patriclesNum; i++){
            var temp = particles[i];
            var factor = 1;

            for(var j = 0; j<patriclesNum; j++){

                var temp2 = particles[j];
                ctx.linewidth = 0.5;

                /*if(temp.rgba == temp2.rgba && findDistance(temp, temp2)<50){
                 ctx.strokeStyle = temp.rgba;
                 ctx.beginPath();
                 ctx.moveTo(temp.x, temp.y);
                 //ctx.lineTo(temp2.x, temp2.y);
                 ctx.stroke();
                 factor++;
                 }*/
            }


            ctx.fillStyle = temp.rgba;
            ctx.strokeStyle = temp.rgba;

            ctx.beginPath();
            ctx.arc(temp.x, temp.y, temp.rad*factor, 0, Math.PI*2, true);
            ctx.fill();
            ctx.closePath();

            ctx.beginPath();
            //ctx.arc(temp.x, temp.y, (temp.rad+5)*factor, 0, Math.PI*2, true);
            ctx.stroke();
            ctx.closePath();


            temp.x += temp.vx;
            temp.y += temp.vy;

            if(temp.x > w)temp.x = 0;
            if(temp.x < 0)temp.x = w;
            if(temp.y > h)temp.y = 0;
            if(temp.y < 0)temp.y = h;
        }
    }

    function findDistance(p1,p2){
        return Math.sqrt( Math.pow(p2.x - p1.x, 2) + Math.pow(p2.y - p1.y, 2) );
    }

    window.requestAnimFrame = (function(){
        return  window.requestAnimationFrame       ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame    ||
                function( callback ){
                    window.setTimeout(callback, 1000 / 60);
                };
    })();

    (function init(){
        for(var i = 0; i < patriclesNum; i++){
            particles.push(new Factory);
        }
    })();

    (function loop(){
        draw();
        requestAnimFrame(loop);
    })();
</script>

@yield('extraJS')
</body>
</html>
