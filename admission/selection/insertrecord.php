<?php
    include("../database/dbconnection.php");
    if(isset($_POST['submit'])){
        $applno=$_POST["applno"];
        $course=$_POST["course"];
        $name=$_POST["name"];
        $dob=$_POST["dob"];
        $community=$_POST["community"];
        $board=$_POST["board"];
        $cutoff=$_POST["cutoff"];
        $selectiondate=$_POST["selectiondate"];
        $language=$_POST["language"];
        $chno=$_POST["chno"];
        $feedate=$_POST["feedate"];
        $cvdate=$_POST["cvdate"];
        $palno=$_POST["palno"];
        $remarks=$_POST["remarks"];
        if($chno == ""){
            $chno = "NULL";
        }
        if($cvdate == ""){
            $cvdate = "NULL";
        }else{
            $cvdate=date("Y-m-d",strtotime($cvdate));
            $cvdate = "'$cvdate'";
        }
        if($feedate == ""){
            $feedate = "NULL";
        }else{
            $feedate=date("Y-m-d",strtotime($feedate));
            $feedate = "'$feedate'";
        }
        
        $conn=new mysqli($servername,$username,$password,$db);
        if($conn->connect_error){
            header("Location: insert.php?signup=dberror&dberrordetail=$conn->connect_error");
            exit();
         }
        $selectiondate=date("Y-m-d",strtotime($selectiondate));
        if($_POST["submit"] == "SELECT"){
            
            $sql="INSERT INTO `feetable`(`applno`, `course`, `name`, `dob`, `community`, `board`, `cutoff`, `language`, `selectiondate`, `chno`, `feedate`, `cvdate`, `palno`, `remarks`) VALUES ('$applno','$course','$name','$dob','$community','$board','$cutoff','$language','$selectiondate',$chno,$feedate,$cvdate,'$palno','$remarks')";

              if($conn->query($sql)===TRUE){
                  header("Location: insert.php?signup=selected");
                  exit();
               }else{
                 header("Location: insert.php?signup=selectsqlerror&sqlerrordetail=$conn->error");
                 exit();
               }
        }elseif($_POST["submit"] == "UPDATE"){
                $course = $_POST["course1"];
                $community = $_POST["community1"];
                $language = $_POST["language1"];
                $board1 = $_POST["board1"];
                if($board1 != "vicky"){
                    $board = $board1;
                }
                $sql="UPDATE `feetable` SET `applno`='$applno',`course`='$course',`name`='$name',`dob`='$dob',`community`='$community',`board`='$board',`cutoff`='$cutoff',`language`='$language',`selectiondate`='$selectiondate',`chno`=$chno,`feedate`=$feedate,`cvdate`=$cvdate,`palno`='$palno',`remarks`='$remarks' WHERE applno = '$applno'";
            
                $sql1 = "UPDATE registration SET course = '$course', name ='$name', dob ='$dob', community ='$community', board ='$board', language ='$language', percentage = '$cutoff' WHERE applno=$applno";
                $conn->query($sql1);
                if($conn->query($sql)===TRUE){
                    header("Location: insert.php?signup=updated");
                    exit();
                 }else{
                   header("Location: insert.php?signup=updatesqlerror&sqlerrordetail=$conn->error");
                   exit();
                 }
        }
          $conn->close();        
    }else{
        
        header("Location: insert.php");
        exit();
    }
?>