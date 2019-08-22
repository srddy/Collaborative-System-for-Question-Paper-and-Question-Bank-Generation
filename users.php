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
$sql5 = mysqli_query($con ,"SELECT user_name,userscore from users ");
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>iOS ListView Initials System</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
<link rel = "stylesheet" href = "users.css" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600&subset=latin,latin-ext'>

      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      * {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
body {
  background: #ecf0f1;
  font-family: 'Open Sans'
}
.list {
  position: absolute;
  display: block;
  width: 300px; height: 400px;
  top: 50%; left: 50%;
  padding-right: 40px;
  margin-top: -200px;
  margin-left: -150px;
  background: #2c3e50;
  box-shadow: 0 3px 2px rgba(0,0,0,.3);
}
.initials {
  position: absolute;
  display: flex;
  flex-direction: column;
  top: 0; right: 0; bottom: 0;
  width: 30px; height: 100%;
}
  .initials b {
    position: relative;
    display: flex;

    flex: 1;
    justify-content: center;
    flex-direction: column;

    font-size: 0.8em;
    font-weight: 600;
    color: #3498db;
    text-align: center;
    text-transform: uppercase;
    line-height: 100%;

    cursor: pointer;

    -webkit-transition: background-color .4s ease-in-out;
    -moz-transition: background-color .4s ease-in-out;
    -ms-transition: background-color .4s ease-in-out;
    -o-transition: background-color .4s ease-in-out;
    transition: background-color .4s ease-in-out;
  }
  .initials b:hover {
    background: rgba(255,255,255,.1);
  }
  .list ul {
    position: relative;
    display: block;
    margin: 0; padding: 10px 0;
    width: 100%; height: 100%;
    overflow: auto;
    overflow-x: hidden;
    list-style: none;
  }
    .list ul li {
      position: relative;
      display: block;
      padding: 10px 0 10px 20px;
      color: #fff;
      cursor: pointer;

      -webkit-transition: background-color .4s ease-in-out;
    -moz-transition: background-color .4s ease-in-out;
    -ms-transition: background-color .4s ease-in-out;
    -o-transition: background-color .4s ease-in-out;
    transition: background-color .4s ease-in-out;
    }
    .list ul li:hover {
      background: rgba(255,255,255,.1);
    }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
  <h1 align = "center"> Registered Users </h1>
  <div class="list">
  <div class="initials"></div>
  <!--<ul>
    <li>Jennifer  Wright</li>
    <li>Alberto Greer</li>
    <li>Annette Newman</li>
    <li>Marianne  Ramos</li>
    <li>Dan Peters</li>
    <li>Yolanda Yates</li>
    <li>Sophia  Lucas</li>
    <li>Herbert Caldwell</li>
    <li>Luther  Walters</li>
    <li>Alfredo Watkins</li>
    <li>Barbara Elliott</li>
    <li>Leslie  Flowers</li>
    <li>Casey Stephens</li>
    <li>Hugh  Maldonado</li>
    <li>Billie  Fletcher</li>
    <li>Travis  Payne</li>
    <li>Dallas  Patterson</li>
    <li>Theresa Lloyd</li>
    <li>Cedric  Carroll</li>
    <li>Beulah  Adkins</li>
    <li>Rose  Blake</li>
    <li>Bennie  Todd</li>
    <li>Freddie Stevens</li>
    <li>Kenny Massey</li>
    <li>Hannah  Burton</li>
  </ul>-->
  <?php
    while($row = mysqli_fetch_array($sql5))
    {
      echo "<ul>";
      echo "<li>".$row['user_name']."         "."SCORE(".$row['userscore'].")"."</li>";
      echo "<ul>";
    }
  ?>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/1.4.14/jquery.scrollTo.min.js'></script>



    <script  src="users.js"></script>




</body>

</html>
