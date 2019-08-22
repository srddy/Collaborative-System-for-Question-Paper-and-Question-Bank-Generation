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
