<?php
    if(isset($_POST['submit'])){
        $regdate=$_POST["regdate"];
        $regdate=date("Y-m-d",strtotime($regdate));
        $regno=$_POST["regno"];
        $course=$_POST["course"];
        $name=$_POST["regname"];
        $name = strtoupper($name);
        $dob=$_POST["dob"];
        $disability=$_POST["disability"];
        $mobileno1=$_POST["mobileno"];
        $fatherno1=$_POST["fatherno"];
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
        include("../database/dbconnection.php");
         $conn=new mysqli($servername,$username,$password,$db);
         if($conn->connect_error){
                 header("Location: registration.php?signup=dberror&dberrordetail=$conn->connect_error");
                 exit();
         }

         $sql = "SELECT applno FROM `registration` WHERE regno = '$regno' and course = '$course'";
         $result = $conn->query($sql);

         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "Applno: " . $row["applno"];
              }
         } else {
            $sql="INSERT INTO `registration`(`regdate`, `regno`, `course`, `name`, `dob`, `disability`, `mobileno`,`fatherno`, `community`, `board`, `monthofpassing`, `passedattempt`, `language`, `XIIgroup`, `subject1`, `mark1`, `subject2`, `mark2`, `subject3`, `mark3`, `subject4`, `mark4`, `total`, `percentage`)
            VALUES('$regdate','$regno','$course','$name','$dob','$disability','$mobileno1','$fatherno1','$community','$board','$yearofpassing','$attempt','$language','$group','$subject1',$mark1,'$subject2',$mark2,'$subject3',$mark3, '$subject4',$mark4,$total,'$percentage')";
            if($conn->query($sql)===TRUE){
                $sql = "SELECT applno FROM `registration` WHERE regno = '$regno' and course = '$course'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    $applNo = $row["applno"];
                }
              header("Location: download.php?applno=$applNo");
              exit();
           }else{
              header("Location: registration.php?signup=sqlerror&sqlerrordetail=$conn->error");
              exit();
           }
         }
                
            
          $conn->close();        
    }else{ 
        header("Location: registration.php");
        exit();
    }
?>