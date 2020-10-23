<?php
if(isset($_POST["export_excel"])){
    include("../../database/dbconnection.php");
    $conn=new mysqli($servername,$username,$password,$db);
    if($conn->connect_error){
        echo "Error :".$conn->connect_error;
        exit();
    }
    $startdate=$_POST["startdate"];
    $enddate=$_POST["enddate"];
    $course = $_POST["course"];
    $output = "";
    $sno=1;
    $sql="SELECT * FROM feetable where  (feedate BETWEEN '$startdate' AND '$enddate') AND course = '$course' AND  feedate <> '' ORDER BY chno asc";
    $result=$conn->query($sql);
    if(mysqli_num_rows($result) > 0){
        $output .= "<table border='1'>
            <tr>
                <th style='width:45px;'>Sno</th>
                <th>Appl No</th>
                <th>Name</th>
                <th>Course</th>
                <th>DOB</th>
                <th>Cmty</th>
                <th>Cutoff</th>
                <th>Selection Date</th>
                <th>Challan no</th>
                <th>Feepaid Date</th>
                <th>CV Status</th>
                <th>Remarks</th>
            </tr>";
        while($row=$result->fetch_assoc()){
         $status1 = $row['status'];
         $selectiondate=$row['selectiondate'];
         $selectiondate=date("d-m-Y",strtotime($selectiondate));
         $feedate1 = date("d-m-Y",strtotime($row["feedate"]));
        $output .= "<tr>
             <td>
                 ".$sno++."
             </td>
             <td>
               ".$row['applno']."             
             </td>
             <td>
                 ".$row['name']."
             </td>
             <td>
                 ".$row['course']."
             </td>
             <td>
                 ".$row['dob']."
             </td>
             <td>
                 ".$row['community']."
             </td>
             <td>
                 ".$row['cutoff']."
             </td>
             <td>
                 ".$selectiondate."
             </td>
             <td>
                 ".$row['chno']."
             </td>
             <td>
                 ".$feedate1."
             </td>
             <td>
                ".$status1."
             </td>
             <td>
                ".$row['remarks']."
             </td>
         </tr>";
     }
        $output .="</table>";
        header("Content-Type: application/xls");
        header("Content-Disposition:attachment; filename=CVReport.xls");
        echo $output;      
    }
}else{
    header("Location: cvbranch.php");
    exit();
}
?>