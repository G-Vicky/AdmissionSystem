<?php
if(isset($_POST["export_excel"])){
    include("../database/dbconnection.php");
    $conn=new mysqli($servername,$username,$password,$db);
    if($conn->connect_error){
        echo "database connection error: ".$conn->connect_error;
        exit();
    }
    $today = $_POST['today'];
    $sno = 1;
    $output = "";
    $sql="SELECT * FROM feetable WHERE feedate <> '' AND feedate = '$today'  ORDER BY name ASC";
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
        header("Content-Disposition:attachment; filename=Sec_todayrep.xls");
        echo $output;      
        }else{
            header("Location: dailyrep.php?error=norecord");
    }
    
}else{
    header("Location: dailyrep.php");
    exit();
}
?>