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
		$z = 0;
		$sql1 = mysqli_query($con, "SELECT * FROM users");
		$sql2 = mysqli_query($con, "SELECT * FROM expert");
		$sql3 = mysqli_query($con, "SELECT * FROM institute");
		while($row = mysqli_fetch_array($sql1))
		{
			$userid = $row['user_id'];
			if($userid == $_POST['collegeemail'])
			{
			//	$_SESSION['message1'] = "User already exists";
				$v = 1;
				break;
			}
		}
		while($row1 = mysqli_fetch_array($sql2))
		{
			$userid1 = $row1['expert_id'];
			if($userid == $_POST['collegeemail'])
			{
			//	$_SESSION['message1'] = "User already exists";
				$v = 1;
				break;
			}
		}
		while($row2 = mysqli_fetch_array($sql3))
		{
			$userid2 = $row2['instituteemail'];
			$code = $row2['institutecode'];
			if($userid2 == $_POST['collegeemail'] || $code == $_POST['collegecode'])
			{
				//$_SESSION['message1'] = "User already exists";
				$v = 1;
				$z = 1;
				break;
			}
		}
		if($v == 0)
		{
		if($_POST['collegepassword'] == $_POST['collegeconfirmpassword'])
		{
			$collegeemail = $_POST['collegeemail'];
			$collegecode = $_POST['collegecode'];
			$collegname = $_POST['collegname'];
			$collegepassword = $_POST['collegepassword'];
			$collegecontact = $_POST['collegecontact'];
			$sql1 = "INSERT INTO institute (instituteemail,institutecode,institutepassword,institutecontact, institutename ) VALUES ('$collegeemail',$collegecode,'$collegepassword',$collegecontact,'$collegname')";
			$result2 = mysqli_query($con,$sql1);
			if($result2)
			{
				$_SESSION['message1'] = "Registration Successful";
			}
			else
			{
				$_SESSION['message1'] = "Institution Could not be added";
			}
		}
		else
		{
			$_SESSION['message1'] = "Entered passwords donot match";
		}
	}
	else {
		if($z == 0)
		{
			$_SESSION['message1'] = "User already exists";
		}
		else {
			$_SESSION['message1'] = "College Code already exists";
		}
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
			<form action ="institution_registration.php" method = "POST" autocomplete="off" enctype="multipart/form-data">
				<label class="cl-wh f-lb">College Code</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">person</i></div>
						<div class="td prt"><input type="text" name ="collegecode" required></div>
					</div>
				</div>
				<label class="cl-wh f-lb">College Name</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">person</i></div>
						<div class="td prt"><input type="text" name ="collegname" required></div>
					</div>
				</div>
				<label class="cl-wh f-lb">Email address</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">email</i></div>
						<div class="td prt"><input type="email" name = "collegeemail" required ></div>
					</div>
				</div>
				<label class="cl-wh f-lb">Password</label>
				<div class="f-i-bx b3">
					<div class="tb">
						<div class="td icn"><i class="material-icons">lock</i></div>
						<div class="td prt"><input type="password" name = "collegepassword" required></div>
					</div>
				</div>
				<br>
				<label class="cl-wh f-lb">Confirm Password</label>
				<div class="f-i-bx b3">
					<div class="tb">
						<div class="td icn"><i class="material-icons">lock</i></div>
						<div class="td prt"><input type="password" name = "collegeconfirmpassword" required></div>
					</div>
				</div>
				<br>
				<label class="cl-wh f-lb">Contact</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">phone</i></div>
						<div class="td prt"><input type="text" name = "collegecontact" pattern="[1-9]{1}[0-9]{9}" minlength = "10" maxlength = "10" placeholder="Please enter exactly 10 digits" required></div>
					</div>
				</div>
				<div id="s-btn" class="mrg25t"><input type="submit" value="Sign up" class="b3" name = 'signup'></div>
				<div id="tc-bx">If you are a registered user <a href="login.php" target = "_top">Signin!</a>.</div>
			</form>
		</div>
