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
     $query="delete from Student where Student_id='".$_POST['remove']."'";
     $result=mysqli_query($link,$query);
     if($result)
       echo '<div class="alert alert-success" role="alert">
      Deleted Sucessfully <span>(click on <b>Students</b> at the navbar to see the change)</span>
</div>';
     else
       echo '<div class="alert alert-warning" role="alert">
      Something Went Wrong Try Again Later
</div>';
 }
 if(isset($_POST['disable']))
 {
     $query="update Student set status='0' where Student_id='".$_POST['disable']."'";
  //   $result=mysqli_query($link,$query);
     $result=mysqli_query($link,$query);
     if($result)
       echo '<div class="alert alert-success" role="alert">
       Disabled Sucessfully
</div>';
     else
       echo '<div class="alert alert-warning" role="alert">
      Something Went Wrong Try Again Later
</div>';
 
 }
 if(isset($_POST['enable']))
 {
     $query="update Student set status='1' where Student_id='".$_POST['enable']."'";
  //   $result=mysqli_query($link,$query);
     $result=mysqli_query($link,$query);
     if($result)
       echo '<div class="alert alert-success" role="alert">
       Enabled Sucessfully
</div>';
      else
       echo '<div class="alert alert-warning" role="alert">
      Something Went Wrong Try Again Later
</div>';
 
 }
}

?>