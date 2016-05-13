<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>lunamoonfang.nl | 404 Not Found</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=VT323);

        body {
            margin:0;
            font-family: 'VT323';
            text-align:center;
            color: lightgrey;
            background-color: blue;
            border-sizing: border-box;
            -moz-border-sizing: border-box;
            -webkit-border-sizing: border-box;
        }

        .welcome {
            max-width: 750px;
            margin: 0 auto;
            position: relative;
            top: 100px;
            text-align: center;
            font-size: 22px;
        }

        a, a:visited {
            text-decoration:none;
            color: lightgray;
        }

        h1 {
            display: inline-block;
            background-color: lightgrey;
            color: blue;
            font-size: 32px;
            padding: 3px 6px;
        }

        .text, ul {
            text-align: left;
        }
    </style>
</head>
<body>
<div class="welcome">
    <h1>
        STOP
    </h1>
    <p class="text">
        A fatal exception 404 has ocurred at 0x{{ dechex(mt_rand(1048577, 16777216)) }} in {{ request()->server('HTTP_USER_AGENT') }}.
        The current request will be terminated.
    </p>

    <ul>
        <li><a href="">Press here</a> to go back to the previous page</li>
        <li>Press any other key to do probably nothing</li>
    </ul>

    <p style="text-align: center;">Press any key to continue _</p>
</div>
</body>
</html>
