<?php
session_start();
if (isset($_POST['submit'])) {

require_once 'config.php';

$title = mysqli_real_escape_string($link, $_POST['title']);
$txt = mysqli_real_escape_string($link, $_POST['txt']);
$adder = mysqli_real_escape_string($link, $_SESSION['username']);

$title = xss_block($_POST['title']);
$txt = xss_block($_POST['txt']);
$adder = xss_block($_SESSION['username']);


    if (empty($adder)||empty($title)||empty($txt)) {
        header("location: submit.php?submit=empty");
        exit();
    }
    else {
        $sql = "INSERT INTO 164773_news (title, txt, adder) VALUES ('$title', '$txt', '$adder')";
        mysqli_query($link, $sql);
        header("location: index.php");
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