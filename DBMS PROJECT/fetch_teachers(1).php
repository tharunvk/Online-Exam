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

$query = "SELECT * FROM Teacher";



if($result=mysqli_query($link,$query))
{


$output = '
<div class="container">
<div class="table-responsive-sm">    
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Teacher ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Status</th>
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
        $temp4='<button type="button" name="disable" value="'.$row['teacher_id'].'" class="btn btn-outline-warning disableteacher">Disable</button>';
    }
    else
    {    
        $temp='<button type="button" class="btn btn-danger">Disabled</button>';
        $temp4='<button type="button" name="disable" value="'.$row['teacher_id'].'" class="btn btn-outline-success enableteacher">Enable</button>';
    }
 $output .= '
      <tr>
      <th scope="row">'.$row['teacher_id'].'</th>
      <td>'.$row['name'].'</td>
      <td>'.$row['email'].'</td>
       <td>'.$temp.'</td>
      <td>
         <button type="button"  name="remove" value="'.$row['teacher_id'].'" class="btn btn-outline-danger deleteteacher">Remove</button>
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