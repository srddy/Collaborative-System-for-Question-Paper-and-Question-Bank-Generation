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
if(isset($_POST['submit']))
{
  $subject = $_POST['subject'];
  //str_replace(' ','','\$_POST['subject']');
  //$sql = "SELECT replace('$subject',' ','') ";
  $choice = $_POST['select-choice'];
  $topic = $_POST['topic'];
  //$subject = mysqli_real_escape_string($con,$subject);
  //$topic = mysqli_real_escape_string($con,$topic);
  //echo $subject;
  //echo $choice;
  //echo $topic;
  $sql1 = mysqli_query($con,"SELECT question_id from questiontable where subject = '$subject'");
  $sql2 = mysqli_query($con,"SELECT question_id from questiontable where updatetopic LIKE '%".$topic."%'");
  $row1 = mysqli_fetch_array($sql1);
  $row2 = mysqli_fetch_array($sql2);
  $question1 = $row1['question_id'];
  $question2 = $row2['question_id'];
  //echo $question1;
  //echo "lol";
  //echo $question2;
  //str_replace(' ','','\$_POST['topic']');
  //$sql2 = "SELECT replace('$topic',' ','') ";
  $sql3 = mysqli_query($con,"SELECT updatesubject from questiontable where question_id = '$question1'");
  $sql4 = mysqli_query($con,"SELECT updatetopic from questiontable where question_id = '$question2'");
  $row3 = mysqli_fetch_array($sql3);
  $row4 = mysqli_fetch_array($sql4);
  $updatedsubject = $row3['updatesubject'];
  $updatedtopic = $row4['updatetopic'];
  $sql5 = "UPDATE questiontable SET updatesubject = replace(subject,' ','')";
  $sql6 = "UPDATE questiontable SET updatetopic = replace(topic,' ','')";
  //$result = mysqli_query($con , $sql);
  //$result1 = mysqli_query($con , $sql2);
  //$row1 = mysqli_fetch_array($result);
  //$row2 = mysqli_fetch_array($result1);
  mysqli_query($con , $sql5);
  mysqli_query($con , $sql6);
}
else {
  echo "LOL";
}
//$useremail2 = $_SESSION['email'];
$sql3 = mysqli_query($con,"SELECT * FROM questiontable WHERE updatesubject = '$updatedsubject'  AND difficulty= '$choice' AND updatetopic = '$updatedtopic' ");
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>FAQ</title>


  <link rel='stylesheet prefetch' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>

      <link rel="stylesheet" href="poster.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


</head>
<body>
  <div class="container">

  <h2>Questions With Solutions</h2>
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
      $i = $i + 1;
    }
echo "<br>";
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
    <div class="w3-container">
      <a href="questionpaper.php" class="w3-btn w3-black">Back</a>
    </div>

</body>

</html>
