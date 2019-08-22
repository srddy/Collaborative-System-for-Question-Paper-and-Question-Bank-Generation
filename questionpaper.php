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
$sql = "SELECT DISTINCT difficulty from questiontable";
$sql1 = "SELECT DISTINCT subject from questiontable";
$result = mysqli_query($con,$sql);
$result1 = mysqli_query($con,$sql1);
//$topics = $_SESSION['subjectwanted'];
//echo $_SESSION['subjectwanted'];
?>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet prefetch' href='https://necolas.github.io/normalize.css/3.0.1/normalize.css'>
<link rel="stylesheet" href="questionpaper.css">
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="questionpaper.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#subject').on('change',function(){
    var subject = $(this).val();
    if(subject){
        $.ajax({
            type:'POST',
            url:'gettopics.php',
            data:'subject_id='+subject,
            success:function(html){
                $('#topic').html(html);
            }
        });
    }else{
        $('#topic').html('<option value="">Select country first</option>');
    }
});

});
</script>

<form method = "POST" autocomplete="off" enctype="multipart/form-data" action = "bank.php" >
      <h1> Question Bank </h1>
  <fieldset>
    <label for="firstName">Subject</label>
    <select name="subject" id="subject">
      <option value="">Select Subject</option>
      <?php
      while($row = mysqli_fetch_array($result1))
      {
        echo "<option value=".$row['subject'].">".$row['subject']."</option>";
      }
      ?>
    </select>
  </fieldset>

 <fieldset>
    <label for="lastName">Topic</label>
    <select name="topic" id="topic">
        <option value="">Select Topic</option>
    </select>
  </fieldset>
  <!--<fieldset>
    <label for="textarea">Bio</label>
    <textarea name="textarea" id="textarea" placeholder="Tell us about yourself..."></textarea>
  </fieldset>-->

  <fieldset>
    <label for="select-choice">Difficulty</label>
    <select name="select-choice" id="select-choice">
      <option value="">Select Difficulty</option>
      <?php
      while($row2 = mysqli_fetch_array($result))
      {
        echo "<option value=".$row2['difficulty'].">".$row2['difficulty']."</option>";
      }
      ?>
    </select>
  </fieldset>

  <div id="s-btn" class="mrg25t"><input type="submit" value="Submit" class="b3" name = 'submit' ></div>
  	<!--<div id="s-btn" class="mrg25t"><input type="submit" value="Submit" class="b3" name = 'question'></div>-->
</form>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
