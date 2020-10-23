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
    <link rel='stylesheet' type='text/css' href='../registration/mystyle.css' />
    <script src="../../sweetalert2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../../jquery/jquery-ui-1.12.1/jquery-ui.css" />
    <script type="text/javascript" src="../../jquery/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
    <script type="text/javascript" src="../../jquery/jquery-ui-1.12.1/jquery-ui.js"></script>
    <meta charset='UTF-8' />
    <title>Sel Branch Mark Report</title>
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
                    <li class="subs hassubs"><a href="javascript:void(0)">Registration</a>
                        <ul class="dropdown">
                            <li class="subs sub2"><a href="../registration/selectreport1.php">Periodical</a></li>
                            <li class="subs sub2"><a href="../registration/selectreport2.php">Branch</a></li>
                            <li class="subs sub2"><a href="../registration/selectreport3.php">Branch_Community</a></li>
                            <li class="subs sub2"><a href="../registration/selectreport4.php">Branch&ensp;Mark</a></li>
                            <li class="subs sub2"><a href="../registration/consolidated.php">Consolidated</a></li>
                        </ul>
                    </li>
                    <li class="subs hassubs active"><a href="javascript:void(0)">Selection</a>
                        <ul class="dropdown">
                            <li class="subs sub2"><a href="report1.php">Branch</a></li>
                            <li class="subs sub2"><a href="report2.php">Branch_Community</a></li>
                            <li class="subs active"><a href="report3.php">Branch&ensp;Mark</a></li>
                            <li class="subs sub2"><a href="consolidated.php">Consolidated</a></li>
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
    $startdate=$enddate=$course="";
    if(isset($_POST["report"])){
        $startdate=$_POST["startdate"];
        $startdate=date("d-m-Y",strtotime($startdate));
        $enddate=$_POST["enddate"];
        $enddate=date("d-m-Y",strtotime($enddate));
        $course=$_POST["course"];
        if($_POST['startdate'] == ""){
            $startdate=$enddate="";
        }
    }
?>
            <div class="box1">
                <form name="myform" autocomplete="off" action="report3.php" method="post">
                    <table class="table1">
                        <tr>
                            <th>
                                From:<input type="text" name="startdate" value="<?php echo $startdate;?>">&ensp;
                                To:<input type="text" name="enddate" value="<?php echo $enddate;?>">&ensp;
                                Course:<select name="course" required>
                                    <option value="B.Com(GEN)" <?php if($course == "B.Com(GEN)")echo "selected";?> >B.Com(GEN)</option>
                                    <option value="B.Com(CS)" <?php if($course == "B.Com(CS)")echo "selected";?>>B.Com(CS)</option>
                                    <option value="B.Com(A&F)" <?php if($course == "B.Com(A&F)")echo "selected";?>>B.Com(A&amp;F)</option>
                                    <option value="B.Com(BM)" <?php if($course == "B.Com(BM)")echo "selected";?>>B.Com(BM)</option>
                                    <option value="B.Com(CA)" <?php if($course == "B.Com(CA)")echo "selected";?>>B.Com(CA)</option>
                                    <option value="B.Com(ISM)" <?php if($course == "B.Com(ISM)")echo "selected";?>>B.Com(ISM)</option>
                                    <option value="B.B.A" <?php if($course == "B.B.A")echo "selected";?>>B.B.A</option>
                                    <option value="B.Sc.,(CS)" <?php if($course == "B.Sc.,(CS)")echo "selected";?>>B.Sc.,(CS)</option>
                                    <option value="B.C.A" <?php if($course == "B.C.A")echo "selected";?>>B.C.A</option>
                                </select>
                            </th>
                            <td>
                                <input type='submit' name='report' value='GenerateReport' class='submit'>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <?php
    if(isset($_POST["report"])||isset($_GET["page"])){
        if(isset($_POST["report"])){
            $startdate=$_POST["startdate"];
            $startdate=date("Y-m-d",strtotime($startdate));
            $enddate=$_POST["enddate"];
            $enddate=date("Y-m-d",strtotime($enddate));
            $course=$_POST["course"];
            $sql="SELECT * FROM feetable where (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = '$course' ORDER BY cutoff DESC";
        }
        if($_POST['startdate'] == ""){
            $course=$_POST["course"];
            $sql="SELECT * FROM feetable where course = '$course' ORDER BY cutoff DESC";
        }
    include("../../database/dbconnection.php");
    $conn=new mysqli($servername,$username,$password,$db);
        if($conn->connect_error){
            echo $conn->connect_error;
            exit();
         }    
        $sno=1;
    
    $result=$conn->query($sql);
    if(mysqli_num_rows($result) > 0){
        echo "<div class='table2'>
         <table>
            <tr>
                <th style='width:45px;'>Sno</th>
                <th>Appl No</th>
                <th>Course</th>
                <th>Name</th>
                <th>DOB</th>
                <th>Cmty</th>
                <th>Cutoff</th>
                <th>Selection Date</th>
            </tr>";
        while($row=$result->fetch_assoc()){
         $selectiondate1=$row['selectiondate'];
         $selectiondate1=date("d-m-Y",strtotime($selectiondate1));
        echo "<tr>
             <td>
                 ".$sno++."
             </td>
             <td>
                 ".$row['applno']."
             </td>
             <td>
                 ".$row['course']."
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
                 ".$row['cutoff']."
             </td>
             <td>
                 ".$selectiondate1."
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