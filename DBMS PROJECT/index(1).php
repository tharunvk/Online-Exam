<?php
session_start();
$error="";
$successmessage="";
$warning="";

if(isset($_GET['logout'])==1)
 session_destroy();
 
/*if(isset($_SESSION['usn'])) 
{
     header("Location: loggedinpage.php");
}*/

if(isset($_POST['signup']))
{

//echo $_POST['email']." ".$_POST['uname']." ".$_POST['email']." ".$_POST['psw']." ".$_POST['rpsw']." ".$_POST['usn']." ". $_POST['branch']." ". $_POST['sem']."<br>";


  
  if($_POST['email']==""){
    $error.="Email is required<br>";
  }
  if($_POST['usn']==""){
    $error.="USN is required<br>";
  }
  if($_POST['uname']==""){
    $error.="Username is required<br>";
  }
  if($_POST['psw']==""){
    $error.="Password is required<br>";
  }
  if($_POST['rpsw']==""){
    $error.="Repeat is required<br>";
  }
  if($_POST['branch']==""){
    $error.="Branch is required<br>";
  }
  if($_POST['sem']==""){
    $error.="Semester is required<br>";
  }
  if($_POST['psw']!=$_POST['rpsw']){
    $error.="Password Doesn't Match<br>";
  }


  if($error==""){

   include("connection.php");

    $query="SELECT Student_id FROM `Student` WHERE Student_id='".mysqli_real_escape_string($link,$_POST['usn'])."' LIMIT 1";
   
    $result=mysqli_query($link,$query);
    
    $usn=mysqli_real_escape_string($link,$_POST['usn']);
    $uname=mysqli_real_escape_string($link,$_POST['uname']);
    $sem=mysqli_real_escape_string($link,$_POST['sem']);
    $psw=mysqli_real_escape_string($link,$_POST['psw']);
    $email=mysqli_real_escape_string($link,$_POST['email']);
    $dept_name=mysqli_real_escape_string($link,$_POST['branch']);
    if(mysqli_num_rows($result)>0)
    {
      $error = "Account with USN ".$_POST['usn']." already exist<br>";
    }
    else
    {
          /* $query="INSERT INTO `Student` (`Student_id`,`Name`,`Sem_id`,`Password`,`email`) VALUES ('".mysqli_real_escape_string($link,$_POST['usn'])."','".mysqli_real_escape_string($link,$_POST['uname'])."','".mysqli_real_escape_string($link,$_POST['sem'])."','".mysqli_real_escape_string($link,$_POST['psw'])."','".mysqli_real_escape_string($link,$_POST['email'])."')";*/
          
          $query="
        INSERT INTO Student 
        (Student_id,Name,sem,Password,dept_name,email) 
        VALUES ('".$usn."','".$uname."','".$sem."','".$psw."','".$dept_name."','".$email."')";

   if(mysqli_query($link,$query))
   {
   // $_SESSION['usn']=$_POST['usn'];
    //$_SESSION['username']=$_POST['uname'];
   //$successmessage="Sign Up Successfull<br>";
  // header("Location: loggedinpage.php");
  $verify1=bin2hex(random_bytes(15));
  
  $query="UPDATE `Student` SET verify='".$verify1."' WHERE email='".$_POST['email']."' LIMIT 1";
         
         
         if(!mysqli_query($link,$query)){
          $error="something wrong<br>"; 
         }
  
  
          $emailTo = $_POST['email'];
          $subject = "Verification Link To Activate Your Online Exam Account";
          $content = "https://tharunms98.000webhostapp.com/verify.php?verifyaccount=".$verify1."  Click link to verify and activate your account</a>";
          $headers = "From: vijethvk11@gmail.com";
            if(mail($emailTo,$subject,$content,$headers)){
             
              $successmessage='Signup Successful.<br>We have sent verification link Check your  mailbox.(it might be in spam box also)';
            }
           else{
             $error='Something Wrong please try again';
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

    <title>OnlineExam</title>
    
    <style>
    
     .jumbotron {
            background-image: url(bg2.jpg);
            color: white;
            text-align: center;
            margin-top: 80px;
           
        }
    
       #appsummary {
            text-align: center;
        }

        .card-img-top {
            height: 250px;
        }

        #footer {
            background-color: #808080;
            padding-top: 5px;
            margin-top: 80px;
            text-align: center;
            padding-bottom: 5px;
        }
    
body {font-family: Arial, Helvetica, sans-serif;}

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
   
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="#">OutOfBox</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Login as
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="tlogin.php">Teacher</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item"  href="login.php">Student</a>
        </div>
     </li>
     <li class="nav-item">
        <a class="nav-link" href="#">About us</a>
      </li>
    </ul>
     <div class="pull-xs-right"  style="margin: 10px;">
       <a href='adminlogin.php'><button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Admin Login</button></a>
   </div>  
  </div>
</nav>
    

<div class="jumbotron" id="jumbotron">
        <h1 class="display-4">Awesome Platform To Learn OutOfBox!</h1>
        <p class="lead">“Life is an experiment in which you may fail or succeed. Explore more, expect least.” </p>
        <hr class="my-4">
        <p>Want to know more? Join us!!</p>
         
          <button type="button" class="btn btn-success mb-2" onclick="document.getElementById('id02').style.display='block'" >Signup</button>
</div>

<div class="container">

        <div id="appsummary">
            <h1>Why This Platform Is Awesome</h1>

            <p class="lead">Explore,Experiment...</p>
        </div>

    </div>
    <div class="container" id="about">
      <div class="row text-center" style="display:flex; flex-wrap:wrap" >
            <div class="card col-sm">
                <img class="card-img-top" src="card1.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-anchor"></i> Computer Networks</h5>
                    <p class="card-text">Giving connects two people, the giver and the receiver, and this connection gives birth to a new sense of belonging..</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>&nbsp&nbsp
            <div class="card col-sm">
                <img class="card-img-top" src="card2.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-anchor"></i>Data Structures</h5>
                    <p class="card-text">Smart data structures and dumb code works a lot better than the other way around.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>&nbsp&nbsp
            <div class="card col-sm">
                <img class="card-img-top" src="card3.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-anchor"></i>Database Managment Systems</h5>
                    <p class="card-text">I'm an oracle of the past. I can accurately predict up to 1 minute in the future, by thoroughly investigating the last 2 years of your life. Also, I look like an old database – flat and full of useless info..</p>
                    <p class="card-text"><small class="text-muted">Last updated 50 mins ago</small></p>
                </div>
            </div>
      </div>
     </div> 

   <div id="footer">
        <p><font size="2">CopyRight @ OutOfBox 2018</font></p>
        <p><img src="sjce.jpg" width="75" height="75"></p>
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
      
       <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>

      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>
      
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>
      
      <label for="usn"><b>USN</b></label>
      <input type="text" placeholder="Enter USN" name="usn" required>

      <br> 
      <br>
      <label for="branch"><b>Branch And Semester &nbsp</b></label>
    <!-- Example single danger button -->
    <input list="branch" name="branch" placeholder="Branch">
     <datalist id="branch">
    <option class="dropdown-item" value="Computer Science">Computer Science And Engineering </option>
    <option class="dropdown-item" value="Electronics & Communication">Electronics And Communication</option>
    <option class="dropdown-item" value="Mechanical Engineering">Mechanical And Engineering</option>
     <option class="dropdown-item" value="Electrical Engineering">Electrical And Engineering</option>
     <option class="dropdown-item" value="Info. Science ">Information Science</option>
  </datalist>
  

    <input list="sem" name="sem" placeholder="Semester">
     <datalist id="sem">
    <option class="dropdown-item" value="1">1</option>
    <option class="dropdown-item" value="2">2</option>
    <option class="dropdown-item" value="3">3</option>
     <option class="dropdown-item" value="4">4</option>
     <option class="dropdown-item" value="5">5</option>
    <option class="dropdown-item" value="6">6</option>
    <option class="dropdown-item" value="7">7</option>
     <option class="dropdown-item" value="8">8</option>
    </datalist>
<br>
<br>

<label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      
        <label for="rpsw"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="rpsw" required>
        
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

 
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
     <script type="text/javascript">
        $(document).ready(function(){

        document.getElementById('id02').style.display='block';

    });
    
    </script>
    
  </body>
</html>