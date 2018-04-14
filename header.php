<?php
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="news.css">
    <title>Andreddit</title>
</head>
<div id="page-header" class="nav-wrapper">
    <img src="redditlogo.jpg" onclick="location.href='index.php'" height="100" style="float:left; cursor: pointer;  margin-top:10px; ">
    <h2 onclick="location.href='index.php'" style="cursor: pointer">Andreddit</h2>
    <p>Mini-reddit made by Andre</p>
    <ul id="menu">
        <?php
        if(isset($_SESSION['username'])){
            echo "<h5>Hi, <b>"; echo $_SESSION['username']. "</b></h5>";
            echo "
            <li onclick=\"location.href = 'index.php';\">home</li>
            <li onclick=\"location.href = 'submit.php';\">submit</li>
            <li onclick=\"location.href = 'logout.php';\">log out</li>";
        }
        else{
            echo"
            <li onclick=\"location.href = 'index.php';\">home</li>
            <li onclick=\"location.href = 'submit.php';\">submit</li>
            <li onclick=\"location.href = 'login.php';\">login</li>
            <li onclick=\"location.href = 'signup.php';\">sign up</li>";
        }
        ?>
    </ul>
</div>
