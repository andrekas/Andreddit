<?php
session_start();
include_once 'config.php';
$newsid = mysqli_real_escape_string($link, $_GET['id']);
$name = mysqli_real_escape_string($link, $_SESSION['username']);
$sql = "SELECT * FROM 164773_news_likes WHERE news= $newsid AND username= '$name'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck < 1) {
    if (isset($_SESSION['username'])) {
        $sql = "INSERT INTO 164773_news_likes (username, news, rate)
           VALUES ('$name', '$newsid','0');";
        mysqli_query($link, $sql);
        header("Location: news.php?id=".$newsid);
        exit();
    }
    else{
        exit();
    }
}
else{
    $sql = "UPDATE 164773_news_likes
            SET rate = '0'
            WHERE news= $newsid AND username= '$name'";
    mysqli_query($link, $sql);
    header("Location: news.php?id=".$newsid);
    exit();
}