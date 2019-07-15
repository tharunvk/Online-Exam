<?php
session_start();
include("connection.php");
$total_q_ansd=0;
$total_correct_answer=0;
$marks_obt=0;
//echo $_POST['testid'];

$query12="select * from Test_details where test_id=".$_POST['testid'];
$result12=mysqli_query($link,$query12);
    
    if(mysqli_num_rows($result12)<=0)
    {
      header("Location: loggedinpage.php");
    }
else
{
for($i=1;$i<=$_SESSION['max'];$i++)
 { //echo $_POST[$i]."&nbsp"."<br>";
  
   if(isset($_POST[$i.'optradio']))
   //echo $_POST[$i.'optradio'];
  
  if(!isset($_POST[$i.'optradio']))
     $choice="xxx";
  else
  {
     $choice=$_POST[$i.'optradio'];
     $total_q_ansd++;
  }     
          
          $query1="select * from  Correct_answer where qid='".$_POST[$i]."'";
          if($result1=mysqli_query($link,$query1))
          {
              while($row1=mysqli_fetch_array($result1))
              {
                 $correct_answer=$row1['correct_option'];
              }
              
              if($correct_answer==$choice)
                    $total_correct_answer++;
          }
       
        $query="
        INSERT INTO Student_answer
        (Test_id,Qid,Student_id,choice) 
        VALUES ('".$_POST['testid']."','".$_POST[$i]."','".$_SESSION['usn']."','".$choice."')";
        if(!mysqli_query($link,$query))
            echo '<div class="alert alert-warning" role="alert">Something Went Wrong 1</div>';
           // $lastid=mysqli_insert_id($link);
         else
         {
              date_default_timezone_set('Asia/Kolkata');
              $time = strtotime(date("Y-m-d H:i:s") . '00 second');
               $time = date('Y-m-d H:i:s', $time);
         }

}
 // date_default_timezone_set('Asia/Kolkata');
  //$time = strtotime(date("Y-m-d H:i:s") . '00 second');
 //$time = date('Y-m-d H:i:s', $time);
  $marks_obt=$total_correct_answer;
 // echo $_SESSION['usn']."<br>".$_POST['testid']."<br>".$_SESSION['time']."<br>".$time."<br>".$total_q_ansd."<br>".$_SESSION['max']."<br>".$marks_obt."<br>".$_SESSION['max'];
  
  //UNIX_TIMESTAMP('2010-11-29 13:16:55')
  
  $query4="
        INSERT INTO Student_result
        (sid,test_id,end_time,start_time,total_q_ansd,total_qs,marks_obt,max_marks) 
        VALUES ('".$_SESSION['usn']."','".$_POST['testid']."','".$time."','".$_SESSION['time']."','".$total_q_ansd."','".$_SESSION['max']."','".$marks_obt."','".$_SESSION['max']."')";
        if(!mysqli_query($link,$query4))
            echo '<div class="alert alert-warning" role="alert">Something Went Wrong 1</div>';
       else
       {
           header("Location: student_result.php?sid=".$_SESSION['usn']."&topic=".$_POST['testid']."&stuname=".$_SESSION['username']);
       }
}       
?>