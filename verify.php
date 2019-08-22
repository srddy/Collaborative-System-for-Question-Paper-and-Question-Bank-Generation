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
$expertise1 = $_SESSION['expertised'];
$sql3 = mysqli_query($con,"SELECT * FROM questions WHERE subject = '$expertise1' AND verified BETWEEN 0 AND 1 AND expert_id1 != '$useremail2'");
$sql4 = mysqli_query($con,"SELECT * FROM questions WHERE subject= '$expertise1' AND verified BETWEEN 0 AND 1 AND expert_id1 IS NULL ");
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>FAQ</title>


  <link rel='stylesheet prefetch' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>

      <link rel="stylesheet" href="poster.css">
      <script type="text/javascript"></script>

</head>

<body>

  <div class="container">

  <h2>Questions Based on your Expertise</h2>
<div class="accordion">
  <div class="accordion-item">
  <?php
    $i = 1;
    while($row = mysqli_fetch_array($sql3))
    {

      echo "<a>"."Q".$i.".".$row['question_field']."</a>";
      echo "<span>";
      echo "<p>"."<h3>"."By  :  "."</h3>".$row['users_id']."</p>";
      echo "<p>"."<h3>"."Solution  :  "."</h3>".$row['answer_field']."</p>";
      echo "<p>"."<h3>"."Approach  :  "."</h3>".$row['approach']."</p>";
      //echo '<button id = "mybtn">Verify</button>';
      $j = $row['question_id'];
      echo "<a href = 'edit.php?id=$j' >Verify</a>";
      echo "</span>";
      $i = $i + 1;
    }
    while($row1 = mysqli_fetch_array($sql4))
    {
      echo "<a>"."Q".$i.".".$row1['question_field']."</a>";
      echo "<span>";
      echo "<p>"."<h3>"."By  :  "."</h3>".$row1['users_id']."</p>";
      echo "<p>"."<h3>"."Solution  :  "."</h3>".$row1['answer_field']."</p>";
      echo "<p>"."<h3>"."Approach  :  "."</h3>".$row1['approach']."</p>";
      //echo '<button id = "mybtn">Verify</button>';
      $j = $row1['question_id'];
      echo "<a href = 'edit.php?id=$j' >Verify</a>";
      echo "</span>";
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
    <script  src="buttons.js"></script>



</body>

</html>
