<?php

include 'connectdb.php';

if(isset($_POST['sign_up_button'])) {
    if ((!isset($_POST['name']) || trim($_POST['name']) == '') or (!isset($_POST['username']) || trim($_POST['username']) == '') or (!isset($_POST['email']) || trim($_POST['email']) == '') or (!isset($_POST['password']) || trim($_POST['password'] == ''))) {
        $message = 'Please fill in the required fields!';
    } else {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $select = mysqli_query($conn, "SELECT * FROM `user_profile` WHERE email = '$email' AND password = '$pass'") or die('query failed');
        if (mysqli_num_rows($select) > 0) {
            $message = 'User already exists';
        } else {
            $insert = mysqli_query($conn, "INSERT INTO `user_profile`(full_name, username, email, password) VALUES('$name', '$username', '$email', '$password')") or die('query failed');
            if ($insert) {
                $message = 'Registered successfully!';
                header('location: index.php');
            } else {
                $message = 'Registration failed!';
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang = "eng">
    <head>
        <title>AquaEmi - Login</title>
        <meta name = "description" content = "AquaEmi is a groundbreaking project aiming to revolutionize water pollution control through the use of geolocation technology.">
        <link rel = "stylesheet" type = "text/css" href = "../static/signup.css">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/b20eaf92de.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    </head>
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
    </head>
    <body>
        <section class = "navigation" id = "navigation">
            <nav>
                <div class = "navigation_bar" id = "navigation_bar">
                    <img src="../static/images/logo.png" alt="AquaEmi's logo" style = "width: 12.5vw; height: 4.5vw;">
                    <div class = "navigation_keys" id = "navigation_keys">
                        <div class = "subjects" id = "subjects">
                            <p><a href = "index.html" title = "My water" style = "text-decoration: none; color: #00A66F;">My water</a></p>
                            <p><a href = "map.html" title = "Map" style = "text-decoration: none; color: #00A66F;">Map</a></p>
                            <p><a href = "travel.html" title = "Travel" style = "text-decoration: none; color: #00A66F;">Travel</a></p>
                            <p><a href = "news.html" title = "News & Rankings" style = "text-decoration: none; color: #00A66F;">News & Rankings</a></p>
                            <p><a href = "info.html" title = "Info" style = "text-decoration: none; color: #00A66F;">Info</a></p>
                        </div>
                        <div class = "tools" id = "tools">
                            <img src = "../static/images/search.png" alt="AquaEmi's search icon" style = "width: 2vw" id = "search_engine">
                            <a href = "index.html"><img src = "../static/images/notifications.PNG" alt="AquaEmi's notifications icon" style = "width: 1.75vw"></a>
                            <a href = "profile.html"><img src = "../static/images/profile.PNG" alt="AquaEmi's profile icon" style = "width: 1.7vw;"></a>
                        </div>
                    </div>
                </div>
            </nav>
        </section>
        <section>
            <div class = "overlay_search" id = "overlay_search">
                <div class = "search_bar" id = "search_bar">
                    <img src = "../static/images/search_back.PNG" style = "width: 1.5vw; height: 0.5w; margin-bottom: -0.15vw;" id = "search_back">
                    <input type = "text" id = "search_content" name = "search_content" placeholder = "Enter your location..." style = "font-size: 1vw;">
                    <i class="fa-solid fa-x fa-2xs" style="color: #00a56f;" id = "clear_search" onclick = "document.getElementById('search_content').value = ''"></i>
                </div>
                <div class = "search_result_box" id = "search_result_box">
                    <div class = "search_result" id = "search_result">
                        <img src = "../static/images/location.PNG" style = "width: 1vw; height: 1.3vw;">
                        <p style = "font-size: 1vw; color: #616161; margin: 0.2vw 0 0 0.7vw; ">Sai Gon river, Ho Chi Minh city, Vietnam</p>
                        <p style = "font-size: 0.8vw; font-weight: bold; margin: 0.3vw 0 0 0.7vw;">2.1M followers</p>
                        <div class = "wqi_search_result" id = "wqi_search_result">50</div>
                    </div>
                    <div class = "search_result" id = "search_result">
                        <img src = "../static/images/location.PNG" style = "width: 1vw; height: 1.3vw;">
                        <p style = "font-size: 1vw; color: #616161; margin: 0.2vw 0 0 0.7vw; ">Sai Gon river, Ho Chi Minh city, Vietnam</p>
                        <p style = "font-size: 0.8vw; font-weight: bold; margin: 0.3vw 0 0 0.7vw;">2.1M followers</p>
                        <div class = "wqi_search_result" id = "wqi_search_result">50</div>
                    </div>
                </div>
            </div>
            <div class = "content" id = "content">
                <p style = "font-size: 2.5vw; color: #009966; font-family: 'Inter', sans-serif; font-weight: bold; margin: 0 0 1vw 0;">SIGN UP</p>
                <?php
                    if(isset($message)){
                        echo '<p class = "error" id = "error">'.$message.'</p>';
                    }
                ?>
                <form action = "" method = "post">
                    <div class = "login_content" id = "login_content">
                        <p class = "labels">Full name:</p>
                        <input class = "name" id = "name" name = "name" placeholder = "Full name" style = "margin: 0 0 1vw 0;"></br>
                        <p class = "labels">Username:</p>
                        <input class = "username" id = "username" name = "username" placeholder = "Username" style = "margin: 0 0 1vw 0;"></br>
                        <p class = "labels" style = "margin: 0 0 1vw -23vw">Email Address:</p>
                        <input type = "email" class = "email" id = "email" name = "email" placeholder = "Email adress" style = "margin: 0 0 1vw 0;"></br>
                        <p class = "labels">Password:</p>
                        <input type = "password" class = "password" id = "password" name = "password" placeholder = "Password">
                        <p style = "font-size: 0.9vw; font-family: 'Inter', sans-serif; font-weight: normal; margin: 0.7vw 0 0 15vw;"><a href = "login.php" style = "text-decoration: none; color: #006644;">Already have an account? Login now!</a></p>
                    <button type = "submit" class = "sign_up_button" id = "sign_up_button" name = "sign_up_button">SIGN UP</button>
                </form>
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
    <script>
        $('#login_button').click(function()
        {
            $('#error').text = "";
            if((!$("#name").val()) || (!$("#username").val()) || (!$("#email").val()) || (!$("#password").val())) {
               $('#error').text("Please fill in the required information.")
            } 
        });
    </script>
</html>