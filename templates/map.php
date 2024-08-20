<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>AquaEmi - Map</title>
        <meta name = "description" content = "[Description about AquaEmi]">
        <link rel = "stylesheet" type = "text/css" href = "../static/map.css">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/b20eaf92de.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        
        <!-- Leaflet -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

        <link rel="stylesheet" href="../static/dist/MarkerCluster.css">
        <link rel="stylesheet" href="../static/dist/MarkerCluster.Default.css">
        <script src="../static/dist/leaflet.markercluster-src.js"></script>
        
        <!-- Leaflet heatmap plugin: https://github.com/Leaflet/Leaflet.heat -->
        <script src="../static/leaflet-heat.js"></script>
        
        <!-- For search bar -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function() {
                $("#overlay_search").hide();
                $("#search_engine").click(function() { 
                    $("#overlay_search").toggle();
                });
                $("#search_back").click(function() { 
                    $("#overlay_search").toggle();
                });
            });
        </script>

        <script type="text/javascript">
            jQuery(document).ready(function($){
                $('.search_result').each(function() {
                    $(this).attr('data_search_term', $(this).attr('data_search_term').toLowerCase());
                });
                $('#search_content').on('change keydown paste input', function() {
                    var searchTerm = $(this).val().toLowerCase();
                    console.log(searchTerm);
                    $('.search_result').each(function() {
                        console.log($(this).filter('[data_search_term *= ' + searchTerm + ']'));
                        if ($(this).filter('[data_search_term *= ' + searchTerm + ']').length > 0) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                });
            });
        </script>
    </head>
    <body>
        <section class = "navigation" id = "navigation">
            <nav>
                <div class = "navigation_bar" id = "navigation_bar">
                    <img src="../static/images/logo.png" alt="AquaEmi's logo" style = "width: 12.5vw; height: 4.5vw;" onclick="location.href='{{url_for('home_page')}}';">
                    <div class = "navigation_keys" id = "navigation_keys">
                        <div class = "subjects" id = "subjects">
                            <p><a href = "index.html" title = "My water" style = "text-decoration: none; color: #00A66F;">My water</a></p>
                            <p><a href = "map.html" title = "Map" style = "text-decoration: none; color: #00A66F;">Map</a></p>
                            <p><a href = "travel.html" title = "Travel" style = "text-decoration: none; color: #00A66F;">Travel</a></p>
                            <p><a href = "news.html" title = "News & Rankings" style = "text-decoration: none; color: #00A66F;">News & Rankings</a></p>
                            <p><a href = "info.html" title = "Info" style = "text-decoration: none; color: #00A66F;">Info</a></p>
                        </div>
                        <div class = "tools" id = "tools">
                            <img src = "../static/images/search.png" alt="AquaEmi's search icon" style = "width: 2vw" id = "search_engine"></a>
                            <a href = "index.html"><img src = "../static/images/notifications.png" alt="AquaEmi's notifications icon" style = "width: 1.75vw"></a>
                            <a href = "profile.html"><img src = "../static/images/profile.png" alt="AquaEmi's profile icon" style = "width: 1.7vw;"></a>
                        </div>
                    </div>
                </div>
            </nav>
        </section>

        <section>
            <div class = "overlay_search" id = "overlay_search">
                <div class = "search_bar" id = "search_bar">
                    <img src = "../static/images/search_back.png" style = "width: 1.5vw; height: 0.5w; margin-bottom: -0.15vw;" id = "search_back">
                    <input type = "text" id = "search_content" name = "search_content" placeholder = "Enter your location..." style = "font-size: 1vw;">
                    <i class="fa-solid fa-x fa-2xs" style="color: #00a56f;" id = "clear_search" onclick = "document.getElementById('search_content').value = ''"></i>
                </div>
                <div class = "search_result_box" id = "search_result_box">
                    {% for watersource in watersources_data %}
                        <div class = "search_result" id = "search_result" data_search_term="{{watersource.name}}" style="display: none;" onclick="location.href='{{url_for('detail_page', rivername=watersource.name)}}';">
                            <img src = "../static/images/location.png" style = "width: 1vw; height: 1.3vw;">
                            <p style = "font-size: 1vw; color: #616161; margin: 0.2vw 0 0 0.7vw; ">{{watersource.name}}</p>
                            <p style = "font-size: 0.8vw; font-weight: bold; margin: 0.3vw 0 0 0.7vw;">{{watersource.followers}}</p>
                            <div class = "wqi_search_result" id = "wqi_search_result">{{watersource.quality}}</div>
                        </div>
                    {% endfor %}
                </div>
            </div>
            <div class = "content" id = "content">
                <div id = "map" style="width: 100%; height: 45vw"></div>
                <script>
                    var map = L.map('map', {
                        center: [51.505, -0.09],
                        zoom: 3
                    });
                        
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);
    
                    var data = {{ data | safe }};
    
                    // var heat = L.heatLayer(data, {radius: 25, minOpacity: 0.4, gradient: {0.4: 'blue', 0.65: 'lime', 1: 'red'}}).addTo(map);
    
                    var markers = L.markerClusterGroup({
                        iconCreateFunction: function (cluster) {
                            var markers = cluster.getAllChildMarkers();
                            var n = 0;
                            for (var i = 0; i < markers.length; i++) {
                                console.log(markers[i])
                                n += markers[i].number;
                            }
                            n /= Math.max(1, markers.length);
                            n = Math.floor(n);
                            if (n <= 100) {
                                return L.divIcon({ html: '<div><span>' + n + '</span></div>', className: 'marker-cluster marker-cluster-small', /*iconSize: L.point(40, 40)*/ });
                            } else if (n <= 200) {
                                return L.divIcon({ html: '<div><span>' + n + '</span></div>', className: 'marker-cluster marker-cluster-medium', /*iconSize: L.point(40, 40)*/ });
                            } else {
                                return L.divIcon({ html: '<div><span>' + n + '</span></div>', className: 'marker-cluster marker-cluster-large', /*iconSize: L.point(40, 40)*/ });
                            }
                        },
                        spiderfyOnMaxZoom: false, 
                        showCoverageOnHover: false, 
                        zoomToBoundsOnClick: false,
                    });
    
                    for (var i = 0; i < data.length; i++) {
                        var a = data[i];
                        var title = a[2];
                        var marker = L.marker(new L.LatLng(a[0], a[1]), {title: title});
                        marker.number = a[2];
                        marker.bindPopup(title);
                        markers.addLayer(marker);
    
                        // add two nearby marker so it doesn't actually show the marker
                        var title1 = a[2];
                        var marker1 = L.marker(new L.LatLng(a[0], a[1]), {title: title1});
                        marker1.number = a[2];
                        markers.addLayer(marker1);
                    }
    
                    map.addLayer(markers);
                </script>
                <div class = "earth_map" id = "earth_map">
                    <span class = "remove_ranking" id = "remove_ranking"><i class="fa-solid fa-x fa-2xs" style="color: #ffffff;"></i></span>
                    <div class = "rankings" id = "rankings">
                        <p style = "font-size: 2.2vw; ">World WQI Ranking</p>
                        <p style = "font-size: 0.8vw; margin-top: -2vw">[Last updated]</p>
                        <div class = "ranking_board" id = "ranking_board">
                            {% for country in countries_data %}
                                <div class = "ranking_tops" id = "ranking_top1">
                                    <p style = "margin-right: 2vw;"> {{ country.id }} </p>
                                    <img src = "https://flagsapi.com/{{ country.country_code }}/flat/64.png" style = "width: 1.5vw; height: 1vw; margin: 1.2vw 0.4vw 0 0;">
                                    <p style = "margin-right: 5vw;"><a class = "details"> {{ country.name }} </a></p>
                                    <div class = "wqi_rank" id = "wqi_rank" style="margin-left: auto; margin-right: 1vw;"> {{ country.quality }}</div>
                                </div>
                            {% endfor %}
                        </div>
                        <button class = "full_ranking" id = "full_ranking" onclick="location.href='{{url_for('rank_page')}}';">SEE FULL RANKING</button>
                    </div>
                    <img src="../static/images/earth.jpg" alt="AquaEmi's logo" style = "width: 8.5vw; height: 6.4vw; cursor: pointer;" onclick = "location.href='map_earth';">
                </div>
                
            </div>
        </section>

        <footer>
            <div class = "footer" id = "footer">
                <img src="../static/images/logo.png" alt="AquaEmi's logo" style = "width: 19vw; height: 6.5vw; margin-top: 1.3vw">
                <div class = "subjects_footer" id = "subjects_footer">
                    <div class = "first" id = "first">
                        <p>Intro</p>
                        <p>My water</p>
                    </div>
                    <div class = "second" id = "second">
                        <p>Map</p>
                        <p>Travel</p>
                    </div>
                    <div class = "third" id = "third">
                        <p>News and Rankings</p>
                        <p>Profile and notifications</p>
                    </div>
                </div>
                <div class = "mailing_list" id = "mailing_list">
                    <p style = "font-size: 1.2vw; font-weight: bold; color: #008A5C">JOIN OUR MAILING LIST!</p>
                    <input type = "email" class = "email_mailing" id = "email" name = "email" placeholder="Email address">
                    <i class="fa-solid fa-arrow-right fa-sm" style="color: #008a5c;"></i><br>
                    <div class = "social_media" id = "social_media">
                        <i class="fa-brands fa-square-instagram fa-sm" style="color: #01a26d; margin: 0 0.1vw"></i>
                        <i class="fa-brands fa-pinterest fa-sm" style="color: #01a26d; margin: 0 0.1vw"></i>
                        <i class="fa-brands fa-twitter fa-sm" style="color: #01a26d; margin: 0 0.1vw"></i>
                        <i class="fa-brands fa-facebook fa-sm" style="color: #01a26d; margin: 0 0.1vw"></i>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>