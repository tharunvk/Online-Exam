<?php
session_start();

if(!isset($_SESSION['teacher_id']))
  {
    header("Location: tlogin.php");   
  }

$_SESSION['lastid']=0;
$_SESSION['maxquestion']=0;
$error="";
$successmessage="";
$warning="";


//echo $_SESSION['teacher_id']." ".$_SESSION['username']." ".$_SESSION['email']." ".$_SESSION['sem'];

if(isset($_POST['subject']))
{
 echo $_POST['subject'];
} 




if(isset($_POST['quiz']))
{
 if($_POST['title']=="")
 {
    $error.="Title is required<br>";
 }
 
 if($_POST['maxquestion']=="")
  {
    $error.="Please enter the maximum no of questions<br>";
  }
  
  if($_POST['maxmarks']=="")
  {
    $error.="Please enter the maximum marks<br>";
  }
  
  if($_POST['time']=="")
  {
    $error.="Please enter the time limit<br>";
  } 
    
  if($_POST['tag']=="")
  {
    $error.="Please enter the search tag<br>";
  }    
  
  if($_POST['subcode']=="")
  {
    $error.="Subject code is required<br>";
  }
  
   if($error=="")
   {
       $_SESSION['maxquestion']=$_POST['maxquestion'];
       
       include("connection.php");
       $subcode=mysqli_real_escape_string($link,$_POST['subcode']);
       $title=mysqli_real_escape_string($link,$_POST['title']);
       $time=mysqli_real_escape_string($link,$_POST['time']);
       $tag= mysqli_real_escape_string($link,$_POST['tag']);
       $maxmarks= mysqli_real_escape_string($link,$_POST['maxmarks']);
       $desc= mysqli_real_escape_string($link,$_POST['desc']);
       //$teacher_id= mysqli_real_escape_string($link,$_POST['teacher_id']);
       $maxquestion= mysqli_real_escape_string($link,$_POST['maxquestion']);
        $query="
        INSERT INTO Test_details 
        (Sub_code,test_name,time,tag,total_marks,description,tid,total_questions) 
        VALUES ('".$subcode."','".$title."','".$time."','".$tag."','".$maxmarks."','".$desc."','".$_SESSION['teacher_id']."','".$maxquestion."')";
        
   if(mysqli_query($link,$query))
   {
     $_SESSION['lastid']= mysqli_insert_id($link);
     header('Location: question.php');       
     
   }
  else
   {
     $warning="Something Went Wrong Please Try Again<br>";
   }
    
       
      echo $_POST["title"]."<br>".$_POST["maxquestion"]."<br>".$_POST["maxmarks"]."<br>".$_POST["time"]."<br>".$_POST["tag"]."<br>".$_POST["subcode"]."<br>".$_POST["desc"]."<br>";
 
   }
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

    <title>Question</title>
  </head>
  <body>
   
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">OutOfBox</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="tdash.php" id="hom">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <div class="pull-xs-right"  style="margin: 10px;">
       <a  class="navbar-brand"><?php echo 'Hi ! '.$_SESSION['username']; ?></a>
   </div>
    <div class="pull-xs-right"  style="margin: 10px;">
       <a href='index.php?logout=1'><button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Logout</button></a>
   </div>
  </div>
</nav>

<br><br>
   
   
   <div class="container">
        
        <div id="error"><?php if($error!=""){
  echo '<div class="alert alert-danger" role="alert">'.$error.'</div>'; }
        if($successmessage!=""){
  echo '<div class="alert alert-success" role="alert">'.$successmessage.'</div>'; }
        if($warning!=""){
  echo '<div class="alert alert-warning" role="alert">'.$warning.'</div>';}?>
     </div>

<div id="addquiz">
    <div class="container">
    <form method="post" action="addquestion.php">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="quiztitle">Quiz Title</label>
      <input type="text" class="form-control" id="quiztitle" placeholder="Basic SQL Cammands" name="title" required>
    </div>
    <div class="form-group col-md-6">
      <label for="totalquestion">Total Number Of Question</label>
      <input type="number" class="form-control" id="totalquestion" placeholder="20" name="maxquestion" required>
    </div>
  </div>
 <div class="form-row"> 
  <div class="form-group col-md-2">
    <label for="time">Time(in minutes)</label>
    <input type="number" class="form-control" id="time" placeholder="10" name="time" required>
  </div>
   <div class="form-group col-md-2">
    <label for="maxmarks">Maximum Marks</label>
    <input type="number" class="form-control" id="maxmarks" placeholder="20" name="maxmarks" required>
  </div>
 </div> 
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="tag">#Tag To Search</label>
      <input type="text" class="form-control" id="tag" placeholder="Basic sql" name="tag" required>
    </div>
     <div class="form-group col-md-3">
      <label for="subcode">Subject Code</label>
      <input type="text" class="form-control" id="subcode" placeholder="CS510" name="subcode" required>
    </div>
  </div>

  <div class="form-group">      
  <label for="description">Test Description</label>
  <textarea class="form-control" id="description" rows="3" placeholder="Write the description here..." name="desc"></textarea>  
  </div>

  <button type="submit"  class="btn btn-primary" name="quiz" id="quiz" >Submit</button>
</form>
    
</div>
</div>
   
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>