<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>AquaEmi - Article "Vietnam's groundwater is increasingly polluted"</title>
        <meta name = "description" content = "[Description about AquaEmi]">
        <link rel = "stylesheet" type = "text/css" href = "../static/article4.css">
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
                            <p><a href = "index" title = "My water" style = "text-decoration: none; color: #00A66F;">My water</a></p>
                            <p><a href = "map" title = "Map" style = "text-decoration: none; color: #00A66F;">Map</a></p>
                            <p><a href = "travel" title = "Travel" style = "text-decoration: none; color: #00A66F;">Travel</a></p>
                            <p><a href = "news" title = "News & Rankings" style = "text-decoration: none; color: #00A66F;">News & Rankings</a></p>
                            <p><a href = "info" title = "Info" style = "text-decoration: none; color: #00A66F;">Info</a></p>
                        </div>
                        <div class = "tools" id = "tools">
                            <img src = "../static/images/search.png" alt="AquaEmi's search icon" style = "width: 2vw" id = "search_engine"></a>
                            <a href = "index"><img src = "../static/images/notifications.png" alt="AquaEmi's notifications icon" style = "width: 1.75vw"></a>
                            <a href = "profile"><img src = "../static/images/profile.png" alt="AquaEmi's profile icon" style = "width: 1.7vw;"></a>
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
                <img src="../static/images/article4 (headline).png" alt="AquaEmi's Article4" style = "width: 100%; height: 20%">
                <div class = "article" id = "article">
                    <div class = "article_content" id = "article_content">
                        <p style = "font-size: 2.2vw; font-weight:900; line-height: 3vw; color:#00704b">Vietnam's groundwater is increasingly polluted</p>
                        <p style = "font-size: 0.9vw; margin-top: -1.5vw; line-height: 1.2vw;">Written by Trần Huỳnh <br> Translated by the AquaEmi team </p>
                        <p style = "font-weight: bold; margin-top: 1.5vw; font-size: 1vw; line-height: 1.2vw; color: #00cf8a">Share this article:</p>
                        <div class = "share_article" id = "share_article">
                            <i class="fa-solid fa-wifi fa-2xs" style="color: #00cf8a;"></i>
                            <i class="fa-brands fa-google fa-2xs" style="color: #00cf8a;"></i>
                            <i class="fa-brands fa-twitter fa-2xs" style="color: #00cf8a;"></i>
                            <i class="fa-brands fa-facebook-f fa-2xs" style="color: #00cf8a;"></i>
                            <i class="fa-brands fa-linkedin-in fa-2xs" style="color: #00cf8a;"></i>
                            <i class="fa-solid fa-envelope fa-2xs" style="color: #00cf8a;"></i>
                        </div>
                        <div class = "text_content" id = "text_content">
                            <p style = "font-size: 1vw; font-weight: bold;">TTO - The information was provided by Professor Harry Futselaar, an international expert in water treatment technology from Saxion University of Applied Sciences, the Netherlands, during the seminar on "Sustainable Water Use/Reuse in Urban Environments" held in Ho Chi Minh City.</p>
                            <p style = "font-size: 1vw;">Professor Harry explained through examples such as producing 1 sheet of A4 paper requires 10 liters of water, 1 apple requires 70 liters of water, 1 cup of coffee requires 140 liters of water, and 1kg of butter consumes 5,000 liters of water... Water consumption by a person goes beyond direct drinking or household use and includes various products and food items.</p>
                            <p style = "font-size: 1vw;">As a result, he shared the information that "currently, each Vietnamese person uses about 3,000 liters of water per day."</p>
                            <p style = "font-size: 1vw;">Professor Harry Futselaar observed that in Vietnam, clean water is becoming a scarce resource due to urbanization and increasing competition among various water usage purposes. This is coupled with excessive groundwater usage, leading to rapid subsidence in major cities.</p>
                            <p style = "font-size: 1vw;">More concerning is the fact that groundwater is increasingly heavily polluted, with over 60% of groundwater being contaminated by chemicals from chemical fertilizers, pesticides, and herbicides.</p>
                            <p style = "font-size: 1vw;">"Therefore, Vietnam needs solutions for water reuse and wastewater treatment for agricultural production," Professor Harry suggested.</p>
                            <p style = "font-size: 1vw;">The seminar was organized by Ton Duc Thang University and Saxion University of Applied Sciences on November 4th.</p>
                        </div>
                    </div>
                    <div class = "others" id = "others">
                        <p style = "font-weight: bold; color: #919191; font-size: 1vw; margin-left: 1vw">Related articles</p>
                        <div class = "related_article" id = "related_article" style = "height: 7.4vw">
                            <a href = "{{ url_for('article1_page') }}"><img src="../static/images/related article1.png" alt="AquaEmi's related articles" style = "width: 7vw; height: 7.6vw"></a>
                            <div class = "related_article_content" id = "related_article_content">
                                <a href = "{{ url_for('article1_page') }}" class = "name"><p style = "font-size: 1vw; font-weight: bold; ">US agency takes unprecedented action to tackle PFAS water pollution</p></a>
                                <a href = "{{ url_for('article1_page') }}"><p style = "font-size: 0.8vw; margin-top: -0.7vw;">2 hours ago</p></a>
                                <a href = "{{ url_for('article1_page') }}"><p style = "font-size: 0.7vw; font-weight: bold; color: #646464;">READ NOW <i class="fa-solid fa-angle-right fa-2xs"></i></p></a>
                            </div>
                        </div>
                        <div class = "related_article" id = "related_article" style = "height: 7.4vw">
                            <a href = "{{ url_for('article2_page') }}"><img src="../static/images/related article2.png" alt="AquaEmi's related articles" style = "width: 7vw; height: 7.4vw"></a>
                            <div class = "related_article_content" id = "related_article_content" style = "padding-right: 1vw">
                                <a href = "{{ url_for('article2_page') }}" class = "name"><p style = "font-size: 1vw; font-weight: bold;">The Pacific Ocean's seabed could soon be open for deep-sea mining</p></a>
                                <a href = "{{ url_for('article2_page') }}"><p style = "font-size: 0.8vw; margin-top: -0.7vw;">7 hours ago</p></a>
                                <a href = "{{ url_for('article2_page') }}"><p style = "font-size: 0.7vw; font-weight: bold; color: #646464; margin-top: -0.3vw;">READ NOW <i class="fa-solid fa-angle-right fa-2xs"></i></p></a>
                            </div>
                        </div>
                        <div class = "related_article" id = "related_article" style = "height: 10vw">
                            <a href = "{{ url_for('article4_page') }}"><img src="../static/images/related article3.png" alt="AquaEmi's related articles" style = "width: 7vw; height: 10vw"></a>
                            <div class = "related_article_content" id = "related_article_content">
                                <a href = "{{ url_for('article3_page') }}" class = "name"><p style = "font-size: 1vw; font-weight: bold;">More than 170 trillion plastic particles found in the ocean as pollution reaches ‘unprecedented’ levels</p></a>
                                <a href = "{{ url_for('article3_page') }}"><p style = "font-size: 0.8vw; margin-top: -0.7vw;">A day ago</p></a>
                                <a href = "{{ url_for('article3_page') }}"><p style = "font-size: 0.7vw; font-weight: bold; color: #646464; ">READ NOW <i class="fa-solid fa-angle-right fa-2xs"></i></p></a>
                            </div>
                        </div>
                        <div class = "related_article" id = "related_article" style = "height: 8.6vw">
                            <a href = "{{ url_for('article5_page') }}"><img src="../static/images/related article5.png" alt="AquaEmi's related articles" style = "width: 7vw; height: 8.7vw"></a>
                            <div class = "related_article_content" id = "related_article_content">
                                <a href = "{{ url_for('article5_page') }}" class = "name"><p style = "font-size: 1vw; font-weight: bold;">Current State of Water Pollution Worldwide: WQI Data and Remedial Measures</p></a>
                                <a href = "{{ url_for('article5_page') }}"><p style = "font-size: 0.8vw; margin-top: -0.7vw;">Sat, July 29, 2023</p></a>
                                <a href = "{{ url_for('article5_page') }}"><p style = "font-size: 0.7vw; font-weight: bold; color: #646464;">READ NOW <i class="fa-solid fa-angle-right fa-2xs"></i></p></a>
                            </div>
                        </div>
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