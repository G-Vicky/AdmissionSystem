<?php
    include("../database/dbconnection.php");
    if(isset($_POST['submit'])){
        $c1 = $_POST["c1"];
        $c2 = $_POST["c2"];
        $c3 = $_POST["c3"];
        $c4 = $_POST["c4"];
        $c5 = $_POST["c5"];
        $c6 = $_POST["c6"];
        $c7 = $_POST["c7"];
        $c8 = $_POST["c8"];
        $c9 = $_POST["c9"];
        $tmax = $_POST["tmax"];
        $tmin = $_POST["tmin"];
        $cmax = $_POST["cmax"];
        $cmin = $_POST["cmin"];
        $conn=new mysqli($servername,$username,$password,$db);
        if($conn->connect_error){
            header("Location: page.php?status=dberror&dberrordetail=$conn->connect_error");
            exit();
         }
            $sql = "SELECT * from `master`";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                header("Location: page.php?status=duplicate");
                exit();
            }else{
                $sql="INSERT INTO `master`(`bcomgen`, `bcomcs`, `bcomaf`, `bcombm`, `bcomca`, `bcomism`, `bba`, `bsc`, `bca`, `tmax`, `tmin`, `cmax`, `cmin`) VALUES ('$c1','$c2','$c3','$c4','$c5','$c6','$c7','$c8','$c9',$tmax,$tmin,$cmax,$cmin)";
                if($conn->query($sql)===TRUE){
                    header("Location: page.php?status=success");
                    exit();
                }else{
                    header("Location: page.php?status=sqlerror&sqlerrordetail=$conn->error");
                    exit();
                }
            }
          $conn->close();        
    }else{
        
        header("Location: page.php");
        exit();
    }
?>