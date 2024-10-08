<!DOCTYPE html>
<html lang = "en">
    <he>
        <title>AquaEmi - Article "More than 170 trillion plastic particles found in the ocean as pollution reaches ‘unprecedented’ levels"</title>
        <meta name = "description" content = "[Description about AquaEmi]">
        <link rel = "stylesheet" type = "text/css" href = "../static/article3.css">
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
                <img src="../static/images/article3 (headline).png" alt="AquaEmi's Article3" style = "width: 100%; height: 20%">
                <div class = "article" id = "article">
                    <div class = "article_content" id = "article_content">
                        <p style = "font-size: 2.2vw; font-weight:900; line-height: 3vw; color:#00704b">More than 170 trillion plastic particles found in the ocean as pollution reaches ‘unprecedented’ levels</p>
                        <p style = "font-size: 0.9vw; margin-top: -1.5vw; line-height: 1.2vw;">Written by Laura Paddison, CNN <br> 12:31 PM EST, Wed March 8, 2023 </p>
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
                            <p style = "font-size: 1vw;">The <a href = "http://www.cnn.com/2023/03/04/world/un-oceans-treaty-biodiversity-climate-intl/index.html" style = "text-decoration: none; color:#00cf8a; font-weight: bold;">world’s oceans</a> are polluted by a “plastic smog” made up of an estimated 171 trillion <a href = "https://www.cnn.com/2019/04/16/health/ocean-plastic-study-scn/index.html" style = "text-decoration: none; color: #00cf8a; font-weight: bold;">plastic particles</a> that if gathered would weigh around 2.3 million tons, according to a <a href = "https://journals.plos.org/plosone/article?id=10.1371/journal.pone.0281596" style = "text-decoration: none; color: #00cf8a; font-weight: bold;">new study</a>.</p>
                            <p style = "font-size: 1vw;">A team of international scientists analyzed global data collected between 1979 and 2019 from nearly 12,000 sampling points in the Atlantic, Pacific and Indian oceans and the Mediterranean Sea.</p>
                            <p style = "font-size: 1vw;">They found a “rapid and unprecedented” increase in ocean plastic pollution since 2005, according to the study published Wednesday in the journal PLOS ONE.</p>
                            <p style = "font-size: 1vw;">“It is much higher than previous estimates,” Lisa Erdle, director of research and innovation at the 5 Gyres Institute and an author on the report, told CNN.</p>
                            <p style = "font-size: 1vw;">Without urgent policy action, the rate at which plastics enter the oceans could increase by around 2.6 times between now and 2040, the study found. <a href = "https://www.cnn.com/2022/09/16/us/plastic-recycling-climate-impact-lbg/index.html" style = "text-decoration: none; color:#00cf8a; font-weight: bold;">Plastic production</a> has soared in the last few decades, <a href = "https://www.cnn.com/2023/02/05/energy/single-use-plastics-volume-grows-climate-intl-hnk/index.html" style = "text-decoration: none; font-weight: bold; color: #00cf8a">especially single-use plastics</a>, and waste management systems have not kept pace. Only <a href = "https://www.oecd.org/environment/plastic-pollution-is-growing-relentlessly-as-waste-management-and-recycling-fall-short.htm" style = "text-decoration: none; font-weight: bold; color: #00cf8a">around 9%</a> of global plastics are recycled each year.</p>
                            <p style = "font-size: 1vw;">Huge amounts of that plastic waste end up in the oceans. The majority comes from land, <a href = "https://www.cnn.com/2019/06/24/health/plastic-pollution-rivers-oceans-scn-intl/index.html" style = "text-decoration: none; color: #00cf8a; font-weight: bold;">swept into rivers </a>– by rain, wind, overflowing storm drains and littering – and transported out to sea. A smaller but still significant amount, such as fishing gear, is lost or simply dumped into the ocean.</p>
                            <p style = "font-size: 1vw;">Once plastic gets into the ocean, it doesn’t decompose but instead tends to break down into tiny pieces. These particles “are really not easily cleaned up, we’re stuck with them,” Erdle said.</p>
                            <p style = "font-size: 1vw;">Marine life can get entangled in plastic or mistake it for food. Plastic can also leach toxic chemicals into the water.</p>
                            <p style = "font-size: 1vw;">And it isn’t just an environmental disaster; plastic is also a <a href = "https://www.cnn.com/2022/09/16/us/plastic-recycling-climate-impact-lbg/index.html" style = "text-decoration: none; color: #00cf8a; font-weight: bold;">huge climate problem</a>. Fossil fuels are the raw ingredient for most plastics, and they produce planet-heating pollution throughout their lifecycle – from production to disposal</p>
                            <img src="../static/images/picture1_article3.png" alt="AquaEmi's Article3 first picture" style = "width: 100%; height: 100%;">
                            <p style = "font-size: 0.8vw; font-style: italic; margin: 1vw 4vw">Plastic pollution on a beach in Honduras.</p>
                            <p style = "font-size: 1vw;">Figuring out exactly how much plastic is in the ocean is a hard exercise. “The ocean is a complex place. There are lots of ocean currents, there are changes over time due to weather and due to conditions on the ground,” Erdle said.</p>
                            <p style = "font-size: 1vw;">The researchers spent years poring over peer-reviewed papers as well as unpublished findings from other scientists to try to collate the most extensive record they could – both in terms of timeframe and geography.</p>
                            <p style = "font-size: 1vw;">Most of the study’s samples were collected in the North Pacific and North Atlantic, where the majority of data exists. The study authors say more data is still needed for areas including the Mediterranean Sea, Indian Ocean and the South Atlantic and South Pacific.</p>
                            <p style = "font-size: 1vw;">“This research opened my eyes to how challenging plastic in the ocean is to measure and characterize and underscores the need for real solutions to the problem,” Win Cowger, a research scientist at Moore Institute for Plastic Pollution Research in California and a study author, said in a statement.</p>
                            <p style = "font-size: 1vw;">Since the 1970s, there has been a slew of agreements aimed at stemming the tide of plastic pollution reaching the ocean, yet they are mostly voluntary, fragmented and rarely include measurable targets, the study noted.</p>
                            <p style = "font-size: 1vw;">The study authors call for urgent international policy intervention. “We clearly need some solutions that have teeth,” Erdle said.</p>
                            <img src="../static/images/picture2_article3.png" alt="AquaEmi's Article3 second picture" style = "width: 100%; height: 100%;">
                            <p style = "font-size: 0.8vw; font-style: italic; margin: 1vw 4vw">A bird is surrounded by ocean plastic on the Northwestern Hawaiian Islands.</p>
                            <p style = "font-size: 1vw;">The United Nations has agreed to create a <a href = "https://www.cnn.com/2022/03/02/world/plastics-treaty-environment-climate-un-intl/index.html" style = "text-decoration: none; color: #00cf8a; font-weight: bold;">legally binding global plastics treaty</a> by 2024, which would address the whole life of plastics from production to disposal. But big divisions remain over whether this should include cuts in plastic manufacturing, which is predicted to <a href = "https://www.science.org/content/article/next-30-years-we-ll-make-four-times-more-plastic-waste-we-ever-have" style = "text-decoration: none; color:#00cf8a; font-weight: bold;">quadruple</a> by 2050.</p>
                            <p style = "font-size: 1vw;">Judith Enck, a former EPA regional administrator and now-president of Beyond Plastics, a non-profit focused on research and consumer education, said that policies to reduce the amount of plastic produced in the first place are the only real solution, especially as companies are continuing to find new ways to pump more plastics into the market.</p>
                            <p style = "font-size: 1vw;">“The plastics and petrochemical industries are making it impossible to curb the amount of plastic contaminating our oceans,” Enck told CNN by email.</p>
                            <p style = "font-size: 1vw;">“New research is always helpful, but we don’t need to wait for new research to take action — the problem is already painfully clear, in the plastic accumulating in our oceans, air, soil, food, and bodies.” Enck said.</p>
                        </div>
                    </div>
                    <div class = "others" id = "others">
                        <p style = "font-weight: bold; color: #919191; font-size: 1vw; margin-left: 1vw">Related articles</p>
                        <div class = "related_article" id = "related_article" style = "height: 7.4vw">
                            <a href = "{{ url_for('article1_page') }}"><img src="../static/images/related article1.png" alt="AquaEmi's related articles" style = "width: 7vw; height: 7.6vw"></a>
                            <div class = "related_article_content" id = "related_article_content">
                                <a href = "{{ url_for('article1_page') }}" class = "name"><p style = "font-size: 1vw; font-weight: bold;">US agency takes unprecedented action to tackle PFAS water pollution</p></a>
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
                        <div class = "related_article" id = "related_article" style = "height: 7.4vw">
                            <a href = "{{ url_for('article4_page') }}"><img src="../static/images/related article4.png" alt="AquaEmi's related articles" style = "width: 7vw; height: 7.6vw"></a>
                            <div class = "related_article_content" id = "related_article_content">
                                <a href = "{{ url_for('article4_page') }}" class = "name"><p style = "font-size: 1vw; font-weight: bold;">Vietnam's groundwater is increasingly polluted</p></a>
                                <a href = "{{ url_for('article4_page') }}"><p style = "font-size: 0.8vw; margin-top: -0.7vw;">Two days ago</p></a>
                                <a href = "{{ url_for('article4_page') }}"><p style = "font-size: 0.7vw; font-weight: bold; color: #646464; ">READ NOW <i class="fa-solid fa-angle-right fa-2xs"></i></p></a>
                            </div>
                        </div>
                        <div class = "related_article" id = "related_article" style = "height: 8.6vw">
                            <a href = "{{ url_for('article5_page') }}"></a><img src="../static/images/related article5.png" alt="AquaEmi's related articles" style = "width: 7vw; height: 8.7vw"></a>
                            <div class = "related_article_content" id = "related_article_content">
                                <a href = "{{ url_for('article5_page') }}" class = "name"><p style = "font-size: 1vw; font-weight: bold;">Current State of Water Pollution Worldwide: WQI Data and Remedial Measures</p></a>
                                <a href = "{{ url_for('article5_page') }}"><p style = "font-size: 0.8vw; margin-top: -0.7vw;">Sat, July 29, 2023</p></a>
                                <a href = "{{ url_for('article5_page') }}"><p style = "font-size: 0.7vw; font-weight: bold; color: #646464;">READ NOW <i class="fa-solid fa-angle-right fa-2xs"></i></p></a>
                            </div>
                        </div>
                    </div>
                </div>
                <p style = "font-size: 1vw; font-weight: bold;">Source: <a href = "https://edition.cnn.com/2023/03/08/world/ocean-plastic-pollution-climate-intl/index.html" style = "text-decoration: none; color: #00A66F">CNN</a></p>
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