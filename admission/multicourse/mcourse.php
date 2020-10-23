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
    <link rel='stylesheet' type='text/css' href='mystyle.css' />
    <script src="../sweetalert2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../jquery/jquery-ui-1.12.1/jquery-ui.css" />
    <script type="text/javascript" src="../jquery/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
    <script type="text/javascript" src="../jquery/jquery-ui-1.12.1/jquery-ui.js"></script>
    <script src="regjs.js"></script>
    <meta charset='UTF-8' />
    <title>Registration</title>
</head>

<body>
    <div class="main">
        <ul class="mainnav">
            <li><a href="../registration/registration.php">Registration</a></li>
            <li><a href="../edit/editreg.php">Edit</a></li>
            <li><a href="../selection/insert.php">Selection</a></li>
            <li class="active"><a href="mcourse.php">MultiCourse</a></li>
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
                            <li class="subs sub2"><a href="../reports/cv/cvrep.php">CV Periodical</a></li>
                            <li class="subs sub2"><a href="../reports/cv/cvbranch.php">CV Branch</a></li>
                            <li class="subs sub2"><a href="../reports/cv/consolidated.php">Consolidated</a></li>
                        </ul>
                    </li>
                    <li class="subs"><a href="../reports/consolidated.php">Consolidated</a></li>
                </ul>
            </li>
            <li class="hassubs"><a href="javascript:void (0)">Secretary</a>
                <ul class="dropdown">
                    <li class="subs"><a href="../sec_report/report.php">Report</a></li>
                    <li class="subs"><a href="../sec_report/dailyrep.php">Today&ensp;Rep</a></li>
                </ul>
            </li>
            <li><a href="../admin/page.php">Admin</a></li>
            <li class="right"><a href="../logout/logout.php"><img src="../logout.png"></a></li>
        </ul>
        <br style="clear: both;">
    </div>
    <?php
      $regno="";
      if(isset($_POST["submit"])){
          $regno=$_POST["regno"];
      }
    ?>

    <div class='container'>
        <form autocomplete="off" class="myform" action="" method="post">
            <table class="table1">
                <tr>
                    <td>
                        <input type="text" name="regno" value="<?php echo $regno; ?>" autofocus placeholder="Register no.." required>&ensp;&ensp;
                        <input type="submit" name="submit" value="Find">
                    </td>
                </tr>
            </table>
            <?php
    if(isset($_POST["submit"])){
        $regno = $_POST["regno"];
    include("../database/dbconnection.php");
    $conn=new mysqli($servername,$username,$password,$db);
        if($conn->connect_error){
            echo $conn->connect_error;
            exit();
         }                                   
    $sql="SELECT * FROM registration where regno = '$regno'";
    $result=$conn->query($sql);
    $sql1="SELECT * FROM feetable where applno IN (SELECT applno from registration WHERE regno = '$regno')";
    $result1=$conn->query($sql1);
    if(mysqli_num_rows($result) > 0){
        $status="";
        $selectiondate1="";
        echo "<div class='table2'>
         <table>
            <tr>
                <th>Appl No</th>
                <th>Course</th>
                <th>Name</th>
                <th>DOB</th>
                <th>cmty</th>
                <th>percentage</th>
                <th>Selection Date</th>
            </tr>";
        while($row=$result->fetch_assoc()){ 
            if(mysqli_num_rows($result1) > 0){
                while($row1 = $result1->fetch_assoc()){
                    $selectiondate2=$row1['selectiondate'];
                    $selectiondate2=date("d-m-Y",strtotime($selectiondate2));
                    echo "<tr>
                             <td>
                                 ".$row1['applno']."
                             </td>
                             <td>
                                 ".$row1['course']."
                             </td>
                             <td>
                                 ".$row1['name']."
                             </td>
                             <td>
                                 ".$row1['dob']."
                             </td>
                             <td>
                                 ".$row1['community']."
                             </td>
                             <td>
                                 ".$row1['cutoff']."
                             </td>
                             <td>
                                 ".$selectiondate2."
                             </td>
                         </tr>";
                     $status=$row1["applno"];
                }
            }
            if($status != $row['applno']){
                echo "<tr>
                         <td>
                             ".$row['applno']."
                         </td>
                         <td>
                             ".$row['course']."
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
                             ".$row['percentage']."
                         </td>
                          <td>
                              ".$selectiondate1."
                          </td>
                      </tr>";
            }
        }
     }else{
            echo "0 records found";
    }
       $conn->close();
    }else{
    exit();
}
?>
        </form>
    </div>
</body>

</html>