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

?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Text Area - Auto Height</title>


  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700"rel="stylesheet"'>

      <link rel="stylesheet" href="institutedash.css">


</head>

<body>

  <div class="content centered">
<h1>Subject</h1>
  <textarea rows="1" placeholder="Subject"></textarea>
</div>
  <div class="content centered">
<h1>Topic</h1>
  <textarea rows="1" placeholder="Topic"></textarea>
</div>
  <div class="content centered">
<h1>Question</h1>
  <textarea rows="1" placeholder="Question"></textarea>
</div>
<div class="content centered">
<h1>Answer</h1>
  <textarea rows="1" placeholder="Answer"></textarea>
</div>
<div class="content centered">
<h1>Approach</h1>
  <textarea rows="1" placeholder="Approach"></textarea>
</div>
<div class="content centered">
<h1>Difficulty</h1>
  <textarea rows="1" placeholder="Difficulty"></textarea>
</div>
<div class="content centered">
<h1>Grade</h1>
  <textarea rows="1" placeholder="Grade"></textarea>
</div>
<div class = "content centered">
  <input type = "button" value = "Verified">
  <input type = "button" value = "Irrelavent">
</div>
    <script  src="button.js"></script>




</body>

</html>
