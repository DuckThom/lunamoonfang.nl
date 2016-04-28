@extends('master', ['title' => 'Music'])

@section('header')

    <div class="music-wrapper">
        <span id="currentOrRecent"><i class="fa fa-circle-o-notch fa-spin"></i></span><br/>
        <span id="track">Loading</span><br/>
        <span id="artist"></span><br/>
        <span id="album"></span>
        <div id="album-art"></div>
    </div>

@endsection

@section('content')
    <div class="column-1">
        <table id="topAlbumsTable">
            <caption>
                <h3>Top 5 Albums ({{ $month }})<h3>
            </caption>

            <thead>
            <tr>
                <th>Plays</th>
                <th>Album</th>
            </tr>
            </thead>

            <tbody id="topAlbums"></tbody>
        </table>
    </div>

    <div class="column-1">
        <table id="topTrackTable">
            <caption>
                <h3>Top 5 Tracks ({{ $month }})<h3>
            </caption>

            <thead>
            <tr>
                <th>Plays</th>
                <th>Track</th>
            </tr>
            </thead>

            <tbody id="topTracks"></tbody>
        </table>
    </div>
@stop

@section('extraJS')
    <script type="text/javascript">
        $(window).load(function () {
            getMusicData();

            setInterval(function () {
                getMusicData();
            }, 5000);
        });

        function sortByPlaycount(a,b) {
            if (parseInt(a.playcount) > parseInt(b.playcount)) {
                return -1;
            }
            if (parseInt(a.playcount) < parseInt(b.playcount)) {
                return 1;
            }

            return 0;
        }

        function getMusicData() {
            //Get the top 5 albums
            $.ajax({
                url: "https://ws.audioscrobbler.com/2.0/?method=user.gettopalbums&user=duckthom&api_key=4540282aa7e002408e12ad79f027d8b9&format=json&period=1month&limit=5",
                dataType: "json",
                method: "GET",
                async: true,
                success: function (data) {
                    var text = '';
                    var albums = data.topalbums.album;

                    var sortedAlbums = albums.sort(sortByPlaycount);

                    for (var i = 0; i < 5; i++) {
                        var album = sortedAlbums[i];

                        var albumName = album.name;
                        var albumLink = album.url;
                        var playcount = album.playcount;
                        var artistName = album.artist.name;
                        var artistLink = album.artist.url;

                        text += "<tr><td>" +
                                        playcount +
                                "</td><td><a href='" +
                                    albumLink +
                                "'>" +
                                    albumName +
                                "</a> <br />by<br /> <a href='" +
                                    artistLink +
                                "'>" +
                                    artistName +
                                "</a></td></tr>";
                    }

                    $("#topAlbums").html(text);
                },
                failure: function () {
                    $("#topAlbums").append("<tr><td class='error'>Couldn\'t fetch top 5 albums, please refresh the page.</td></tr>");
                }
            });

            // Get the top 5 tracks of the past month
            $.ajax({
                url: "https://ws.audioscrobbler.com/2.0/?method=user.gettoptracks&user=duckthom&api_key=4540282aa7e002408e12ad79f027d8b9&format=json&period=1month&limit=5",
                dataType: "json",
                method: "GET",
                async: true,
                success: function (data) {
                    var text = '';
                    var tracks = data.toptracks.track;
                    var sortedTracks = tracks.sort(sortByPlaycount);


                    for (var i = 0; i < 5; i++) {
                        var track = sortedTracks[i];

                        var trackName = track.name;
                        var trackLink = track.url;
                        var playcount = track.playcount;
                        var artistName = track.artist.name;
                        var artistLink = track.artist.url;

                        text += "<tr><td>" +
                                playcount +
                                "</td><td><a href='" +
                                trackLink +
                                "'>" +
                                trackName +
                                "</a> <br />by<br /> <a href='" +
                                artistLink +
                                "'>" +
                                artistName +
                                "</a></td></tr>";
                    }

                    $("#topTracks").html(text);
                },
                failure: function () {
                    $("#topTracks").append("<tr><td class='error'>Couldn\'t fetch top 5 albums, please refresh the page.</td></tr>");
                }
            });

            // Get the current track
            $.ajax({
                url: "https://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=duckthom&api_key=4540282aa7e002408e12ad79f027d8b9&format=json&limit=1",
                dataType: "json",
                method: "GET",
                async: true,
                success: function (data) {
                    var track = data.recenttracks.track[0];

                    if (typeof track['@attr'] != "undefined") {
                        // This code will be used if the user is currenly listening to something
                        var prefix = "<div class='sp sp-wave'></div> &nbsp; Now playing";
                    } else {
                        // If the user is not listening to anything, show the latest track that they listened to
                        var prefix = "<i class='fa fa-pause'></i> &nbsp; Recently played";
                    }

                    var trackName = track.name;
                    var artistName = track.artist['#text'];
                    var albumName = (track.album['#text'] != '' ? "[" + track.album['#text'] + "]" : "");
                    var albumArt = track.image[3]['#text'];

                    $("#currentOrRecent").html(prefix);

                    if ($("#track").html() != trackName) {
                        $("#track").html(trackName);
                        $("#artist").html(artistName);
                        $("#album").html(albumName);
                        $("#album-art").css('background-image', "url(" + albumArt + ")");
                    }

                },
                error: function (xhr, textStatus, errorThrown) {
                    $("#track").html("Couldn\'t fetch the recent track. Reloading...");
                }
            });
        }
    </script>
@stop
