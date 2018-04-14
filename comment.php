<?php
session_start();
if (isset($_POST['submit'])) {

    require_once 'config.php';

    $username = mysqli_real_escape_string($link, $_SESSION['username']);
    $newsid = mysqli_real_escape_string($link, $_POST['news']);
    $txt = mysqli_real_escape_string($link, $_POST['txt']);

    if (empty($username)||empty($newsid)||empty($txt)) {
        header("Location: news.php?id=".$newsid);
        exit();
    }
    else {
        $sql = "INSERT INTO 164773_comments (username, news, txt)
                VALUES ('$username', '$newsid', '$txt');";
        mysqli_query($link, $sql);
        header("Location: news.php?id=".$newsid);
        exit();
    }
}
else {
    header("Location: news.php?id=".$newsid);
    exit();
}
