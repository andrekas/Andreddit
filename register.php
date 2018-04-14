<?php
if (isset($_POST['submit'])) {

    require_once 'config.php';

    $username = mysqli_real_escape_string($link, $_POST['username']);
    $fullname = mysqli_real_escape_string($link, $_POST['fullname']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $email = mysqli_real_escape_string($link, $_POST['email']);

    $password = xss_block($_POST['password']);
    $fullname = xss_block($_POST['fullname']);
    $username = xss_block($_POST['username']);
    $email = xss_block($_POST['email']);

    if (empty($username)||empty($email)||empty($fullname)||empty($password)) {
        header("location: signup.php?signup=empty");
        exit();

    }
    else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("location: signup.php?signup=email");
            exit();
        }
        else {
            $result = mysqli_query($link, "SELECT * FROM 164773_users WHERE username ='$username'");
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                header("Location: signup.php?signup=usernametaken");
                exit();
            }
            else {
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO 164773_users (username, password, fullname, email)
                VALUES ('$username', '$hashedPwd', '$name', '$email');";
                mysqli_query($link, $sql);
                header("Location: login.php");
                exit();
            }
        }
    }
}
else {
        header("Location: signup.php");
        exit();
    }
function xss_block($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}