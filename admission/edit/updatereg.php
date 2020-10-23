<?php
   if(isset($_POST['save']))
   {
    include("../database/dbconnection.php");
    //form variables
    $regdate=$_POST["regdate"];
    $regno=$_POST["regno"];
    $course=$_POST["course"];
    $applno=$_POST["applno"];
    $applno1=$_POST["applno1"];
    $name=$_POST["regname"];
    $name = strtoupper($name);
    $dob=$_POST["dob"];
    $disability=$_POST["disability"];
    $mobileno=$_POST["mobileno"];
    $fatherno=$_POST["fatherno"];
    $community=$_POST["community"];
    $board=$_POST["board"];
    $yearofpassing=$_POST["yearofpassing"];
    $language=$_POST["language"];
    $attempt=$_POST["attempt"];
    $group=$_POST["group"];
    $subject1=$_POST["subject1"];
    $subject2=$_POST["subject2"];
    $subject3=$_POST["subject3"];
    $subject4=$_POST["subject4"];
    $mark1=$_POST["mark1"];
    $mark2=$_POST["mark2"];
    $mark3=$_POST["mark3"];
    $mark4=$_POST["mark4"];
    $total=$_POST["total"];
    $percentage=$_POST["percentage"];
    if($board=="other") {
      $board=$_POST["boarddetail"];
    }
    if($group == "other"){
        $subject1 = $_POST["sub1"];
        $subject2 = $_POST["sub2"];
        $subject3 = $_POST["sub3"];
        $subject4 = $_POST["sub4"];
    }
    $regdate=date("Y-m-d",strtotime($regdate));
    $conn=new mysqli($servername,$username,$password,$db);
    if($conn->connect_error){
        header("Location: editreg.php?signup=updatedberror&dberrordetail=$conn->connect_error");
        exit();
    } 
     $sql="UPDATE registration SET  regdate ='$regdate', regno =$regno ,course ='$course', applno = $applno1, name ='$name', dob ='$dob', disability ='$disability', mobileno ='$mobileno', fatherno ='$fatherno', community ='$community', board ='$board', monthofpassing ='$yearofpassing', language ='$language', passedattempt ='$attempt', XIIgroup ='$group', subject1 ='$subject1', mark1 =$mark1, subject2 ='$subject2', mark2 =$mark2, subject3 ='$subject3', mark3 =$mark3, subject4 ='$subject4', mark4 =$mark4, total =$total, percentage ='$percentage' WHERE applno=$applno";
    if($conn->query($sql)===TRUE){
        header("Location: editreg.php?signup=success");
        exit();
    }else{
        header("Location: editreg.php?signup=updatesqlerror&sqlerrordetail=$conn->eror");
        exit();
    }
    $conn->close();
   }else{
       header("Location: editreg.php");
       exit();
}

     ?>