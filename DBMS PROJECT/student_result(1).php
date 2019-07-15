<?php
session_start();
if(!isset($_SESSION['teacher_id']) and !isset($_SESSION['usn']) )
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

    <title><?php echo $_GET['stuname'] ?></title>
  </head>
  <body>
   <div class="container">
    <h2 align="center">Detailed Result</h2>
    <h3 align="center">Test ID :&nbsp;<?php echo $_GET['topic'] ?></h3>
    <h4 align="center">Name :&nbsp;<?php echo $_GET['stuname'] ?></h4>
    <h4 align="center">USN :&nbsp;<?php echo $_GET['sid'] ?></h4>
   </div>



  <div id="result">
<div class="container">
<div class="table-responsive-sm">    
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Questions</th>
      <th scope="col">Your Answer</th>
      <th scope="col">Correct Answer</th>
    </tr>
  </thead>
  <tbody id="q03">
     <?php
      include("connection.php");
      $output="";
      $query="select Questions.question,Student_answer.choice,Correct_answer.correct_option from Student_answer inner join Correct_answer on Student_answer.Qid=Correct_answer.qid inner join Questions on Correct_answer.qid=Questions.qid where Student_answer.test_id=".$_GET['topic']." and Student_answer.Student_id='".$_GET['sid']."'";
      if($result=mysqli_query($link,$query))
     {  
         $i=1;
        while ($row=mysqli_fetch_array($result))
        {
            if($row['choice']==$row['correct_option'])
            {
                $temp1='<p style="color:green;" >'.$row['choice'].'</p>';
            }
            else
            {
                 $temp1='<p style="color:red;" >'.$row['choice'].'</p>';
            }
            
            $output .= '
      <tr>
      <th scope="row">'.$i.'.&nbsp;'.$row['question'].'</th>
      <td>'.$temp1.'</td>
      <td>'.$row['correct_option'].'</td>
    </tr>';
        $i++;
        }
     }         

     echo $output;
     
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
  </body>
</html>


















