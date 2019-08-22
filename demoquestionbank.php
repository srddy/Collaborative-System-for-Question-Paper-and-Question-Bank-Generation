
<!DOCTYPE html>
<html>
<title>Demo|Lisenme</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css.css">
<link type="text/css" rel="stylesheet" href="style.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="jquery.min.js"></script>

<style>
h1,h2,h3,h4,h5,h6 {font-family: "Oswald"}
body {font-family: "Open Sans"}


.select-boxes{width: 280px;text-align: center;}
select {
    background-color: #F5F5F5;
    border: 1px double #15a6c7;
    color: #1d93d1;
    font-family: Georgia;
    font-weight: bold;
    font-size: 14px;
    height: 39px;
    padding: 7px 8px;
    width: 250px;
    outline: none;
    margin: 10px 0 10px 0;
}
select option{
    font-family: Georgia;
    font-size: 14px;
}

</style>
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
                  //  $('#city').html('<option value="">Select state first</option>');
                }
            });
        }else{
            $('#topic').html('<option value="">Select country first</option>');
        }
    });

    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            });
        }else{
            $('#city').html('<option value="">Select state first</option>');
        }
    });
});
</script>


<body class="w3-light-grey">

<!-- Navigation bar with social media icons -->
<div class="w3-bar w3-black w3-hide-small">
  <a href="https://www.facebook.com/lisenme/" class="w3-bar-item w3-button"><i class="fa fa-facebook-official"></i></a>
  <a href="https://twitter.com/LisenMee" class="w3-bar-item w3-button"><i class="fa fa-twitter"></i></a>
  <a href="https://www.youtube.com/channel/UCEdC6Qk_DZ9fX_gUYFJ1tsA" class="w3-bar-item w3-button"><i class="fa fa-youtube"></i></a>
  <a href="https://plus.google.com/115714479889692934329" class="w3-bar-item w3-button"><i class="fa fa-google"></i></a>
  <a href="https://www.linkedin.com/in/lisen-me-b017a8137/" class="w3-bar-item w3-button"><i class="fa fa-linkedin"></i></a>
</div>

<!-- w3-content defines a container for fixed size centered content,
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1600px">

  <!-- Header -->
  <header class="w3-container w3-center w3-padding-48 w3-white">
    <h1 class="w3-xxxlarge"><a href="http://lisenme.com/"><img src="img/logo.jpg" alt="Girl Hat" style="width:20%" class="w3-padding-16"></a></h1>
    <h6>Welcome to our <span class="w3-tag">Tutorial</span></h6>

  </header>

  <!-- Image header -->


  <!-- Grid -->
  <div class="w3-row w3-padding w3-border">

    <!-- Blog entries -->
    <div class="w3-col l12 s12">

      <!-- Blog entry -->
      <div class="w3-container w3-white w3-margin w3-padding-large">

          <h2 style="text-align: center";>Dynamic Dependent Select Box using jQuery, Ajax and PHP by Lisenme</h2>
          <br>
          <div class="select-boxes">
    <?php
    //Include database configuration file
    include('dbConfig.php');

    //Get all country data
    $query = mysqli_query($con,"SELECT DISTINCT subject FROM questiontable");

    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
    <select name="subject" id="subject" >
        <option value="">Select Subject</option>
        <?php
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){
                echo '<option value="'.$row['subject'].'">'.$row['subject'].'</option>';
            }
        }else{
            echo '<option value="">Subject not available</option>';
        }
        ?>
    </select>

    <select name="topic" id="topic">
        <option value="">Select Topic</option>
    </select>
    </div>



      </div>

    </div>

  </div>

</div>

</body>
</html>
