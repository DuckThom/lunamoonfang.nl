<!DOCTYPE html>
<html>
        <head>
                <title>Image album</title>

                <meta name="viewport" content="width=device-width, initial-scale=1">

                <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
                <link rel="icon" href="/favicon.ico" type="image/x-icon">

                <style type="text/css">
                        @import url(//fonts.googleapis.com/css?family=Lato:700);

                        html, body {
                                height: 100%;
                                width: 100%;
                                margin: 0;
                                min-width: 280px;
                                font-family: 'Lato', sans-serif;
                        }

                        h1, h2, h3, h4, h5 {
                                font-size: 32px;
                                margin: 16px 0 0 0;
                                color: #555;
                        }

                        .overlay {
                                position: fixed;
                                top: 20px;
                                bottom: 20px;
                                left: 20px;
                                right: 20px;
                                padding: 20px;
                                background-color: tomato;
                                border-radius: 3px;
                                z-index: 20;
                        }

                        .overlay > img {
                                width: auto;
                                height: auto;
                                max-width: 100%;
                                max-height: 100%;
                        }

                        .overlay > .close-overlay {
                                padding: 10px 15px;
                                position: absolute;
                                right: 10px;
                                top: 10px;
                                border: 0;
                                background-color: #000;
                                color: white;
                                font-size: 15px;
                                border-radius: 3px;
                        }

                        .overlay > .close-overlay:hover {
                                color: #000;
                                background-color: white;
                                cursor: pointer;
                        }

                        .container {
                                width: 100%;
                                margin: 0 auto;
                                padding: 20px 0;
                                background-color: #e5e5e5;
                                border-bottom-left-radius: 5px;
                                border-bottom-right-radius: 5px;
                                border-top: 0;
                                box-shadow: 0 0 15px #e5e5e5;
                                text-align: center;
                        }

                        .photo-wrapper {
                                margin: 20px 50px;
                        }

                        .photo-wrapper:after {
                                visibility: hidden;
                                display: block;
                                font-size: 0;
                                content: " ";
                                clear: both;
                                height: 0;
                        }

                        .photo {
                                border-radius: 5px;
                                box-shadow: 0 0 15px #000;
                                float: left;
                                overflow: hidden;
                                position: relative;
                        }

                        .photo > .photo-title {
                                position: absolute;
                                top: 0;
                                left: 0;
                                z-index: 10;
                                width: 100%;
                                height: 100%;
                                pointer-events: none;
                                opacity: 1;

                                transition: all 500ms;
                                -moz-transition: all 500ms;
                                -webkit-transition: all 500ms;
                        }

                        .photo > .photo-title > h2 {
                                display: inline-block;
                                vertical-align: middle;
                                text-shadow: 0 0 3px #777;
                                color: white;
                        }

                        .photo img {
                                height: 110%;
                                width: auto;
                                border-radius: 5px;

                                position: relative;
                                left: -10px;
                                top: -10px;

                                transition: all 500ms;
                                -moz-transition: all 500ms;
                                -webkit-transition: all 500ms;

                                transform: scale(1, 1);
                                -moz-transform: scale(1, 1);
                                -webkit-transform: scale(1, 1);

                                filter: grayscale(100%) blur(2px);
                                -moz-filter: grayscale(100%) blur(2px);
                                -webkit-filter: grayscale(100%) blur(2px);
                        }

                        .photo img:hover {
                                transition: all 500ms;
                                -moz-transition: all 500ms;
                                -webkit-transition: all 500ms;

                                transform: scale(1.1, 1.1);
                                -moz-transform: scale(1.1, 1.1);
                                -webkit-transform: scale(1.1, 1.1);

                                filter: grayscale(0%) blur(0px);
                                -moz-filter: grayscale(0%) blur(0px);
                                -webkit-filter: grayscale(0%) blur(0px);
                        }

                        .photo img:hover ~ .photo-title {
                                transition: all 500ms;
                                -moz-transition: all 500ms;
                                -webkit-transition: all 500ms;

                                opacity: 0.1;
                        }

                        /* Large desktops */
                        @media only screen and (min-width: 1200px) {
                                .container {
                                        max-width: 1200px;
                                }

                                .photo {
                                        width: 200px;
                                        height: 200px;
                                        margin: 10px;
                                }
                        }

                        /* Small desktops */
                        @media only screen and (min-width: 768px) and (max-width: 1199px) {
                                .container {
                                        max-width: 768px;
                                }

                                .photo-wrapper {
                                        margin: 15px 25px;
                                }

                                .photo {
                                        width: 207px;
                                        height: 207px;
                                        margin: 10px 16px;
                                }
                        }

                        /* Tablets */
                        @media only screen and (min-width: 480px) and (max-width: 767px) {
                                .container {
                                        max-width: 480px;
                                }

                                .photo-wrapper {
                                        margin: 10px;
                                }

                                .photo {
                                        width: 190px;
                                        height: 190px;
                                        margin: 10px 20px;
                                }
                        }

                        /* Phones */
                        @media only screen and (max-width: 479px)  {
                                .container {
                                        max-width: 98%;
                                        margin: 0 1%;
                                }

                                .photo-wrapper {
                                        margin: 10px;
                                }

                                .photo {
                                        width: 220px;
                                        height: 220px;
                                        margin: 20px auto;
                                        float: none;
                                }
                        }
                </style>
        </head>
        <body>
                <div class="container">
                        <h2>Image overview</h2>

                        <div class="photo-wrapper">
                                @foreach($images as $image)
                                        <div class="photo">
                                                <img src="http://lunamoonfang.nl/s/{{ $image->Hash }}/full?thumb=1" class="image">
                                                <div class="photo-title"><h2>{{ $image->Name }}</h2></div>
                                        </div>
                                @endforeach
                        </div>

                        <div class="overlay" style="display: none;">
                                <button class="close-overlay">X</button>
                                <img src="" id="overlay-image">
                        </div>
                </div>

                <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>

                <script type="text/javascript">
                        $('.image').click(function() {
                                $('#overlay-image').attr('src', $(this).attr('src').substr(0, $(this).attr('src').length-8));

                                $('.overlay').show({easing: 'swing'});
                        });

                        $('.close-overlay').click(function() {
                                $('.overlay').hide({easing: 'swing'});

                                $('#overlay-image').attr('src', '');
                        });
                </script>
        </body>
</html>