<?php
session_start();
$error="";
$successmessage="";
$warning="";

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

    <title>Question</title>
  </head>
  <body>
   
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?php echo $_SESSION['username']; ?></a>
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
       <a href='index.php?logout=1'><button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Logout</button></a>
   </div>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
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
  </div>     

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<?php

  include("connection.php");
   $a=1;$b=2;$c=3;$d=4;
   
     echo   '<div id="question"><div class="container"> <form method="post" action="submit_question.php">';

      for($i=1;$i<=$_SESSION['maxquestion'];$i++)
      {
        echo   '
        <div class="form-group">
    <label for="question'.$i.'">Enter the question '.$i.'</label>
    <textarea class="form-control" id="question'.$i.'" name="question'.$i.'"   rows="3" required></textarea>
  </div>
  <div class="form-group">
    <label for="option'.$i.'1">Option 1</label>
    <input type="text" class="form-control" name="'.$i.'1" id="option'.$i.'1" placeholder="Option 1" required>
  </div>
  <div class="form-group">
    <label for="option'.$i.'2">Option 2</label>
    <input type="text" class="form-control" name="'.$i.'2" id="option'.$i.'2" placeholder="Option 2" required>
  </div>
  <div class="form-group">
    <label for="option'.$i.'3">Option 3</label>
    <input type="text" class="form-control" name="'.$i.'3" id="option'.$i.'3" placeholder="Option 3" required>
  </div>
  <div class="form-group">
    <label for="option'.$i.'4">Option 4</label>
    <input type="text" class="form-control" name="'.$i.'4" id="option'.$i.'4" placeholder="Option 4" required>
  </div>
  
  <div class="form-group">
    <label for="ans'.$i.'">Correct Option</label>
    <select class="form-control" id="ans'.$i.'" name="ans'.$i.'" required>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select>
  </div>';
      }
    echo '<button type="submit" name="questions" class="btn btn-primary mb-2">Submit</button>
  
</form></div></div>';
  

/*if(isset($_POST['questions']))
{
    for($j=1;$j<=$_SESSION['maxquestion'];$j++)
    {
      //  echo $j.$_POST['question'.$j]."<br>".$_POST[$j.'1']."<br>".$_POST[$j.'2']."<br>".$_POST[$j.'3']."<br>".$_POST[$j.'4'].$_POST['ans'.$j]."<br><br>";
        
        $ques=mysqli_real_escape_string($link,$_POST['question'.$j]);
               
        $query="
        INSERT INTO Questions 
        (question,teacher_id,test_id) 
        VALUES ('".$ques."','".$_SESSION['teacher_id']."','".$_SESSION['lastid']."')";
        if(!mysqli_query($link,$query))
            echo '<div class="alert alert-warning" role="alert">Something Went Wrong 1</div>';
            $lastid=mysqli_insert_id($link);
            
            $a1=mysqli_real_escape_string($link,$_POST[$j.'1']);
            $b1=mysqli_real_escape_string($link,$_POST[$j.'2']);
            $c1=mysqli_real_escape_string($link,$_POST[$j.'3']);
            $d1=mysqli_real_escape_string($link,$_POST[$j.'4']);
            $ans=mysqli_real_escape_string($link,$_POST['ans'.$j]);
            
            $qa=mysqli_query($link,"INSERT INTO `option_table` VALUES  ($lastid,'$a1',1)");
           $qb=mysqli_query($link,"INSERT INTO `option_table` VALUES  ($lastid,'$b1','2')");
            $qc=mysqli_query($link,"INSERT INTO `option_table` VALUES  ($lastid,'$c1','3')");
            $qd=mysqli_query($link,"INSERT INTO `option_table` VALUES  ($lastid,'$d1','4')");
        
           if(!($qa and $qb and $qc and $qc and $qd))
              echo '<div class="alert alert-warning" role="alert">Something Went Wrong 2</div>';
      
       //echo $lastid;
        
        $query2="
        INSERT INTO Correct_answer 
        (qid,correct_option) 
        VALUES (".$lastid.",'".$ans."')";
        if(!mysqli_query($link,$query2))
          echo '<div class="alert alert-warning" role="alert">Something Went Wrong 3</div>';
        else
        {
            echo '<a href="preview.php?topic='.$_SESSION['lastid'].'"><button type="button" name="questions" class="btn btn-primary">Back to home</button></a>';
        }
    }   
    
    
}
else
{
       $q1="delete from Test_details where test_id='".$_SESSION['lastid']."'";
}
  
*/
?>
