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
    <link rel='stylesheet' type='text/css' href='cvbstyle.css' />
    <script src="../../sweetalert2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../../jquery/jquery-ui-1.12.1/jquery-ui.css" />
    <script type="text/javascript" src="../../jquery/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
    <script type="text/javascript" src="../../jquery/jquery-ui-1.12.1/jquery-ui.js"></script>
    <meta charset='UTF-8' />
    <title>CV Branch Report</title>
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
            <li class="active"><a href="cvbranch.php">CV Branch</a></li>
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
                            <li class="subs sub2"><a href="cvphp.php">CV Periodical</a></li>
                            <li class="subs active"><a href="cvbranch.php">CV Branch</a></li>
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
    $startdate=$enddate=$course="";
    if(isset($_GET["page"])){
        $startdate=$_GET["startdate"];
        $startdate=date("d-m-Y",strtotime($startdate));
        $enddate=$_GET["enddate"];
        $enddate=date("d-m-Y",strtotime($enddate));
        $course=$_GET["course"];
    }
    if(isset($_POST["report"])){
        $startdate=$_POST["startdate"];
        $startdate=date("d-m-Y",strtotime($startdate));
        $enddate=$_POST["enddate"];
        $enddate=date("d-m-Y",strtotime($enddate));
        $course=$_POST["course"];
    }
?>
            <div class="box1">
                <form name="myform" autocomplete="off" action="" method="post">
                    <table class="table1">
                        <tr>
                            <th>
                                From:<input type="text" name="startdate" required value="<?php echo $startdate;?>">&ensp;
                                To:<input type="text" name="enddate" required value="<?php echo $enddate;?>">&ensp;
                                Course:<select name="course" required>
                                    <option value="B.Com(GEN)" <?php if($course=="B.Com(GEN)" )echo "selected" ;?> >B.Com(GEN)</option>
                                    <option value="B.Com(CS)" <?php if($course=="B.Com(CS)" )echo "selected" ;?>>B.Com(CS)</option>
                                    <option value="B.Com(A&F)" <?php if($course=="B.Com(A&F)" )echo "selected" ;?>>B.Com(A&amp;F)</option>
                                    <option value="B.Com(BM)" <?php if($course=="B.Com(BM)" )echo "selected" ;?>>B.Com(BM)</option>
                                    <option value="B.Com(CA)" <?php if($course=="B.Com(CA)" )echo "selected" ;?>>B.Com(CA)</option>
                                    <option value="B.Com(ISM)" <?php if($course=="B.Com(ISM)" )echo "selected" ;?>>B.Com(ISM)</option>
                                    <option value="B.B.A" <?php if($course=="B.B.A" )echo "selected" ;?>>B.B.A</option>
                                    <option value="B.Sc.,(CS)" <?php if($course=="B.Sc.,(CS)" )echo "selected" ;?>>B.Sc.,(CS)</option>
                                    <option value="B.C.A" <?php if($course=="B.C.A" )echo "selected" ;?>>B.C.A</option>
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
        }
        if(isset($_GET["page"])){
            $startdate=$_GET["startdate"];
            $startdate=date("Y-m-d",strtotime($startdate));
            $enddate=$_GET["enddate"];
            $enddate=date("Y-m-d",strtotime($enddate));
            $course=$_GET["course"];
        }
    include("../../database/dbconnection.php");
    $conn=new mysqli($servername,$username,$password,$db);
        if($conn->connect_error){
            echo $conn->connect_error;
            exit();
         }
        $sno=1;
        $select = 0;
    $sql="SELECT * FROM feetable where  (feedate BETWEEN '$startdate' AND '$enddate') AND course = '$course' AND  feedate <> '' ORDER BY chno asc";
    $result=$conn->query($sql);
    if(mysqli_num_rows($result) > 0){
        echo "<div class='table2' id=''table2>
         <table>
            <tr>
                <th style='width:45px;'>Sno</th>
                <th>Appl No</th>
                <th>Name</th>
                <th>DOB</th>
                <th>Cmty</th>
                <th>Cutoff</th>
                <th>Selection Date</th>
                <th>Challan no</th>
                <th>Feepaid Date</th>
                <th>CV Status</th>
                <th>Remarks</th>
            </tr>";
        while($row=$result->fetch_assoc()){
         $count = 0;
         $status1 = $row['status'];
        if($status1 != "CV Done"){
         $count = 1;
         $selectiondate=$row['selectiondate'];
         $selectiondate=date("d-m-Y",strtotime($selectiondate));
         $feedate1 = date("d-m-Y",strtotime($row["feedate"]));
        echo "<tr>
             <td>
                 ".$sno++."
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
                 ".$row['cutoff']."
             </td>
             <td>
                 ".$selectiondate."
             </td>
             <td>
                 ".$row['chno']."
             </td>
             <td>
                 ".$feedate1."
             </td>
             <td>
                 ";?>
            <select name="status<?php echo $select++;?>" id="s<?php echo $select;?>" class="sel1" <?php if($status1 == NULL || $status1 == "")echo "style='border-bottom:1px solid black;'";else echo "style='border-bottom:none;'"; if($status1 != "CV Done" && $status1 != "Time Extension" && $status1 != "Not Reported" && $status1 != NULL)echo "hidden"?> >
                <option <?php if($status1=="CV Done" )echo "selected" ;?> value="CV Done">CV Done</option>
                <option <?php if($status1=="Time Extension" )echo "selected" ;?> value="Time Extension">Time Extension</option>
                <option <?php if($status1=="Not Reported" )echo "selected" ;?> value="Not Reported">Not Reported</option>
                <option <?php if($status1 != "CV Done" && $status1 != "Time Extension" && $status1 != "Not Reported" && $status1 != NULL)echo "selected" ;?> value="Other">Other</option>
            </select>
            <div class="text">
            <input type="text" style="width:99px;<?php if($status1 == NULL || $status1 == "")echo "border-bottom:1px solid black;";else echo "border-bottom:none;";?>" name="statust<?php echo $select;?>" id="st<?php echo $select;?>" class="sel1"  <?php if(!($status1 != "CV Done" && $status1 != "Time Extension" && $status1 != "Not Reported" && $status1 != NULL))echo "hidden";?> value = "<?php if(!($status1 != "CV Done" && $status1 != "Time Extension" && $status1 != "Not Reported" && $status1 != NULL))echo "";else echo $status1;?>">
            </div>
            <?php echo "
             </td>
             <td>
                 ".$row['remarks']."
             </td>
         </tr>";
        }
     }
        if($count == 0){
            echo "CV Done already!";
        }
            ?> <div class='submitbtn'>
                <button type="button" name="submit" class="submit" id="submit">Submit</button>
            </div>
            <div class="excelform">
                <form action="cvexcel.php" method="post">
                    <input type="text" name="startdate" value="<?php echo $startdate;?>" hidden/>
                    <input type="text" name="enddate" value="<?php echo $enddate;?>" hidden/>
                    <input type="text" name="course" value="<?php echo $course;?>" hidden/>
                    <input type="submit" name="export_excel" value="Export to Excel" id="excelbtn">
                </form>
            </div>
            
            <?php
        }else{
            echo "0 records found";
    }
    echo "</table></div>";
       $conn->close();
        ?>
            
            <?php
    }else{
    exit();
}
?>
        </div>
    </div>
    <script>
        var select = <?php echo $select;?>;
        var select1 = select;
        $(document).ready(function() {
            while (select1 > 0) {
                var id = "#s" + select1--;
                $(id).change(function() {
                    var id1;
                    var selected = $(this).val();
                    if (selected == "Other") {
                        $(this).hide();
                        id1 = $(this).attr('id');
                        id1 = id1.replace('s','st');
                        document.getElementById(id1).removeAttribute('hidden');
                        document.getElementById(id1).style.borderBottom('1px solid black');
                    }
                });
            }
            $('#submit').click(function() {
                var apl = new Array();
                var sel = new Array();
                var id2 = '';
                var val = '';
                while (select > 0) {
                    var id = "#s" + select--;
                    var s = $(id).val();
                    if(s == "Other"){
                        id2 = $(id).attr('id');
                        id2 = id2.replace('s','st');
                        val = document.getElementById(id2).value;
                        sel.push(val);
                    }else{
                        sel.push(s);
                    }
                    var cursor = $(id).closest('tr');
                    var col1 = cursor.find('td:eq(1)').text();
                    col1 = col1.trim();
                    apl.push(col1);
                }
                apls = JSON.stringify(apl);
                sels = JSON.stringify(sel);
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        myobj = JSON.parse(this.responseText);
                        alert(myobj.r);
                        location.reload();
                    }
                };
                xmlhttp.open("POST", "branchphp.php", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("applnos=" + apls + "&status=" + sels);
            });
        });
    </script>



</body>

</html>