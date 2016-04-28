@extends('master', ['title' => 'Home'])

@section('content')
    <div class="container">
        <div class="column-2">
            <div class="text-center about-site">
                <h3>lunamoonfang.nl</h3>
                <p>
                    Welcome, this site is made by DuckThom/Luna Moonfang, also known as Thomas Wiringa. <br />
                    It has been made using Laravel, jQuery and Font Awesome. <br />
                    The styling on this site is all custom made by me, no Bootstrap, no Foundation, no anything. <br />
                    Just pure custom CSS. <br />
                </p>
            </div>
        </div>

        <div class="column-2">
            <div class="text-center twitter-block">
                <h3>Luna Moonfang on Twitter</h3>
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
