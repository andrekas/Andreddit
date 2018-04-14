<?php
require 'header.php';
require_once 'config.php';

?>
<!DOCTYPE html>
<html lang="en">

<body>
<?php
$result = mysqli_query($link,"SELECT * FROM 164773_news");
$queryResults = mysqli_num_rows($result);
if ($queryResults > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $newsid = $row["id"];
        $sql = "SELECT (SELECT COUNT(rate) FROM 164773_news_likes WHERE news = '$newsid' AND rate ='2') AS pos,
     (SELECT COUNT(rate) FROM 164773_news_likes WHERE news = '$newsid' AND rate ='0') AS neg FROM 164773_news_likes";
        $results = mysqli_fetch_assoc(mysqli_query($link, $sql));
        $score = $results['pos'] - $results['neg'];
        $sql = "UPDATE 164773_news
             SET score = $score
             WHERE id= $newsid;";
        mysqli_query($link, $sql);
    }
}
$sql = 'SELECT * FROM 164773_news ORDER BY ABS((`score`) / POWER(TIMESTAMPDIFF(second,`added`, NOW()) / 3600, 1.8)) DESC';
$result = mysqli_query($link, $sql);
$queryResults = mysqli_num_rows($result);

if ($queryResults > 0) {
    echo "<div class='container'>
        <div class='row'>
          <div class='col m5'>
            <h3>News</h3>    
          </div>
        </div>
          <ul class='collection'>";
    while ($row = mysqli_fetch_assoc($result)) {
        $newsid = $row['id'];
        $sql = "SELECT (SELECT COUNT(rate) FROM 164773_news_likes WHERE news = '$newsid' AND rate ='2') AS pos,
        (SELECT COUNT(rate) FROM 164773_news_likes WHERE news = '$newsid' AND rate ='0') AS neg FROM 164773_news_likes";
        $results = mysqli_fetch_assoc(mysqli_query($link, $sql));
        $score = $results['pos'] - $results['neg'];
        echo "
               <li class='collection-item avatar'>
              <a class='title' style=' cursor:pointer' href='news.php?submit=&id=".$row['id'].";'><b>".$row['title']."</b></a>
              <p align='bottom'>Author: ".$row['adder']." <br>
                 posted on: ".$row['added']."
              </p>
              <a class='secondary-content'>$score<i class='material-icons'>thumbs_up_down</i></a>
              <form action='news.php' method='GET' class='read'>
               <div class='col s10 right-align'>
              
              </div>
              <input type='hidden' name='id' value=".$row['id'].">
             
              </form>
            </li>";



    }
    mysqli_close($link);
}
?>

</div>
</body>
</html>
<?php
require_once "footer.php";
/* echo "<li class='collection-item avatar'>
              <a class='title' style=' cursor:pointer'><b>".$row['title']."</b></a>
              <p align='bottom'>Author: ".$row['adder']." <br>
                 posted on: ".$row['added']."
              </p>
              <a class='secondary-content'>$score<i class='material-icons'>thumbs_up_down</i></a>
              <form id='myForm' name='newsform' action='news.php' method='GET' class='read'>
               <div class='col s10 right-align'>
              <button class='btn btn-info' type='submit' name='submit'>
                Read
              </button>
              </div>
              <input type='hidden' name='id' value=".$row['id'].">

              </form>
            </li>"; */