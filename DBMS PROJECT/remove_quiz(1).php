<?php
session_start();
 include("connection.php");
 
 
if(!isset($_SESSION['teacher_id']))
  {
    header("Location: tlogin.php");   
  }
else
{
 if(isset($_POST['remove']))
 {    
     //echo "hello";
     $query="delete from Test_details where test_id='".$_POST['remove']."'";
     $result=mysqli_query($link,$query);
     if($result)
       echo '<div class="alert alert-success" role="alert">
     Quiz With Test ID <b>'.$_POST['remove'].'</b> Deleted Sucessfully </div>';
     else
       echo '<div class="alert alert-warning" role="alert">
      Something Went Wrong Try Again Later
</div>';
 }
 if(isset($_POST['start']))
 {
     $query="update Test_details set status_id='1' where test_id='".$_POST['start']."'";
  //   $result=mysqli_query($link,$query);
     $result=mysqli_query($link,$query);
     if($result)
       echo '<div class="alert alert-success" role="alert">
       Quiz With Test ID <b>'.$_POST['start'].'<b> Successfully Started
</div>';
     else
       echo '<div class="alert alert-warning" role="alert">
      Something Went Wrong Try Again Later
</div>';
 
 }
 if(isset($_POST['stop']))
 {
      $query="update Test_details set status_id='0' where test_id='".$_POST['stop']."'";
  //   $result=mysqli_query($link,$query);
     $result=mysqli_query($link,$query);
     if($result)
       echo '<div class="alert alert-success" role="alert">
        Quiz With Test ID <b>'.$_POST['stop'].'<b> Stopped
</div>';
      else
       echo '<div class="alert alert-warning" role="alert">
      Something Went Wrong Try Again Later
</div>';
 
 }
}

?>