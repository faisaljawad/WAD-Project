<?php
session_start();

function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);
    echo "<script>console.log( 'Printing: " . $output . "' );</script>";
}

require_once "Server/db_connection.php";
$errors=array();
$errors2=array();
$fname="";
$lname="";
$mail="";
$dob="";
if(isset($_POST['sgn_signup_btn']))
{
    $fname = $_POST['sgn_firstname'];
    $lname = $_POST['sgn_lastname'];
    $mail = $_POST['sgn_email'];
    $pass = $_POST['sgn_password'];
    $dob = $_POST['sgn_dob'];
    $pass2 = $_POST['sgn_cnfrmpass'];
    if(empty($fname))
    {
        array_push($errors,"First name is required");
    }
    if(empty($lname))
    {
        array_push($errors,"Last name is required");
    }
    if(empty($mail))
    {
        array_push($errors,"Email is required");
    }
    if(empty($pass))
    {
        array_push($errors,"Password is required");
    }
    if(empty($dob)){
        array_push($errors,"Date of Birth is required");
    }
    if($pass!=$pass2){
        array_push($errors,"The two passwords do not match");
    }
    $user_check_query = "SELECT * FROM user WHERE email='$mail' LIMIT 1";
    $result = mysqli_query($connection, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['email'] === $mail) {
            array_push($errors, "email already exists");
        }
    }
    if(count($errors)==0)
    {
        $password=md5($pass);
        $insert_user = "insert into user (first_name,last_name,email,password,rating,DOB,my_file,Title,Location,Description,hourly_rate) VALUES ('$fname','$lname','$mail','$pass','0.0','$dob','None','Sample Title','Lahore, Pakistan','Im the best','5');";
        $insert = mysqli_query($connection, $insert_user);
    }
}

if(isset($_POST['sin_signin_btn']))
{
    $email=$_POST['lgn_email'];
    $pass=$_POST['lgn_pass'];
    if (empty($email))
    {
        array_push($errors2, "Email is required");
    }
    if (empty($pass)) {
        array_push($errors2, "Password is required");
    }
    if (count($errors2) == 0) {
        $password = md5($pass);
        $query = "SELECT * FROM user WHERE email='$email' AND password='$pass'";
        $results = mysqli_query($connection, $query);
        if (mysqli_num_rows($results) == 0)
        {
            array_push($errors2, "Wrong username/password combination");
        }
        else
            {
            $_SESSION['user_email'] = $email;
            if(!empty($_POST['remember'])) {
                setcookie('user_email', $email, time() + (10 * 365 * 24 * 60 * 60));
                setcookie('user_pass', $pass, time() + (10 * 365 * 24 * 60 * 60));
            } else {
                setcookie('user_email','' );
                setcookie('user_pass', '');
            }
            header('location:mainpage.php?logged_in=You have successfully logged in!');
            //header('location: profile.php');
        }

    }
}

if(isset($_POST['close1']))
{
    $errors2=0;
}
if(isset($_POST['close2']))
{
    $errors=0;
}
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Welcome to Rack-Up</title>
    <style>

        .icon {
            padding: 3%;
            background: dodgerblue;
            color: white;
            min-width: 50px;
            text-align: center;
        }
        body{
            background-image: url("Images/homepage.jpg");position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
        }
        .modalButtons {
            background-color: dodgerblue;
            color: white;
            padding: 15px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }
        .modalButtons:hover {
            opacity: 1;
        }
        input:invalid{
            background-color: red;
        }
    </style>
</head>
<body>
<div>
    <div
    <div id="DivButtons" style="top: 2%;position: fixed;right: 2%">
        <button type="button" class="btn btn-light" id="RegisterBtn">Sign Up</button>
        <button type="button" class="btn btn-light" id="LoginBtn">Login</button>
    </div>

    <button type="button" href="ContactUs.php" style="float: right;margin-top: 10%;border: none;"><i class="fas fa-phone"></i></button>

    <div id="banner">
        <h1>Find The Perfect Freelance Services For Your Business</h1>
        <p id="messageBanner">
            Founded in 2018, Rackup is setup as a freelancing platform for citizens of Pakistan.
            Through this market place employers and freelancers can get connected and get their tasks done.
            Rackup helps in connecting and expanding business with great talents.From Content writing, Graphic designing, Social media marketing,
            SEO, development, Data entry and Virtual Assistant, Mobile phone and Computing,
            Translation and Languages and other legal services all can be done and
            freelancer according to your requirements can be hired just in few clicks.
        </p>
    </div>

    <div class="modal fade" id="LoginModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" id="close1" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-log-in"></span> Login</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" method="post">
                        <?php
                        if (count($errors2)>0) {
                            echo '<script type="text/javascript">
                                  $("#LoginModal").modal();
                                  </script>';

                            echo "<div class=\"error\" style=\"margin-bottom: 3%;\" >";
                            for ($i = 0; $i < count($errors2); $i++) {
                                echo "<li>".$errors2[$i]."</li>";
                            }
                            echo "</div>";
                        }
                        ?>
                        <div class="input-container">
                            <i class="fa fa-envelope icon"></i>
                            <input pattern="^[a-zA-Z][a-zA-Z0-9._%+-]+@[a-z.-]+\.[a-z]{2,4}" class="input-field" type="email" placeholder="Email" name="lgn_email">
                        </div>
                        <div class="input-container">
                            <i class="fa fa-key icon"></i>
                            <input class="input-field" type="password" placeholder="Password" name="lgn_pass">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <div>
                            <button type="submit" class="modalButtons" name="sin_signin_btn">Sign In</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <p>Not a member? <a href="#" id="LogInRedirecter" data-dismiss="modal">Sign Up</a></p>
                    <p>Forgot <a href="#" id="ForgotPaswordRedirector" data-dismiss="modal" >Password?</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="SignUpModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" id="close2" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-user"></span> Sign Up</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" method="post">
                        <?php
                        if (count($errors)>0) {
                            echo '<script type="text/javascript">
                                       $("#SignUpModal").modal();
                                       </script>';

                            echo "<div class=\"error\" style=\"margin-bottom: 3%;\" >";
                            for ($i = 0; $i < count($errors); $i++) {
                                echo "<li>".$errors[$i]."</li>";
                            }
                            echo "</div>";
                        }
                        ?>
                        <div class="input-container">
                            <i class="fa fa-user icon"></i>
                            <input pattern="[[:alpha:]]+" class="input-field" type="text" placeholder="Firstname" name="sgn_firstname" value="<?php echo $fname;?>">
                        </div>
                        <div class="input-container">
                            <i class="fa fa-user icon"></i>
                            <input pattern="[[:alpha:]]+" class="input-field" type="text" placeholder="Lastname" name="sgn_lastname" value="<?php echo $lname;?>">
                        </div>
                        <div class="input-container">
                            <i class="fa fa-envelope icon"></i>
                            <input pattern="^[a-zA-Z][a-zA-Z0-9._%+-]+@[a-z.-]+\.[a-z]{2,4}" class="input-field" type="email" placeholder="Email" name="sgn_email" value="<?php echo $mail;?>">
                        </div>
                        <div class="input-container">
                            <i class="fa fa-user icon"></i>
                            <input pattern="([0-9]{2})\/([1-9]{1}|[10-12]{2})\/([0-9]{4})" class="input-field" type="date" name="sgn_dob" value="<?php echo $dob;?>">
                        </div>
                        <div class="input-container">
                            <i class="fa fa-key icon icon"></i>
                            <input pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d_#.,$]{6,}" class="input-field" type="password" placeholder="Password" name="sgn_password">
                        </div>
                        <div class="input-container">
                            <i class="fa fa-key icon"></i>
                            <input pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d_#.,$]{6,}" class="input-field" type="password" placeholder="Confirm Password" name="sgn_cnfrmpass">
                        </div>
                        <div>
                            <button type="submit" class="modalButtons" name="sgn_signup_btn">Sign Up</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <p>Already have an Account? <a href="#" id="SignInRedirecter" data-dismiss="modal">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ForgotPasswordModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" id="close1" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-log-in"></span> Forgot Password</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                        <div class="input-container">
                            <i class="fa fa-envelope icon"></i>
                            <input pattern="^[a-zA-Z][a-zA-Z0-9._%+-]+@[a-z.-]+\.[a-z]{2,4}" class="input-field" type="email" placeholder="Email" name="lgn_email">
                        </div>
                        <div class="input-container">
                            <i class="fa fa-key icon"></i>
                            <input class="input-field" type="password" placeholder="Last Remembered Password" name="fgtPass">
                        </div>

                        <div class="input-container">
                        <i class="fa fa-key icon"></i>
                        <input class="input-field" type="password" placeholder="Last Remembered Password" name="fgtPass2">
                    </div>
                        <div>
                            <button type="submit" class="modalButtons" name="sin_signin_btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function() {
        $("#ForgotPaswordRedirector").click(function() {
            $("#ForgotPasswordModal").modal();
        });
    });
    $(document).ready(function() {
        $("#LoginBtn").click(function() {
            $("#LoginModal").modal();
        });
    });
    $(document).ready(function() {
        $("#SignInRedirecter").click(function() {
            $("#LoginModal").modal();
        });
    });
    $(document).ready(function() {
        $("#RegisterBtn").click(function() {
            $("#SignUpModal").modal();
        });
    });
    $(document).ready(function() {
        $("#LogInRedirecter").click(function() {
            $("#SignUpModal").modal();
        });
    });
    /*
    var i = 0;
    var messages = {"Message 1","Message 2","Message 3","Message 4","Message 5"};
    slidingTexts();
    function slidingTexts() {
        var msgs = document.getElementById("messageBanner");
        msgs.innerHTML = messages[i];
        i++;
        setTimeout(slidingTexts,3000);
    }*/
</script>
</body>
</html>