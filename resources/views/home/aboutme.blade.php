@extends('master', ['title' => 'About me'])

@section('header')
    <h1><i class="fa fa-user fa-3x" style="color: white;" aria-hidden="true"></i></h1>
@endsection

@section('content')
    <div class="container">
        <div class="column-1">
            <div class="text-center">
                <p class="text-block">
                    Hi! My name is Thomas Wiringa but on the interwebs my nickname is usually DuckThom or Luna Moonfang.<br />
                    I'm {{ date_diff(date_create(date('Y-n-j')), date_create("1995-11-26"))->format('%y') }} years old and live in The Netherlands. <br />
                    <br />
                    <br />
                    My favorite programming languages are PHP, HTML5, JS (jQuery and a little bit of NodeJS) and CSS3 (LESS/SASS) but I can also code in Java, C#, Swift, Ruby and Python<br />
                    I'm currently learning more about Ruby and NodeJS (React, Meteor).<br />
                    I recently graduated from school and I can now call myself a "Software Engineer".<br />
                    <br />
                    I also play games quite a lot. <br />
                    The games I've been playing the most lately are Rocket League and GTA V but I also play games like Hearthstone, Halo, DOTA and Diablo.<br />
                    For a more complete list of games, tak a look at my Steam profile: <a href="https://steamcommunity.com/id/Luna_Moonfang" target="_blank">[HatScrub] Luna Moonfang</a>.<br />
                    <br />
                    For as far as music goes, I am a huge fan of <a href="http://monstercat.com">Monstercat</a> and Muse.<br />
                    My favorite radio station is <a href="http://3fm.nl" target="_blank">3FM</a> on the radio and <a href="https://twitch.tv/monstercat" target="_blank">Monstercat FM</a> on Twitch.<br />
                    Electronic music is my favourite kind of music.<br />
                    <br />
                    Which brings me to the next point, YouTube. <br />
                    I'm subscribed to a lot of channels but <a href="https://youtube.com/hatfilms" target="_blank">Hat Films</a>, <a href="https://youtube.com/yogscastsips" target="_blank">Sips</a> and <a href="https://youtube.com/yogscast" target="_blank">The Yogscast</a> are my favorites.<br />
                    Click <a href="/sublist">here</a> for a list of channels that I am subscribed to.<br />
                    <br />
                </p>
            </div>
        </div>
    </div>

    <hr />

    <div class="container">
        <div class="column-1">
            <h3 class="content-header">Contact</h3>

            <p class="text-center">
                I prefer correspondation via Twitter but i'm also available via IRC and Google+.
            </p>

            <table class="table table-striped">
                <tbody>
                <tr>
                    <td><strong>E-Mail</strong></td>
                    <td><a href="mailto:contact@lunamoonfang.nl">contact<i class="fa fa-at"></i>lunamoonfang.nl</a></td>
                </tr>
                <tr>
                    <td><strong>Twitter</strong></td>
                    <td><a href="https://twitter.com/intent/tweet?text=@Real_DuckThom" target="_blank"><i class="fa fa-at"></i>Real_DuckThom</a></td>
                </tr>
                <tr>
                    <td><strong>IRC</strong></td>
                    <td>LW_Luna or Luna_Moonfang on the freenode network</td>
                </tr>
                <tr>
                    <td><strong>Google+</strong></td>
                    <td><a href="https://plus.google.com/+ThomasWiringa" target="_blank">+ThomasWiringa</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
