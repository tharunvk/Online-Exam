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
   $query="select DISTINCT(Student.Student_id),Student.Name,Student.sem,Student.email from Teacher inner JOIN handles on teacher_id=tid inner join Subjects on handles.sub_code=Subjects.Sub_code inner join Student on Subjects.sem=Student.sem where teacher_id='".$_SESSION['teacher_id']."'";
    
    if($result=mysqli_query($link,$query))
     {
         while ($row=mysqli_fetch_array($result))
           {

      $output.='
       <tr>
      <th scope="row">'.$row['Student_id'].'</th>
      <td>'.$row['Name'].'</td>
      <td>'.$row['sem'].'</td>
      <td>'.$row['email'].'</td>
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