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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='cstyle.css' />
    <script src="../sweetalert2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../jquery/jquery-ui-1.12.1/jquery-ui.css" />
    <script type="text/javascript" src="../jquery/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
    <script type="text/javascript" src="../jquery/jquery-ui-1.12.1/jquery-ui.js"></script>
    <meta charset='UTF-8' />
    <title>Consolidated Report</title>
</head>

<body>
    <div class="main">
        <?php
        if($_SESSION["user"] == "incharge"){
            echo '<ul class="mainnav">
            <li><a href="../selection/insert.php">Selection</a></li>
            <li class="active"><a href="consolidated.php">Consolidated</a></li>
            <li class="right"><a href="../logout/logout.php"><img src="../logout.png" alt="Log-Out"></a></li>
        </ul>
        <br style="clear: both;">';
        }else{
            echo '<ul class="mainnav">
            <li><a href="../registration/registration.php">Registration</a></li>
            <li><a href="../edit/editreg.php">Edit</a></li>
            <li><a href="../selection/insert.php">Selection</a></li>
            <li><a href="../multicourse/mcourse.php">MultiCourse</a></li>
            <li class="hassubs active"><a href="javascript:void(0)">Reports</a>
                <ul class="dropdown">
                    <li class="subs hassubs"><a href="javascript:void(0)">Registration</a>
                        <ul class="dropdown">
                            <li class="subs sub2"><a href="registration/selectreport1.php">Periodical</a></li>
                            <li class="subs sub2"><a href="registration/selectreport2.php">Branch</a></li>
                            <li class="subs sub2"><a href="registration/selectreport3.php">Branch_Community</a></li>
                            <li class="subs sub2"><a href="registration/selectreport4.php">Branch&ensp;Mark</a></li>
                            <li class="subs sub2"><a href="registration/consolidated.php">Consolidated</a></li>
                        </ul>
                    </li>
                    <li class="subs hassubs"><a href="javascript:void(0)">Selection</a>
                        <ul class="dropdown">
                            <li class="subs sub2"><a href="selection/report1.php">Branch</a></li>
                            <li class="subs sub2"><a href="selection/report2.php">Branch_Community</a></li>
                            <li class="subs sub2"><a href="selection/report3.php">Branch&ensp;Mark</a></li>
                            <li class="subs sub2"><a href="selection/consolidated.php">Consolidated</a></li>
                        </ul>
                    </li>
                    <li class="subs hassubs"><a href="javascript:void(0)">Fee&ensp;Paid</a>
                        <ul class="dropdown">
                            <li class="subs sub2"><a href="feepaid/freport1.php">Branch</a></li>
                            <li class="subs sub2"><a href="feepaid/freport2.php">Branch&ensp;Mark</a></li>
                            <li class="subs sub2"><a href="feepaid/freport3.php">Branch_Community</a></li>
                            <li class="subs sub2"><a href="feepaid/consolidated.php">Consolidated</a></li>
                        </ul>
                    </li>
                    <li class="subs hassubs"><a href="javascript:void(0)">CV Report</a>
                        <ul class="dropdown">
                            <li class="subs sub2"><a href="cv/cvphp.php">CV Periodical</a></li>
                            <li class="subs sub2"><a href="cv/cvbranch.php">CV Branch</a></li>
                            <li class="subs sub2"><a href="cv/consolidated.php">Consolidated</a></li>
                        </ul>
                    </li>
                    <li class="subs active"><a href="consolidated.php">Consolidated</a></li>
                </ul>
            </li>
            <li class="hassubs"><a href="javascript:void (0)">Secretary</a>
                <ul class="dropdown">
                    <li class="subs"><a href="../sec_report/report.php">Report</a></li>
                    <li class="subs"><a href="../sec_report/dailyrep.php">Today&ensp;Rep</a></li>
                </ul>
            </li>
            <li><a href="../admin/page.php">Admin</a></li>
            <li class="right"><a href="../logout/logout.php"><img src="../logout.png" alt="Log-Out"></a></li>
        </ul>
        <br style="clear: both;">';
        }
        ?>
    </div>
<?php
    $startdate=$enddate="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // if(isset($_POST["report"])){
        $startdate=$_POST["startdate"];
        $startdate=date("d-m-Y",strtotime($startdate));
        $enddate=$_POST["enddate"];
        $enddate=date("d-m-Y",strtotime($enddate));
    }
?>


    <div class='container'>
        <div class="content">
            <div class="box1">
                <form name="myform" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="myform">
                    <table class="tablef">
                        <tr>
                            <th>
                                From:<input type="text" name="startdate" required value="<?php echo $startdate;?>">&ensp;
                                To:&ensp;<input type="text" name="enddate" required value="<?php echo $enddate;?>">
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
                $startdate = $_POST["startdate"];
                $startdate=date("Y-m-d",strtotime($startdate));
                $enddate = $_POST["enddate"];
                $enddate=date("Y-m-d",strtotime($enddate));
            include("../database/dbconnection.php");
            $conn=new mysqli($servername,$username,$password,$db);
            if($conn->connect_error){
               echo $conn->connect_error;
               exit();
            }            
            
            
            //Community BC
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND community = 'BC'";
            $result=$conn->query($sql);
            $a1=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND community = 'BC'";
            $result=$conn->query($sql);
            $a2=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND community = 'BC'";
            $result=$conn->query($sql);
            $a3=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND community = 'BC'";
            $result=$conn->query($sql);
            $a4=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND community = 'BC'";
            $result=$conn->query($sql);
            $a5=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND community = 'BC'";
            $result=$conn->query($sql);
            $a6=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND community = 'BC'";
            $result=$conn->query($sql);
            $a7=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND community = 'BC'";
            $result=$conn->query($sql);
            $a8=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND community = 'BC'";
            $result=$conn->query($sql);
            $a9=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND community = 'BC'";
            $result=$conn->query($sql);
            $a10=mysqli_num_rows($result);
            
            //Community ST
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND community = 'ST'";
            $result=$conn->query($sql);
            $b1=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND community = 'ST'";
            $result=$conn->query($sql);
            $b2=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND community = 'ST'";
            $result=$conn->query($sql);
            $b3=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND community = 'ST'";
            $result=$conn->query($sql);
            $b4=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND community = 'ST'";
            $result=$conn->query($sql);
            $b5=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND community = 'ST'";
            $result=$conn->query($sql);
            $b6=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND community = 'ST'";
            $result=$conn->query($sql);
            $b7=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND community = 'ST'";
            $result=$conn->query($sql);
            $b8=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND community = 'ST'";
            $result=$conn->query($sql);
            $b9=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND community = 'ST'";
            $result=$conn->query($sql);
            $b10=mysqli_num_rows($result);
            
            //Community SC(A)
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND community = 'SC(A)'";
            $result=$conn->query($sql);
            $c1=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND community = 'SC(A)'";
            $result=$conn->query($sql);
            $c2=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND community = 'SC(A)'";
            $result=$conn->query($sql);
            $c3=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND community = 'SC(A)'";
            $result=$conn->query($sql);
            $c4=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND community = 'SC(A)'";
            $result=$conn->query($sql);
            $c5=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND community = 'SC(A)'";
            $result=$conn->query($sql);
            $c6=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND community = 'SC(A)'";
            $result=$conn->query($sql);
            $c7=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND community = 'SC(A)'";
            $result=$conn->query($sql);
            $c8=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND community = 'SC(A)'";
            $result=$conn->query($sql);
            $c9=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND community = 'SC(A)'";
            $result=$conn->query($sql);
            $c10=mysqli_num_rows($result);
            
            //Community SC
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND community = 'SC'";
            $result=$conn->query($sql);
            $d1=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND community = 'SC'";
            $result=$conn->query($sql);
            $d2=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND community = 'SC'";
            $result=$conn->query($sql);
            $d3=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND community = 'SC'";
            $result=$conn->query($sql);
            $d4=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND community = 'SC'";
            $result=$conn->query($sql);
            $d5=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND community = 'SC'";
            $result=$conn->query($sql);
            $d6=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND community = 'SC'";
            $result=$conn->query($sql);
            $d7=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND community = 'SC'";
            $result=$conn->query($sql);
            $d8=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND community = 'SC'";
            $result=$conn->query($sql);
            $d9=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND community = 'SC'";
            $result=$conn->query($sql);
            $d10=mysqli_num_rows($result);
            
            //Community OC
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND community = 'OC'";
            $result=$conn->query($sql);
            $e1=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND community = 'OC'";
            $result=$conn->query($sql);
            $e2=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND community = 'OC'";
            $result=$conn->query($sql);
            $e3=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND community = 'OC'";
            $result=$conn->query($sql);
            $e4=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND community = 'OC'";
            $result=$conn->query($sql);
            $e5=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND community = 'OC'";
            $result=$conn->query($sql);
            $e6=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND community = 'OC'";
            $result=$conn->query($sql);
            $e7=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND community = 'OC'";
            $result=$conn->query($sql);
            $e8=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND community = 'OC'";
            $result=$conn->query($sql);
            $e9=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND community = 'OC'";
            $result=$conn->query($sql);
            $e10=mysqli_num_rows($result);
            
            //Community MBC/DNC            
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND (community LIKE 'MBC' OR community LIKE 'DNC')";
            $result=$conn->query($sql);
            $f1=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND (community LIKE 'MBC' OR community LIKE 'DNC')";
            $result=$conn->query($sql);
            $f2=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND (community LIKE 'MBC' OR community LIKE 'DNC')";
            $result=$conn->query($sql);
            $f3=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND (community LIKE 'MBC' OR community LIKE 'DNC')";
            $result=$conn->query($sql);
            $f4=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE  (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND (community LIKE 'MBC' OR community LIKE 'DNC')";
            $result=$conn->query($sql);
            $f5=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND (community LIKE 'MBC' OR community LIKE 'DNC')";
            $result=$conn->query($sql);
            $f6=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND (community LIKE 'MBC' OR community LIKE 'DNC')";
            $result=$conn->query($sql);
            $f7=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND (community LIKE 'MBC' OR community LIKE 'DNC')";
            $result=$conn->query($sql);
            $f8=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND (community LIKE 'MBC' OR community LIKE 'DNC')";
            $result=$conn->query($sql);
            $f9=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND (community LIKE 'MBC' OR community LIKE 'DNC')";
            $result=$conn->query($sql);
            $f10=mysqli_num_rows($result);
            
            //Community BC(M)
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND community = 'BC(M)'";
            $result=$conn->query($sql);
            $g1=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND community = 'BC(M)'";
            $result=$conn->query($sql);
            $g2=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND community = 'BC(M)'";
            $result=$conn->query($sql);
            $g3=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND community = 'BC(M)'";
            $result=$conn->query($sql);
            $g4=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND community = 'BC(M)'";
            $result=$conn->query($sql);
            $g5=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND community = 'BC(M)'";
            $result=$conn->query($sql);
            $g6=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND community = 'BC(M)'";
            $result=$conn->query($sql);
            $g7=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND community = 'BC(M)'";
            $result=$conn->query($sql);
            $g8=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND community = 'BC(M)'";
            $result=$conn->query($sql);
            $g9=mysqli_num_rows($result);
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate') AND community = 'BC(M)'";
            $result=$conn->query($sql);
            $g10=mysqli_num_rows($result);
            
            
            
            $sql = "SELECT * FROM registration WHERE (regdate BETWEEN '$startdate' AND '$enddate')";
            $result=$conn->query($sql);
            $total=mysqli_num_rows($result);            
            
        ?>
           <div id="printme">
            <div class="row1">
               <div id="tb1">
                <table class="table1 rt" id="t1" border="1" cellspacing="0px">
                    <tr>
                        <th colspan="13">
                            Consolidated Registration Report
                        </th>
                    </tr>
                    <tr>
                        <th rowspan="2">
                            Course/<br />Community
                        </th>
                        <th colspan="6">
                            B.Com
                        </th>
                        <th rowspan="2">
                            Tot.<br />Commerce
                        </th>
                        <th rowspan="2">
                            BBA
                        </th>
                        <th colspan="2">
                            Science
                        </th>
                        <th rowspan="2">
                            Tot.<br />Science
                        </th>
                        <th rowspan="2">
                            Total reg.<br />Cmty Wise
                        </th>
                    </tr>
                    <tr>
                        <th>
                            GEN
                        </th>
                        <th>
                            AF
                        </th>
                        <th>
                            BM
                        </th>
                        <th>
                            CS
                        </th>
                        <th>
                            CA
                        </th>
                        <th>
                            ISM
                        </th>
                        <th>
                            BSC
                        </th>
                        <th>
                            BCA
                        </th>
                    </tr>
                    <tr>
                        <th>
                            BC
                        </th>
                        <td>
                            <?php echo $a1;?>
                        </td>
                        <td>
                            <?php echo $a2;?>
                        </td>
                        <td>
                            <?php echo $a3;?>
                        </td>
                        <td>
                            <?php echo $a4;?>
                        </td>
                        <td>
                            <?php echo $a5;?>
                        </td>
                        <td>
                            <?php echo $a6;?>
                        </td>
                        <td>
                            <strong><?php echo $AC=($a1+$a2+$a3+$a4+$a5+$a6);?></strong>
                        </td>
                        <td>
                            <?php echo $a7;?>
                        </td>
                        <td>
                            <?php echo $a8;?>
                        </td>
                        <td>
                            <?php echo $a9;?>
                        </td>
                        <td>
                            <strong><?php echo $AS=($a8+$a9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $a10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            ST
                        </th>
                        <td>
                            <?php echo $b1;?>
                        </td>
                        <td>
                            <?php echo $b2;?>
                        </td>
                        <td>
                            <?php echo $b3;?>
                        </td>
                        <td>
                            <?php echo $b4;?>
                        </td>
                        <td>
                            <?php echo $b5;?>
                        </td>
                        <td>
                            <?php echo $b6;?>
                        </td>
                        <td>
                            <strong><?php echo $BC=($b1+$b2+$b3+$b4+$b5+$b6);?></strong>
                        </td>
                        <td>
                            <?php echo $b7;?>
                        </td>
                        <td>
                            <?php echo $b8;?>
                        </td>
                        <td>
                            <?php echo $b9;?>
                        </td>
                        <td>
                            <strong><?php echo $BS=($b8+$b9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $b10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            SC(A)
                        </th>
                        <td>
                            <?php echo $c1;?>
                        </td>
                        <td>
                            <?php echo $c2;?>
                        </td>
                        <td>
                            <?php echo $c3;?>
                        </td>
                        <td>
                            <?php echo $c4;?>
                        </td>
                        <td>
                            <?php echo $c5;?>
                        </td>
                        <td>
                            <?php echo $c6;?>
                        </td>
                        <td>
                            <strong><?php echo $CC=($c1+$c2+$c3+$c4+$c5+$c6);?></strong>
                        </td>
                        <td>
                            <?php echo $c7;?>
                        </td>
                        <td>
                            <?php echo $c8;?>
                        </td>
                        <td>
                            <?php echo $c9;?>
                        </td>
                        <td>
                            <strong><?php echo $CS=($c8+$c9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $c10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            SC
                        </th>
                        <td>
                            <?php echo $d1;?>
                        </td>
                        <td>
                            <?php echo $d2;?>
                        </td>
                        <td>
                            <?php echo $d3;?>
                        </td>
                        <td>
                            <?php echo $d4;?>
                        </td>
                        <td>
                            <?php echo $d5;?>
                        </td>
                        <td>
                            <?php echo $d6;?>
                        </td>
                        <td>
                            <strong><?php echo $DC=($d1+$d2+$d3+$d4+$d5+$d6);?></strong>
                        </td>
                        <td>
                            <?php echo $d7;?>
                        </td>
                        <td>
                            <?php echo $d8;?>
                        </td>
                        <td>
                            <?php echo $d9;?>
                        </td>
                        <td>
                            <strong><?php echo $DS=($d8+$d9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $d10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            OC
                        </th>
                        <td>
                            <?php echo $e1;?>
                        </td>
                        <td>
                            <?php echo $e2;?>
                        </td>
                        <td>
                            <?php echo $e3;?>
                        </td>
                        <td>
                            <?php echo $e4;?>
                        </td>
                        <td>
                            <?php echo $e5;?>
                        </td>
                        <td>
                            <?php echo $e6;?>
                        </td>
                        <td>
                            <strong><?php echo $EC=($e1+$e2+$e3+$e4+$e5+$e6);?></strong>
                        </td>
                        <td>
                            <?php echo $e7;?>
                        </td>
                        <td>
                            <?php echo $e8;?>
                        </td>
                        <td>
                            <?php echo $e9;?>
                        </td>
                        <td>
                            <strong><?php echo $ES=($e8+$e9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $e10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            MBC/DNC
                        </th>
                        <td>
                            <?php echo $f1;?>
                        </td>
                        <td>
                            <?php echo $f2;?>
                        </td>
                        <td>
                            <?php echo $f3;?>
                        </td>
                        <td>
                            <?php echo $f4;?>
                        </td>
                        <td>
                            <?php echo $f5;?>
                        </td>
                        <td>
                            <?php echo $f6;?>
                        </td>
                        <td>
                            <strong><?php echo $FC=($f1+$f2+$f3+$f4+$f5+$f6);?></strong>
                        </td>
                        <td>
                            <?php echo $f7;?>
                        </td>
                        <td>
                            <?php echo $f8;?>
                        </td>
                        <td>
                            <?php echo $f9;?>
                        </td>
                        <td>
                            <strong><?php echo $FS=($f8+$f9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $f10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            BC(M)
                        </th>
                        <td>
                            <?php echo $g1;?>
                        </td>
                        <td>
                            <?php echo $g2;?>
                        </td>
                        <td>
                            <?php echo $g3;?>
                        </td>
                        <td>
                            <?php echo $g4;?>
                        </td>
                        <td>
                            <?php echo $g5;?>
                        </td>
                        <td>
                            <?php echo $g6;?>
                        </td>
                        <td>
                            <strong><?php echo $GC=($g1+$g2+$g3+$g4+$g5+$g6);?></strong>
                        </td>
                        <td>
                            <?php echo $g7;?>
                        </td>
                        <td>
                            <?php echo $g8;?>
                        </td>
                        <td>
                            <?php echo $g9;?>
                        </td>
                        <td>
                            <strong><?php echo $GS=($g8+$g9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $g10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Total-<br />Course Wise
                        </th>
                        <td>
                            <strong><?php echo ($a1+$b1+$c1+$d1+$e1+$f1+$g1);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a2+$b2+$c2+$d2+$e2+$f2+$g2);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a3+$b3+$c3+$d3+$e3+$f3+$g3);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a4+$b4+$c4+$d4+$e4+$f4+$g4);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a5+$b5+$c5+$d5+$e5+$f5+$g5);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a6+$b6+$c6+$d6+$e6+$f6+$g6);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($AC+$BC+$CC+$DC+$EC+$FC+$GC);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a7+$b7+$c7+$d7+$e7+$f7+$g7);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a8+$b8+$c8+$d8+$e8+$f8+$g8);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a9+$b9+$c9+$d9+$e9+$f9+$g9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($AS+$BS+$CS+$DS+$ES+$FS+$GS);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $total;?></strong>
                        </td>
                    </tr>
                </table>
                </div>
                <?php
                //Community BC
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND community = 'BC' AND feedate <> ''";
            $result=$conn->query($sql);
            $a1=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND community = 'BC' AND feedate <> ''";
            $result=$conn->query($sql);
            $a2=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND community = 'BC' AND feedate <> ''";
            $result=$conn->query($sql);
            $a3=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND community = 'BC' AND feedate <> ''";
            $result=$conn->query($sql);
            $a4=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND community = 'BC' AND feedate <> ''";
            $result=$conn->query($sql);
            $a5=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND community = 'BC' AND feedate <> ''";
            $result=$conn->query($sql);
            $a6=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND community = 'BC' AND feedate <> ''";
            $result=$conn->query($sql);
            $a7=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND community = 'BC' AND feedate <> ''";
            $result=$conn->query($sql);
            $a8=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND community = 'BC' AND feedate <> ''";
            $result=$conn->query($sql);
            $a9=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND community = 'BC' AND feedate <> ''";
            $result=$conn->query($sql);
            $a10=mysqli_num_rows($result);
            
            //Community ST
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND community = 'ST'  AND feedate <> ''";
            $result=$conn->query($sql);
            $b1=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND community = 'ST'  AND feedate <> ''";
            $result=$conn->query($sql);
            $b2=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND community = 'ST'  AND feedate <> ''";
            $result=$conn->query($sql);
            $b3=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND community = 'ST'  AND feedate <> ''";
            $result=$conn->query($sql);
            $b4=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND community = 'ST'  AND feedate <> ''";
            $result=$conn->query($sql);
            $b5=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND community = 'ST'  AND feedate <> ''";
            $result=$conn->query($sql);
            $b6=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND community = 'ST'  AND feedate <> ''";
            $result=$conn->query($sql);
            $b7=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND community = 'ST'  AND feedate <> ''";
            $result=$conn->query($sql);
            $b8=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND community = 'ST'  AND feedate <> ''";
            $result=$conn->query($sql);
            $b9=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND community = 'ST'  AND feedate <> ''";
            $result=$conn->query($sql);
            $b10=mysqli_num_rows($result);
            
            //Community SC(A)
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND community = 'SC(A)' AND feedate <> ''";
            $result=$conn->query($sql);
            $c1=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND community = 'SC(A)' AND feedate <> ''";
            $result=$conn->query($sql);
            $c2=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND community = 'SC(A)' AND feedate <> ''";
            $result=$conn->query($sql);
            $c3=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND community = 'SC(A)' AND feedate <> ''";
            $result=$conn->query($sql);
            $c4=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND community = 'SC(A)' AND feedate <> ''";
            $result=$conn->query($sql);
            $c5=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND community = 'SC(A)' AND feedate <> ''";
            $result=$conn->query($sql);
            $c6=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND community = 'SC(A)' AND feedate <> ''";
            $result=$conn->query($sql);
            $c7=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND community = 'SC(A)' AND feedate <> ''";
            $result=$conn->query($sql);
            $c8=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND community = 'SC(A)' AND feedate <> ''";
            $result=$conn->query($sql);
            $c9=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND community = 'SC(A)' AND feedate <> ''";
            $result=$conn->query($sql);
            $c10=mysqli_num_rows($result);
            
            //Community SC
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND community = 'SC' AND feedate <> ''";
            $result=$conn->query($sql);
            $d1=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND community = 'SC' AND feedate <> ''";
            $result=$conn->query($sql);
            $d2=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND community = 'SC' AND feedate <> ''";
            $result=$conn->query($sql);
            $d3=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND community = 'SC' AND feedate <> ''";
            $result=$conn->query($sql);
            $d4=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND community = 'SC' AND feedate <> ''";
            $result=$conn->query($sql);
            $d5=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND community = 'SC' AND feedate <> ''";
            $result=$conn->query($sql);
            $d6=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND community = 'SC' AND feedate <> ''";
            $result=$conn->query($sql);
            $d7=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND community = 'SC' AND feedate <> ''";
            $result=$conn->query($sql);
            $d8=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND community = 'SC' AND feedate <> ''";
            $result=$conn->query($sql);
            $d9=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND community = 'SC' AND feedate <> ''";
            $result=$conn->query($sql);
            $d10=mysqli_num_rows($result);
            
            //Community OC
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND community = 'OC' AND  feedate <> ''";
            $result=$conn->query($sql);
            $e1=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND community = 'OC' AND  feedate <> ''";
            $result=$conn->query($sql);
            $e2=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND community = 'OC' AND  feedate <> ''";
            $result=$conn->query($sql);
            $e3=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND community = 'OC' AND  feedate <> ''";
            $result=$conn->query($sql);
            $e4=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND community = 'OC' AND  feedate <> ''";
            $result=$conn->query($sql);
            $e5=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND community = 'OC'  AND feedate <> ''";
            $result=$conn->query($sql);
            $e6=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND community = 'OC' AND  feedate <> ''";
            $result=$conn->query($sql);
            $e7=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND community = 'OC' AND  feedate <> ''";
            $result=$conn->query($sql);
            $e8=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND community = 'OC' AND  feedate <> ''";
            $result=$conn->query($sql);
            $e9=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND community = 'OC' AND  feedate <> ''";
            $result=$conn->query($sql);
            $e10=mysqli_num_rows($result);
            
            //Community MBC/DNC            
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND (community LIKE 'MBC' OR community LIKE 'DNC') AND feedate <> ''";
            $result=$conn->query($sql);
            $f1=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND (community LIKE 'MBC' OR community LIKE 'DNC') AND feedate <> ''";
            $result=$conn->query($sql);
            $f2=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND (community LIKE 'MBC' OR community LIKE 'DNC') AND feedate <> ''";
            $result=$conn->query($sql);
            $f3=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND (community LIKE 'MBC' OR community LIKE 'DNC') AND feedate <> ''";
            $result=$conn->query($sql);
            $f4=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND (community LIKE 'MBC' OR community LIKE 'DNC') AND feedate <> ''";
            $result=$conn->query($sql);
            $f5=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND (community LIKE 'MBC' OR community LIKE 'DNC') AND feedate <> ''";
            $result=$conn->query($sql);
            $f6=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND (community LIKE 'MBC' OR community LIKE 'DNC') AND feedate <> ''";
            $result=$conn->query($sql);
            $f7=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND (community LIKE 'MBC' OR community LIKE 'DNC') AND feedate <> ''";
            $result=$conn->query($sql);
            $f8=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND (community LIKE 'MBC' OR community LIKE 'DNC') AND feedate <> ''";
            $result=$conn->query($sql);
            $f9=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND (community LIKE 'MBC' OR community LIKE 'DNC') AND feedate <> ''";
            $result=$conn->query($sql);
            $f10=mysqli_num_rows($result);
            
            //Community BC(M)
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND community = 'BC(M)' AND feedate <> ''";
            $result=$conn->query($sql);
            $g1=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND community = 'BC(M)' AND feedate <> ''";
            $result=$conn->query($sql);
            $g2=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND community = 'BC(M)' AND feedate <> ''";
            $result=$conn->query($sql);
            $g3=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND community = 'BC(M)' AND feedate <> ''";
            $result=$conn->query($sql);
            $g4=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND community = 'BC(M)' AND feedate <> ''";
            $result=$conn->query($sql);
            $g5=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND community = 'BC(M)' AND feedate <> ''";
            $result=$conn->query($sql);
            $g6=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND community = 'BC(M)' AND feedate <> ''";
            $result=$conn->query($sql);
            $g7=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND community = 'BC(M)' AND feedate <> ''";
            $result=$conn->query($sql);
            $g8=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND community = 'BC(M)' AND feedate <> ''";
            $result=$conn->query($sql);
            $g9=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND community = 'BC(M)' AND feedate <> ''";
            $result=$conn->query($sql);
            $g10=mysqli_num_rows($result);
            
            
            
            $sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND feedate <> ''";
            $result=$conn->query($sql);
            $total=mysqli_num_rows($result);             
            
        ?>
               <div id="tb2">
                <table class="table1 lt" id="tblData" border="1" cellspacing="0px">
                    <tr>
                        <th colspan="13">
                            Consolidated Paid
                            Report
                        </th>
                    </tr>
                    <tr>
                        <th rowspan="2">
                            Course/<br />Community
                        </th>
                        <th colspan="6">
                            B.Com
                        </th>
                        <th rowspan="2">
                            Tot.<br />Commerce
                        </th>
                        <th rowspan="2">
                            BBA
                        </th>
                        <th colspan="2">
                            Science
                        </th>
                        <th rowspan="2">
                            Tot.<br />Science
                        </th>
                        <th rowspan="2">
                            Total reg.<br />Cmty Wise
                        </th>
                    </tr>
                    <tr>
                        <th>
                            GEN
                        </th>
                        <th>
                            AF
                        </th>
                        <th>
                            BM
                        </th>
                        <th>
                            CS
                        </th>
                        <th>
                            CA
                        </th>
                        <th>
                            ISM
                        </th>
                        <th>
                            BSC
                        </th>
                        <th>
                            BCA
                        </th>
                    </tr>
                    <tr>
                        <th>
                            BC
                        </th>
                        <td>
                            <?php echo $a1;?>
                        </td>
                        <td>
                            <?php echo $a2;?>
                        </td>
                        <td>
                            <?php echo $a3;?>
                        </td>
                        <td>
                            <?php echo $a4;?>
                        </td>
                        <td>
                            <?php echo $a5;?>
                        </td>
                        <td>
                            <?php echo $a6;?>
                        </td>
                        <td>
                            <strong><?php echo $AC=($a1+$a2+$a3+$a4+$a5+$a6);?></strong>
                        </td>
                        <td>
                            <?php echo $a7;?>
                        </td>
                        <td>
                            <?php echo $a8;?>
                        </td>
                        <td>
                            <?php echo $a9;?>
                        </td>
                        <td>
                            <strong><?php echo $AS=($a8+$a9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $a10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            ST
                        </th>
                        <td>
                            <?php echo $b1;?>
                        </td>
                        <td>
                            <?php echo $b2;?>
                        </td>
                        <td>
                            <?php echo $b3;?>
                        </td>
                        <td>
                            <?php echo $b4;?>
                        </td>
                        <td>
                            <?php echo $b5;?>
                        </td>
                        <td>
                            <?php echo $b6;?>
                        </td>
                        <td>
                            <strong><?php echo $BC=($b1+$b2+$b3+$b4+$b5+$b6);?></strong>
                        </td>
                        <td>
                            <?php echo $b7;?>
                        </td>
                        <td>
                            <?php echo $b8;?>
                        </td>
                        <td>
                            <?php echo $b9;?>
                        </td>
                        <td>
                            <strong><?php echo $BS=($b8+$b9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $b10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            SC(A)
                        </th>
                        <td>
                            <?php echo $c1;?>
                        </td>
                        <td>
                            <?php echo $c2;?>
                        </td>
                        <td>
                            <?php echo $c3;?>
                        </td>
                        <td>
                            <?php echo $c4;?>
                        </td>
                        <td>
                            <?php echo $c5;?>
                        </td>
                        <td>
                            <?php echo $c6;?>
                        </td>
                        <td>
                            <strong><?php echo $CC=($c1+$c2+$c3+$c4+$c5+$c6);?></strong>
                        </td>
                        <td>
                            <?php echo $c7;?>
                        </td>
                        <td>
                            <?php echo $c8;?>
                        </td>
                        <td>
                            <?php echo $c9;?>
                        </td>
                        <td>
                            <strong><?php echo $CS=($c8+$c9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $c10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            SC
                        </th>
                        <td>
                            <?php echo $d1;?>
                        </td>
                        <td>
                            <?php echo $d2;?>
                        </td>
                        <td>
                            <?php echo $d3;?>
                        </td>
                        <td>
                            <?php echo $d4;?>
                        </td>
                        <td>
                            <?php echo $d5;?>
                        </td>
                        <td>
                            <?php echo $d6;?>
                        </td>
                        <td>
                            <strong><?php echo $DC=($d1+$d2+$d3+$d4+$d5+$d6);?></strong>
                        </td>
                        <td>
                            <?php echo $d7;?>
                        </td>
                        <td>
                            <?php echo $d8;?>
                        </td>
                        <td>
                            <?php echo $d9;?>
                        </td>
                        <td>
                            <strong><?php echo $DS=($d8+$d9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $d10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            OC
                        </th>
                        <td>
                            <?php echo $e1;?>
                        </td>
                        <td>
                            <?php echo $e2;?>
                        </td>
                        <td>
                            <?php echo $e3;?>
                        </td>
                        <td>
                            <?php echo $e4;?>
                        </td>
                        <td>
                            <?php echo $e5;?>
                        </td>
                        <td>
                            <?php echo $e6;?>
                        </td>
                        <td>
                            <strong><?php echo $EC=($e1+$e2+$e3+$e4+$e5+$e6);?></strong>
                        </td>
                        <td>
                            <?php echo $e7;?>
                        </td>
                        <td>
                            <?php echo $e8;?>
                        </td>
                        <td>
                            <?php echo $e9;?>
                        </td>
                        <td>
                            <strong><?php echo $ES=($e8+$e9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $e10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            MBC/DNC
                        </th>
                        <td>
                            <?php echo $f1;?>
                        </td>
                        <td>
                            <?php echo $f2;?>
                        </td>
                        <td>
                            <?php echo $f3;?>
                        </td>
                        <td>
                            <?php echo $f4;?>
                        </td>
                        <td>
                            <?php echo $f5;?>
                        </td>
                        <td>
                            <?php echo $f6;?>
                        </td>
                        <td>
                            <strong><?php echo $FC=($f1+$f2+$f3+$f4+$f5+$f6);?></strong>
                        </td>
                        <td>
                            <?php echo $f7;?>
                        </td>
                        <td>
                            <?php echo $f8;?>
                        </td>
                        <td>
                            <?php echo $f9;?>
                        </td>
                        <td>
                            <strong><?php echo $FS=($f8+$f9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $f10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            BC(M)
                        </th>
                        <td>
                            <?php echo $g1;?>
                        </td>
                        <td>
                            <?php echo $g2;?>
                        </td>
                        <td>
                            <?php echo $g3;?>
                        </td>
                        <td>
                            <?php echo $g4;?>
                        </td>
                        <td>
                            <?php echo $g5;?>
                        </td>
                        <td>
                            <?php echo $g6;?>
                        </td>
                        <td>
                            <strong><?php echo $GC=($g1+$g2+$g3+$g4+$g5+$g6);?></strong>
                        </td>
                        <td>
                            <?php echo $g7;?>
                        </td>
                        <td>
                            <?php echo $g8;?>
                        </td>
                        <td>
                            <?php echo $g9;?>
                        </td>
                        <td>
                            <strong><?php echo $GS=($g8+$g9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $g10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Total-<br />Course Wise
                        </th>
                        <td>
                            <strong><?php echo ($a1+$b1+$c1+$d1+$e1+$f1+$g1);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a2+$b2+$c2+$d2+$e2+$f2+$g2);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a3+$b3+$c3+$d3+$e3+$f3+$g3);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a4+$b4+$c4+$d4+$e4+$f4+$g4);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a5+$b5+$c5+$d5+$e5+$f5+$g5);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a6+$b6+$c6+$d6+$e6+$f6+$g6);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($AC+$BC+$CC+$DC+$EC+$FC+$GC);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a7+$b7+$c7+$d7+$e7+$f7+$g7);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a8+$b8+$c8+$d8+$e8+$f8+$g8);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a9+$b9+$c9+$d9+$e9+$f9+$g9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($AS+$BS+$CS+$DS+$ES+$FS+$GS);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $total;?></strong>
                        </td>
                    </tr>
                </table>
                </div>
            </div>
            <div class="row2">
                <?php
            //Community BC
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND community = 'BC'";
            $result=$conn->query($sql);
            $a1=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND community = 'BC'";
            $result=$conn->query($sql);
            $a2=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND community = 'BC'";
            $result=$conn->query($sql);
            $a3=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND community = 'BC'";
            $result=$conn->query($sql);
            $a4=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND community = 'BC'";
            $result=$conn->query($sql);
            $a5=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND community = 'BC'";
            $result=$conn->query($sql);
            $a6=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND community = 'BC'";
            $result=$conn->query($sql);
            $a7=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND community = 'BC'";
            $result=$conn->query($sql);
            $a8=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND community = 'BC'";
            $result=$conn->query($sql);
            $a9=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND community = 'BC'";
            $result=$conn->query($sql);
            $a10=mysqli_num_rows($result);
            
            //Community ST
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND community = 'ST'";
            $result=$conn->query($sql);
            $b1=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND community = 'ST'";
            $result=$conn->query($sql);
            $b2=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND community = 'ST'";
            $result=$conn->query($sql);
            $b3=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND community = 'ST'";
            $result=$conn->query($sql);
            $b4=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND community = 'ST'";
            $result=$conn->query($sql);
            $b5=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND community = 'ST'";
            $result=$conn->query($sql);
            $b6=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND community = 'ST'";
            $result=$conn->query($sql);
            $b7=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND community = 'ST'";
            $result=$conn->query($sql);
            $b8=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND community = 'ST'";
            $result=$conn->query($sql);
            $b9=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND community = 'ST'";
            $result=$conn->query($sql);
            $b10=mysqli_num_rows($result);
            
            //Community SC(A)
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND community = 'SC(A)'";
            $result=$conn->query($sql);
            $c1=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND community = 'SC(A)'";
            $result=$conn->query($sql);
            $c2=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND community = 'SC(A)'";
            $result=$conn->query($sql);
            $c3=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND community = 'SC(A)'";
            $result=$conn->query($sql);
            $c4=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND community = 'SC(A)'";
            $result=$conn->query($sql);
            $c5=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND community = 'SC(A)'";
            $result=$conn->query($sql);
            $c6=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND community = 'SC(A)'";
            $result=$conn->query($sql);
            $c7=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND community = 'SC(A)'";
            $result=$conn->query($sql);
            $c8=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND community = 'SC(A)'";
            $result=$conn->query($sql);
            $c9=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND community = 'SC(A)'";
            $result=$conn->query($sql);
            $c10=mysqli_num_rows($result);
            
            //Community SC
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND community = 'SC'";
            $result=$conn->query($sql);
            $d1=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND community = 'SC'";
            $result=$conn->query($sql);
            $d2=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND community = 'SC'";
            $result=$conn->query($sql);
            $d3=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND community = 'SC'";
            $result=$conn->query($sql);
            $d4=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND community = 'SC'";
            $result=$conn->query($sql);
            $d5=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND community = 'SC'";
            $result=$conn->query($sql);
            $d6=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND community = 'SC'";
            $result=$conn->query($sql);
            $d7=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND community = 'SC'";
            $result=$conn->query($sql);
            $d8=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND community = 'SC'";
            $result=$conn->query($sql);
            $d9=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND community = 'SC'";
            $result=$conn->query($sql);
            $d10=mysqli_num_rows($result);
            
            //Community OC
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND community = 'OC'";
            $result=$conn->query($sql);
            $e1=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND community = 'OC'";
            $result=$conn->query($sql);
            $e2=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND community = 'OC'";
            $result=$conn->query($sql);
            $e3=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND community = 'OC'";
            $result=$conn->query($sql);
            $e4=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND community = 'OC'";
            $result=$conn->query($sql);
            $e5=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND community = 'OC'";
            $result=$conn->query($sql);
            $e6=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND community = 'OC'";
            $result=$conn->query($sql);
            $e7=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND community = 'OC'";
            $result=$conn->query($sql);
            $e8=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND community = 'OC'";
            $result=$conn->query($sql);
            $e9=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND community = 'OC'";
            $result=$conn->query($sql);
            $e10=mysqli_num_rows($result);
            
            //Community MBC/DNC            
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND (community LIKE 'MBC' OR community LIKE 'DNC')";
            $result=$conn->query($sql);
            $f1=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND (community LIKE 'MBC' OR community LIKE 'DNC')";
            $result=$conn->query($sql);
            $f2=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND (community LIKE 'MBC' OR community LIKE 'DNC')";
            $result=$conn->query($sql);
            $f3=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND (community LIKE 'MBC' OR community LIKE 'DNC')";
            $result=$conn->query($sql);
            $f4=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND (community LIKE 'MBC' OR community LIKE 'DNC')";
            $result=$conn->query($sql);
            $f5=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND (community LIKE 'MBC' OR community LIKE 'DNC')";
            $result=$conn->query($sql);
            $f6=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND (community LIKE 'MBC' OR community LIKE 'DNC')";
            $result=$conn->query($sql);
            $f7=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND (community LIKE 'MBC' OR community LIKE 'DNC')";
            $result=$conn->query($sql);
            $f8=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND (community LIKE 'MBC' OR community LIKE 'DNC')";
            $result=$conn->query($sql);
            $f9=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND (community LIKE 'MBC' OR community LIKE 'DNC')";
            $result=$conn->query($sql);
            $f10=mysqli_num_rows($result);
            
            //Community BC(M)
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND community = 'BC(M)'";
            $result=$conn->query($sql);
            $g1=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND community = 'BC(M)'";
            $result=$conn->query($sql);
            $g2=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND community = 'BC(M)'";
            $result=$conn->query($sql);
            $g3=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND community = 'BC(M)'";
            $result=$conn->query($sql);
            $g4=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND community = 'BC(M)'";
            $result=$conn->query($sql);
            $g5=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND community = 'BC(M)'";
            $result=$conn->query($sql);
            $g6=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND community = 'BC(M)'";
            $result=$conn->query($sql);
            $g7=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND community = 'BC(M)'";
            $result=$conn->query($sql);
            $g8=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND community = 'BC(M)'";
            $result=$conn->query($sql);
            $g9=mysqli_num_rows($result);
            $sql = "SELECT * FROM feetable WHERE (selectiondate BETWEEN '$startdate' AND '$enddate') AND community = 'BC(M)'";
            $result=$conn->query($sql);
            $g10=mysqli_num_rows($result);
            
            
            
            $sql = "SELECT * FROM feetable WHERE  (selectiondate BETWEEN '$startdate' AND '$enddate')";
            $result=$conn->query($sql);
            $total=mysqli_num_rows($result);          
            
        ?>
               <div id="tb3">
                <table class="table1 rt2" id="tblData" border="1" cellspacing="0px">
                    <tr>
                        <th colspan="13">
                            Consolidated Selection
                            Report
                        </th>
                    </tr>
                    <tr>
                        <th rowspan="2">
                            Course/<br />Community
                        </th>
                        <th colspan="6">
                            B.Com
                        </th>
                        <th rowspan="2">
                            Tot.<br />Commerce
                        </th>
                        <th rowspan="2">
                            BBA
                        </th>
                        <th colspan="2">
                            Science
                        </th>
                        <th rowspan="2">
                            Tot.<br />Science
                        </th>
                        <th rowspan="2">
                            Total reg.<br />Cmty Wise
                        </th>
                    </tr>
                    <tr>
                        <th>
                            GEN
                        </th>
                        <th>
                            AF
                        </th>
                        <th>
                            BM
                        </th>
                        <th>
                            CS
                        </th>
                        <th>
                            CA
                        </th>
                        <th>
                            ISM
                        </th>
                        <th>
                            BSC
                        </th>
                        <th>
                            BCA
                        </th>
                    </tr>
                    <tr>
                        <th>
                            BC
                        </th>
                        <td>
                            <?php echo $a1;?>
                        </td>
                        <td>
                            <?php echo $a2;?>
                        </td>
                        <td>
                            <?php echo $a3;?>
                        </td>
                        <td>
                            <?php echo $a4;?>
                        </td>
                        <td>
                            <?php echo $a5;?>
                        </td>
                        <td>
                            <?php echo $a6;?>
                        </td>
                        <td>
                            <strong><?php echo $AC=($a1+$a2+$a3+$a4+$a5+$a6);?></strong>
                        </td>
                        <td>
                            <?php echo $a7;?>
                        </td>
                        <td>
                            <?php echo $a8;?>
                        </td>
                        <td>
                            <?php echo $a9;?>
                        </td>
                        <td>
                            <strong><?php echo $AS=($a8+$a9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $a10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            ST
                        </th>
                        <td>
                            <?php echo $b1;?>
                        </td>
                        <td>
                            <?php echo $b2;?>
                        </td>
                        <td>
                            <?php echo $b3;?>
                        </td>
                        <td>
                            <?php echo $b4;?>
                        </td>
                        <td>
                            <?php echo $b5;?>
                        </td>
                        <td>
                            <?php echo $b6;?>
                        </td>
                        <td>
                            <strong><?php echo $BC=($b1+$b2+$b3+$b4+$b5+$b6);?></strong>
                        </td>
                        <td>
                            <?php echo $b7;?>
                        </td>
                        <td>
                            <?php echo $b8;?>
                        </td>
                        <td>
                            <?php echo $b9;?>
                        </td>
                        <td>
                            <strong><?php echo $BS=($b8+$b9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $b10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            SC(A)
                        </th>
                        <td>
                            <?php echo $c1;?>
                        </td>
                        <td>
                            <?php echo $c2;?>
                        </td>
                        <td>
                            <?php echo $c3;?>
                        </td>
                        <td>
                            <?php echo $c4;?>
                        </td>
                        <td>
                            <?php echo $c5;?>
                        </td>
                        <td>
                            <?php echo $c6;?>
                        </td>
                        <td>
                            <strong><?php echo $CC=($c1+$c2+$c3+$c4+$c5+$c6);?></strong>
                        </td>
                        <td>
                            <?php echo $c7;?>
                        </td>
                        <td>
                            <?php echo $c8;?>
                        </td>
                        <td>
                            <?php echo $c9;?>
                        </td>
                        <td>
                            <strong><?php echo $CS=($c8+$c9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $c10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            SC
                        </th>
                        <td>
                            <?php echo $d1;?>
                        </td>
                        <td>
                            <?php echo $d2;?>
                        </td>
                        <td>
                            <?php echo $d3;?>
                        </td>
                        <td>
                            <?php echo $d4;?>
                        </td>
                        <td>
                            <?php echo $d5;?>
                        </td>
                        <td>
                            <?php echo $d6;?>
                        </td>
                        <td>
                            <strong><?php echo $DC=($d1+$d2+$d3+$d4+$d5+$d6);?></strong>
                        </td>
                        <td>
                            <?php echo $d7;?>
                        </td>
                        <td>
                            <?php echo $d8;?>
                        </td>
                        <td>
                            <?php echo $d9;?>
                        </td>
                        <td>
                            <strong><?php echo $DS=($d8+$d9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $d10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            OC
                        </th>
                        <td>
                            <?php echo $e1;?>
                        </td>
                        <td>
                            <?php echo $e2;?>
                        </td>
                        <td>
                            <?php echo $e3;?>
                        </td>
                        <td>
                            <?php echo $e4;?>
                        </td>
                        <td>
                            <?php echo $e5;?>
                        </td>
                        <td>
                            <?php echo $e6;?>
                        </td>
                        <td>
                            <strong><?php echo $EC=($e1+$e2+$e3+$e4+$e5+$e6);?></strong>
                        </td>
                        <td>
                            <?php echo $e7;?>
                        </td>
                        <td>
                            <?php echo $e8;?>
                        </td>
                        <td>
                            <?php echo $e9;?>
                        </td>
                        <td>
                            <strong><?php echo $ES=($e8+$e9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $e10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            MBC/DNC
                        </th>
                        <td>
                            <?php echo $f1;?>
                        </td>
                        <td>
                            <?php echo $f2;?>
                        </td>
                        <td>
                            <?php echo $f3;?>
                        </td>
                        <td>
                            <?php echo $f4;?>
                        </td>
                        <td>
                            <?php echo $f5;?>
                        </td>
                        <td>
                            <?php echo $f6;?>
                        </td>
                        <td>
                            <strong><?php echo $FC=($f1+$f2+$f3+$f4+$f5+$f6);?></strong>
                        </td>
                        <td>
                            <?php echo $f7;?>
                        </td>
                        <td>
                            <?php echo $f8;?>
                        </td>
                        <td>
                            <?php echo $f9;?>
                        </td>
                        <td>
                            <strong><?php echo $FS=($f8+$f9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $f10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            BC(M)
                        </th>
                        <td>
                            <?php echo $g1;?>
                        </td>
                        <td>
                            <?php echo $g2;?>
                        </td>
                        <td>
                            <?php echo $g3;?>
                        </td>
                        <td>
                            <?php echo $g4;?>
                        </td>
                        <td>
                            <?php echo $g5;?>
                        </td>
                        <td>
                            <?php echo $g6;?>
                        </td>
                        <td>
                            <strong><?php echo $GC=($g1+$g2+$g3+$g4+$g5+$g6);?></strong>
                        </td>
                        <td>
                            <?php echo $g7;?>
                        </td>
                        <td>
                            <?php echo $g8;?>
                        </td>
                        <td>
                            <?php echo $g9;?>
                        </td>
                        <td>
                            <strong><?php echo $GS=($g8+$g9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $g10;?></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Total-<br />Course Wise
                        </th>
                        <td>
                            <strong><?php echo ($a1+$b1+$c1+$d1+$e1+$f1+$g1);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a2+$b2+$c2+$d2+$e2+$f2+$g2);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a3+$b3+$c3+$d3+$e3+$f3+$g3);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a4+$b4+$c4+$d4+$e4+$f4+$g4);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a5+$b5+$c5+$d5+$e5+$f5+$g5);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a6+$b6+$c6+$d6+$e6+$f6+$g6);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($AC+$BC+$CC+$DC+$EC+$FC+$GC);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a7+$b7+$c7+$d7+$e7+$f7+$g7);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a8+$b8+$c8+$d8+$e8+$f8+$g8);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($a9+$b9+$c9+$d9+$e9+$f9+$g9);?></strong>
                        </td>
                        <td>
                            <strong><?php echo ($AS+$BS+$CS+$DS+$ES+$FS+$GS);?></strong>
                        </td>
                        <td>
                            <strong><?php echo $total;?></strong>
                        </td>
                    </tr>
                </table>
                </div>
                <?php
            
            $sql = "SELECT * FROM feetable WHERE (cvdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND status = 'CV Done'";
            $result=$conn->query($sql);
            $a1 = mysqli_num_rows($result);
            
            $sql = "SELECT * FROM feetable WHERE (cvdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(A&F)' AND status = 'CV Done'";
            $result=$conn->query($sql);
            $b1=mysqli_num_rows($result);
            
    
            $sql = "SELECT * FROM feetable WHERE (cvdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(BM)' AND status = 'CV Done'";
            $result=$conn->query($sql);
            $c1= mysqli_num_rows($result);
            
            $sql = "SELECT * FROM feetable WHERE (cvdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CS)' AND status = 'CV Done'";
            $result=$conn->query($sql);
            $d1= mysqli_num_rows($result);
     
            $sql = "SELECT * FROM feetable WHERE (cvdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(CA)' AND status = 'CV Done'";
            $result=$conn->query($sql);
            $e1= mysqli_num_rows($result);
                      
            $sql = "SELECT * FROM feetable WHERE (cvdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(ISM)' AND status = 'CV Done'";
            $result=$conn->query($sql);
            $f1= mysqli_num_rows($result);
        
            $sql = "SELECT * FROM feetable WHERE (cvdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.B.A' AND status = 'CV Done'";
            $result=$conn->query($sql);
            $g1= mysqli_num_rows($result);
                
            $sql = "SELECT * FROM feetable WHERE (cvdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Sc.,(CS)' AND status = 'CV Done'";
            $result=$conn->query($sql);
            $h1= mysqli_num_rows($result);
                
            $sql = "SELECT * FROM feetable WHERE (cvdate BETWEEN '$startdate' AND '$enddate') AND course = 'B.C.A' AND status = 'CV Done'";
            $result=$conn->query($sql);
            $i1= mysqli_num_rows($result);
            
            
            
            $sql = "SELECT * FROM feetable WHERE (cvdate BETWEEN '$startdate' AND '$enddate') AND status = 'CV Done'";
            $result=$conn->query($sql);
            $total= mysqli_num_rows($result);          
            $conn->close(); 
            
        ?>
               <div id="tb4">
                <table class="table1" border="1" cellspacing="0px">
                    <tr>
                        <th colspan="2">
                            CV Done Report
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Course
                        </th>
                        <th>
                            CV Done
                        </th>
                    </tr>
                    <tr>
                        <th>
                            GEN
                        </th>
                        <td>
                            <?php echo $a1;?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            AF
                        </th>
                        <td>
                            <?php echo $b1;?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            BM
                        </th>
                        <td>
                            <?php echo $c1;?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            B.Com(CS)
                        </th>
                        <td>
                            <?php echo $d1;?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            CA
                        </th>
                        <td>
                            <?php echo $e1;?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            ISM
                        </th>
                        <td>
                            <?php echo $f1;?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            BBA
                        </th>
                        <td>
                            <?php echo $g1;?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            B.Sc(CS)
                        </th>
                        <td>
                            <?php echo $h1;?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            BCA
                        </th>
                        <td>
                            <?php echo $i1;?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Total CV Done
                        </th>
                        <td>
                            <strong><?php echo $total;?></strong>
                        </td>
                    </tr>
                </table>
                </div>
               </div>
            </div>
            <button type="button" id="print" onclick="printdata();" hidden>Print</button>
            
            <div class="excelform">
                <form method="post" action="cexcel.php">
                    <input type="text" name="startdate" value="<?php echo $startdate;?>" hidden>
                    <input type="text" name="enddate" value="<?php echo $enddate;?>" hidden>
                    <input type="submit" name="export_excel" value="Export to Excel" hidden>
                </form>
            </div>
            
            
            
            <?php } ?>
            
<script>
    $(document).ready(function() {
        $("input[name='startdate'],input[name='enddate']").datepicker({
            yearRange: "1998:2022",
            showAnim: "fold",
            showButtonPanel: true,
            currentText: "today",
            closeText: "close",
            constrainInput: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy"
        });
    });

    function printdata() {
        var mywindow = window.open('', 'PRINT');

        mywindow.document.write('<html><head><title>' + document.title + '</title>');
        mywindow.document.write('</head><body>');
        mywindow.document.write(document.getElementById("tb1").innerHTML);
        mywindow.document.write('<br/>');
        mywindow.document.write(document.getElementById("tb2").innerHTML);
        mywindow.document.write('<br/>');
        mywindow.document.write(document.getElementById("tb3").innerHTML);
        mywindow.document.write('<br/>');
        mywindow.document.write(document.getElementById("tb4").innerHTML);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        mywindow.close();

        return true;
    }

    function exporttoexcel(tableID, filename = '') {
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
        filename = filename ? filename + '.xls' : 'Reg_ConRep.xls';
        downloadLink = document.createElement("a");
        document.body.appendChild(downloadLink);
        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
            downloadLink.download = filename;
            downloadLink.click();
        }
    }
</script>
        </div>
    </div>
</body>

</html>