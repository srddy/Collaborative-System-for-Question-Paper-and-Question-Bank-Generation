<?php
include('dbConfig.php');
if(isset($_POST['subject_id']) && !empty($_POST['subject_id'])){
    $query = mysqli_query($con,"SELECT DISTINCT topic FROM questiontable WHERE subject_id = ".$_POST['subject_id']." ");
    $rowCount = $query->num_rows;
    if($rowCount > 0){
        echo '<option value="">Select State</option>';
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['topic'].'">'.$row['topic'].'</option>';
        }
    }else{
      $subjects = $_POST['subject_id'];
      $query1 = mysqli_query($con,"SELECT DISTINCT topic FROM questiontable WHERE subject = '$subjects'");
      while($row1 = $query1->fetch_assoc()){
        echo "<option value =".$row1['topic'].">".$row1['topic']."</option>";
      }
    }
}

?>
