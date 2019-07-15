<?php
session_start();
$timeout=0;
//$active="";


if(!isset($_SESSION['usn']))
  {
    header("Location: index.php");   
  }
else
{
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quiz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 

   <?php
    $take=0;
    date_default_timezone_set('Asia/Kolkata');
    $time = strtotime(date("Y-m-d H:i:s") . '00 second');
    $time = date('Y-m-d H:i:s', $time);
    $_SESSION['time']=$time;
     $output="";
     $count=1;
     $option=array("a","b","c","d");
   include("connection.php");
   $topic=$_GET['topic'];
   
   
   
     $query5="select * from student_take where sid='".$_SESSION['usn']."'and test_id='".$_GET['topic']."'";
     if($result5=mysqli_query($link,$query5))
     {
          if(mysqli_num_rows($result5)>0)
        {
          $take=0;    
       }
       else
     {
         $take=1;
     }
     }
     
   
   if($take)
   {
       
     $query5=" INSERT INTO student_take
        (sid,test_id) 
        VALUES ('".$_SESSION['usn']."','".$_GET['topic']."')";
        if(!$result5=mysqli_query($link,$query5))
          echo "something went wrong";
        
       
   $query10="select * from Test_details where Test_id='".$_GET['topic']."'";
   if($result10=mysqli_query($link,$query10))
   {
       while ($row10=mysqli_fetch_array($result10))
       {
           $timeout=$row10['time']*60;
       }
   }
    echo '<input type="number" name="quantity" value="'.$timeout.'" style="display:none" id="tim">';
   
   $query0="select * from Student_answer where Student_id='".$_SESSION['usn']."'and Test_id='".$_GET['topic']."'";
   $result0=mysqli_query($link,$query0);
      if(mysqli_num_rows($result0)>0)
    {
       echo '<h1 align="center">You have already taken this quiz<span>(if not contact your teacher)</span></h1>';
    }
   
 else  
 {  
     echo '<div class="container">
  <h2>Questions</h2>
  <p>Try not to refersh the page or Shift between the page.</p>
    <div align="centre">Quiz closes in <h1 id="time">05:00</h1> minutes! Please Try To Submit Before That</div><br><br>
  <div class="panel-group">';
     
   $query="SELECT * FROM `Questions` WHERE Questions.test_id='".$_GET['topic']."'";
    if($result=mysqli_query($link,$query))
     {
         echo '<form action="student_answer.php" method="post">';
         $j=1;
         while ($row=mysqli_fetch_array($result))
           {  
              echo '<div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">'.$count.')&nbsp'.$row['question'].'</div><div class="panel-body">';
       
      echo '<input type="text" style="display:none" name="'.$j.'" value="'.$row['qid'].'">';
               
           //    echo $count."). ".$row['question']."<br>";
               $i=0;
                $query1="SELECT * FROM `option_table` WHERE qid='".$row['qid']."'";
                if($result1=mysqli_query($link,$query1))
                {
                    while($row1=mysqli_fetch_array($result1))
                    {
                        echo '<div class="radio options">&nbsp'.$option[$i].'.&nbsp<label><input type="radio" name="'.$j.'optradio" value="'.$row1['option_value'].'">'.$row1['option_value'].'</label></div>';
                        
                      //  echo $option[$i].". ".$row1['option_value']."<br>";
                       // echo $option[$i].". ".$row1['option_value']."<br>";
                        $i++;
                    }
                }
                 
                 echo '</div></div><br><br>';
                 $count++;
                 $j++;
           }
              echo '<input type="text" style="display:none" name="testid" value="'.$topic.'">';
            echo ' <button type="submit"  class="btn btn-primary">Submit</button></form>';
            $_SESSION['max']=$j-1;
            
     } 
 }
   }
   else{
       echo "<h1>you have already taken this quiz</h1>";
   }
?>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;
        
        if(timer==240 || timer==241)
        {
             //timer = duration;
        var msg = new SpeechSynthesisUtterance('4 minute Left');
        msg.rate=8/10;
        msg.pitch=2;
        console.log(timer);
        window.speechSynthesis.speak(msg);
        }    
        
        if (--timer < 0) {
            timer = duration;
            window.location.replace("https://tharunms98.000webhostapp.com/loggedinpage.php");
        }
    }, 1000);
}

window.onload = function () {
    var fiveMinutes = <?php echo $timeout; ?>;
    var display = document.querySelector('#time');
        //alert(fiveMinutes);
    startTimer(fiveMinutes, display);
};
</script>
</body>
</html>