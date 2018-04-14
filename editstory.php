<?php
include_once 'header.php';
if (isset($_POST['submit'])) {
    include_once 'config.php';
    $id = mysqli_real_escape_string($link, $_POST['news']);
    $result = mysqli_query($link, "SELECT * FROM 164773_news WHERE id= $id");
    $row = mysqli_fetch_assoc($result);

    echo"
<div class='container'>
  <div class='row'>
  </div>
     <h2>Editing story</h2>
     <form class='register-form' action='editnewsconfig.php' method='POST'>
      <input type='hidden' name='id' value=".$id.">
       <input type='text' name='title' value=".$row['title'].">
       <textarea name='txt' rows='12' maxlength='1000'>".$row['txt']."</textarea>
       
       <div class='col s10 offset-s1 center-align'>
       <button class='btn waves-effect waves-light' type='submit' name='submit'>
         Edit the story
       </button>
     </div>
     </form>
    </div>";

}
require_once "footer.php";
