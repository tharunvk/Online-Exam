<?php
session_start();
if(!isset($_SESSION['adminid']))
  {
    header("Location: index.php");   
  }
else
{
 include("connection.php");
 
 if(isset($_POST['remove']))
 {    
     //echo "hello";
     $query="delete from Teacher where teacher_id='".$_POST['remove']."'";
     $result=mysqli_query($link,$query);
     if($result)
       echo '<div class="alert alert-success" role="alert"> Teacher With ID '.$_POST['remove'].'
      Deleted Sucessfully
</div>';
     else
       echo '<div class="alert alert-warning" role="alert">
      Something Went Wrong Try Again Later
</div>';
 }
 if(isset($_POST['disable']))
 {
     $query="update Teacher set status='0' where teacher_id='".$_POST['disable']."'";
  //   $result=mysqli_query($link,$query);
     $result=mysqli_query($link,$query);
     if($result)
       echo '<div class="alert alert-success" role="alert">Teacher With ID '.$_POST['disable'].'
       Disabled Sucessfully
</div>';
     else
       echo '<div class="alert alert-warning" role="alert">
      Something Went Wrong Try Again Later
</div>';
 
 }
 if(isset($_POST['enable']))
 {
     $query="update Teacher set status='1' where teacher_id='".$_POST['enable']."'";
  //   $result=mysqli_query($link,$query);
     $result=mysqli_query($link,$query);
     if($result)
       echo '<div class="alert alert-success" role="alert">Teacher With ID '.$_POST['enable'].'
       Enabled Sucessfully
</div>';
      else
       echo '<div class="alert alert-warning" role="alert">
      Something Went Wrong Try Again Later
</div>';
 
 }
}

?>