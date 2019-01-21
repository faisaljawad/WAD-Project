<!DOCTYPE html>
<head>
    <title>
        Contact Us
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>

    <style>
        .body_font{
            font-family:Ubuntu;
            color: white;
        }
    </style>
</head>

<body class="background_image">

<?php
include "Functions/functions.php";
top_header(); ?>

    <div class="container body_font mt-5">
        <div class="form-row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <form>
                    <div class="form-row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <label for="Email"><strong>Email:</strong></label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <input type="text" class="inputbars" id="Email" placeholder="Enter Your Email Here">
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <label for="Subject"><strong>Subject:</strong></label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <input type="text" class="inputbars" id="Subject" placeholder="Enter Your Subject Here">
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <label for="Message"><strong>Message:</strong></label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <textarea rows="6" class="textare_style" id="Message" placeholder="Enter Your Message Here"></textarea>
                        </div>
                    </div>

                    <div class="form-row my-3">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <button type="submit" class="btn btn-primary btn-block"> <strong>Submit</strong> </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="form-row rackup_style">
                    <div class="col-xl-5 col-lg-4 col-md-1 col-sm-1 col-1 d-none d-lg-block"></div>
                    <div class="col-xl-7 col-lg-8 col-md-11 col-sm-11 col-11">
                        Rackup Limited
                    </div>
                </div>
                <div class="form-row address_style">
                    <div class="col-xl-5 col-lg-4 col-md-1 col-sm-1 col-1 d-none d-lg-block"></div>
                    <div class="col-xl-7 col-lg-8 col-md-11 col-sm-11 col-11">
                        <strong>Registered Office</strong><br>
                        173 A-3 P.G.E.C.H.S <br>
                        PIA Main Boulevard <br>
                        Lahore, Pakistan <br>
                        +923054004882 <br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xl-5 col-lg-4 col-md-1 col-sm-1 col-1 d-none d-lg-block"></div>
                    <div class="col-xl-7 col-lg-8 col-md-11 col-sm-11 col-11">
                        <a href="http://www.facebook.com"><i class="fab fa-facebook-square icon_color"></i></a>
                        <a href="http://www.gmail.com"><i class="fab fa-google-plus-square icon_color"></i></a>
                        <a href="http://www.instagram.com"><i class="fab fa-instagram icon_color"></i></a>
                        <a href="http://www.twitter.com"><i class="fab fa-twitter-square icon_color"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>