@extends('master', ['title' => 'Social'])

@section('content')
    <div class="container">
        <h3 class="social-title">My social profiles:</h3>

        <div class="social-blocks">
            <div class="social google">
                <div class="social-logo">
                    <i class="fa fa-google-plus"></i>
                </div>
                <div class="social-link">
                    <a href="https://plus.google.com/+ThomasWiringa" target="_blank">+ThomasWiringa</a>
                </div>
            </div>

            <div class="social github">
                <div class="social-logo">
                    <i class="fa fa-github"></i>
                </div>
                <div class="social-link">
                    <a href="https://github.com/DuckThom" target="_blank">DuckThom</a>
                </div>
            </div>

            <div class="social twitter">
                <div class="social-logo">
                    <i class="fa fa-twitter"></i>
                </div>
                <div class="social-link">
                    <a href="https://twitter.com/real_duckthom" target="_blank">@Real_DuckThom</a>
                </div>
            </div>

            <div class="social lastfm">
                <div class="social-logo">
                    <i class="fa fa-lastfm"></i>
                </div>
                <div class="social-link">
                    <a href="https://last.fm/user/DuckThom" target="_blank">DuckThom</a>
                </div>
            </div>

            <div class="social steam">
                <div class="social-logo">
                    <i class="fa fa-steam"></i>
                </div>
                <div class="social-link">
                    <a href="https://steamcommunity.com/id/Luna_Moonfang" target="_blank">Luna_Moonfang</a>
                </div>
            </div>

            <div class="social youtube">
                <div class="social-logo">
                    <i class="fa fa-youtube"></i>
                </div>
                <div class="social-link">
                    <a href="https://youtube.com/user/DuckThom" target="_blank">DuckThom</a>
                </div>
            </div>
        </div>
    </div>
@stop
