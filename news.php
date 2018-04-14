<?php
require 'header.php';
require_once 'config.php';

$id = mysqli_real_escape_string($link, $_GET['id']);

   $result = mysqli_query($link, "SELECT * FROM 164773_news WHERE id= $id");
   $row = mysqli_fetch_assoc($result);
      echo" <div class='container'>
            <div class='row'>
            <div class='col m12'>
            </div>
            <div class='row'>
            <div class = 'col s12 m12'>
            <div class='card blue-grey lighten-3'>
            <div class='card-content black-text'>
            <span class='card-title'>".$row['title']."</span><br>
            <div style='white-space: pre-wrap;'>".$row['txt']."</div><br><br>
            <p class='right-align'>Author: ".$row['adder']."</p><br>
            <p class='right-align'>Time posted: ".$row['added']."</p>
            </div>
            <div class='card-action right-align'>";

      if (isset($_SESSION['username'])) {
        echo"
        <a href='like.php?id=".$id."'> <i class='material-icons'>thumb_up</i>Like</a>
        <a href='dislike.php?id=".$id."'><i class='material-icons'>thumb_down</i>Dislike</a>";
      }
      else{ echo"<a>Log in to rate</a>";}
      echo"</div>";

if (isset($_SESSION['username'])) {
    if ($_SESSION['username'] == $row['adder']) {
        echo "<form class='register-form' action='editstory.php' method='POST'>
                    <input type='hidden' name='news' value=".$id.">
                    <div class='col s10 offset-s1 center-align'>
                    <button class='btn waves-effect waves-light' type='submit' name='submit'>
                      Edit your story
                    </button>
                    </div>
                    </form>";
    }}
echo" </div>
               </div>";


$sql = "SELECT * FROM 164773_comments WHERE news= '$id'";
      $result = mysqli_query($link, $sql);
      $queryResults = mysqli_num_rows($result);
          echo" <div class = 'col s12 m6'>";
      if ($queryResults > 0) {
          echo"<ul class='collection'>";
         while ($row = mysqli_fetch_assoc($result)) {
           echo "<li class='collection-item avatar'>
                 <span class='title'><b>".$row['txt']."</b></span>
                 <p>Author: ".$row['username']." <br>
                    time posted: ".$row['time']."
                 </p>
               </li>";
         }
         echo"</ul>";
      }
      if (isset($_SESSION['username'])) {
       echo "<form class='register-form' action='comment.php' method='POST'>
                    <input type='hidden' name='news' value=".$id.">
                    <input type='text' name='txt' placeholder='content here'>
                    <div class='col s10 offset-s1 center-align'>
                    <button class='btn waves-effect waves-light' type='submit' name='submit'>
                      Add comment
                    </button>
                    </div>
                    </form>";
      } else {
        echo "<p>Log in to add comments</p>
              </div>";
      }

require_once "footer.php";