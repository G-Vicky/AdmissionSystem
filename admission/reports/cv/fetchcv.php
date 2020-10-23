<?php
     header("Content-Type:application/json; charset=UTF-8");
     $cvdate = json_decode($_POST["x"],false);
     $cvdate=date("Y-m-d",strtotime($cvdate));
     $myobj = new \stdClass();
     include("../../database/dbconnection.php");
     $conn=new mysqli($servername,$username,$password,$db);
     if($conn->connect_error){
        echo "unable to connect to database".$conn->connect_error;
        exit();
     }
     $sql="SELECT * FROM `cv` WHERE cvdate = '$cvdate'";
     $result=$conn->query($sql);
     if($result->num_rows>0){        
        while($row=$result->fetch_assoc()){
            $myobj->c1 = $row["bcomgen"];
            $myobj->c2 = $row["bcomcs"];
            $myobj->c3 = $row["bcomaf"];
            $myobj->c4 = $row["bcombm"];
            $myobj->c5 = $row["bcomca"];
            $myobj->c6 = $row["bcomism"];
            $myobj->c7 = $row["bba"];
            $myobj->c8 = $row["bsc"];
            $myobj->c9 = $row["bca"];
        }
    }else{
         $myobj->c1 = "";
     }
    $myjson = json_encode($myobj);
    echo $myjson;
?>