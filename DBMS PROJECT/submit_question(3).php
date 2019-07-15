<?php
session_start();
if(!isset($_SESSION['teacher_id']))
  {
    header("Location: tlogin.php");   
  }
  
  if(isset($_POST['questions']))
{
    
  include("connection.php");
   $a=1;$b=2;$c=3;$d=4;
   
    
    for($j=1;$j<=$_SESSION['maxquestion'];$j++)
    {
      //  echo $j.$_POST['question'.$j]."<br>".$_POST[$j.'1']."<br>".$_POST[$j.'2']."<br>".$_POST[$j.'3']."<br>".$_POST[$j.'4'].$_POST['ans'.$j]."<br><br>";
        
        $ques=mysqli_real_escape_string($link,$_POST['question'.$j]);
               
        $query="
        INSERT INTO Questions 
        (question,teacher_id,test_id) 
        VALUES ('".$ques."','".$_SESSION['teacher_id']."','".$_SESSION['lastid']."')";
        if(!mysqli_query($link,$query))
            echo '<div class="alert alert-warning" role="alert">Something Went Wrong 1</div>';
            $lastid=mysqli_insert_id($link);
            
            $a1=mysqli_real_escape_string($link,$_POST[$j.'1']);
            $b1=mysqli_real_escape_string($link,$_POST[$j.'2']);
            $c1=mysqli_real_escape_string($link,$_POST[$j.'3']);
            $d1=mysqli_real_escape_string($link,$_POST[$j.'4']);
            $ans=mysqli_real_escape_string($link,$_POST['ans'.$j]);
            
//echo $ans;
     
             if($ans == 1)
               $ans=$a1;
             else if($ans==2)
                $ans=$b1;
             else if($ans==3)
                $ans=$c1;
             else
                $ans=$d1;
            
           // echo $ans;
            
            $qa=mysqli_query($link,"INSERT INTO `option_table` VALUES  ($lastid,'$a1',1)");
           $qb=mysqli_query($link,"INSERT INTO `option_table` VALUES  ($lastid,'$b1','2')");
            $qc=mysqli_query($link,"INSERT INTO `option_table` VALUES  ($lastid,'$c1','3')");
            $qd=mysqli_query($link,"INSERT INTO `option_table` VALUES  ($lastid,'$d1','4')");
        
           if(!($qa and $qb and $qc and $qc and $qd))
              echo '<div class="alert alert-warning" role="alert">Something Went Wrong 2</div>';
      
       //echo $lastid;
        
        $query2="
        INSERT INTO Correct_answer 
        (qid,correct_option) 
        VALUES (".$lastid.",'".$ans."')";
        if(!mysqli_query($link,$query2))
          echo '<div class="alert alert-warning" role="alert">Something Went Wrong 3</div>';
        else
        {
            //echo '<a href="preview.php?topic='.$_SESSION['lastid'].'"><button type="button" name="questions" class="btn btn-primary">Back to home</button></a>';
             header("Location: tdash.php"); 
        }
    }   
    
    
}
else
{
       $q1="delete from Test_details where test_id='".$_SESSION['lastid']."'";
}
  
  
  
?>