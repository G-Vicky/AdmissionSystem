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
    <link rel='stylesheet' type='text/css' href='constyle.css' />
    <script src="../../sweetalert2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../../jquery/jquery-ui-1.12.1/jquery-ui.css" />
    <script type="text/javascript" src="../../jquery/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
    <script type="text/javascript" src="../../jquery/jquery-ui-1.12.1/jquery-ui.js"></script>
    <meta charset='UTF-8' />
    <title>Consolidated Report</title>
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

      <?php
    if($_SESSION["user"] == "cvuser"){
        echo '<div class="main">
        <ul class="mainnav">
            <li><a href="cvphp.php">CV Report</a></li>
            <li><a href="cvbranch.php">CV Branch</a></li>
            <li class="active"><a href="consolidated.php">Consolidated</a></li>
            <li class="right"><a href="../../logout/logout.php"><img src="../../logout.png" alt="Log-Out"></a></li>
        </ul>
        <br style="clear: both;">
    </div>';
    }else{
        echo '<div class="main">
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
                    <li class="subs hassubs active"><a href="javascript:void(0)">CV Report</a>
                        <ul class="dropdown">
                            <li class="subs sub2"><a href="cvphp.php">CV Periodical</a></li>
                            <li class="subs sub2"><a href="cvbranch.php">CV Branch</a></li>
                            <li class="subs active"><a href="consolidated.php">Consolidated</a></li>
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
    </div>';
    }
    
    ?>
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
                <form name="myform" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <table class="tablef">
                        <tr>
                            <th>
                                From:<input type="text" name="startdate" required value="<?php echo $startdate;?>">&ensp;
                                To:<input type="text" name="enddate" required value="<?php echo $enddate;?>">
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
            include("../../database/dbconnection.php");
            $conn=new mysqli($servername,$username,$password,$db);
            if($conn->connect_error){
               echo $conn->connect_error;
               exit();
            }
            
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
                <table class="table1" id="tblData" border="1">
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
                            <?php echo $i1?>
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
            <?php } ?>
            <script>
                function exporttoexcel(tableID, filename = '') {
                    var downloadLink;
                    var dataType = 'application/vnd.ms-excel';
                    var tableSelect = document.getElementById(tableID);
                    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
                    filename = filename ? filename + '.xls' : 'CV_ConRep.xls';
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
</body>

</html>