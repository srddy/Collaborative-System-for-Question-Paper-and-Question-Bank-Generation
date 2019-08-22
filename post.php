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
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
	if(isset($_POST['postpage']))
	{
		$subject = $_POST['subjecttext'];
		$_SESSION['subjecttext'] = $subject;
		echo $_SESSION['subjecttext'];
	}
}
else
{

}

?>
<meta charset="UTF-8">
  <title>jQuery UI Autocomplete with Animate.css</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,600,700'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Nunito:400,700'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
<link rel="stylesheet" href="form.css" type="text/css">
<div id="frm-cvr">
			<div class="cl-wh" id="f-mlb">Select Subject</div>
			<div class="alert alert-error"><?= $_SESSION['message1']?></div>
			<form action ="question.php" method = "POST" autocomplete="off" enctype="multipart/form-data">
				<label class="cl-wh f-lb">Subject</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">person</i></div>
						<div class="td prt"><input type="text" name ="subjecttext" required></div>

					</div>
				</div>
				<div id="s-btn" class="mrg25t"><input type="submit" value="Next" class="b3" name = "postpage"></div>
			</form>
		</div>
<!--<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>jQuery UI Autocomplete with Animate.css</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,600,700'>

      <link rel="stylesheet" href="post.css">
      <link rel="stylesheet" href="button.css" type="text/css">

</head>

<body>
  <form method = "POST" autocomplete="off">
  <section class="slide slide--1">
  <div class="ui-widget">
    <h6>Select Subject</h6>
	  <input type="text" placeholder="Subject..."  name="subjecttext" />
  </div>
   <div align ="center">
   	<br>
    <a href="question.php" title="Button border lightblue" class="button btnBorder btnLightBlue" style="align-self: center;" name = "postpage">Next</a>
  </div>
</section>
</form>-->
<!--</section>

<section class="slide slide--2">
  <div class="ui-widget">
    <h6>bounceIn</h6>
	  <input type="text" placeholder="Programming languages..." autocomplete="off" />
  </div>
</section>

<section class="slide slide--3">
  <div class="ui-widget">
    <h6>fadeInUp</h6>
	  <input type="text" placeholder="Programming languages..." autocomplete="off" />
  </div>
</section>

<section class="slide slide--4">
  <div class="ui-widget">
    <h6>flipInX</h6>
	  <input type="text" placeholder="Programming languages..." autocomplete="off" />
  </div>
</section>

<section class="slide slide--5">
  <div class="ui-widget">
    <h6>rotateInUpLeft</h6>
	  <input type="text" placeholder="Programming languages..." autocomplete="off" />
  </div>
</section>

<section class="slide slide--6">
  <div class="ui-widget">
    <h6>slideInUp</h6>
	  <input type="text" placeholder="Programming languages..." autocomplete="off" />
  </div>
</section>

<section class="slide slide--7">
  <div class="ui-widget">
    <h6>zoomIn</h6>
	  <input type="text" placeholder="Programming languages..." autocomplete="off" />
  </div>
</section>

<section class="slide slide--8">
  <div class="ui-widget">
    <h6>lightSpeedIn</h6>
	  <input type="text" placeholder="Programming languages..." autocomplete="off" />
  </div>
</section>

<section class="slide slide--9">
  <div class="ui-widget">
    <h6>zoomInUp</h6>
	  <input type="text" placeholder="Programming languages..." autocomplete="off" />
  </div>
</section>

<section class="slide slide--10">
  <div class="ui-widget">
    <h6>rollIn</h6>
	  <input type="text" placeholder="Programming languages..." autocomplete="off" />
  </div>
</section>-->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>



    <script  src="post.js"></script>
