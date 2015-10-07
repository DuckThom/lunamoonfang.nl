@extends('home.master')

@section('header')
        <img src="/assets/image/headers/home.jpg" />

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
	</script>
@stop
