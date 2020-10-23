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
    <link rel='stylesheet' type='text/css' href='style.css' />
    <script src="../sweetalert2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../jquery/jquery-ui-1.12.1/jquery-ui.css" />
    <script type="text/javascript" src="../jquery/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
    <script type="text/javascript" src="../jquery/jquery-ui-1.12.1/jquery-ui.js"></script>
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
            <li class="active"><a href="../admin/page.php">Admin</a></li>
            <li class="right"><a href="../logout/logout.php"><img src="../logout.png"></a></li>
        </ul>
        <br style="clear: both;">
    </div>


    <div class='container'>
        <div class="content">
            <form name="myform" autocomplete=off method="post" action="admin.php">
                <div class="table1">
                    <table>
                        <tr>
                            <th>
                                Courses
                            </th>
                            <th>
                                Challan No.
                            </th>
                        </tr>
                        <tr>
                            <th>
                                B.Com(GEN)
                            </th>
                            <td>
                                <input type="text" name="c1" required onfocus="find()">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                B.Com(CS)
                            </th>
                            <td>
                                <input type="text" name="c2" required>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                B.Com(A&amp;F)
                            </th>
                            <td>
                                <input type="text" name="c3" required>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                B.Com(BM)
                            </th>
                            <td>
                                <input type="text" name="c4" required>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                B.Com(CA)
                            </th>
                            <td>
                                <input type="text" name="c5" required>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                B.Com(ISM)
                            </th>
                            <td>
                                <input type="text" name="c6" required>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                B.B.A
                            </th>
                            <td>
                                <input type="text" name="c7" required>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                B.SC.,(CS)
                            </th>
                            <td>
                                <input type="text" name="c8" required>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                B.C.A
                            </th>
                            <td>
                                <input type="text" name="c9" required>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="table2">
                    <table>
                        <tr>
                            <th>
                                Board
                            </th>
                            <th>
                                Min. Mark
                            </th>
                            <th>
                                Max. Mark
                            </th>
                        </tr>
                        <tr>
                            <th>
                                TNHSC
                            </th>
                            <td>
                                <input type="text" name="tmin" required>
                            </td>
                            <td>
                                <input type="text" name="tmax" required>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                CBSE
                            </th>
                            <td>
                                <input type="text" name="cmin" required>
                            </td>
                            <td>
                                <input type="text" name="cmax" required> 
                            </td>
                        </tr>
                    </table>
                </div>
                <div class='submitbtn'>
                    <input type='submit' name='submit' value='Submit' class='submit'>
                </div>
            </form>

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
                          'Submitted',
                          'success'
                           )
                          </script>";       
             }elseif(\strpos($signup,'sqlerror') !== false){
                 $sqlerrordetail=$_GET['sqlerrordetail'];
                 echo "<script>Swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Already submitted',
                        footer: ''
                      })
                      </script>";      
             }elseif(\strpos($signup,'dberror') !== false){
                 $dberrordetail=$_GET['dberrordetail'];
                 echo "<script>Swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Unable to submit, Database error',
                        footer: ''
                      })
                      </script>";     
             }elseif(\strpos($signup,'duplicate') !== false){
                 echo "<script>Swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Record already submitted',
                        footer: ''
                      })
                      </script>";     
             }
        }
?>

    
    

</body>

</html>