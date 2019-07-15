<?php
session_start();
$output="";
//$active="";


if(!isset($_SESSION['usn']))
  {
    header("Location: index.php");   
  }
else
{

//fetch_quizzes.php
include("connection.php");

$query = "select Subjects.Sub_code,test_name,test_id,time,tag,total_marks,description,tid,status_id,state,total_questions from Student inner join Subjects on Student.sem=Subjects.sem inner join Test_details on Subjects.Sub_code=Test_details.Sub_code where Student_id='".$_SESSION['usn']."'";

$query1="select *  from Student where Student_id='".$_SESSION['usn']."'";
if($result1=mysqli_query($link,$query1))
{
    while ($row1=mysqli_fetch_array($result1))
    {
        $active=$row1['activate'];
        $verify=$row1['verify'];
    }
    
    if($active==1)
    {
        $temp1='<button type="button" class="btn btn-primary">Take</button>';
    }
    else
    {
        $temp1='<button type="button" class="btn btn-warning">Account not verifed</button>';
    }
}
if($result=mysqli_query($link,$query))
{
$name="";
while ($row=mysqli_fetch_array($result))
{
    $query1 = "SELECT * FROM Teacher where teacher_id='".$row['tid']."'";
     if($result1=mysqli_query($link,$query1))
     {
       while($row1=mysqli_fetch_array($result1))
       {
           $name=$row1['name'];
       }
     }  
     else
     {
         echo "Something Went Wrong";
     }
       
    if($row['status_id']==1)
    {    
        $temp='<button type="button" class="btn btn-success">Started</button>';
        if($active!=1)
          $temp1='<button type="button" class="btn btn-warning" disabled>Account not verifed</button>';
        else
          $temp1='<button type="button" class="btn btn-primary">Take</button>';
    }
    else
    {    
        $temp='<button type="button" class="btn btn-warning">Not Started</button>';
         if($active!=1)
          $temp1='<button type="button" class="btn btn-warning disabled">Account not verifed</button>';
         else
           $temp1='<button type="button" class="btn btn-primary" id="take" disabled>Take</button>'; 
    }
 $output .= '
      <tr>
      <th scope="row">'.$row['test_id'].'</th>
      <td>'.$row['test_name'].'</td>
      <td>'.$row['time'].'mins</td>
      <td>'.$row['total_questions'].'</td>
      <td>'.$row['total_marks'].'</td>
      <td>'.$name.'</td>
      <td>'.$row['Sub_code'].'</td>
    <td>'.$temp.'</td>
    <td><a href="quiz.php?topic='.$row['test_id'].'"target="_blank">'.$temp1.'</a></td>
    <td><a href="student_result.php?sid='.$_SESSION['usn'].'&topic='.$row['test_id'].'&stuname='.$_SESSION['username'].'"><button type="button" name="subject" value="'.$row['test_id'].'" class="btn btn-outline-info result">View</button></a></td>
    </tr>';
}
 echo $output;

}
else
{
    echo "Something Wrong";
}


}
//echo "hello";


//echo "current: ".$current_timestamp;
?>