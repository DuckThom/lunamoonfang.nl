@extends('home.master')

@section('header')
        <img src="/assets/image/headers/project.jpg" />

        <h1>Projects</h1>
@stop

@section('content')
        <div class="text-center">
                <div class="panel panel-default">
                        <div class="panel-body">
                                <div class="project-header">
                                        <h3>lunamoonfang.nl <small>(<a href="https://github.com/DuckThom/lunamoonfang.nl" target="_blank">source</a>)</small></h3>
                                </div>

                                <div class="row text-left">
                                        <div class="col-sm-5">
                                                <table class="table table-condensed">
                                                        <tr>
                                                                <td><strong><i class="fa fa-file-code-o"></i> Language</strong></td>
                                                                <td>PHP, HTML5, JS, CSS3</td>
                                                        </tr>
                                                        <tr>
                                                                <td><strong><i class="fa fa-clock-o"></i> Created</strong></td>
                                                                <td>January 18th 2015</td>
                                                        </tr>
                                                </table>
                                        </div>
                                        <div class="col-sm-7">
                                                <p class="lead">
                                                        The website you are using right now!
                                                </p>
                                        </div>
                                </div>
                        </div>
                </div>

                <div class="panel panel-default">
                        <div class="panel-body">
                                <div class="project-header">
                                        <h3>wiringa.nl <small>(<a href="https://github.com/DuckThom/laravel-wtg" target="_blank">source</a>)</small></h3>
                                </div>

                                <div class="row text-left">
                                        <div class="col-sm-5">
                                                <table class="table table-condensed">
                                                        <tr>
                                                                <td><strong><i class="fa fa-file-code-o"></i> Language</strong></td>
                                                                <td>PHP, HTML5, JS, CSS3</td>
                                                        </tr>
                                                        <tr>
                                                                <td><strong><i class="fa fa-clock-o"></i> Created</strong></td>
                                                                <td>December 21st 2014</td>
                                                        </tr>
                                                </table>
                                        </div>
                                        <div class="col-sm-7">
                                                <p class="lead">
                                                        The currently live wiringa.nl website is created using CodeIgniter.
                                                        After I found out about Laravel, I decided to rewrite it using that framework instead.
                                                        The CodeIgniter version has a private repository on BitBucket but the new one is public on GitHub.
                                                </p>
                                        </div>
                                </div>
                        </div>
                </div>

                <div class="panel panel-default">
                        <div class="panel-body">
                                <div class="project-header">
                                        <h3>Code Snippets <small>(<a href="https://github.com/DuckThom/code-wookies" target="_blank">source</a>)</small></h3>
                                </div>

                                <div class="row text-left">
                                        <div class="col-sm-5">
                                                <table class="table table-condensed">
                                                        <tr>
                                                                <td><strong><i class="fa fa-file-code-o"></i> Language</strong></td>
                                                                <td>Bash, Perl, Python, JS</td>
                                                        </tr>
                                                        <tr>
                                                                <td><strong><i class="fa fa-clock-o"></i> Created</strong></td>
                                                                <td>December 21st 2014</td>
                                                        </tr>
                                                </table>
                                        </div>
                                        <div class="col-sm-7">
                                                <p class="lead">
                                                        Small shell scripts and config files.
                                                </p>
                                        </div>
                                </div>
                        </div>
                </div>

                <div class="panel panel-default">
                        <div class="panel-body">
                                <div class="project-header">
                                        <h3>Lunabot Telegram <small>(<a href="https://github.com/DuckThom/lunabot-telegram" target="_blank">source</a>)</small></h3>
                                </div>

                                <div class="row text-left">
                                        <div class="col-sm-5">
                                                <table class="table table-condensed">
                                                        <tr>
                                                                <td><strong><i class="fa fa-file-code-o"></i> Language</strong></td>
                                                                <td>PHP</td>
                                                        </tr>
                                                        <tr>
                                                                <td><strong><i class="fa fa-clock-o"></i> Created</strong></td>
                                                                <td>June 29th 2015</td>
                                                        </tr>
                                                </table>
                                        </div>
                                        <div class="col-sm-7">
                                                <p class="lead">
                                                        Telegram bot called @LunaBot written in PHP.<br />
                                                </p>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
@stop

@section('extraCSS')
        <style type="text/css">
                @media (min-width: 768px) {
                        .table {
                                border-right: 1px solid #bbb;
                        }
                }

                .table > tbody > tr > td {
                        border-top: none;
                }

                .project-header {
                        margin: 20px 0;
                }
        </style>
@stop
