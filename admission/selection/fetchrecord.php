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
        $sql="SELECT * FROM `registration` WHERE applno= $obj";
        $result=$conn->query($sql);
        $sql1="SELECT * FROM `feetable` WHERE applno= $obj";
        $result1=$conn->query($sql1);
            if($result1->num_rows>0){
                while($row1=$result1->fetch_assoc()){
                    $myobj->applno = $row1["applno"];
                    $myobj->course = $row1["course"];
                    $myobj->name = $row1["name"];
                    $myobj->dob = $row1["dob"];
                    $myobj->community =$row1["community"];
                    $myobj->board =$row1["board"];
                    $myobj->percentage =$row1["cutoff"];
                    $myobj->selectiondate = $row1["selectiondate"];
                    $myobj->language = $row1["language"];
                    $myobj->selectiondate=date("d-m-Y",strtotime($myobj->selectiondate));
                    $myobj->chno = $row1["chno"];
                    $myobj->feedate = $row1["feedate"];
                    if($myobj->feedate != NULL){
                        $myobj->feedate=date("d-m-Y",strtotime($myobj->feedate));
                    }else{
                        $myobj->feedate = "";
                    }
                    $myobj->cvdate = $row1["cvdate"];
                    if($myobj->cvdate != NULL){
                        $myobj->cvdate=date("d-m-Y",strtotime($myobj->cvdate));
                    }else{
                        $myobj->cvdate = "";
                    }
                    $myobj->palno = $row1["palno"];
                    $myobj->remarks = $row1["remarks"]; 
                    $myobj->subject1 = "";
                    $myobj->subject2 = "";
                    $myobj->subject3 = "";
                    $myobj->subject4 = "";
                    $myobj->mark1 = "";
                    $myobj->mark2 = "";
                    $myobj->mark3 = "";
                    $myobj->mark4 = "";
                    $myobj->total = "";
                    $myobj->submit = "UPDATE";
                }
            }elseif($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $myobj->regdate = $row["regdate"];
                    $myobj->regdate=date("d-m-Y",strtotime($myobj->regdate));
                    $myobj->regno = $row["regno"];
                    $regno1 = $row["regno"];
                    $sql2="SELECT * FROM feetable where applno IN (SELECT applno from registration WHERE regno = '$regno1')";
                    $result2=$conn->query($sql2);
                    if($result2->num_rows>0){
                        while($row2=$result2->fetch_assoc()){
                            $myobj->applied = "selected";
                            $myobj->selectedcourse = $row2["course"];
                        }
                    }else{
                            $myobj->applied = "";
                    }
                    $course = $row["course"];
                    if($course == "B.Com(GEN)")
                            $column = "bcomgen";
                        elseif($course == "B.Com(CS)")
                            $column = "bcomcs";
                        elseif($course == "B.Com(A&F)")
                            $column = "bcomaf";
                        elseif($course == "B.Com(BM)")
                            $column = "bcombm";
                        elseif($course == "B.Com(CA)")
                            $column = "bcomca";
                        elseif($course == "B.Com(ISM)")
                            $column = "bcomism";
                        elseif($course == "B.B.A")
                            $column = "bba";
                        elseif($course == "B.Sc.,(CS)")
                            $column = "bsc";
                        elseif($course == "B.C.A")
                            $column = "bca";
                        $ch = 0;
                        $sqlf = "SELECT MAX(chno) AS ch FROM feetable WHERE course = '$course'";
                        $resultf=$conn->query($sqlf);
                            $rowf = $resultf->fetch_assoc();
                            $ch=$rowf['ch'];
                            if($ch != NULL){
                                $ch++;
                            }else{
                                $sqlm = "SELECT * FROM master";
                                $resultm=$conn->query($sqlm);
                                if($resultm->num_rows>0){
                                    $rows = $resultm->fetch_assoc();
                                    $ch=$rows["$column"];
                                }
                            }
                    $myobj->course = $row["course"];
                    $myobj->applno = $row["applno"];
                    $myobj->name = $row["name"];
                    $myobj->dob = $row["dob"];
                    $myobj->disability =$row["disability"];
                    $myobj->mobileno =$row["mobileno"];
                    $myobj->fatherno =$row["fatherno"];
                    $myobj->community =$row["community"];
                    $myobj->language = $row["language"];
                    $myobj->selectiondate = "";
                    $myobj->chno = $ch;
                    $myobj->feedate = "";
                    $myobj->cvdate = "";
                    $myobj->palno = "";
                    $myobj->remarks = "";
                    $myobj->monthofpassing =$row["monthofpassing"];
                    $myobj->board =$row["board"];
                    $myobj->passedattempt =$row["passedattempt"];
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
                    $myobj->submit = "SELECT";
                }
            }else{
                $myobj->name = "";
            }
$myjson = json_encode($myobj);
echo $myjson;
?>