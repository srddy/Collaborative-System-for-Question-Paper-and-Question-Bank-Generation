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
  if(isset($_POST['questionsubmit']))
  {
    $subject = $_POST['subject'];
    $choice = $_POST['select-choice'];
    $_SESSION['subjects'] = $subject;
    $_SESSION['choice'] = $choice;
    echo $_SESSION['subjects'];
    echo $_SESSION['choice'];
    echo "Saketh Reddy";
  }
  else {
    //echo $_SESSION['subjects'];
    //echo $_SESSION['choice'];
    echo "LOL";
  }
?>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Nunito:400,700'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
<link rel="stylesheet" href="form.css" type="text/css">
<body  a link = "white" vlink = "white">
	<div align = center>
<a href = "form.php" link = "white">User</a>

<a href = "expert_registration.php" link = "white">Expert</a>

<a href = "institution_registration.php" link = "white">Institute</a>

</div>
</body>
<div id="frm-cvr">
			<div class="cl-wh" id="f-mlb">Question Bank Generator</div>
			<div class="alert alert-error"><?= $_SESSION['message1']?></div>
			<form action ="form.php" method = "POST" autocomplete="off" enctype="multipart/form-data">
				<label class="cl-wh f-lb">Subject</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">person</i></div>
						<div class="td prt"><input type="text" name ="subject" required></div>
					</div>
				</div>
				<label class="cl-wh f-lb">Difficulty</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">person</i></div>
						<div class="td prt">
              <select>
                <option>Easy</option>
                <option>Medium</option>
                <option>Hard</option>
              </select>
            </div>
					</div>
				</div>

				<div id="s-btn" class="mrg25t"><input type="submit" value="Sign up" class="b3" name = 'questionsubmit'></div>

			</form>
		</div>
