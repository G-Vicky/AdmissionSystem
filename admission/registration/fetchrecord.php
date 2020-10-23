<?php
     header("Content-Type:application/json; charset=UTF-8");
     $obj = json_decode($_POST["x"],false);
     $myobj = new \stdClass();
     include("../database/dbconnection.php");
     $conn=new mysqli($servername,$username,$password,$db);
     if($conn->connect_error){
        echo "unable to connect to database".$conn->connect_error;
        exit();
     }
     $sql="SELECT * FROM `registration` WHERE regno = $obj";
     $result=$conn->query($sql);
     if($result->num_rows>0){
         $myobj->courses = "";         
        while($row=$result->fetch_assoc()){
            $myobj->regdate = $row["regdate"];
            $myobj->regdate=date("d-m-Y",strtotime($myobj->regdate));
            $myobj->regno = $row["regno"];
            $myobj->course = $row["course"];
            $myobj->courses .= $row["course"].", ";
            $myobj->applno = $row["applno"];
            $myobj->name = $row["name"];
            $myobj->dob = $row["dob"];
            $myobj->disability =$row["disability"];
            $myobj->mobileno =$row["mobileno"];
            $myobj->fatherno =$row["fatherno"];
            $myobj->community =$row["community"];
            $myobj->monthofpassing =$row["monthofpassing"];
            $myobj->board =$row["board"];
            $myobj->passedattempt =$row["passedattempt"];
            $myobj->language =$row["language"];
            $myobj->XIIgroup =$row["XIIgroup"];
            $myobj->subject1 =$row["subject1"];
            $myobj->subject2 =$row["subject2"];
            $myobj->subject3 =$row["subject3"];
            $myobj->subject4 =$row["subject4"];
            $myobj->mark1 =$row["mark1"];
            $myobj->mark2 =$row["mark2"];
            $myobj->mark3 =$row["mark3"];
            $myobj->mark4 =$row["mark4"];
            $myobj->total =$row["total"];
            $myobj->percentage =$row["percentage"];
        }
    }else{
        $myobj->name = "";
    }
    $myjson = json_encode($myobj);
    echo $myjson;
?>