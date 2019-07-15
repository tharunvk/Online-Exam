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

$query = "SELECT * FROM teacher_backup";

$output="";

if($result=mysqli_query($link,$query))
{


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
    </tr>';
}

 echo $output;

}
else
{
    echo "Something Worng";
}
}//echo "hello";


//echo "current: ".$current_timestamp;
?>