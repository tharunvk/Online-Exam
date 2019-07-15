<?php
session_start();
$timeout=0;
$norecords="";

if(!isset($_SESSION['teacher_id']))
  {
    header("Location: tlogin.php");   
  }

include("connection.php");


if(isset($_POST['searchvalue']))
{
    if(isset($_POST['searchcat']))
    {
        if($_POST['searchcat']=="student")
        {
            $query = "select Student.Student_id,Student.Name,Student.sem,Student.email from Teacher inner JOIN handles on teacher_id=tid inner join Subjects on handles.sub_code=Subjects.Sub_code inner join Student on Subjects.sem=Student.sem where Student.Name LIKE '%".$_POST['searchvalue']."%' and teacher_id='".$_SESSION['teacher_id']."'";



if($result=mysqli_query($link,$query))
{
    if(mysqli_num_rows($result)<=0)
    {
      $norecords ='<div class="alert alert-warning" role="alert">No results found</div>';
    }
    
$output = '
<div class="container">
<div class="table-responsive-sm">    
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">USN</th>
      <th scope="col">Name</th>
      <th scope="col">Semester</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
';
while ($row=mysqli_fetch_array($result))
{
  
 $output .= '
      <tr>
      <th scope="row">'.$row['Student_id'].'</th>
      <td>'.$row['Name'].'</td>
      <td>'.$row['sem'].'</td>
      <td>'.$row['email'].'</td>
    </tr>';
}
 $output.='</tbody>
</table>
</div>
</div>
 ';
 if($norecords=="")
    echo $output;
 else
     echo $norecords;

}
        }
        if($_POST['searchcat']=="topic")
        {
            $query = "select test_id,Sub_code,test_name,time,tag,total_marks,description,status_id,state,total_questions from Test_details inner JOIN Teacher on teacher_id=tid where test_name LIKE '%".$_POST['searchvalue']."%' and tid='".$_SESSION['teacher_id']."'";;



if($result=mysqli_query($link,$query))
{
    if(mysqli_num_rows($result)<=0)
    {
      $norecords ='<div class="alert alert-warning" role="alert">No results found</div>';
    }

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
      <th scope="col">Subject Code</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
';
$name="";
while ($row=mysqli_fetch_array($result))
{
   
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
 
 if($norecords=="")
    echo $output;
 else
     echo $norecords;
}
        }
               if($_POST['searchcat']=="Subject")
        {
            $query = "select test_id,Sub_code,test_name,time,tag,total_marks,description,status_id,state,total_questions from Test_details inner JOIN Teacher on teacher_id=tid where Sub_code LIKE '%".$_POST['searchvalue']."%' and tid='".$_SESSION['teacher_id']."'";;



if($result=mysqli_query($link,$query))
{
    if(mysqli_num_rows($result)<=0)
    {
      $norecords ='<div class="alert alert-warning" role="alert">No results found</div>';
    }

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
      <th scope="col">Subject Code</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
';
$name="";
while ($row=mysqli_fetch_array($result))
{
   
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
 
 if($norecords=="")
    echo $output;
 else
     echo $norecords;
}
        }
    }
}



?>