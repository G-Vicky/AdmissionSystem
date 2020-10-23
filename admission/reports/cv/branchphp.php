<?php
     header("Content-Type:application/json; charset=UTF-8");
     $appl = json_decode($_POST["applnos"],false);
     $status = json_decode($_POST["status"],false);
     $myobj = new \stdClass();
     include("../../database/dbconnection.php");
     $conn=new mysqli($servername,$username,$password,$db);
     if($conn->connect_error){
        echo "unable to connect to database".$conn->connect_error;
        exit();
     }
    $today = date('Y-m-d');
    $error = 0;
    $n = sizeof($appl);
    for($i = 0;$i < $n;$i++){
        $sql = "UPDATE feetable SET status = '$status[$i]',cvdate = '$today' where applno = $appl[$i]";
        if(!$conn->query($sql))
            $error = 1;
    }
    if($error == 1)
        $myobj->r = "Failure";
    else
        $myobj->r = "success";
    $myjson = json_encode($myobj);
    echo $myjson;
?>