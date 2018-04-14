<?php
require_once 'config.php';
require 'header.php';

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<body>

<div id="submitnews" class="submitnews">
    <form action="submitnews.php"  method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Title<sup>*</sup></label>
            <input class="form-control" type="text" name="title" maxlength="200">
        </div>
        <div class="form-group">
            <label>Text<sup>*</sup></label>
            <textarea type="textarea" name="txt" class="form-control" rows="5" maxlength="1000"></textarea>

        </div>
        <div class="form-group" ><br>
            <input type="submit" name="submit" class="btn btn-primary" value="Submit news">
        </div>
    </form>


</div>
</body>
</html>
<?php
require_once "footer.php";