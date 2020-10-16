<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Pokemon Nanaimo Map!</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>
    <style>
        #BattleHeader {
            border: 5px black solid;
            border-bottom: 0;
        }

        #BattleHeader>h1 {
            margin: 0;
        }

        #full-div {
            display: flex;
            flex-direction: row;
            border: 5px black solid;
        }

        #poke-div,
        .battle-data {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-left: 5%;
            padding-right: 5%;
            padding-top: 3%;
            padding: 3%;
        }

        #poke-div {
            flex-shrink: 0;
        }

        .battle-data {
            margin-left: 0px;
            margin-bottom: 5%;
            margin-top: 3%;
            border: 1px black solid;
            background-color: rgba(255, 255, 255, 0.9);
        }

        #map-div {
            display: flex;
            flex-direction: column;
            border-right: 5px black solid;
            padding-left: 5%;
            padding-right: 5%;
            padding-top: 3%;
            justify-content: center;
        }

        .pokedivs {
            display: flex;
            flex-direction: column;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 3%;
        }
    </style>

    <script>
        var map;
        var myMarkers = [];

        function initMap() {
            var nanaimo = {
                lat: 49.159700,
                lng: -123.907750
            };
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: nanaimo
            });
        }

        function clearMarkers() {
            for (var i = 0; i < myMarkers.length; i++) {
                myMarkers[i].setMap(null);
            }
            myMarkers = [];
        }

        $(document).ready(function() {

            console.log("Document ready!");

            $('#reset').click(function() {

                // remove any previous markers and data from JSON
                clearMarkers();
                var showData = $('#battle-data');
                showData.empty();
                var wildData = $('#wild-data');
                wildData.empty();
                var teamData = $('#team-data');
                teamData.empty();

                var url = 'getPokemon.php?reset=true';
                var data = {};
                $.getJSON(url, data, function(data, status) {
                    console.log("Back from the reset");

                    try {
                        $.getJSON(url, data, function(data, status) {
                            console.log("Ajax call completed, status is: " + status);

                            // show the  message from the data
                            $msg = data.message;
                            showData.html($msg);

                            // show the data for each pokemon array
                            $wilddata = data.wilddata;
                            wildData.html($wilddata);

                            $teamdata = data.teamdata;
                            teamData.html($teamdata);

                            data.markers.forEach(function(marker) {
                                var myLatlng = new google.maps.LatLng(marker.lat, marker.long);

                                var myIcon = new google.maps.MarkerImage(("images/" + marker.image), null, null, null, new google.maps.Size(40, 40));

                                var mmarker = new google.maps.Marker({
                                    position: myLatlng,
                                    map: map,
                                    title: marker.name,
                                    icon: myIcon
                                });

                                // add this marker to our array of markers
                                myMarkers.push(mmarker);
                            });
                        })
                    } catch (error) {
                        console.log("Error requesting JSON data: " + error);
                    }
                });
            });

            $('#get-data').click(function() {

                // remove any previous markers
                clearMarkers();

                var showData = $('#battle-data');
                showData.empty();

                var wildData = $('#wild-data');
                wildData.empty();

                var teamData = $('#team-data');
                teamData.empty();

                var url = 'getPokemon.php';
                var data = {
                    q: 'search',
                    text: 'not implemented yet!'
                };
                console.log("Sending request for Pokemon marker list...");

                try {
                    $.getJSON(url, data, function(data, status) {
                        console.log("Ajax call completed, status is: " + status);

                        // show the  message from the data
                        $msg = data.message;
                        showData.html($msg);

                        $wilddata = data.wilddata;
                        wildData.html($wilddata);

                        $teamdata = data.teamdata;
                        teamData.html($teamdata);

                        data.markers.forEach(function(marker) {

                            var myLatlng = new google.maps.LatLng(marker.lat, marker.long);

                            var myIcon = new google.maps.MarkerImage(("images/" + marker.image), null, null, null, new google.maps.Size(40, 40));

                            var mmarker = new google.maps.Marker({
                                position: myLatlng,
                                map: map,
                                title: marker.name,
                                icon: myIcon
                            });

                            // add this marker to our array of markers
                            myMarkers.push(mmarker);
                        });
                    })
                } catch (error) {
                    console.log("Error requesting JSON data: " + error);
                }

            });
        });
    </script>
</head>

<body>
    <div class='header' id="BattleHeader">
        <h1>Live Battle</h1>
    </div>
    <div id="full-div">
        <div id="map-div">
            <div id="map" style="width: 800px; height: 600px"></div>
            <a href="#BattleHeader" id="get-data">Attack! (one round)</a>
            <br>
            <br>
            <a href="#BattleHeader" id="reset">Reset Map</a>
            <div class="battle-data" id="battle-data"></div>
        </div>
        <div id="poke-div">
            <div id="team-data" class="pokedivs"></div>
            <div id="wild-data" class="pokedivs"></div>
        </div>
    </div>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGSxLOCh-pWE4dUZeMw4yvpgAa0fqLBjg&callback=initMap">
    </script>


</body>

</html>