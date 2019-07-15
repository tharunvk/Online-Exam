<?php
session_start();
$msg="";
if(isset($_GET['verifyaccount'])){
  include("connection.php");
  $query="SELECT * FROM `Student` WHERE verify='".$_GET['verifyaccount']."' LIMIT 1";
  $result=mysqli_query($link,$query);
   
  if(mysqli_num_rows($result)>0){
    $query1="UPDATE `Student` SET activate='1' WHERE verify='".$_GET['verifyaccount']."' LIMIT 1"; 
        if( mysqli_query($link,$query1) ){
            
            while ($row=mysqli_fetch_array($result))
            {
                $_SESSION['usn']=$row['Student_id'];
                $_SESSION['username']=$row['Name'];
            }
            header("Location: loggedinpage.php");
        }
        
  }
}
  
?>  