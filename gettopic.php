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
<?php
if(isset($_POST['t_id'])) {
  $sql = "SELECT DISTINCT topic from questiontable where subject = $_POST['t_id']");
  $res = mysqli_query($con, $sql);
  if(mysqli_num_rows($res) > 0) {
    echo "<option value=''>Select</option>";
    while($row = mysqli_fetch_object($res)) {
      echo "<option value='".$row->id."'>".$row['topic']."</option>";
    }
  }
} else {
  header('location: ./');
}
?>
