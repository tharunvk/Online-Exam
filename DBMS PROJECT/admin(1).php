<?php
session_start();
$error="";
$successmessage="";
$warning="";

if(!isset($_SESSION['adminid']))
  {
    header("Location: index.php");   
  }

include("connection.php");

/*if(isset($_SESSION['usn'])) 
{
     header("Location: loggedinpage.php");
}*/

if(isset($_POST['signup']))
{

//echo $_POST['email']." ".$_POST['uname']." ".$_POST['psw']." ". $_POST['branch']." ". $_POST['sem']."<br>";


  
  if($_POST['email']==""){
    $error.="Email is required<br>";
  }

  if($_POST['uname']==""){
    $error.="Username is required<br>";
  }
  if($_POST['psw']==""){
    $error.="Password is required<br>";
  }
 

  if($error==""){

   

    $query="SELECT teacher_id FROM `Teacher` WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."' LIMIT 1";
   
    $result=mysqli_query($link,$query);
    
    if(mysqli_num_rows($result)>0)
    {
      $error = "Account with Email ".$_POST['email']." already exist<br>";
    }
    else
    {
          /* $query="INSERT INTO `Student` (`Student_id`,`Name`,`Sem_id`,`Password`,`email`) VALUES ('".mysqli_real_escape_string($link,$_POST['usn'])."','".mysqli_real_escape_string($link,$_POST['uname'])."','".mysqli_real_escape_string($link,$_POST['sem'])."','".mysqli_real_escape_string($link,$_POST['psw'])."','".mysqli_real_escape_string($link,$_POST['email'])."')";*/
          
          $query="
        INSERT INTO Teacher 
        (name,password,email) 
        VALUES ('".$_POST['uname']."','".$_POST['psw']."','".$_POST['email']."')";

   if(mysqli_query($link,$query))
   {
    $_SESSION['email']=$_POST['email'];
    $_SESSION['username']=$_POST['uname'];
   //$successmessage="Sign Up Successfull<br>";
  // header("Location: loggedinpage.php");
      $emailTo = $_POST['email'];
          $subject = "Account Credentials";
          $content = "username:- ".$_POST['email']." ,  password:- ".$_POST['psw']." and link to setup your account : https://tharunms98.000webhostapp.com/account_setup.php?id=".$_POST['email']."&uf8=".mysqli_insert_id($link);
          $headers = "From: online_exam@gmail.com";
           if(mail($emailTo,$subject,$content,$headers)){
             
              $successmessage='Signup Successful.<br>Email has been sent with username and password.';
            }
   }
  else
   {
     $warning="Something Went Wrong Please Try Again<br>";
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Virtual Life</title>
    <style>
    .jumbotron {
            background-image: url(bg2.jpg);
            color: white;
            text-align: center;
            margin-top: 80px;
           
        }
    /* Full-width input fields */
input[type=text], input[type=password], input[type=email] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
.button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #fd081a;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}

hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
 
    
  </style>
  </head>
  <body>
   
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">OutOfBox</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"  id="hom">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"  id="student">Students</a>
      </li>
       <li class="nav-item ">
        <a class="nav-link" href="#" id="teacher">Teachers</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#" id="quiz">Quizes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" id="backup">Backup</a>
      </li>
    </ul>
     <div class="pull-xs-right"  style="margin: 10px;">
       <a  class="navbar-brand"><?php echo "Hi ! Admin"; ?></a>
   </div>
    <div class="pull-xs-right"  style="margin: 10px;">
       <a href='index.php?logout=1'><button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Logout</button></a>
   </div>
  </div>
</nav>

<div class="jumbotron" id="jumbotron">
        <h1 class="display-4">Awesome Platform To Learn OutOfBox!</h1>
        <p class="lead">“Life is an experiment in which you may fail or succeed. Explore more, expect least.” </p>
        <hr class="my-4">
        <p>Want to know more? Join us!!</p>
         
          <button type="button" class="btn btn-success" onclick="document.getElementById('id02').style.display='block'">Add Teacher</button>
</div>
   
 
 
 <div id="id02" class="modal">
 <form class="modal-content animate" method="post" >
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>
    

    <div class="container">
        
         <div id="error"><?php if($error!=""){
  echo '<div class="alert alert-danger" role="alert">'.$error.'</div>'; }
        if($successmessage!=""){
  echo '<div class="alert alert-success" role="alert">'.$successmessage.'</div>'; }
        if($warning!=""){
  echo '<div class="alert alert-warning" role="alert">'.$warning.'</div>';}?>
     </div>
      
       <h1>Create Teacher Account</h1>
      <p>Please fill in this form to create Teacher account.</p>
      <hr>

      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>
      
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>
      
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      
      <br> 
      <br>

      <button type="submit"class="button" name="signup">Sign Up</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button"  onclick="document.getElementById('id02').style.display='none'" class="btn btn-danger">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<div id="id01">
  <div class="container">
<div id="del1"></div>
</div>
<div id="stu"></div>
</div>
<div id="id03">
<div id="quizzes"></div>
</div>
<div id="id04">
  <div class="container">
<div id="del3"></div>
</div>
<div id="teach"></div>
</div>    

<div id="back">
<div class="container">
<div class="table-responsive-sm">    
<table class="table table-striped">
  <thead>
    <tr>
     <th scope="col">Teacher ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody id="q06">
   
  </tbody>
</table>
</div>
</div>
</div>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   
    <script type="text/javascript">
    
      $(document).ready(function(){
   
   document.getElementById('id02').style.display='block';
   document.getElementById('jumbotron').style.display='block';
    document.getElementById('id01').style.display='none';
     document.getElementById('id03').style.display='none';
      document.getElementById('id04').style.display='none';  
      document.getElementById('back').style.display='none';  
   
   
    setInterval(function(){
  fetch_user();
  fetch_quiz();
  fetch_teacher();    
 }, 2000);
   
   //students
    function fetch_user()
 {
     console.log("hey");
  $.ajax({
   url:"fetch_users.php",
   method:"POST",
   success:function(data){
    $('#stu').html(data);
    
      $(".delete").click(function(){
       // alert($(this).val());
          $.ajax({
   url:"remove_student.php",
   method:"POST",
   data: { remove:$(this).val() },
   success: function(response) {
        //$("#del").html(response);
        
        $("#del1").html(response);
    }
   
  })
    });
    
    $(".disable").click(function(){
       // alert($(this).val());
          $.ajax({
   url:"remove_student.php",
   method:"POST",
   data: { disable:$(this).val() },
   success: function(response) {
        //$("#del").html(response);
        
        $("#del1").html(response);
    }
   
  })
    });
    
     $(".enable").click(function(){
       // alert($(this).val());
          $.ajax({
   url:"remove_student.php",
   method:"POST",
   data: { enable:$(this).val() },
   success: function(response) {
        //$("#del").html(response);
        
        $("#del1").html(response);
    }
   
  })
    });
 
   }
  })
 }
 
 //quizes
  function fetch_quiz()
 {
     console.log("hello");
  $.ajax({
   url:"fetch_quizzes.php",
   method:"POST",
   success:function(data){
    $('#quizzes').html(data);
   }
  });
 }
        
   function fetch_teacher()
 {
     console.log("hello");
  $.ajax({
   url:"fetch_teachers.php",
   method:"POST",
   success:function(data){
    $('#teach').html(data);
     
     
     $(".deleteteacher").click(function(){
       // alert($(this).val());
          $.ajax({
   url:"remove_teacher.php",
   method:"POST",
   data: { remove:$(this).val() },
   success: function(response) {
        //$("#del").html(response);
        
        $("#del3").html(response);
    }
   
  })
    });
    
    $(".disableteacher").click(function(){
       // alert($(this).val());
          $.ajax({
   url:"remove_teacher.php",
   method:"POST",
   data: { disable:$(this).val() },
   success: function(response) {
        //$("#del").html(response);
        
        $("#del3").html(response);
    }
   
  })
    });
    
     $(".enableteacher").click(function(){
       // alert($(this).val());
          $.ajax({
   url:"remove_teacher.php",
   method:"POST",
   data: { enable:$(this).val() },
   success: function(response) {
        //$("#del").html(response);
        
        $("#del3").html(response);
    }
   
  })
    });
 
     
     
     
   }
  });
 }        

 $("#student").click(function(){
    document.getElementById('id01').style.display='block'; 
    document.getElementById('id02').style.display='none';
     document.getElementById('id03').style.display='none';
    document.getElementById('id04').style.display='none';
    document.getElementById('back').style.display='none';  
    document.getElementById('jumbotron').style.display='none';
    
}); 

$("#quiz").click(function(){
    document.getElementById('id03').style.display='block';
  document.getElementById('id01').style.display='none'; 
    document.getElementById('id02').style.display='none';
  document.getElementById('id04').style.display='none';
  document.getElementById('back').style.display='none';  
  document.getElementById('jumbotron').style.display='none';
});

$("#teacher").click(function(){
    document.getElementById('id04').style.display='block';
    document.getElementById('id03').style.display='none';
  document.getElementById('id01').style.display='none'; 
    document.getElementById('id02').style.display='none';
    document.getElementById('back').style.display='none'; 
    document.getElementById('jumbotron').style.display='none';
});        
   
 $("#hom").click(function(){
    document.getElementById('id04').style.display='none';
    document.getElementById('id03').style.display='none';
  document.getElementById('id01').style.display='none'; 
    //document.getElementById('id02').style.display='block';
    document.getElementById('back').style.display='none';  
    document.getElementById('jumbotron').style.display='block';
});      
   
$("#backup").click(function(){
    document.getElementById('id04').style.display='none';
    document.getElementById('id03').style.display='none';
  document.getElementById('id01').style.display='none'; 
    document.getElementById('id02').style.display='none';
    document.getElementById('back').style.display='block';  
    document.getElementById('jumbotron').style.display='none';
    $.ajax({
   url:"backup.php",
   method:"POST",
   data: { enable:$(this).val() },
   success: function(response) {
        //$("#del").html(response);
        
        $("#q06").html(response);
    }
   
  })
    
});   
 /*   $(".delete").click(function(){
        alert($(this).val());
          $.ajax({
   url:"remove_student.php",
   method:"POST",
  // data: { remove:$(this).val() }
  })
    })*/
    
});

    
    </script>
    
    
  </body>
</html>