@extends('home.master')

@section('content')
        <div class="text-center">
                <div class="page-header">
                        <h1>Clock</h1>
                </div>

                <p class="lead">Seconds</p>
                <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="60" id="seconds"></div>
                </div>

                <p class="lead">Minutes</p>
                <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="60" id="minutes"></div>
                </div>

                <p class="lead">Hours</p>
                <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="24" id="hours"></div>
                </div>
        </div>
@stop

@section('extraJS')
        <script type="text/javascript">
                $(document).ready(function() {
                        setInterval(function() {
                                var date = new Date();
                                var milli = date.getMilliseconds();

                                var seconds = date.getSeconds();
                                var milliSeconds = (seconds * 1000) + milli;
                                var secondsWidth = (milliSeconds / 59999) * 100;

                                /*
                                console.log('====================== SECONDS DATA ============================');
                                console.log('var seconds: ' + seconds);
                                console.log('var milliSeconds: ' + milliSeconds);
                                console.log('var secondsWidth: ' + secondsWidth);
                                */

                                var minutes = date.getMinutes();
                                var milliMinutes = (minutes * 100000) + milliSeconds;
                                var minutesWidth = (milliMinutes / 5959999) * 100;

                                /*
                                console.log('====================== MINUTES DATA ============================');
                                console.log('var minutes: ' + minutes);
                                console.log('var milliMinutes: ' + milliMinutes);
                                console.log('var minutesWidth: ' + minutesWidth);
                                */

                                var hours = date.getHours();
                                var milliHours = (hours * 10000000) + milliMinutes;
                                var hoursWidth = (milliHours / 235959999) * 100;

                                /*
                                console.log('====================== HOURS DATA ============================');
                                console.log('var hours: ' + hours);
                                console.log('var milliHours: ' + milliHours);
                                console.log('var hoursWidth: ' + hoursWidth);
                                */

                                $("#seconds").css('width', secondsWidth + "%").html(seconds);
                                $("#minutes").css('width', minutesWidth + "%").html(minutes);
                                $("#hours").css('width', hoursWidth + "%").html(hours);
                        },1);
                });
        </script>
@stop

@section('extraCSS')
        <style type="text/css">
                .progress-bar {
                        transition: none;
                        -o-transition: none;
                        -webkit-transition: none;
                        color: #8CD5FF;
                        background-color: #385665;
                }
        </style>
@stop