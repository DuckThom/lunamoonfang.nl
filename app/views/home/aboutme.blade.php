@extends('home.master')

@section('title')
        About me
@stop

@section('content')
        <div class="text-center">
                <p id="aboutMe">
                        Hi! My name is Thomas Wiringa but on the interwebs my nickname is usually DuckThom or Luna Moonfang.<br />
                        I'm {{ date_diff(date_create(date('Y-n-j')), date_create("1995-11-26"))->format('%y') }} years old and live in The Netherlands. <br />
                        Currently I am studying Software Engineering at Alfa College in Groningen.<br />
                        <br />
                        My favorite programming languages are PHP, HTML5 and CSS3 (LESS) but I can also code in Java and JavaScript <br />
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

                <hr />

                <div class="page-header">
                        <h1>Contact</h1>
                </div>

                <p id="contact">
                        I prefer correspondation via Twitter but i'm also available via IRC and Google+.
                </p>

                <table class="table table-striped">
                        <tbody>
                        <!--tr> //! Disabled because of broken mail setup, @lunamoonfang.nl is broken !//
                                <td><strong>E-Mail</strong></td>
                                <td><a href="http://www.google.com/recaptcha/mailhide/d?k=01UOM4bLqqrh1lWKQrLtUZOQ==&amp;c=940r5vAYbP8k3ozbU0kH0LvFYxu3EU34QNOZj_X-LWg=" onclick="window.open('http://www.google.com/recaptcha/mailhide/d?k\07501UOM4bLqqrh1lWKQrLtUZOQ\75\75\46c\75940r5vAYbP8k3ozbU0kH0LvFYxu3EU34QNOZj_X-LWg\075', '', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300'); return false;" title="Reveal this e-mail address">c...</a><i class="fa fa-at"></i>lunamoonfang.nl</td>
                        </tr-->
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
@stop
