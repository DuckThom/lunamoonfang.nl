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
    <div class="container">
        <div class="column-md-2">
            <table id="topAlbumsTable">
                <caption>
                    <h3>Top 5 Albums ({{ $lastmonth }} to today)<h3>
                </caption>

                <thead>
                <tr>
                    <th>Plays</th>
                    <th>Album</th>
                </tr>
                </thead>

                <tbody id="topAlbums">
                    <tr>
                        <td><i class="fa fa-circle-o-notch fa-spin"></i></td>
                        <td>Loading...</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="column-md-2">
            <table id="topTrackTable">
                <caption>
                    <h3>Top 5 Tracks ({{ $lastmonth }} to today)<h3>
                </caption>

                <thead>
                <tr>
                    <th>Plays</th>
                    <th>Track</th>
                </tr>
                </thead>

                <tbody id="topTracks">
                    <tr>
                        <td><i class="fa fa-circle-o-notch fa-spin"></i></td>
                        <td>Loading...</td>
                    </tr>
                </tbody>
            </table>
        </div>
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
        
        function parseAlbums(albums) {
            var text = "";

            for (var i = 0; i < 5; i++) {
                var album = albums[i];

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
        }
        
        function parseTracks(tracks) {
            var text = "";

            for (var i = 0; i < 5; i++) {
                var track = tracks[i];

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
        }
        
        function parseRecent(recent) {
            var text = "";

            if (typeof recent['@attr'] != "undefined") {
                // This code will be used if the user is currenly listening to something
                var prefix = "<div class='sp sp-wave'></div> &nbsp; Now playing";
            } else {
                // If the user is not listening to anything, show the latest track that they listened to
                var prefix = "<i class='fa fa-pause'></i> &nbsp; Recently played";
            }

            var trackName = recent.name;
            var artistName = recent.artist['#text'];
            var albumName = (recent.album['#text'] != '' ? "[" + recent.album['#text'] + "]" : "");
            var albumArt = recent.image[3]['#text'];

            $("#currentOrRecent").html(prefix);

            if ($("#track").html() != trackName) {
                $("#track").html(trackName);
                $("#artist").html(artistName);
                $("#album").html(albumName);
                $("#album-art").css('background-image', "url(" + albumArt + ")");
            }
        }

        function getMusicData() {
            $.ajax({
                url: "/api/lastfm",
                dataType: "json",
                method: "GET",
                async: true,
                success: function (data) {
                    parseAlbums(data[0].topalbums.album.sort(sortByPlaycount));
                    parseTracks(data[1].toptracks.track.sort(sortByPlaycount));
                    parseRecent(data[2].recenttracks.track[0]);
                }
            });
        }
    </script>
@stop
