<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['user'] == "user" ){
        header("Location: ../../index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang='en' dir='ltr'>

<head>
    <link rel='stylesheet' type='text/css' href='sstyle.css'/>
    <script src="../sweetalert2/sweetalert2.all.min.js"></script>
    <meta charset='UTF-8' />
    <title>Today Report</title>
</head>

<body>
    <div class="main">
        <?php
        if($_SESSION["user"] == "secretary"){
            echo '<ul class="mainnav">
            <li><a href="report.php">Report</a></li>
            <li class="active"><a href="dailyrep.php">Today&ensp;Rep</a></li>
            <li class="right"><a href="../logout/logout.php"><img src="../logout.png"></a></li>
        </ul>
        <br style="clear: both;">';
        }else{
            echo '<ul class="mainnav">
            <li><a href="../registration/registration.php">Registration</a></li>
            <li><a href="../edit/editreg.php">Edit</a></li>
            <li><a href="../selection/insert.php">Selection</a></li>
            <li><a href="../multicourse/mcourse.php">MultiCourse</a></li>
            <li class="hassubs"><a href="javascript:void(0)">Reports</a>
                <ul class="dropdown">
                    <li class="subs hassubs"><a href="javascript:void(0)">Registration</a>
                        <ul class="dropdown">
                            <li class="subs sub2"><a href="../reports/registration/selectreport1.php">Periodical</a></li>
                            <li class="subs sub2"><a href="../reports/registration/selectreport2.php">Branch</a></li>
                            <li class="subs sub2"><a href="../reports/registration/selectreport3.php">Branch_Community</a></li>
                            <li class="subs sub2"><a href="../reports/registration/selectreport4.php">Branch&ensp;Mark</a></li>
                            <li class="subs sub2"><a href="../reports/registration/consolidated.php">Consolidated</a></li>
                        </ul>
                    </li>
                    <li class="subs hassubs"><a href="javascript:void(0)">Selection</a>
                        <ul class="dropdown">
                            <li class="subs sub2"><a href="../reports/selection/report1.php">Branch</a></li>
                            <li class="subs sub2"><a href="../reports/selection/report2.php">Branch_Community</a></li>
                            <li class="subs sub2"><a href="../reports/selection/report3.php">Branch&ensp;Mark</a></li>
                            <li class="subs sub2"><a href="../reports/selection/consolidated.php">Consolidated</a></li>
                        </ul>
                    </li>
                    <li class="subs hassubs"><a href="javascript:void(0)">Fee&ensp;Paid</a>
                        <ul class="dropdown">
                            <li class="subs sub2"><a href="../reports/feepaid/freport1.php">Branch</a></li>
                            <li class="subs sub2"><a href="../reports/feepaid/freport2.php">Branch&ensp;Mark</a></li>
                            <li class="subs sub2"><a href="../reports/feepaid/freport3.php">Branch_Community</a></li>
                            <li class="subs sub2"><a href="../reports/feepaid/consolidated.php">Consolidated</a></li>
                        </ul>
                    </li>
                    <li class="subs hassubs"><a href="javascript:void(0)">CV Report</a>
                        <ul class="dropdown">
                            <li class="subs sub2"><a href="../reports/cv/cvrep.php">CV Report</a></li>
                            <li class="subs sub2"><a href="../reports/cv/cvbranch.php">CV Branch</a></li>
                            <li class="subs sub2"><a href="../reports/cv/consolidated.php">Consolidated</a></li>
                        </ul>
                    </li>
                    <li class="subs"><a href="../reports/consolidated.php">Consolidated</a></li>
                </ul>
            </li>
            <li class="hassubs active"><a href="javascript:void (0)">Secretary</a>
                <ul class="dropdown">
                    <li class="subs"><a href="report.php">Report</a></li>
                    <li class="subs active"><a href="dailyrep.php">Today&ensp;Rep</a></li>
                </ul>
            </li>
            <li><a href="../admin/page.php">Admin</a></li>
            <li class="right"><a href="../logout/logout.php"><img src="../logout.png"></a></li>
        </ul>
        <br style="clear: both;">';
        }
        ?>
    </div>

    <div class='container'>
        <div class="content">

            <?php
    include("../database/dbconnection.php");
    $conn=new mysqli($servername,$username,$password,$db);
        if($conn->connect_error){
            echo $conn->connect_error;
            exit();
         }  
    $d = array();
    $sno = 1;   
    $today = date("Y-m-d");
    $sql = "SELECT applno from feetable INNER JOIN ( SELECT name FROM feetable GROUP BY name HAVING 
    COUNT(applno) > 1) dup ON feetable.name = dup.name WHERE feetable.feedate <> ''";
    $result = $conn -> query($sql);
    if(mysqli_num_rows($result) > 0){
        while($row = $result->fetch_assoc()){
            array_push($d,$row['applno']);
        }
    }
    $sql="SELECT * FROM feetable WHERE feedate <> '' AND feedate = '$today' ORDER BY name ASC";
    $result=$conn->query($sql);
    if(mysqli_num_rows($result) > 0){
        echo "<div class='table2'>
         <table>
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
         echo "<tr";
            if(in_array($row['applno'],$d))echo " style='background-color:#ffe0b3' ";
            echo ">
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
            ?>
            <div class="excelform">
                <form action="dexcel.php" method="post">
                    <input type="text" name="today" value="<?php echo $today;?>" hidden/>
                    <input type="submit" name="export_excel" value="Export to Excel" id="excelbtn">
                </form>
            </div> 
            <?php
     }
                
        }else{
            echo "0 records found";
    }
    echo "</table></div>";
       $conn->close();
?>
            
        </div>
    </div>

</body>

</html>