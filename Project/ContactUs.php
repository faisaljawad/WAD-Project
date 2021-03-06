<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>


    <style>
        .body_font{
            font-family:Ubuntu;
            color: white;
        }
        img {
            width: 100%;
            height: auto;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

    </style>
</head>

<body>
    <?php
    include "Functions/functions.php";
    web_header();
    ?>

    <div>
        <img src="Images/contact-us.jpg" alt="contact-us_Banner">
    </div>

    <div class="container-fluid col-lg-10 col-md-10 col-sm-10 col-10 offset-1 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1">
        <div class="row">
            <div class="container-fluid col-xl-7 col-lg-7 col-md-7 col-sm-10 col-10 offset-1 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1 my-5">
                <div>
                    <p>
                        <h1>Give us a Chance to Help You</h1>
                        <h5>Fill out the following form and Let us Know what bothers you :</h5>
                    </p>
                </div>

                <div>
                    <p>
                        <label for="txtEmail">E-mail :</label>
                    </p>
                    <input type="text" id="txtEmail" name="txtEmail" placeholder="Enter your E-mail">
                </div>

                <div>
                    <p>
                        <label for="txtSubject">Subject :</label>
                    </p>
                    <input type="text" id="txtSubject" name="txtSubject" placeholder="Enter Subject">
                </div>

                <div>
                    <p>
                        <label for="txtMessage">Message :</label>
                    </p>
                    <textarea id="txtMessage" name="txtMessage"></textarea>
                </div>
            </div>

            <div class="container-fluid col-xl-3 col-lg-3 col-md-4 col-sm-10 col-10 offset-1 my-5" style="text-align: left">
                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1" style="margin-bottom: 5%;">
                    <p>
                    <h5>Contact with us :</h5>
                    <h6 style="text-align: left">For Support and Any Query<br>Contact us at <a href="#">contact@rackup.pk</a></h6>
                    </p>
                </div>

                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1">
                    <p>
                        <h5>Where to find us?</h5>
                        <h6 style="text-align: left"><a href="https://www.google.com/maps/place/University+of+Central+Punjab/@31.4469043,74.2660429,17z/data=!3m1!4b1!4m5!3m4!1s0x3919017432b1835b:0xe396992a5b05891c!8m2!3d31.4468997!4d74.2682316">UCP Lahore</a>
                        <br>1 - Khayaban-e-Jinnah Road
                        <br>Johar Town, Lahore, Pakistan
                        <br>Zip : 54000</h6>
                    </p>
                </div>

                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1">
                    <p>
                        <h5>Ways to Contact us:</h5>
                        <div style="font-size:xx-large">
                            <a href="http://www.facebook.com"><i class="fab fa-facebook-square icon_color"></i></a>
                            <a href="http://www.gmail.com"><i class="fab fa-google-plus-square icon_color"></i></a>
                            <a href="http://www.instagram.com"><i class="fab fa-instagram icon_color"></i></a>
                            <a href="http://www.twitter.com"><i class="fab fa-twitter-square icon_color"></i></a>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="location-Images">
        <img src="Images/location.PNG" alt="Location_Banner">
    </div>

    <?php
    web_footer();
    ?>

</body>
</html>