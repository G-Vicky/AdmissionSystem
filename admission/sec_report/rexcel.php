<?php
if(isset($_POST["export_excel"])){
    include("../database/dbconnection.php");
    $conn=new mysqli($servername,$username,$password,$db);
    if($conn->connect_error){
        header("Location: report.php?signup=dberror&dberrordetail=$conn->connect_error");
        exit();
    }
    $output = "";
    $sno = 1;
    $sql="SELECT * FROM feetable WHERE feedate <> '' ORDER BY name ASC";
    $result=$conn->query($sql);
    if(mysqli_num_rows($result) > 0){
        $output .= "<table border='1'>
            <tr>
                <th>Sno</th>
                <th>Course</th>
                <th>Appl No</th>
                <th>Name</th>
                <th>DOB</th>
                <th>Cmty</th>
                <th>Feepaid Date</th>
                <th>Remarks</th>
            </tr>";
        while($row=$result->fetch_assoc()){
            $feedate1 = date("d-m-Y",strtotime($row["feedate"]));
          $output .= "<tr>
             <td>
                 ".$sno++."
             </td>
             <td>
                 ".$row['course']."
             </td>
             <td>
                 ".$row['applno']."
             </td>
             <td>
                 ".$row['name']."
             </td>
             <td>
                 ".$row['dob']."
             </td>
             <td>
                 ".$row['community']."
             </td>
             <td>
                 ".$feedate1."
             </td>
             <td>
                 ".$row['remarks']."
             </td>
         </tr>";
     }
        $output .="</table>";
        header("Content-Type: application/xls");
        header("Content-Disposition:attachment; filename=Sec_Report.xls");
        echo $output;      
        }else{
            header("Location: report.php?error=norecord");
    }
    
}else{
    header("Location: report.php");
    exit();
}
?>