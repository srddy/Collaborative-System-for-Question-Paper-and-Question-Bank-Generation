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

	$details = $_GET['id'];
	$sql = "SELECT * FROM questions WHERE question_id = '$details'";
	//$sql3 = "SELECT * FROM questions WHERE expert_id1 = '$useremail3' OR expert_id2 = '$useremail3'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	$_SESSION['subject1'] = $row['subject'];
	$_SESSION['topic1'] = $row['topic'];
	$_SESSION['question1'] = $row['question_field'];
	$_SESSION['answer1'] = $row['answer_field'];
	$_SESSION['approach1'] = $row['approach'];
	if(isset($_POST['verified']))
	{
		$updatesubject = $_POST['updatesubject'];
		$updatetopic = $_POST['updatetopic'];
		$updatequestion = $_POST['updatequestion'];
		$updateanswer = $_POST['updateanswer'];
		$updateapproach = $_POST['updateapproach'];
		$updatedifficulty = $_POST['updatedifficulty'];
		$updategrade = $_POST['updategrade'];
		$expert_id1 = $row['expert_id1'];
		$emails = $_SESSION['email'];
		if($expert_id1 == NULL)
		{
			$sql = "UPDATE questions SET subject = '$updatesubject' , topic = '$updatetopic' , question_field = '$updatequestion' , answer_field = '$updateanswer' , approach = '$updateapproach' , difficulty = '$updatedifficulty' , grade = '$updategrade' , expert_id1 = '$emails' , verified = verified + 1 WHERE question_id = '$details' ";
			$result = mysqli_query($con,$sql);
			header('location: dashboard1.php');
		}
	}
?>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Nunito:400,700'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
<link rel="stylesheet" href="form.css" type="text/css">
<div id="frm-cvr">
			<div class="cl-wh" id="f-mlb">Perform Changes Here</div>
			<div class="alert alert-error"><?= $_SESSION['message1']?></div>
			<form method = "POST" autocomplete="off" enctype="multipart/form-data">
				<label class="cl-wh f-lb">Subject</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">person</i></div>
						<div class="td prt"><input type="text" name ="updatesubject" value = "<?=$_SESSION['subject1'] ?>" required></div>
					</div>
				</div>
				<label class="cl-wh f-lb">Topic</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">person</i></div>
						<div class="td prt"><input type="text" name = "updatetopic" value = "<?=$_SESSION['topic1'] ?>" required ></div>
					</div>
				</div>
				<label class="cl-wh f-lb">Question</label>
				<div class="f-i-bx b3">
					<div class="tb">
						<div class="td icn"><i class="material-icons">person</i></div>
						<div class="td prt"><input type="text" name = "updatequestion" value = "<?=$_SESSION['question1'] ?>" required></div>
					</div>
				</div>
				<br>
				<label class="cl-wh f-lb">Answer</label>
				<div class="f-i-bx b3">
					<div class="tb">
						<div class="td icn"><i class="material-icons">person</i></div>
						<div class="td prt"><input type="text" name = "updateanswer" value = "<?=$_SESSION['answer1'] ?>" required></div>
					</div>
				</div>
				<br>
				<label class="cl-wh f-lb">Approach</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">person</i></div>
						<div class="td prt"><input type="text" name = "updateapproach" value = "<?=$_SESSION['approach1'] ?>" required></div>
					</div>
				</div>
				<label class="cl-wh f-lb">Difficulty</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">person</i></div>
						<div class="td prt"><input type="text" name = "updatedifficulty" required></div>
					</div>
				</div>
				<label class="cl-wh f-lb">Grade</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">person</i></div>
						<div class="td prt"><input type="text" name = "updategrade" required></div>
					</div>
				</div>
				<div id="s-btn" class="mrg25t"><input type="submit" value="Edit" class="b3" name = 'verified' ></div>


			</form>
		</div>
