<?php
require 'header.php';
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<body>
<div class="wrapper">
    <b>Login</b>
    <br>
    <br>
    <form class="register-form" action="logingin.php" method="POST">
        <label>Username:<sup>*</sup></label>
        <input type="text" name="username" autocomplete=off>
        <label>Password:<sup>*</sup></label>
        <input type="password" name="password" autocomplete=off>
        <div class="col s10 m10 center-align">
            <button class="btn waves-effect waves-light" type="submit" name="submit">
                LogIn
            </button>
        </div>
    </form>
</div>
</body>
</html>
<?php
require_once "footer.php";
