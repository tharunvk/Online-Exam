<?php
session_start();
if(!isset($_SESSION['teacher_id']))
  {
    header("Location: tlogin.php");   
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Preview</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
       body{
          font-size:large;
      }
  </style>
</head>
<body>
 
<div class="container">
  <h2>Questions</h2>
  <p>This is how it looks for the students.</p>
   <?php

     $output="";
     $count=1;
     $option=array("a","b","c","d");
   include("connection.php");
   
   $query3="select * from Test_details where test_id='".$_GET['topic']."'";
   if($result3=mysqli_query($link,$query3))
   {
       while($row3=mysqli_fetch_array($result3))
       {
           $description=$row3['description'];
       }
   }
   
   //if($description!='a')
    //echo '<div class="container"><div class="alert alert-primary" role="alert">'.$description.'</div></div>';
   
   echo '<div class="panel-group">';
   $query="SELECT * FROM `Questions` WHERE Questions.test_id='".$_GET['topic']."'";
    if($result=mysqli_query($link,$query))
     {
         while ($row=mysqli_fetch_array($result))
           {  
              echo '<div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">'.$count.')'.$row['question'].'</div><div class="panel-body">';
    
               
           //    echo $count."). ".$row['question']."<br>";
               $i=0;
                $query1="SELECT * FROM `option_table` WHERE qid='".$row['qid']."'";
                if($result1=mysqli_query($link,$query1))
                {
                    while($row1=mysqli_fetch_array($result1))
                    {
                        echo $option[$i].". ".$row1['option_value']."<br>";
                       // echo $option[$i].". ".$row1['option_value']."<br>";
                        $i++;
                    }
                }
                 
                 echo '</div></div><br><br>';
                 $count++;
           }
     }   
     
      echo '<a href="tdash.php"><button type="button" name="questions" class="btn btn-primary">Back to home</button></a>';
?>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>