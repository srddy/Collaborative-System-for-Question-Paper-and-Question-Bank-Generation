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
if(isset($_SESSION['email']) && isset($_SESSION['password']))
{
  $useremail3 = $_SESSION['email'];
  $password3 = $_SESSION['password'];
  $sql2 = "SELECT * FROM expert WHERE expert_id = '$useremail3' and expert_password = '$password3'";
  $result = mysqli_query($con,$sql2);
  $row3 = mysqli_fetch_array($result);
  $expertise = $row3['expertise'];
  $sql3 = "SELECT * FROM questions WHERE subject = '$expertise'";
  //$result = mysqli_query($con,$sql2);
  //$row3 = mysqli_fetch_array($result);
  $result1 = mysqli_query($con,$sql3);
  $result2 = mysqli_query($con,$sql3);
  $result11 = mysqli_query($con, $sql2);
  //$row4 = mysqli_fetch_array($sql3);
  //$expertise = $row3['expertise'];
  $sql4 = "SELECT * FROM questions WHERE subject = '$expertise'";
  $noverified = $row3['verified_count'];
  $name = $row3['expert_name'];
  $userscore = $row3['expert_score'];
  $accepted = $row3['accepted_count'];
  //$question = $row4['question'];
  //$verify = $row4['verified'];
  $count = 0;
  $count4 = 0;
  $row10 = mysqli_fetch_array($result11);
  while($row5 = mysqli_fetch_array($result2))
  {
    $expertverify = $row5['verified'];
    if($expertverify == 2)
    {
      $count = $count + 1;
    }
    $count4 = $count4 + 1;
  }
  $_SESSION['name'] = $name;
  $_SESSION['verified'] = $row10['verified_count'];
  $_SESSION['accepted'] = $count;
  $_SESSION['score'] = $count*5;
  $_SESSION['expertised'] = $expertise;
  $sql4 = "UPDATE expert SET accepted_count = '$count' , expert_score = '$count'*5 WHERE expert_id = '$useremail3'";
  mysqli_query($con,$sql4);
}
if(isset($_POST['logout']))
{
  session_destroy();
}
?>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>

      <link rel="stylesheet" href="dashboard.css">

  <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
  <script>
  window.onload=function(){
    var i=0; var previous_hash = window.location.hash;
    var x = setInterval(function(){
      i++; window.location.hash = "/noop/" + i;
      if (i==10){clearInterval(x);
        window.location.hash = previous_hash;}
    },10);
  }
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
<nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Dashboard</a></li>
          <li><a href="expertverified.php">Verified</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href=# ""><?= $_SESSION['email'] ?></a></li>
          <li><a href="login.php" name = "logout">Log out</a></li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>
  <!--header-->
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-10 ">
          <h2><span class="glyphicon glyphicon-cog" id="gear"></span> Dashboard</h2>
        </div>

      </div>
    </div>
  </div>

  <!--Breadcrumb-->
  <section id="breadcrumb" >
    <div class="container">
      <ol class="breadcrumb">
        <li class="active">Home</li>
      </ol>
    </div>
  </section>

  <!--main section-->
  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group animated zoomIn">
            <a href="#" class="list-group-item active  main-color-bg">
                  <span class="glyphicon glyphicon-cog"></span> Dashboard
              </a>
            <a href="verify.php" class="list-group-item"><span class="glyphicon glyphicon-pencil"></span> Verify</a>
            <a href="questionpaper.php" class="list-group-item"><span class="glyphicon glyphicon-book"></span> Question Bank</a>
          </div>
        </div>
        <div class="col-md-9">
          <div class="panel panel-default animated zoomIn">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Expert Statistics</h3>
            </div>
            <div class="panel-body">
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-user"></span><?= $_SESSION['verified'] ?></h2>
                  <h4>Questions Verified</h4>
                </div>
              </div>
              <div class="col-md-3 dash-box">
                <div class="well">
                  <h2><span class="glyphicon glyphicon-list-alt"></span> <?= $_SESSION['accepted'] ?></h2>
                  <h4>Questions Accepted</h4>
                </div>
              </div>
              <div class="col-md-3 dash-box">
                <div class="well">
                  <h2><span class="glyphicon glyphicon-pencil"></span> <?= $_SESSION['score'] ?></h2>
                  <h4>Score</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default animated zoomIn">
            <!-- Default panel contents -->
            <div class="panel-heading main-color-bg">Updates</div>
            <div class="panel-body">
              <!-- Table -->
              <table class="table table-striped table-hover">
                <tr>
                  <th>Name</th>
                  <th>Question</th>
                  <th>Status</th>
                </tr>
                <?php
                  while($row4 = mysqli_fetch_array($result1))
                  {
                    echo "<tr>";
                    echo "<td>".$_SESSION['name']. "</td>";
                    echo "<td>".$row4['question_field']. "</td>";
                    $verify = $row4['verified'];
                    if($verify == 0)
                    {
                      echo "<td>"."Not Verified"."</td>";
                    }
                    elseif ($verify == 1) {
                      echo "<td>"."In Progress"."</td>";
                    }
                    elseif ($verify == 2) {
                      echo "<td>"."Verified"."</td>";
                    }
                    echo "</tr>";
                  }
                ?>

              </table>
            </div>
          </div>
        </div>
      </div>
  </section>

  <!-- footer -->
  <!--<footer id="footer">
    <p>&copy; Developed by <i><strong>Saketh Reddy</p>
    </footer>-->
  <!-- Model -->
  <!-- Add page -->
  <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add page</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Page Title</label>
              <input type="text" class="form-control" placeholder="Page Title">
            </div>
            <div class="form-group">
              <label>Page Body</label>
              <textarea name="editor1" class="form-control" placeholder="Page Body"></textarea>
            </div>
            <div class="checkbox">
              <label>
          <input type="checkbox"> Published
        </label>
            </div>
            <div class="form-group">
              <label>Meta Tags</label>
              <input type="text" class="form-control" placeholder="Add Some Tags...">
            </div>
            <div class="form-group">
              <label>Meta Description</label>
              <input type="text" class="form-control" placeholder="Add Meta Description...">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>



    <script  src="js/index.js"></script>
