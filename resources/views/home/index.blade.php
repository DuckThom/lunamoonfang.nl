@extends('master')

@section('header')
    <div class="moon-header">
        <div class="stars js-plaxify" data-xrange="60" data-yrange="60"></div>
        <div class="moon js-plaxify" data-xrange="20" data-yrange="20">
            <div class="crater1"></div>
            <div class="crater2"></div>
            <div class="crater3"></div>
        </div>
    </div>

    <h1>lunamoonfang.nl</h1>
@stop

@section('content')
        <div class="text-center">
                <p id="aboutSite">
                        Welcome, this site is made by DuckThom, also known as Thomas Wiringa.<br />
                        It is made using Laravel, Bootstrap, jQuery and Font Awesome.<br />
                </p>
        </div>

        <div class="row">
        	<div class="col-md-6 col-md-offset-3">
        		<div class="text-center">
        			<h3>Luna Moonfang on Twitter</h3>
        			<small>mostly retweets and youtube videos</small><br />
        			<a class="twitter-timeline" href="https://twitter.com/Real_DuckThom" data-widget-id="513017249758593024">Loading timeline... <i class="fa fa-circle-o-notch fa-spin"></i></a>
        		</div>
        	</div>
        </div>
@stop

@section('extraJS')
    <script src="https://cdn.rawgit.com/cameronmcefee/plax/master/js/plax.js"></script>
	<script>
		!function(d,s,id){
			var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';

			if(!d.getElementById(id)){
				js=d.createElement(s);
				js.id=id;
				js.src=p+"://platform.twitter.com/widgets.js";
				fjs.parentNode.insertBefore(js,fjs);
			}
		}(document,"script","twitter-wjs");

        // this amazing header is made by http://codepen.io/agelber/
        var $sky = $(".stars");

        var skyHeight = $sky.innerHeight(),
            skyWidth = $sky.innerWidth();
            numberOfStars = (skyWidth * skyHeight) / 10000;
        for (var i = 0; i < numberOfStars; i++) {
          var starSize = Math.floor((Math.random() * 8) + 2),
              starTop = Math.floor(Math.random() * skyHeight),
              starLeft = Math.floor(Math.random() * skyWidth);
          $('<div class="star">').css({
            width: starSize,
            height: starSize,
            top: starTop,
            left: starLeft
          }).prependTo($sky);
        }

        $(".js-plaxify").plaxify();
        $.plax.enable();
	</script>
@stop
