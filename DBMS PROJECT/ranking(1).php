<?php  
session_start();
     $output="";
     
     if(!isset($_SESSION['teacher_id']))
  {
    header("Location: tlogin.php");   
  }

    else
 {    
   include("connection.php");
   $query="select Student.Student_id,Student.Name,SUM(Student_result.marks_obt) as points from Student_result INNER JOIN Test_details on Student_result.test_id=Test_details.test_id INNER join handles on Test_details.Sub_code=handles.sub_code inner join Student on Student_result.sid=Student.Student_id WHERE handles.tid=".$_SESSION['teacher_id']." GROUP by Student_result.sid order by SUM(Student_result.marks_obt) desc ";
    
    if($result=mysqli_query($link,$query))
     {
         while ($row=mysqli_fetch_array($result))
           {

      $output.='
       <tr>
      <th scope="row">'.$row['Student_id'].'</th>
      <td>'.$row['Name'].'</td>
      <td>'.$row['points'].'</td>
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