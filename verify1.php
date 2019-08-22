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
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = mysql_escape_string($_GET['email']); // Set email variable
    $hash = mysql_escape_string($_GET['hash']); // Set hash variable

    $search = mysql_query("SELECT user_id, hash, active FROM users WHERE user_id='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
    $match  = mysql_num_rows($search);

    if($match > 0){
        // We have a match, activate the account
        mysql_query("UPDATE users SET active='1' WHERE user_id='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
        echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
    }

}else{
    // Invalid approach
    echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
}
?>
