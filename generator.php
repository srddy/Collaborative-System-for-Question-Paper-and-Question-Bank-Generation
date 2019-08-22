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
  $institute = $_POST['institute'];
  $subject1 = $_POST['subject'];
  $grade = $_POST['grade'];
  $noofquestions = $_POST['no_of_questions'];
  $range = $_POST['select-choice'];
  //$sets = $_POST['no_of_sets'];
  $c = 0;
  $d = 0;
  if($range >= 5)
  {
    if( ($noofquestions % $range) == 0 )
    {
      $hard = $noofquestions / $range;
      $c = $noofquestions - $hard;
      if($c % 2 == 0)
      {
        $easy = $c/2;
        $medium = $c/2;
      }
      else {
        $d = $c / 2;
        $medium = round('$d');
        $easy = $c - $medium;
      }
    }
    else {
      $easy = $noofquestions % $range;
      $c = $noofquestions - $easy;
      if($c % 2 == 0)
      {
        $hard = $c/2;
        $medium = $c/2;
      }
      else {
        $d = $c / 2;
        $hard = round('$d');
        $medium = $c - $hard;
      }
    }
  }
  if($range < 5 )
  {
    if( ($noofquestions % $range) == 0 )
    {
      $easy = $noofquestions / $range;
      $c = $noofquestions - $easy;
      if($c % 2 == 0)
      {
        $hard = $c/2;
        $medium = $c/2;
      }
      else {
        $d = $c / 2;
        $medium = round('$c');
        $hard = $c - $medium;
      }
    }
    else {
      $hard = $noofquestions % $range;
      $c = $noofquestions - $hard;
      if($c % 2 == 0)
      {
        $easy = $c/2;
        $medium = $c/2;
      }
      else {
        $d = $c / 2;
        $easy = round('$d');
        $hard = $c - $medium;
      }
    }
  }
}
else {
  echo "lol";
}
$_SESSION['easy'] = $easy;
$_SESSION['medium'] = $medium;
$_SESSION['hard'] = $hard;
$_SESSION['subject3'] = $subject1;
$_SESSION['no_of_questions'] = $noofquestions;
//$_SESSION['no_of_sets'] = $sets;
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title>FAQ</title>


  <!--<link rel='stylesheet prefetch' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>

      <link rel="stylesheet" href="poster.css">
      <meta charset="UTF-8">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel='stylesheet prefetch' href='https://necolas.github.io/normalize.css/3.0.1/normalize.css'>
      <link rel="stylesheet" href="questionpaper.css">
      <script type="text/javascript" src="jquery.min.js"></script>
      <script type="text/javascript" src="questionpaper.js"></script>-->

</head>

<body>

  <div class="container" align = >

  <h2 align = center>Question Paper</h2>
<div class="accordion">
  <div class="accordion-item">
  <?php
    $e = $_SESSION['easy'];
    $m = $_SESSION['medium'];
    $h = $_SESSION['hard'];
    $e1 = $_SESSION['easy'];
    $m1 = $_SESSION['medium'];
    $h1 = $_SESSION['hard'];
    $no = $_SESSION['no_of_questions'];
    //$setno = $_SESSION['no_of_sets'];
    $subjectl = $_SESSION['subject3'];
    $sql = mysqli_query($con , "SELECT question_id from questiontable where class IN (SELECT class from questiontable where subject = '$subject1' AND difficulty = 'Easy')");
    $sql1 = mysqli_query($con , "SELECT question_id from questiontable where class IN (SELECT class from questiontable where subject = '$subject1' AND difficulty = 'Medium')");
    $sql2 = mysqli_query($con , "SELECT question_id from questiontable where class IN (SELECT class from questiontable where subject = '$subject1' AND difficulty = 'Hard')");
    //$row = mysqli_fetch_array($sql);
    //$row1 = mysqli_fetch_array($sql1);
    //$row2 = mysqli_fetch_array($sql2);
    $i = 1;
    $servedquestion = array();
    $answers = array();
    $count = 1;
    $count1 = 0;
    while($count <= $no)
    {

    while($e != 0)
    {
      //$qid = $row['question_id'];
      $sql3 = mysqli_query($con , "SELECT * from questiontable where subject = '$subject1' AND difficulty = 'Easy' ORDER BY rand() limit 1");
      $row3= mysqli_fetch_array($sql3);
      $qid = $row3['question_id'];
      //$answers[$count1] = $qid;
      //$count1 = $count1 + 1;
      if(in_array($qid , $servedquestion))
      {
        break;
      }
      $answers[$count1] = $qid;
      $count1 = $count1 + 1;
      echo "<br>";
      echo "<a>"."Q".$i.".".$row3['question_field']."</a>";
      echo "<br>";
      $i = $i + 1;
      $e = $e - 1;
      $servedquestion[] = $qid;
      $count = $count + 1;
    }
    while($m != 0)
    {
      //$qid1 = $row1['question_id'];
      $sql4 = mysqli_query($con , "SELECT * from questiontable where subject = '$subject1' AND difficulty = 'Medium' ORDER BY rand() limit 1");
      $row4 = mysqli_fetch_array($sql4);
      $qid1 = $row4['question_id'];

      if(in_array($qid1 , $servedquestion))
      {
        break;
      }
      $answers[$count1] = $qid1;
      $count1 = $count1 + 1;
      echo "<br>";
      echo "<a>"."Q".$i.".".$row4['question_field']."</a>";
      echo "<br>";
      $i = $i + 1;
      $m = $m - 1;
      $servedquestion[] = $qid1;
      $count = $count + 1;
    }
    while($h != 0)
    {
      //$qid2 = $row2['question_id'];
      $sql5 = mysqli_query($con , "SELECT * from questiontable where subject = '$subject1' AND difficulty = 'Hard' ORDER BY rand() limit 1");
      $row5 = mysqli_fetch_array($sql5);
      $qid2 = $row5['question_id'];

      if(in_array($qid2 , $servedquestion))
      {
        break;
      }
      $answers[$count1] = $qid2;
      $count1 = $count1 + 1;
      echo "<br>";
      echo "<a>"."Q".$i.".".$row5['question_field']."</a>";
      echo "<br>";
      $i = $i + 1;
      $h = $h - 1;
      $servedquestion[] = $qid2;
      $count = $count + 1;
    }

  }
$x = 0;
echo "<center>"."<h2>"."Key"."</h2>"."</center>";
  for ($l = 0; $l < $no; $l = $l + 1)
  {
    $sql10 = mysqli_query($con, "SELECT * from questiontable where question_id = $answers[$l]");
    $row10 = mysqli_fetch_array($sql10);
    $x = $l + 1;
    echo "<br>";
    echo "<a>"."Ans ".$x.". ".$row10['answer_field']."</a>";
    echo "<br>";
  //or $array[] = $some_data; for single items.
  }
unset($answers);
  ?>
  <br><br>
  <script>
function myFunction() {
  window.print();
}
</script>
  <center><input type="submit" align = "center" value="Get New Set" class="b3" name = 'getnewset' onclick = 'window.location.reload(true);' ></center>
  <br><br>
  <center><button onclick="myFunction()">Print this page</button></center>
  <br><br>
  <div class="w3-container" align = center>
    <a href="questionpapergeneration.php" class="w3-btn w3-black">Back</a>
  </div>
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
</div>
  <script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
  <script  src="poster.js"></script>
</body>
</html>
