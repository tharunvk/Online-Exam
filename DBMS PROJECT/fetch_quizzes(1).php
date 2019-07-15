<?php
session_start();

if(!isset($_SESSION['adminid']))
  {
    header("Location: index.php");   
  }
else
{

//fetch_quizzes.php
include("connection.php");

$query = "SELECT * FROM Test_details";



if($result=mysqli_query($link,$query))
{


$output = '
<div class="container">
<div class="table-responsive-sm">    
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Test ID</th>
      <th scope="col">Title</th>
      <th scope="col">Time Limit</th>
      <th scope="col">Total Question</th>
      <th scope="col">Total Marks</th>
      <th scope="col">Faculty</th>
      <th scope="col">Subject Code</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
';
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
    }
    else
    {    
        $temp='<button type="button" class="btn btn-warning">Not Started</button>';
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
    </tr>';
}
 $output.='</tbody>
</table>
</div>
</div>
 ';
 echo $output;

}
else
{
    echo "Something Worng";
}

}
//echo "hello";


//echo "current: ".$current_timestamp;
?>