<?php
session_start();
$error="";
$successmessage="";
$warning="";

if(isset($_GET['id']))
{
$_SESSION['email']=$_GET['id'];
$_SESSION['tid']=$_GET['uf8'];
//echo $_GET['id']."<br>".$_GET['uf8'];
}


if(isset($_POST['submit'])){
    
    if($_POST['psw']!=$_POST['cpsw'])
    {
        $error="Password Doesn't Match try again<br>";
    }
else    
{
  include("connection.php");
  
if(isset($_POST['subject']))  
{
  $values = $_POST['subject'];
foreach ($values as $a){
    //echo $a;
    //echo $_SESSION['tid'];
    
    $query1="insert into handles (tid,sub_code,email) values (".$_SESSION['tid'].",'".$a."','".$_SESSION['email']."')";
    if(!$result1=mysqli_query($link,$query1))
       $warning="Something Went Wrong Try Again Later";
}
}
  
  $query="SELECT * FROM `Teacher` WHERE teacher_id='".$_SESSION['tid']."' LIMIT 1";
  $result=mysqli_query($link,$query);
   
  if(mysqli_num_rows($result)>0){
    $query="UPDATE `Teacher` SET password='".$_POST['psw']."' where teacher_id='".$_SESSION['tid']."' LIMIT 1";
        if( mysqli_query($link,$query) ){
           $successmessage='<div class="alert alert-success" role="alert"><a href="tlogin.php">Your Account Has Been Updated.please click here to go back and login</a></div>';
           session_destroy();
        }
        
  }
} 
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    <title>Account setup</title>
    <style>

    .container{
       
       text-align:center;
       max-width:450px;
       margin-top:100px;
       opacity:1;
    }    

   span.multiselect-native-select {
	position: relative
}
span.multiselect-native-select select {
	border: 0!important;
	clip: rect(0 0 0 0)!important;
	height: 1px!important;
	margin: -1px -1px -1px -3px!important;
	overflow: hidden!important;
	padding: 0!important;
	position: absolute!important;
	width: 1px!important;
	left: 50%;
	top: 30px
}
.multiselect-container {
	position: absolute;
	list-style-type: none;
	margin: 0;
	padding: 0
}
.multiselect-container .input-group {
	margin: 5px
}
.multiselect-container>li {
	padding: 0
}
.multiselect-container>li>a.multiselect-all label {
	font-weight: 700
}
.multiselect-container>li.multiselect-group label {
	margin: 0;
	padding: 3px 20px 3px 20px;
	height: 100%;
	font-weight: 700
}
.multiselect-container>li.multiselect-group-clickable label {
	cursor: pointer
}
.multiselect-container>li>a {
	padding: 0
}
.multiselect-container>li>a>label {
	margin: 0;
	height: 100%;
	cursor: pointer;
	font-weight: 400;
	padding: 3px 0 3px 30px
}
.multiselect-container>li>a>label.radio, .multiselect-container>li>a>label.checkbox {
	margin: 0
}
.multiselect-container>li>a>label>input[type=checkbox] {
	margin-bottom: 5px
}
.btn-group>.btn-group:nth-child(2)>.multiselect.btn {
	border-top-left-radius: 4px;
	border-bottom-left-radius: 4px
}
.form-inline .multiselect-container label.checkbox, .form-inline .multiselect-container label.radio {
	padding: 3px 20px 3px 40px
}
.form-inline .multiselect-container li a label.checkbox input[type=checkbox], .form-inline .multiselect-container li a label.radio input[type=radio] {
	margin-left: -20px;
	margin-right: 0
}
  
    </style>
  </head>
  <body>
    <div class="container">  
    <h1 align="center">Account Setup</h1>
     <div id="error"><?php if($error!=""){
  echo '<div class="alert alert-danger" role="alert">'.$error.'</div>'; }
        if($successmessage!=""){
  echo '<div class="alert alert-success" role="alert">'.$successmessage.'</div>'; }
        if($warning!=""){
  echo '<div class="alert alert-warning" role="alert">'.$warning.'</div>';}?>
      </div>
    <form method="post">
        <p>Reset Your Password</p>
    <div class="form-group">
    <label for="exampleInputPassword1">Enter the Password</label>
    <input type="password" class="form-control" name="psw" id="exampleInputPassword1" placeholder="**********">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Repeat the Password</label>
    <input type="password" class="form-control" name="cpsw" id="exampleInputPassword1" placeholder="**********">
  </div>
  <div class="form-group">
    <label class="col-md-4 control-label" for="rolename">Select the Subjetcs you handle</label>
    <div class="col-md-4">
        <select id="dates-field2" name="subject[]"class="multiselect-ui form-control" multiple="multiple">
            <option value="CS310">Data Structures</option>
            <option value="CS320">Maths 3</option>
            <option value="CS510">DBMS</option>
            <option value="CS610">Data mining</option>
            <option value="CS430">Microprocessors</option>
            <option value="CS530">Unix sys. prog</option>
        </select>
    </div>
</div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form> 
</div>  



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
<script>
$(function() {
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
});
</script>
  </body>
</html>