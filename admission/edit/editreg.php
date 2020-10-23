<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: ../../index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="../sweetalert2/sweetalert2.all.min.js"></script>
    <script src="editjs.js"></script>
    <meta charset='UTF-8' />
    <title>Edit</title>
</head>

<body>  
<?php
    if($_SESSION['user'] == "user"){
        echo '<div class="main">
        <ul class="mainnav">
            <li><a href="../registration/registration.php">Registration</a></li>
            <li class="active"><a href="editreg.php">Edit</a></li>
            <li class="right"><a href="../logout/logout.php"><img src="../logout.png"></a></li>
        </ul>
        <br style="clear: both;">
    </div>';
    }else{
        echo '<div class="main">
        <ul class="mainnav">
            <li><a href="../registration/registration.php">Registration</a></li>
            <li class="active"><a href="editreg.php">Edit</a></li>
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
    </div>';
    }
?>
    <div class="box">
        <h1>Search</h1>
        <form name="myform" method="post" onsubmit="return validate()" action="editregistration.php" autocomplete="off">
            <input type="text" name="applno" placeholder="Application no.." required autofocus>
            <input type="submit" value="search" name='search'>
        </form>
    </div>
    <script>
        function validate() {
            var regno = document.forms["myform"]["applno"].value;
            if (/[^0-9]/.test(regno)) {
                swal("Enter the registration number");
                document.forms["myform"]["applno"].value = "";
                document.forms["myform"]["applno"].focus();
                return false;
            }
        }
    </script>
    <?php
       if(!isset($_GET['signup'])){
           exit();
       }else{
            $signup=$_GET['signup'];
            if($signup=="success"){
                    echo "<script>
                       Swal(
                          'Successful',
                          'Form Updated',
                          'success'
                           )
                          </script>";       
             }elseif(\strpos($signup,'sqlerror') !== false){
                 $sqlerrordetail=$_GET['sqlerrordetail'];
                 echo "<script>Swal({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Form not found',
                        footer: '<a href>Why do I have this issue?</a>'
                      })
                      </script>";      
             }elseif(\strpos($signup,'dberror') !== false){
                 $dberrordetail=$_GET['dberrordetail'];
                 echo "<script>Swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Unable to open record, Database error',
                        footer: '<a href>Why do I have this issue?</a>'
                      })
                      </script>";     
             }elseif(\strpos($signup,'updatedberror') !== false){
                 $dberrordetail=$_GET['dberrordetail'];
                 echo "<script>Swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Unable to Update, Database error',
                        footer: '<a href>Why do I have this issue?</a>'
                      })
                      </script>";     
             }elseif(\strpos($signup,'updatesqlerror') !== false){
                 $dberrordetail=$_GET['dberrordetail'];
                 echo "<script>Swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Unable to Update, Sql error',
                        footer: '<a href>Why do I have this issue?</a>'
                      })
                      </script>";     
             }
        }
?>
</body>

</html>