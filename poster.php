<?php
session_start();
$_SESSION['message1'] = "";
$dbhost = 'localhost';
$username1 = 'root';
$password = '';
$dbname = 'innodb';
$con = mysqli_connect("$dbhost" , "$username1" , "$password");
if(!$con)
{
  die("Cannot connect".mqlsql_error());
}
$dbconnect = mysqli_select_db($con , $dbname);
if(!$dbconnect)
{
  die("Cannot connect to db".mqlsql_error());
}
$useremail2 = $_SESSION['email'];
$sql3 = mysqli_query($con,"SELECT * FROM questions WHERE users_id = '$useremail2'");
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>FAQ</title>


  <link rel='stylesheet prefetch' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>

      <link rel="stylesheet" href="poster.css">


</head>

<body>

  <div class="container">

  <h2>Your Posts</h2>
<div class="accordion">
  <div class="accordion-item">
  <?php
    $i = 1;
    if($_SESSION['posted'] == 0)
    {
      echo "<p>"."<h3>"."No posts yet"."</h3>"."</p>";
    }
    while($row = mysqli_fetch_array($sql3))
    {
      echo "<a>"."Q".$i.".".$row['question_field']."</a>";
      echo "<span>";
      echo "<p>"."<h3>"."Solution  :  "."</h3>".$row['answer_field']."</p>";
      echo "<p>"."<h3>"."Approach  :  "."</h3>".$row['approach']."</p>";
      echo "</span>";
      if($row['verified'] == 0)
      {
      $j = $row['question_id'];
      echo "<a href = 'edit1.php?id=$j' >Edit</a>";
      echo "</span>";
      }
      $i = $i + 1;
    }

  ?>

</div>
 <!-- <div class="accordion">
    <div class="accordion-item">
      <a>Why is the moon sometimes out during the day?</a>
      <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
      </div>
    </div>
  </div>-->
</div>
  <script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>



    <script  src="poster.js"></script>




</body>

</html>
