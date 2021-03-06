@extends('master', ['title' => 'Home'])

@section('content')
    <div class="container">
        <div class="column-sm-2">
            <div class="text-center about-site">
                <h3>Luna Moonfang</h3>
                <p class="text-block">
                    Welcome, this site is made and designed by DuckThom/Luna Moonfang, also known as Thomas Wiringa. <br />
                    It has been made using Laravel, jQuery and Font Awesome. <br />
                    The styling on this site is all custom made by me, no Bootstrap, no Foundation, no anything. <br />
                    Just pure CSS. <br />
                </p>
            </div>
        </div>

        <div class="column-sm-2">
            <div class="text-center twitter-block">
                <h3><i class="fa fa-twitter"></i> Twitter</h3>
                <a class="twitter-timeline" href="https://twitter.com/Real_DuckThom" data-chrome="nofooter noheader noborders noscrollbar" data-theme="dark" data-widget-id="513017249758593024">Loading twitter feed... <i class="fa fa-refresh fa-spin"></i></a>
            </div>
        </div>
    </div>
@endsection

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
@endsection
