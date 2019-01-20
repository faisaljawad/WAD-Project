<?php
require_once "db_connection.php";

function getSidePanel(){
    echo "<div id=\"SidePanel\" class=\"SideNavPanel\">";
    echo "<a class=\"closebtn\" onclick=\"closeNav()\">&times;</a>";
    echo "<a onclick=\"UserTable()\">Users</a>";
    echo "<a href=\"#\">Projects</a>";
    echo "<a href=\"#\">Payment Options</a>";
    echo "</div>";
    echo "<div><button id=\"btnOpen\" onclick=\"openNav()\">&#9776;</button></div>";
}
function getUsers()
{
    global $connection;
    $getQuery = '';
    /*if(isset($_GET['SearchBar'])){
        $user_query = $_GET['SearchBar'];
        $getQuery = "select * from user where first_name like '%$user_query%'";
    }*/

    $getQuery = "select * from user";
    $getResult = mysqli_query($connection,$getQuery);
    $count_user = mysqli_num_rows($getResult);
    if($count_user==0){
        echo "<h4 class='alert-warning align-center my-2 p-2'> No Data Found </h4>";
    }
    while($row = mysqli_fetch_assoc($getResult)){
        $counter = $row['id'];
        $fname = $row['pro_title'];
        $lname = $row['pro_price'];
        $email = $row['pro_image'];
        $password = $row[''];
        $rating = $row[''];
        $dob = $row[''];
        echo "<tr>
            <td class =\"col - xl - 1 col - lg - 1 col - md - 1 col - sm - 1 col - 1\"><button>New</button></td>
            <td class=\"col - xl - 1 col - lg - 1 col - md - 1 col - sm - 1 col - 1\">Counter</td>
            <td class=\"col - xl - 1 col - lg - 1 col - md - 1 col - sm - 1 col - 1\">Username</td>
            <td class=\"col - xl - 1 col - lg - 1 col - md - 1 col - sm - 1 col - 1\">Email</td>
            <td class=\"col - xl - 1 col - lg - 1 col - md - 1 col - sm - 1 col - 1\">Password</td>
            <td class=\"col - xl - 1 col - lg - 1 col - md - 1 col - sm - 1 col - 1\">Rating</td>
            <td class=\"col - xl - 1 col - lg - 1 col - md - 1 col - sm - 1 col - 1\">Skills</td>
            <td class=\"col - xl - 1 col - lg - 1 col - md - 1 col - sm - 1 col - 1\">Edit</td>
            <td class=\"col - xl - 1 col - lg - 1 col - md - 1 col - sm - 1 col - 1\">Delete</td>
            </tr>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Rack-Up Admin Panel</title>

    <style>
        body
        {
            font-family: 'Ubuntu';
        }
        .SideNavPanel {
            height: 100%;
            width: 0;
            position: fixed;
            top: 0;
            left: 0;
            background-color: black;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }
        .SideNavPanel a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }
        .SideNavPanel a:hover {
            color: white;
        }
        .SideNavPanel .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            margin-left: 50px;
        }
        #btnOpen {
            transition: margin-left .75s;
            font-size: x-large;
            cursor: pointer;
            background-color: transparent;
            border: none;
        }
        @media screen and (max-height: 500px) {
            .SideNavPanel {padding-top: 15px;}
            .SideNavPanel a {font-size: 18px;}
        }
        #SearchBar{
            display: none;
        }
        #mainBody{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <?php
    getSidePanel();
    ?>

    <table id="mainBody" class="table table-bordered offset-2 offset-xl-2 offset-lg-2">
        <tr>
            <p><input type="text" id="SearchBar" placeholder="Search.."/></p>
            <?php
            getUsers();
            ?>
        </tr>
    </table>
</div>

<script>
    function openNav() {
        document.getElementById("SidePanel").style.width = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.5)";
    }

    function closeNav() {
        document.getElementById("SidePanel").style.width = "0";
        document.getElementById("btnOpen").style.marginLeft= "0";
        document.body.style.backgroundColor = "white";
    }
    function UserTable()
    {
        closeNav();
        document.getElementById("SearchBar").style.display="block";
        var body = document.getElementById("mainBody");
        body.innerHTML = "<thead>"+
            "<tr>"+
            "<th class=\"col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1\"><button>New</button></th>"+
            "<th class=\"col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1\">Counter</th>"+
            "<th class=\"col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1\">Username</th>"+
            "<th class=\"col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1\">Email</th>"+
            "<th class=\"col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1\">Password</th>"+
            "<th class=\"col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1\">Rating</th>"+
            "<th class=\"col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1\">Skills</th>"+
            "<th class=\"col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1\">Edit</th>"+
            "<th class=\"col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1\">Delete</th>"+
            "</tr>"+
            "</thead>";
    }
</script>
</body>
</html>
