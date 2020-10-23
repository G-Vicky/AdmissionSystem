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
    <title>CV Rep</title>
</head>

<body>
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
    </script>

    <?php
    if($_SESSION["user"] == "cvuser"){
        echo '<div class="main">
        <ul class="mainnav">
            <li class="active"><a href="cvphp.php">CV Report</a></li>
            <li><a href="cvbranch.php">CV Branch</a></li>
            <li><a href="consolidated.php">Consolidated</a></li>
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
                            <li class="subs active"><a href="cvphp.php">CV Periodical</a></li>
                            <li class="subs sub2"><a href="cvbranch.php">CV Branch</a></li>
                            <li class="subs sub2"><a href="consolidated.php">Consolidated</a></li>
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


    <div class='container'>
        <div class="content">

            <?php
    $startdate=$enddate="";
    if(isset($_POST["report"])){
        $startdate1=$_POST["startdate"];
        $startdate=date("d-m-Y",strtotime($startdate1));
        $enddate1=$_POST["enddate"];
        $enddate=date("d-m-Y",strtotime($enddate1));
    }
?>
            <div class="box1">
                <form name="myform" autocomplete="off" action="" method="post">
                    <table class="table1">
                        <tr>
                            <th>
                                From:<input type="text" name="startdate" required value="<?php echo $startdate;?>">
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
        if(isset($_POST["report"])){
            $startdate1=$_POST["startdate"];
            $startdate=date("Y-m-d",strtotime($startdate1));
            $enddate1=$_POST["enddate"];
            $enddate=date("Y-m-d",strtotime($enddate1));
        }
    include("../../database/dbconnection.php");
    $conn=new mysqli($servername,$username,$password,$db);
        if($conn->connect_error){
            echo $conn->connect_error;
            exit();
         }
    $sql="SELECT DISTINCT(cvdate) FROM feetable where (cvdate between '$startdate' AND '$enddate') AND status <> '' ORDER BY cvdate asc";
    $result1=$conn->query($sql);
    if(mysqli_num_rows($result1) > 0){
        echo "<div class='table2'>
         <table>
            <tr>
                <th style='width:99px;'>CV Dates</th>
                <th>B.Com(GEN)</th>
                <th>B.Com(A&F)</th>
                <th>B.Com(BM)</th>
                <th>B.Com(CS)</th>
                <th>B.Com(CA)</th>
                <th>B.Com(ISM)</th>
                <th>B.B.A</th>
                <th>B.Sc(CS)</th>
                <th>B.C.A</th>
                <th>Total</th>
            </tr>";
        while($row1=$result1->fetch_assoc()){
            $cvdates = $row1["cvdate"];
            $cvdates1=date("d-m-Y",strtotime($cvdates));
                    
            $sql = "SELECT * FROM feetable WHERE cvdate = '$cvdates' AND course = 'B.Com(GEN)' AND status = 'CV Done'";
            $result=$conn->query($sql);
            $a1 = mysqli_num_rows($result);
            
            $sql = "SELECT * FROM feetable WHERE cvdate = '$cvdates' AND course = 'B.Com(A&F)' AND status = 'CV Done'";
            $result=$conn->query($sql);
            $b1=mysqli_num_rows($result);
            
    
            $sql = "SELECT * FROM feetable WHERE cvdate = '$cvdates' AND course = 'B.Com(BM)' AND status = 'CV Done'";
            $result=$conn->query($sql);
            $c1= mysqli_num_rows($result);
            
            $sql = "SELECT * FROM feetable WHERE cvdate = '$cvdates' AND course = 'B.Com(CS)' AND status = 'CV Done'";
            $result=$conn->query($sql);
            $d1= mysqli_num_rows($result);
     
            $sql = "SELECT * FROM feetable WHERE cvdate = '$cvdates' AND course = 'B.Com(CA)' AND status = 'CV Done'";
            $result=$conn->query($sql);
            $e1= mysqli_num_rows($result);
                      
            $sql = "SELECT * FROM feetable WHERE cvdate = '$cvdates' AND course = 'B.Com(ISM)' AND status = 'CV Done'";
            $result=$conn->query($sql);
            $f1= mysqli_num_rows($result);
        
            $sql = "SELECT * FROM feetable WHERE cvdate = '$cvdates' AND course = 'B.B.A' AND status = 'CV Done'";
            $result=$conn->query($sql);
            $g1= mysqli_num_rows($result);
                
            $sql = "SELECT * FROM feetable WHERE cvdate = '$cvdates' AND course = 'B.Sc.,(CS)' AND status = 'CV Done'";
            $result=$conn->query($sql);
            $h1= mysqli_num_rows($result);
                
            $sql = "SELECT * FROM feetable WHERE cvdate = '$cvdates' AND course = 'B.C.A' AND status = 'CV Done'";
            $result=$conn->query($sql);
            $i1= mysqli_num_rows($result);
            
            $sql = "SELECT * FROM feetable WHERE cvdate = '$cvdates' AND status = 'CV Done'";
            $result=$conn->query($sql);
            $total= mysqli_num_rows($result);
                
                echo "<tr>
                       <td>
                           $cvdates1
                       </td>
                        <td>
                            $a1
                        </td>
                        <td>
                            $b1
                        </td>
                        <td>
                            $c1
                        </td>
                        <td>
                            $d1
                        </td>
                        <td>
                           $e1
                        </td>
                        <td>
                            $f1
                        </td>
                        <td>
                           $g1
                        </td>
                        <td>
                            $h1
                        </td>
                        <td>
                            $i1
                        </td>
                        <td>
                            ";?><strong><?php echo $total;?></strong><?php
                        echo "</td>
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
    <?php
       if(!isset($_GET['status'])){
           exit();
       }else{
            $signup=$_GET['status'];
            if($signup=="success"){
                    echo "<script>
                       Swal(
                          'Successful',
                          'CV Submitted',
                          'success'
                           )
                          </script>";       
             }elseif($signup=="updated"){
                    echo "<script>
                       Swal(
                          'Successful',
                          'CV Updated',
                          'success'
                           )
                          </script>";       
             }elseif(\strpos($signup,'sqlerror') !== false){
                 $sqlerrordetail=$_GET['sqlerrordetail'];
                 echo "<script>Swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Already submitted today',
                        footer: '<a href>Why do I have this issue?</a>'
                      })
                      </script>";      
             }elseif(\strpos($signup,'dberror') !== false){
                 $dberrordetail=$_GET['dberrordetail'];
                 echo "<script>Swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Unable to submit, Database error',
                        footer: '<a href>Why do I have this issue?</a>'
                      })
                      </script>";     
             }
        }
?>


</body>

</html>