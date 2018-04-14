<?php
session_start();

if (isset($_POST['submit'])) {

    require 'config.php';

    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    $password = xss_block($_POST['password']);
    $username = xss_block($_POST['username']);


    if (empty($username) || empty($password)) {
        header("Location: login.php?login=empty");
        exit();
    }
    else {
        $sql = "SELECT * FROM 164773_users WHERE username ='$username'";
        $result = mysqli_query($link, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
            header("Location: login.php?login=error");
            exit();
        }
        else {
            if ($row = mysqli_fetch_assoc($result)) {
                $hashedPwdCheck = password_verify($password, $row['password']);
                if ($hashedPwdCheck == false) {
                    header("Location: login.php?login=wrongpassword");
                    exit();
                }
                elseif ($hashedPwdCheck == true) {
                    $_SESSION['username'] = $row[username];
                    header("Location: index.php?login=success");
                    exit();
                }
            }
        }
    }
}
else {
    header("Location: ../prax4/index.php?login=error");
    exit();
}

function xss_block($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
