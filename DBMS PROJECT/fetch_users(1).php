<?php
session_start();
//fetch_user.php
if(!isset($_SESSION['adminid']))
  {
    header("Location: index.php");   
  }
else
{
include("connection.php");

$query = "SELECT * FROM Student";



if($result=mysqli_query($link,$query))
{


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
      <th scope="col">Department</th>
      <th scope="col">Status</th>
      <th scope="col">Email Verification</th>
      <th scope="col">Delete Account</th>
      <th scope="col">Disable/Enable Account</th>
    </tr>
  </thead>
  <tbody>
';
while ($row=mysqli_fetch_array($result))
{
    if($row['status']==1)
    {    
        $temp='<button type="button" class="btn btn-success">Enabled</button>';
        $temp4='<button type="button" name="disable" value="'.$row['Student_id'].'" class="btn btn-outline-warning disable">Disable</button>';
    }
    else
    {    
        $temp='<button type="button" class="btn btn-danger">Disabled</button>';
        $temp4='<button type="button" name="disable" value="'.$row['Student_id'].'" class="btn btn-outline-success enable">Enable</button>';
    }
    
    if($row['activate']==1)
    {    
        $temp1='<button type="button" class="btn btn-primary">Verifed</button>';
    }
    else
    {    
        $temp1='<button type="button" class="btn btn-warning">Not Verifed</button>';
    }
 $output .= '
      <tr>
      <th scope="row">'.$row['Student_id'].'</th>
      <td>'.$row['Name'].'</td>
      <td>'.$row['sem'].'</td>
      <td>'.$row['email'].'</td>
      <td>'.$row['dept_name'].'</td>
       <td>'.$temp.'</td>
        <td>'.$temp1.'</td>
      <td>
         <button type="button"  name="remove" value="'.$row['Student_id'].'" class="btn btn-outline-danger delete">Remove</button>
     </td>
    <td>'.$temp4.'</td>
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
}//echo "hello";


//echo "current: ".$current_timestamp;
?>