<?php
session_start();
if (isset($_POST['submit'])) {

    require_once 'config.php';

    $title = mysqli_real_escape_string($link, $_POST['title']);
    $txt = mysqli_real_escape_string($link, $_POST['txt']);
    $id = mysqli_real_escape_string($link, $_POST['id']);

    $title = xss_block($_POST['title']);
    $txt = xss_block($_POST['txt']);

    if (empty($title)||empty($txt)) {
        header(" location: submit.php?submit=empty");
        exit();
    }
    else {
        $sql = "UPDATE 164773_news
                SET title ='$title', txt ='$txt'
                WHERE id = '$id'";
        mysqli_query($link, $sql);
        header("location: news.php?id=".$id);
        exit();
    }
}
else {
    header("location: submit.php");
    exit();
}
function xss_block($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
