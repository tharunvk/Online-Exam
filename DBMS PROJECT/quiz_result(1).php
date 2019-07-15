<?php
session_start();
if(!isset($_SESSION['teacher_id']))
  {
    header("Location: tlogin.php");   
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Results</title>
  </head>
  <body>
    <h1 align="center">Results</h1>



<div id="rank">
<div class="container">
<div class="table-responsive-sm">    
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">USN</th>
      <th scope="col">Name</th>
      <th scope="col">Semester</th>
      <th scope="col">Time Taken</th>
      <th scope="col">Marks Obtained</th>
      <th scope="col">Maximum Marks</th>
      <th scope="col">Total Questions Answered</th>
      <th scope="col">Total Questions</th>
    </tr>
  </thead>
  <tbody id="q04">
   <?php
//session_start();UNIX_TIMESTAMP(end_time) - UNIX_TIMESTAMP(start_time) as output
$output="";
  include("connection.php");
  $query="SELECT Student_id,Name,sem,UNIX_TIMESTAMP(end_time) - UNIX_TIMESTAMP(start_time) as time_taken,marks_obt,max_marks,total_q_ansd,total_qs from Student_result INNER join Student on Student_id=sid WHERE test_id='".$_GET['topic']."'ORDER BY marks_obt DESC ";
  $topic=$_GET['topic'];
  if($result=mysqli_query($link,$query))
  {
     while ($row=mysqli_fetch_array($result))
      {
          $timetaken=$row['time_taken']/60;
           echo'
       <tr>
      <th scope="row">'.$row['Student_id'].'</th>
      <td><a href="student_result.php?sid='.$row['Student_id'].'&topic='.$topic.'&stuname='.$row['Name'].'">'.$row['Name'].'</a></td>
      <td>'.$row['sem'].'</td>
      <td>'.$timetaken.'mins</td>
      <td>'.$row['marks_obt'].'</td>
      <td>'.$row['max_marks'].'</td>
      <td>'.$row['total_q_ansd'].'</td>
      <td>'.$row['total_qs'].'</td>
    </tr>';   
     // echo $output;
      }   
  }
    
?>
  </tbody>
</table>
</div>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   
    
     <script type="text/javascript">
  </body>
</html>