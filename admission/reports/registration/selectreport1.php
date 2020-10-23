<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['user'] == "user" ){
        header("Location: ../../../index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang='en' dir='ltr'>

<head>
    <link rel='stylesheet' type='text/css' href='mystyle.css' />
    <script src="../../sweetalert2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../../jquery/jquery-ui-1.12.1/jquery-ui.css" />
    <script type="text/javascript" src="../../jquery/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
    <script type="text/javascript" src="../../jquery/jquery-ui-1.12.1/jquery-ui.js"></script>
    <meta charset='UTF-8' />
    <title>Reg Periodical Rep</title>
</head>

<body>
    <script>
        $(document).ready(function(){
            $("input[name='startdate'],input[name='enddate']").datepicker({
                yearRange: "1998:2022",
                showAnim: "fold",
                showButtonPanel: true,
                currentText: "today",
                closeText: "close",
                constrainInput: true,
                changeMonth: true,
                changeYear:true,
                dateFormat: "dd-mm-yy"
            });
        });
</script>

    <div class="main">
        <ul class="mainnav">
            <li><a href="../../registration/registration.php">Registration</a></li>
            <li><a href="../../edit/editreg.php">Edit</a></li>
            <li><a href="../../selection/insert.php">Selection</a></li>
            <li><a href="../../multicourse/mcourse.php">MultiCourse</a></li>
            <li class="hassubs active"><a href="javascript:void(0)">Reports</a>
                <ul class="dropdown">
                    <li class="subs hassubs active"><a href="javascript:void(0)">Registration</a>
                        <ul class="dropdown">
                            <li class="subs active"><a href="selectreport1.php">Periodical</a></li>
                            <li class="subs sub2"><a href="selectreport2.php">Branch</a></li>
                            <li class="subs sub2"><a href="selectreport3.php">Branch_Community</a></li>
                            <li class="subs sub2"><a href="selectreport4.php">Branch&ensp;Mark</a></li>
                            <li class="subs sub2"><a href="consolidated.php">Consolidated</a></li>
                        </ul>
                    </li>
                    <li class="subs hassubs"><a href="javascript:void(0)">Selection</a>
                        <ul class="dropdown">
                            <li class="subs sub2"><a href="../selection/report1.php">Branch</a></li>
                            <li class="subs sub2"><a href="../selection/report2.php">Branch_Community</a></li>
                            <li class="subs sub2"><a href="../selection/report3.php">Branch&ensp;Mark</a></li>
                            <li class="subs sub2"><a href="../selection/consolidated.php">Consolidated</a></li>
                        </ul>
                    </li>
                    <li class="subs hassubs"><a href="javascript:void(0)">Fee&ensp;Paid</a>
                        <ul class="dropdown">
                            <li class="subs sub2"><a href="../feepaid/freport1.php">Branch</a></li>
                            <li class="subs sub2"><a href="../feepaid/freport2.php">Branch&ensp;Mark</a></li>
                            <li class="subs sub2"><a href="../feepaid/freport3.php">Branch_Community</a></li>
                            <li class="subs sub2"><a href="../feepaid/consolidated.php">Consolidated</a></li>
                        </ul>
                    </li>
                    <li class="subs hassubs"><a href="javascript:void(0)">CV Report</a>
                        <ul class="dropdown">
                            <li class="subs sub2"><a href="../cv/cvphp.php">CV Periodical</a></li>
                            <li class="subs sub2"><a href="../cv/cvbranch.php">CV Branch</a></li>
                            <li class="subs sub2"><a href="../cv/consolidated.php">Consolidated</a></li>
                        </ul>
                    </li>
                    <li class="subs"><a href="../consolidated.php">Consolidated</a></li>
                </ul>
            </li>
            <li class="hassubs"><a href="javascript:void (0)">Secretary</a>
                <ul class="dropdown">
                    <li class="subs"><a href="../../sec_report/report.php">Report</a></li>
                    <li class="subs"><a href="../../sec_report/dailyrep.php">Today&ensp;Rep</a></li>
                </ul>
            </li>
            <li><a href="../../admin/page.php">Admin</a></li>
            <li class="right"><a href="../../logout/logout.php"><img src="../../logout.png" alt="Log-Out"></a></li>
        </ul>
        <br style="clear: both;">
    </div>


    <div class='container'>
        <div class="content">

            <?php
    $startdate=$enddate="";
    if(isset($_POST["report"])){
        $startdate=$_POST["startdate"];
        $startdate=date("d-m-Y",strtotime($startdate));
        $enddate=$_POST["enddate"];
        $enddate=date("d-m-Y",strtotime($enddate));
        if($_POST['startdate'] == ""){
            $startdate=$enddate="";
        }
    }
    
?>
            <div class="box1">
                <form name="myform" autocomplete="off" action="" method="post">
                    <table class="table1">
                        <tr>
                            <th>
                                From:<input type="text" name="startdate"  value="<?php echo $startdate;?>">
                                To:<input type="text" name="enddate" value="<?php echo $enddate;?>">
                            </th>
                            <td>
                                <input type='submit' name='report' value='GenerateReport' class='submit'>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

            <?php
    if(isset($_POST["report"])){
        if(isset($_POST["report"])){
            $startdate=$_POST["startdate"];
            $startdate=date("Y-m-d",strtotime($startdate));
            $enddate=$_POST["enddate"];
            $enddate=date("Y-m-d",strtotime($enddate));
            $sql="SELECT * FROM registration where (regdate BETWEEN '$startdate' AND '$enddate') ORDER BY total DESC";
        }
        if($_POST["startdate"] == ""){
            $sql="SELECT * FROM registration ORDER BY total DESC";
        }
    include("../../database/dbconnection.php");
    $conn=new mysqli($servername,$username,$password,$db);
        if($conn->connect_error){
            echo $conn->connect_error;
            exit();
         }
        $sno = 1;
    $result=$conn->query($sql);
    if(mysqli_num_rows($result) > 0){
        echo "<div class='table2'>
         <table>
            <tr>
                <th style='width:45px;'>Sno</th>
                <th>Reg No</th>
                <th>Course</th>
                <th>Appl No</th>
                <th>Name</th>
                <th>DOB</th>
                <th>Cmty</th>
                <th>Total</th>
                <th>Cutoff</th>
                <th>Contact no</th>
            </tr>";
        while($row=$result->fetch_assoc()){
        echo "<tr>
             <td>
                 ".$sno++."
             </td>
             <td>
                 ".$row['regno']."
             </td>
             <td>
                 ".$row['course']."
             </td>
             <td>
                 ".$row['applno']."
             </td>
             <td align=left>
                 ".$row['name']."
             </td>
             <td>
                 ".$row['dob']."
             </td>
             <td>
                 ".$row['community']."
             </td>
             <td>
                 ".$row['total']."
             </td>
             <td>
                 ".$row['percentage']."
             </td>
             <td>
                 ".$row['mobileno']."
             </td>
         </tr>";
     }
        }else{
            echo "0 records found";
    }
    echo "</table></div>";
       $conn->close();
    }else{
    exit();
}
?>
        </div>
    </div>
</body>

</html>