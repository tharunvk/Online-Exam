<?php  
session_start();

if(!isset($_SESSION['teacher_id']))
  {
    header("Location: tlogin.php");   
  }

 else
 {  $output="";
   include("connection.php");
   $query="select test_id,Sub_code,test_name,time,tag,total_marks,description,status_id,state,total_questions from Test_details inner JOIN Teacher on teacher_id=tid where tid='".$_SESSION['teacher_id']."'";
    
    if($result=mysqli_query($link,$query))
     {
         while ($row=mysqli_fetch_array($result))
           {
               if($row['status_id']==0)
                 $temp='<button type="button" value="'.$row['test_id'].'" class="btn btn-outline-success start">Start</button>';
               else
                 $temp='<button type="button" value="'.$row['test_id'].'" class="btn btn-outline-warning stop">Stop</button>';
         
      $output.='
       <tr>
      <th scope="row">'.$row['test_id'].'</th>
      <td>'.$row['Sub_code'].'</td>
      <td><a href="preview.php?topic='.$row['test_id'].'"target="_blank">'.$row['test_name'].'</a></td>
      <td>'.$row['time'].'</td>
      <td>'.$row['tag'].'</td>
      <td>'.$row['total_marks'].'</td>
      <td>'.$row['total_questions'].'</td>
      <td>'.$row['description'].'</td>
      <td>'.$temp.'</td>
      <td><button type="button" value="'.$row['test_id'].'" class="btn btn-outline-danger remove">Remove</button></td>
      <td><a href="quiz_result.php?topic='.$row['test_id'].'"target="_blank"><button type="button" name="subject" value="'.$row['test_id'].'" class="btn btn-outline-info result">View</button></a></td>
    </tr>';
     }
     echo $output;
 }
     else
     {
      echo '<div class="alert alert-warning" role="alert">
      Something Went Wrong Try Again Later
</div>';   
     }
 } 
     
?>    