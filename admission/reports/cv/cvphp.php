<?php
    include("../../database/dbconnection.php");
    if(isset($_POST['submit'])){
        $cvdate=$_POST["cvdate"];
        $cvdate=date("Y-m-d",strtotime($cvdate));
        $c1 = $_POST["c1"];
        $c2 = $_POST["c2"];
        $c3 = $_POST["c3"];
        $c4 = $_POST["c4"];
        $c5 = $_POST["c5"];
        $c6 = $_POST["c6"];
        $c7 = $_POST["c7"];
        $c8 = $_POST["c8"];
        $c9 = $_POST["c9"];
        $submit = $_POST["submit"];
        $conn=new mysqli($servername,$username,$password,$db);
        if($conn->connect_error){
            header("Location: cvrep.php?status=dberror&dberrordetail=$conn->connect_error");
            exit();
         }
        if($submit == "SUBMIT"){
            $sql="INSERT INTO `cv`(`cvdate`, `bcomgen`, `bcomcs`, `bcomaf`, `bcombm`, `bcomca`, `bcomism`, `bba`, `bsc`, `bca`) VALUES ('$cvdate','$c1','$c2','$c3','$c4','$c5','$c6','$c7','$c8','$c9')";
             if($conn->query($sql)===TRUE){
                 header("Location: cvrep.php?status=success");
                 exit();
              }else{
                 header("Location: cvrep.php?status=sqlerror&sqlerrordetail=$conn->error");
                 exit();
              }
        }elseif($submit == "UPDATE"){
            $sql="UPDATE `cv` SET `cvdate`='$cvdate',`bcomgen`='$c1',`bcomcs`='$c2',`bcomaf`='$c3',`bcombm`='$c4',`bcomca`='$c5',`bcomism`='$c6',`bba`='$c7',`bsc`='$c8',`bca`='$c9' WHERE cvdate = '$cvdate'";
             if($conn->query($sql)===TRUE){
                 header("Location: cvrep.php?status=updated");
                 exit();
              }else{
                 header("Location: cvrep.php?status=updateerror&updateerrordetail=$conn->error");
                 exit();
              }
        }
          $conn->close();        
    }else{
        
        header("Location: cvrep.php");
        exit();
    }
?>