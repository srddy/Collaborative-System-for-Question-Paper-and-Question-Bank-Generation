<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Nunito:400,700'>
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
	if(isset($_POST['nextpage']))
	{

		$useremail = $_SESSION['email'];
		$subject2 = $_POST['subject'];
		$topic = $_POST['topic'];
		$question = $_POST['question'];
		$answer = $_POST['answer'];
		$approach = $_POST['approach'];
		$sql = "INSERT INTO questions (users_id,subject,topic,question_field,answer_field,approach) VALUES ('$useremail','$subject2','$topic','$question','$answer','$approach')";
		$result = mysqli_query($con,$sql);
		if($result)
		{
			$_SESSION['message1'] = "Question added Successfully";
			$sql3 = "UPDATE users SET questions_posted = questions_posted + 1 WHERE user_id = '$useremail'";
			mysqli_query($con,$sql3);
			header('location: dashboard1.php');
		}
		else
		{
			$_SESSION['message1'] = "Question was not added";
		}
	}
}
?>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
<link rel="stylesheet" href="form.css" type="text/css">
<div id="frm-cvr">
			<div class="cl-wh" id="f-mlb">Fill the below details</div>
			<div class="alert alert-error"><?= $_SESSION['message1']?></div>
			<form action ="question.php" method = "POST" autocomplete="off" enctype="multipart/form-data">
				<label class="cl-wh f-lb">Subject</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">email</i></div>
						<div class="td prt"><input type="text" name ="subject" placeholder = "Ex: Mathematics, Physics" required></div>
					</div>
				</div>
				<label class="cl-wh f-lb">Topic</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">email</i></div>
						<div class="td prt"><input type="text" name ="topic" placeholder = "Ex: Geometry, Kinematics" required></div>
					</div>
				</div>
				<label class="cl-wh f-lb">Question</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">email</i></div>
						<div class="td prt"><input type="text" name = "question" required ></div>
					</div>
				</div>
				<label class="cl-wh f-lb">Answer</label>
				<div class="f-i-bx b3">
					<div class="tb">
						<div class="td icn"><i class="material-icons">email</i></div>
						<div class="td prt"><input type="text" name = "answer" required></div>
					</div>
				</div>
				<br>
				<label class="cl-wh f-lb">Approach</label>
				<div class="f-i-bx b3">
					<div class="tb">
						<div class="td icn"><i class="material-icons">email</i></div>
						<div class="td prt"><input type="text" name = "approach" required></div>
					</div>
				</div>
				<br>
				<label class="cl-wh f-lb">Comments</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">email</i></div>
						<div class="td prt"><input type="text" name = "comment" required></div>
					</div>
				</div>
				<div id="s-btn" class="mrg25t"><input type="submit" value="Post!" class="b3" name = "nextpage"></div>


			</form>
		</div>
