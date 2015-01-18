@extends('home.master')

@section('content')
        <div class="text-center">
                <div class="page-header">
                        <h1>About me</h1>
                </div>
                <p id="aboutMe">
                        Hi! My name is Thomas Wiringa but on the interwebs my nickname is usually DuckThom or Luna Moonfang.<br />
                        I'm {{ date_diff(date_create(date('Y-n-j')), date_create("1995-11-26"))->format('%y') }} years old and I live in The Netherlands. <br />
                        Currently I am studying Software Engineering at Alfa College in Groningen.<br />
                        <br />
                        My favorite programming languages are PHP, HTML5 and CSS3 but I can also code in Java and JavaScript <br />
                        I want to start learning Objective C and C# in the near future.<br />
                        <br />
                        I also play games quite a lot. <br />
                        The games I've been playing the most lately are Hearthstone and Halo but I also play games like GTA V, DOTA 2 and Diablo.<br />
                        Games are the only reason I still have Windows installed (bastard devs not creating multi-platform games, puh...)<br />
                        <br />
                        For as far as music goes, I am a huge fan of <a href="http://monstercat.com">Monstercat</a> and Muse.<br />
                        My favorite radio station is <a href="http://3fm.nl" target="_blank">3FM</a> on the radio and <a href="https://twitch.tv/monstercat" target="_blank">Monstercat FM</a> on Twitch.<br />
                        <br />
                        Which brings me to the next point, YouTube. <br />
                        I'm subscribed to a lot of channels but <a href="https://youtube.com/hatfilms" target="_blank">Hat Films</a>, <a href="https://youtube.com/yogscastsips" target="_blank">Sips</a> and <a href="https://youtube.com/yogscast" target="_blank">The Yogscast</a> are my favorites.
                        <br />
                </p>
        </div>
@stop