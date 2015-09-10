@extends('home.master', ['polymer' => true])

@section('header')
        <img src="/assets/image/headers/music.jpg" />

        <h1>Music</h1>
@stop

@section('content')
        <div class="text-center">
                <span id="currentOrRecent"><i class="fa fa-circle-o-notch fa-spin"></i></span><br />
                <span id="track">Loading</span><br />
                <span id="artist"></span><br />
                <span id="album"></span>

                <paper-material elevation="2">
                        <table class="font-light" id="topAlbumsTable">
                                <caption>
                                        <h3 class="font-light">Top 5 Albums<h3>
                                </caption>

                                <thead>
                                        <tr>
                                                <th class="font-medium">
                                                        Artist
                                                </th>
                                                <th class="font-medium">
                                                        Album
                                                </th>
                                        </tr>
                                </thead>

                                <tbody id="topAlbums"></tbody>
                        </table>
                </paper-material>

                <paper-material elevation="2">
                        <table class="font-light" id="topTrackTable">
                                <caption>
                                        <h3 class="font-light">Top 5 Tracks<h3>
                                </caption>

                                <thead>
                                        <tr>
                                                <th class="font-medium">
                                                        Artist
                                                </th>
                                                <th class="font-medium">
                                                        Track
                                                </th>
                                        </tr>
                                </thead>

                                <tbody id="topTracks"></tbody>
                        </table>
                </paper-material>
        </div>
@stop

@section('extraCSS')
        <style type="text/css">
                table {
                        border-collapse: collapse;
                        width: 100%;
                        margin: 20px 0;
                }

                caption {
                        border-bottom: 0px;
                        text-align: center;
                }

                th {
                        border-top: 1px solid #bbb;
                        padding: 5px 0px;
                        text-align: center;
                }

                td {
                        padding: 5px;
                        border-top: 1px solid #bbb;
                }

                td:nth-child(1) {
                        width: 30%;
                }

                tbody tr:hover {
                        background-color: #607D8B;
                        color: white;
                }

                tbody tr:hover a {
                        color: white;
                        text-decoration: underline;
                }

                .font-light {
                        font-weight: 300;
                }

                #currentOrRecent {
                        font-weight: 300;
                        font-size: 25px;
                        letter-spacing: -2px;
                }

                #track {
                        font-weight: 600;
                        font-size: 35px;
                        letter-spacing: -2px;
                }

                #track::after {
                        content: "by";
                        display: block;
                        height: 0px;
                        margin-bottom: -10px;
                        font-size: 30px;
                        font-weight: 200;
                        font-style: italic;
                }

                #artist {
                        font-weight: 400;
                        font-size: 30px;
                }

                #album {
                        font-weight: 200;
                        font-size: 30px;
                        letter-spacing: -2px;
                }
        </style>
@stop

@section('extraJS')
        <script type="text/javascript">
                $(window).load(function() {
                        getMusicData();

                        setInterval(function() {
                                getMusicData();
                        }, 5000);
                });

                function getMusicData() {
                        //Get the top 5 albums
                        $.ajax({
                                url: "http://ws.audioscrobbler.com/2.0/?method=user.gettopalbums&user=duckthom&api_key=4540282aa7e002408e12ad79f027d8b9&format=json&period=overall&limit=5",
                                dataType: "json",
                                method: "GET",
                                async: true,
                                success: function(data) {
                                        var text = '';

                                        for (var i = 0; i < 5; i++) {
                                                var album 		= data.topalbums.album[i];

                                                var albumName 	= album.name;
                                                var albumLink 	= album.url;
                                                var playcount 	= album.playcount;
                                                var artistName 	= album.artist.name;
                                                var artistLink 	= album.artist.url;

                                                text += "<tr><td><a href='" +
                                                artistLink +
                                                "'>" +
                                                artistName +
                                                "</a></td><td><a href='" +
                                                albumLink +
                                                "'>" +
                                                albumName +
                                                "</a> (" +
                                                playcount +
                                                (playcount === "1" ? " play" : " plays") +
                                                ")</td></tr>";
                                        };

                                        $("#topAlbums").html(text);
                                },
                                failure: function() {
                                        $("#topAlbums").append("<tr><td class='error'>Couldn\'t fetch top 5 albums, please refresh the page.</td></tr>");
                                }
                        });

                        // Get the top 5 tracks
                        $.ajax({
                                url: "http://ws.audioscrobbler.com/2.0/?method=user.gettoptracks&user=duckthom&api_key=4540282aa7e002408e12ad79f027d8b9&format=json&period=overall&limit=5",
                                dataType: "json",
                                method: "GET",
                                async: true,
                                success: function(data) {
                                        var text = '';

                                        for (var i = 0; i < 5; i++) {
                                                var track 		= data.toptracks.track[i];

                                                var trackName 	= track.name;
                                                var trackLink 	= track.url;
                                                var playcount 	= track.playcount;
                                                var artistName 	= track.artist.name;
                                                var artistLink 	= track.artist.url;

                                                text += "<tr><td><a href='" +
                                                artistLink +
                                                "'>" +
                                                artistName +
                                                "</a></td><td><a href='" +
                                                trackLink +
                                                "'>" +
                                                trackName +
                                                "</a> (" +
                                                playcount +
                                                (playcount === "1" ? " play" : " plays") +
                                                ")</td></tr>";
                                        };

                                        $("#topTracks").html(text);
                                },
                                failure: function() {
                                        $("#topTracks").append("<tr><td class='error'>Couldn\'t fetch top 5 albums, please refresh the page.</td></tr>");
                                }
                        });

                        // Get the current track
                        $.ajax({
                                url: "http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=duckthom&api_key=4540282aa7e002408e12ad79f027d8b9&format=json&limit=1",
                                dataType: "json",
                                method: "GET",
                                async: true,
                                success: function(data) {
                                        if (typeof(data.recenttracks.track[0]) != "undefined") {
                                                // This code will be used if the user is currenly listening to something

                                                var track 		= data.recenttracks.track[0];
                                                var prefix		= "Recently played";
                                        }/* else {
                                                // If the user is not listening to anything, show the latest track that they listened to

                                                var track 		= data.recenttracks.track;
                                                var prefix 		= "<i class='fa fa-pause'></i> &nbsp; Recently played";
                                        }*/

                                        var trackName 	= track.name;
                                        var artistName 	= track.artist['#text'];
                                        var albumName 	= (track.album['#text'] != '' ? "[" + track.album['#text'] + "]" : "");

                                        $("#currentOrRecent").html(prefix);
                                        $("#track").html(trackName);
                                        $("#artist").html(artistName);
                                        $("#album").html(albumName);
                                },
                                error: function(xhr, textStatus, errorThrown) {
                                        $("#track").html("Couldn\'t fetch the recent track. Reloading...");
                                }
                        });
                }
        </script>
 @stop
