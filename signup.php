<?php
require 'header.php';
require_once 'config.php';

?>
<!DOCTYPE html>
<html lang="en">

<body>
<div class="wrapper">
    <b>Create Account</b>
    <br>
    <br>
    <form action="register.php" method="post">
        <div class="form-group">
            <label>Full Name:<sup>*</sup></label>
            <input class="form-control" type="text" name="fullname" autocomplete='off'>
        </div>
        <div class="form-group">
            <label>Email:<sup>*</sup></label>
            <input type="email" name="email" class="form-control" autocomplete='off'>

        </div>
        <div class="form-group">
            <label>Username:<sup>*</sup></label>
            <input type="text" name="username" class="form-control" autocomplete='off'>

        </div>
        <div class="form-group">
            <label>Password:<sup>*</sup></label>
            <input type="password" name="password" class="form-control">

        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Create Account">
        </div>
    </form>
</body>
</html>
<?php
require_once "footer.php";