<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>AquaEmi - News</title>
        <meta name = "description" content = "[Description about AquaEmi]">
        <link rel = "stylesheet" type = "text/css" href = "../static/news.css">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/b20eaf92de.js" crossorigin="anonymous"></script>

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
                <div class = "small_navigation" id = "small_navigation">
                    <div class = "news_navigation" id = "news_navigation"><a href = "news.html" style = "color:#00C986;">News</a></div>
                    <div class = "rankings_navigation" id = "rankings_navigation"><a href = "rankings.html">Rankings</a></div>
                </div>
                <div class = "news_content" id = "news_content">
                    <div class = "headline" id = "headline">
                        <a href = "{{ url_for('article1_page') }}"><img src = "../static/images/article1.png" alt="AquaEmi's first article" style = "width: 100%; height: 70%;"></a>
                        <a href = "{{ url_for('article1_page') }}" class = "name"><p style = "font-size: 2vw; font-weight: bold; margin-left: 0.5vw; margin-top: 1vw;">US agency takes unprecedented action to tackle PFAS water pollution</p>
                        <a href = "{{ url_for('article1_page') }}"><p style = "font-size: 1vw; margin-top: -1vw; margin-left: 0.5vw; font-style: italic;">"The US Environmental Protection Agency is taking unprecedented enforcement action over PFAS water pollution by ordering..."</p></a>
                        <a href = "{{ url_for('article1_page') }}"><p style = "font-size: 1vw; color: #00A66F; margin-left: 0.5vw">2 hours ago</p></a>
                    </div>
                    <div class = "headline_others" id = "headline_others">
                        <div class = "small_article" id = "small_article">
                            <a href = "{{ url_for('article2_page') }}"><img src="../static/images/article2.png" alt="AquaEmi's second article" style = "width: 100%; height: 90%;"></a>
                            <a href = "{{ url_for('article2_page') }}" class = "name"><p style = "font-size: 1vw; font-weight: bold; margin: 0.3vw 0.2vw 0 0.3vw">The Pacific Ocean's seabed could soon be open for deep-sea mining</p></a>
                            <a href = "{{ url_for('article2_page') }}"><p style = "font-size: 0.6vw; color: #00A66F; margin: 0.3vw 0.2vw 0 0.3vw">7 hours ago</p></a>
                        </div>
                        <div class = "small_article" id = "small_article">
                            <a href = "{{ url_for('article3_page') }}"><img src="../static/images/article3.png" alt="AquaEmi's third article" style = "width: 100%; height: 90%;"></a>
                            <a href = "{{ url_for('article3_page') }}" class = "name"><p style = "font-size: 1vw; font-weight: bold; margin: 0.3vw 0.2vw 0 0.3vw">More than 170 trillion plastic particles found in the ocean as pollution reaches ‘unprecedented’ levels</p></a>
                            <a href = "{{ url_for('article3_page') }}"><p style = "font-size: 0.6vw; color: #00A66F; margin: 0.3vw 0.2vw 0 0.3vw">A day ago</p></a>
                        </div>
                        <div class = "small_article" id = "small_article">
                            <a href = "{{ url_for('article4_page') }}"><img src="../static/images/article4.png" alt="AquaEmi's fourth article" style = "width: 100%; height: 90%;"></a>
                            <a href = "{{ url_for('article4_page') }}" class = "name"><p style = "font-size: 1vw; font-weight: bold; margin: 0.3vw 0.2vw 0 0.3vw">Vietnam's groundwater is increasingly polluted</p></a>
                            <a href = "{{ url_for('article4_page') }}"><p style = "font-size: 0.6vw; color: #00A66F; margin: 0.3vw 0.2vw 0 0.3vw">Two days ago</p></a>
                        </div>
                    </div>
                </div>
                <div class = "other_articles" id = "other_articles">
                    <img src="../static/images/article5.png" alt="AquaEmi's fifth article" style = "width: 30%; height: 20%;">
                    <div class = "review_article" id = "review_article">
                        <a href = "{{ url_for('article5_page') }}" class = "name"><p style = "font-size: 1.5vw; font-weight: bold; margin: 0.3vw 0.2vw 0 1vw">More than 170 trillion plastic particles found in the ocean as pollution reaches ‘unprecedented’ levels</p></a>
                        <a href = "{{ url_for('article5_page') }}"><p style = "font-size: 1vw; margin-left: 1vw; font-style: italic;">"Water is an invaluable resource, essential for all life forms on Earth. However, with the growth of human activities, water pollution has become a pressing global issue. The contamination of water bodies by pollutants poses significant threats to..."</p></a>
                        <a href = "{{ url_for('article5_page') }}"><p style = "font-size: 0.8vw; margin: -0.5vw 0.2vw 0 1vw; color: #00A66F">Sat, July 29, 2023</p></a>
                    </div>
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
                    <i class="fa-solid fa-arrow-right" style="color: #008a5c;"></i><br>
                    <div class = "social_media" id = "social_media">
                        <i class="fa-brands fa-square-instagram fa-lg" style="color: #01a26d; margin: 0 0.5vw"></i>
                        <i class="fa-brands fa-pinterest fa-lg" style="color: #01a26d; margin: 0 0.5vw"></i>
                        <i class="fa-brands fa-twitter fa-lg" style="color: #01a26d; margin: 0 0.5vw"></i>
                        <i class="fa-brands fa-facebook fa-lg" style="color: #01a26d; margin: 0 0.5vw"></i>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>