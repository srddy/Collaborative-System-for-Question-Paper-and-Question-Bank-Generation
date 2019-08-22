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
	if(isset($_POST['signup']))
	{
		$v = 0;
		$sql1 = mysqli_query($con, "SELECT * FROM users");
		$sql2 = mysqli_query($con, "SELECT * FROM expert");
		$sql3 = mysqli_query($con, "SELECT * FROM institute");
		while($row = mysqli_fetch_array($sql1))
		{
			$userid = $row['user_id'];
			if($userid == $_POST['expertemail'])
			{
				//$_SESSION['message1'] = "User already exists";
				$v = 1;
				break;
			}
		}
		while($row1 = mysqli_fetch_array($sql2))
		{
			$userid1 = $row1['expert_id'];
			if($userid == $_POST['expertemail'])
			{
				//$_SESSION['message1'] = "User already exists";
				$v = 1;
				break;
			}
		}
		while($row2 = mysqli_fetch_array($sql3))
		{
			$userid2 = $row2['instituteemail'];
			if($userid2 == $_POST['expertemail'])
			{
				//$_SESSION['message1'] = "User already exists";
				$v = 1;
				break;
			}
		}
		if($v == 0)
		{
		if($_POST['expertpassword'] == $_POST['expertconfirmpassword'])
		{
			$expertemail = $_POST['expertemail'];
			$expertname = $_POST['expertname'];
			$expertpassword = $_POST['expertpassword'];
			$expertcontact = $_POST['expertcontact'];
			$expertise = $_POST['expertise'];
			$expertcollege = $_POST['expertcollege'];
			$sql6 = "INSERT INTO expert (expert_id,expert_name,expert_password,expertise,expert_college,expert_contact) VALUES ('$expertemail','$expertname','$expertpassword','$expertise','$expertcollege',$expertcontact)";
			$result1 = mysqli_query($con,$sql6);
			if($result1)
			{
				$_SESSION['message1'] = "Registration Successful";
			}
			else
			{
				$_SESSION['message1'] = "Expert Could not be added";
			}
		}
		else
		{
			$_SESSION['message1'] = "Entered passwords donot match";
		}
	}
	else {
		$_SESSION['message1'] = "User already exists";
	}
}
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
			<div class="cl-wh" id="f-mlb">Create an account</div>
			<div class="alert alert-error"><?= $_SESSION['message1']?></div>
			<form action ="expert_registration.php" method = "POST" autocomplete="off" enctype="multipart/form-data">
				<label class="cl-wh f-lb">Name</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">person</i></div>
						<div class="td prt"><input type="text" name ="expertname" required></div>
					</div>
				</div>
				<label class="cl-wh f-lb">Email address</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">email</i></div>
						<div class="td prt"><input type="email" name = "expertemail" required ></div>
					</div>
				</div>
				<label class="cl-wh f-lb">Password</label>
				<div class="f-i-bx b3">
					<div class="tb">
						<div class="td icn"><i class="material-icons">lock</i></div>
						<div class="td prt"><input type="password" name = "expertpassword" required></div>
					</div>
				</div>
				<br>
				<label class="cl-wh f-lb">Confirm Password</label>
				<div class="f-i-bx b3">
					<div class="tb">
						<div class="td icn"><i class="material-icons">lock</i></div>
						<div class="td prt"><input type="password" name = "expertconfirmpassword" required></div>
					</div>
				</div>
				<br>
				<label class="cl-wh f-lb">Expertise</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">book</i></div>
						<div class="td prt"><input type="text" name ="expertise" required></div>
					</div>
				</div>
				<label class="cl-wh f-lb">College</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">building</i></div>
						<div class="td prt"><input type="text" name ="expertcollege" required></div>
					</div>
				</div>
				<label class="cl-wh f-lb">Contact</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">phone</i></div>
						<div class="td prt"><input type="text" name = "expertcontact" pattern="[1-9]{1}[0-9]{9}" minlength = "10" maxlength = "10" placeholder="Please enter exactly 10 digits" required></div>
					</div>
				</div>
				<div id="s-btn" class="mrg25t"><input type="submit" value="Sign up" class="b3" name = 'signup'></div>
				<div id="tc-bx">If you are a registered user <a href="login.php" target = "_top">Signin!</a>.</div>
			</form>
		</div>
