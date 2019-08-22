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
	if(isset($_POST['login']))
	{
		$useremail1 = $_POST['email'];
		$password1 = $_POST['password'];
		$result = mysqli_query($con,"SELECT * FROM users WHERE user_id = '$useremail1' and user_password = '$password1'");
		$result3 = mysqli_query($con,"SELECT * FROM expert WHERE expert_id = '$useremail1' and expert_password = '$password1'");
		$result4 = mysqli_query($con,"SELECT * FROM institute WHERE instituteemail = '$useremail1' and institutepassword = '$password1'");
		$row = mysqli_fetch_array($result);
		$row1 = mysqli_fetch_array($result3);
		$row2 = mysqli_fetch_array($result4);
		if($row['user_id'] == $useremail1 && $row['user_password'] == $password1)
		{
			$_SESSION['message1'] = "Login Successfull ! Welcome  ".$row['user_name'];
			$_SESSION['email'] = $useremail1;
			$_SESSION['password'] = $password1;
			$_SESSION['next'] = "dashboard1.php";
			echo $_SESSION['next'];
			echo $_SESSION['email'];
			echo $_SESSION['password'];
		}
		elseif ($row1['expert_id'] == $useremail1 && $row1['expert_password'] == $password1) {
			$_SESSION['message1'] = "Login Successfull ! Welcome  ".$row1['expert_name'];
			$_SESSION['email'] = $useremail1;
			$_SESSION['password'] = $password1;
			$_SESSION['next'] = "expertdashboard.php";
			echo $_SESSION['next'];
			echo $_SESSION['email'];
			echo $_SESSION['password'];
		}
		elseif ($row2['instituteemail'] == $useremail1 && $row2['institutepassword'] == $password1) {
			$_SESSION['message1'] = "Login Successfull ! Welcome  ".$row2['institutename'];
			$_SESSION['email'] = $useremail1;
			$_SESSION['password'] = $password1;
			$_SESSION['collegename'] = $row2['institutename'];
			$_SESSION['next'] = "home1.php";
			echo $_SESSION['next'];
			echo $_SESSION['email'];
			echo $_SESSION['password'];

		}
		else
		{
			$_SESSION['message1'] = "Invalid email and password!";
			$_SESSION['next'] = "login.php";
			//echo $_SESSION['next'];
			//echo $_SESSION['email'];
			//echo $_SESSION['password'];
		}
		if($_SESSION['next'] == "dashboard1.php")
		{
			header('location: dashboard1.php');
		}
		if($_SESSION['next'] == "expertdashboard.php")
		{
			header('location: expertdashboard.php');
		}
		if($_SESSION['next'] == "home1.php")
		{
			header('location: home1.php');
		}
		//else{
		//	header('location: login.php');
		//}
	}
}
?>

<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Nunito:400,700'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
<link rel="stylesheet" href="form.css" type="text/css">
<script>
/* break back button */
window.onload=function(){
  var i=0; var previous_hash = window.location.hash;
  var x = setInterval(function(){
    i++; window.location.hash = "/noop/" + i;
    if (i==10){clearInterval(x);
      window.location.hash = previous_hash;}
  },10);
}
</script>
<div id="frm-cvr">
<div class="cl-wh" id="f-mlb">Login</div>
<div class="alert alert-error"><?= $_SESSION['message1']?></div>
<form  action = "login.php " method = "POST" autocomplete="off" enctype="multipart/form-data">
	<label class="cl-wh f-lb">Email address</label>
				<div class="f-i-bx b3 mrg3b">
					<div class="tb">
						<div class="td icn"><i class="material-icons">email</i></div>
						<div class="td prt"><input type="email" name = "email" required ></div>
					</div>
				</div>
	<label class="cl-wh f-lb">Password</label>
				<div class="f-i-bx b3">
					<div class="tb">
						<div class="td icn"><i class="material-icons">lock</i></div>
						<div class="td prt"><input type="password" name = "password" required></div>
					</div>
				</div>
	<div id="s-btn" class="mrg25t"><input type="submit" value="Login" class="b3" name = 'login' formaction="login.php"></div>

	<div id="tc-bx">If not registered <a href="form.php">SignUp!</a>.</div>
	<div id="tc-bx">To redirect to home page <a href ="home.php">Click Here</a></div>
</form>
</div>
