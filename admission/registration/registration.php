<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: ../../index.php");
        exit();
    }
    include("../database/dbconnection.php");
    $conn=new mysqli($servername,$username,$password,$db);
    if($conn->connect_error){
            die("Connection error:".$conn->connect_error);
            exit();
    }
    $sql="SELECT * FROM `master`";
     $result=$conn->query($sql);
     if($result->num_rows>0){       
        while($row=$result->fetch_assoc()){
            $tmax = $row["tmax"];
            $tmin = $row["tmin"];
            $cmax = $row["cmax"];
            $cmin = $row["cmin"];
        }
    }
    $conn->close();        
?>
<!DOCTYPE html>
<html lang='en' dir='ltr'>

<head>
    <link rel='stylesheet' type='text/css' href='regstyle.css' />
    <script src="../sweetalert2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../jquery/jquery-ui-1.12.1/jquery-ui.css" />
    <script type="text/javascript" src="../jquery/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
    <script type="text/javascript" src="../jquery/jquery-ui-1.12.1/jquery-ui.js"></script>
    <meta charset='UTF-8' />
    <title>Registration</title>
</head>

<body onload="setdate();">
<?php
    if($_SESSION['user'] == "user"){
        echo '<div class="main">
        <ul class="mainnav">
            <li class="active"><a href="registration.php">Registration</a></li>
            <li><a href="../edit/editreg.php">Edit</a></li>
            <li class="right"><a href="../logout/logout.php"><img src="../logout.png"></a></li>
        </ul>
        <br style="clear: both;">
    </div>';
    }elseif($_SESSION['user'] == "admin"){
        echo '<div class="main">
        <ul class="mainnav">
            <li class="active"><a href="registration.php">Registration</a></li>
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
            <li><a href="../admin/page.php">Admin</a></li>
            <li class="right"><a href="../logout/logout.php"><img src="../logout.png"></a></li>
        </ul>
        <br style="clear: both;">
    </div>';
    }elseif($_SESSION['user'] == "incharge"){
        header("Location: ../selection/insert.php");
    }elseif($_SESSION["user"] == "secretary"){
        header("Location: ../sec_report/report.php");
    }elseif($_SESSION["user"] == "cvuser"){
        header("Location: ../reports/cv/cvrep.php");
    }
?>
    <div class='container'>
        <form class='myform' autocomplete='off' onsubmit="return validate()" action='regphp.php' method='post' name='myform' id="myform">
            <div class='box1'>
                <table class='containertable'>
                    <tr>
                        <td>
                            <label for='regdate'>Registration date:</label>
                            <div class='fields'>
                                <input type="text" id="mydate" name="regdate" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for='regno'>Register no:</label>
                            <div class='fields'>
                                <input type='text' maxlength="9" name='regno' required onblur="find()"  autofocus>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> <label for='course'>Course:</label>
                            <div class='fields'>
                                <select name="course" required>
                                    <option value="B.Com(GEN)">B.Com(GEN)</option>
                                    <option value="B.Com(CS)">B.Com(CS)</option>
                                    <option value="B.Com(A&F)">B.Com(A&amp;F)</option>
                                    <option value="B.Com(BM)">B.Com(BM)</option>
                                    <option value="B.Com(CA)">B.Com(CA)</option>
                                    <option value="B.Com(ISM)">B.Com(ISM)</option>
                                    <option value="B.B.A">B.B.A</option>
                                    <option value="B.Sc.,(CS)">B.Sc.,(CS)</option>
                                    <option value="B.C.A">B.C.A</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td>
                            <label for='applno'>Application no:</label>
                            <div class='fields'>
                                <input type='text' name='applno' maxlength="4" required id="applno">
                            </div>
                        </td>
                    </tr> -->
                    <tr>
                        <td>
                            <label for='regname'>Name:(in<br /> BLOCK LETTERS)</label>
                            <div class='fields'>
                                <input type='text' name='regname' required placeholder="(eg: VIGNESH G S)">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='dob'>DOB:</label>
                            <div class='fields'>
                                <input type="text" value="01-01-2002" name="dob" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='disability'>Differently abled</label>
                            <div class='fields'>
                                <input type='radio' name='disability' value='yes' required>Yes &ensp;
                                <input type='radio' name='disability' value='no' checked>No
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='mobileno'>Mobile no:</label>
                            <div class='fields'>
                                <input type='text' name='mobileno' required maxlength='10'>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='fatherno'>Father contact no:</label>
                            <div class='fields'>
                                <input type='text' name='fatherno' maxlength='10'>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='community'>Community:</label>
                            <div class='fields'>
                                <input type='radio' name='community' id='community' value='ST'>ST&ensp;&ensp;&ensp;
                                <input type='radio' name='community' id='community' value='SC'>SC&ensp;
                                <input type='radio' name='community' id='community' required value='SC(A)'>SC(A)&ensp;
                                <input type='radio' name='community' id='community' value='DNC'>DNC
                            </div>
                            <br>
                            <div class='fields'>
                                <input type='radio' name='community' id='community' value='MBC'>MBC&ensp;
                                <input type='radio' name='community' id='community' value='BC'>BC&ensp;
                                <input type='radio' name='community' id='community' value='BC(M)'>BC(M)&ensp;
                                <input type='radio' name='community' id='community' value='OC' checked>OC&ensp;
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='board'>Board:</label>
                            <div class='fields'>
                                <input type='radio' name='board' value='TNHSC' onclick='setboarddetail()' required checked>TNHSC &ensp;
                                <input type='radio' name='board' value='CBSE' onclick='setboarddetail()'>CBSE &ensp;
                                <input type='radio' name='board' value='ISC' onclick='setboarddetail()'>ISC
                            </div>
                            <br>
                            <div class='fields'>
                                <input type='radio' name='board' value='other' onclick='setboarddetail()'>Other (Specify): <input type='text' name='boarddetail' size='8'>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='yearofpassing'>Month &amp; Year of<br> Passing:</label>
                            <div class='fields'>
                                <input type='month' name='yearofpassing' value="2019-03" required>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class='box2'>
                <table>
                    <tr>
                        <td>
                            <label for="language">&ensp;&ensp;&ensp;&ensp;Language:</label>
                            <div class="fields">
                                <input type="radio" name="language" value="Tamil" required checked>Tamil&ensp;
                                <input type="radio" name="language" value="English" required>English&ensp;
                                <input type="radio" name="language" value="Sanskrit" required>Sanskrit&ensp;&ensp;
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='attempt'>&ensp;&ensp;&ensp;&ensp;Passed in 1<sup>st</sup> attempt:</label>
                            <div class='fields'>
                                <input type='radio' name='attempt' value='yes' checked>Yes &ensp;
                                <input type='radio' name='attempt' value='no' required>No&ensp;&ensp;
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='column2'>
                                <div class='group'>
                                    &ensp;&ensp;&ensp;<input type='radio' name='group' value='group1' required checked onclick='groupSelection()'>Group I&ensp;
                                    <input type='radio' name='group' value='group2' onclick='groupSelection()'>Group II
                                    &ensp;
                                    <input type='radio' name='group' value='group3' onclick='groupSelection()'>Group III&ensp;
                                    <input type='radio' name='group' value='other' onclick='groupSelection()'>Other
                                </div>
                                <div class='marktable'>
                                    <table>
                                        <tr>
                                            <th>
                                                Subjects
                                            </th>
                                            <th>
                                                Marks Obtained
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <input type='text' name='subject1' id="subject1" value='Biology' readonly>
                                                <input type="text" list="sub1" name="sub1" hidden autocomplete="on">
                                                <datalist id="sub1">
                                                    <option value="Biology">
                                                    <option value="Maths">
                                                    <option value="Chemistry">
                                                    <option value="Computer Science">
                                                    <option value="Physics">
                                                    <option value="Accountancy">
                                                    <option value="Commerce">
                                                    <option value="Business Studies">
                                                    <option value="Economics">
                                                </datalist>
                                            </th>
                                            <td>
                                                <input type='text' name='mark1' size='8' maxlength='3' min="0" max="100" required onblur="gettotal(); getpercentage();">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <input type='text' name='subject2' value='Maths' readonly>
                                                <input type="text" list="sub2" name="sub2" hidden autocomplete="on">
                                                <datalist id="sub2">
                                                    <option value="Biology">
                                                    <option value="Maths">
                                                    <option value="Chemistry">
                                                    <option value="Computer Science">
                                                    <option value="Physics">
                                                    <option value="Accountancy">
                                                    <option value="Commerce">
                                                    <option value="Business Studies">
                                                    <option value="Economics">
                                                </datalist>
                                            </th>
                                            <td>
                                                <input type='text' name='mark2' size='8' maxlength='3' min="0" max="100" required onblur="gettotal(); getpercentage();">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <input type='text' name='subject3' value='Chemistry' readonly>
                                                <input type="text" list="sub3" name="sub3" hidden autocomplete="on">
                                                <datalist id="sub3">
                                                    <option value="Biology">
                                                    <option value="Maths">
                                                    <option value="Chemistry">
                                                    <option value="Computer Science">
                                                    <option value="Physics">
                                                    <option value="Accountancy">
                                                    <option value="Commerce">
                                                    <option value="Business Studies">
                                                    <option value="Economics">
                                                </datalist>
                                            </th>
                                            <td>
                                                <input type='text' name='mark3' size='8' maxlength='3' min="0" max="100" required onblur="gettotal(); getpercentage();">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <input type='text' name='subject4' value='Physics' readonly>
                                                <input type="text" list="sub4" name="sub4" hidden autocomplete="on">
                                                <datalist id="sub4">
                                                    <option value="Biology">
                                                    <option value="Maths">
                                                    <option value="Chemistry">
                                                    <option value="Computer Science">
                                                    <option value="Physics">
                                                    <option value="Accountancy">
                                                    <option value="Commerce">
                                                    <option value="Business Studies">
                                                    <option value="Economics">
                                                </datalist>
                                            </th>
                                            <td>
                                                <input type='text' name='mark4' size='8' maxlength='3' min="0" max="100" required onblur="gettotal(); getpercentage();">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label for="total">Total:</label>
                                            </th>
                                            <td>
                                                <input type='text' name='total' size='8' onclick="gettotal(); getpercentage();">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label for="percentage">Percentage:</label>
                                            </th>
                                            <td>
                                                <input type='text' name='percentage' size='8' onclick="gettotal(); getpercentage();">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                <span id="success"></span>
            </div>
            <div class='submitbtn'>
                <input type='submit' name='submit' value='Submit' class='submit'>
            </div>
        </form>
    </div>
    <script>
        function setdate() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        today = dd + "-" + mm + "-" + yy;
        document.forms["myform"]["regdate"].value = today;
    }
        
        var tmax = <?php echo $tmax;?>;
        var tmin = <?php echo $tmin;?>;
        var cmax = <?php echo $cmax;?>;
        var cmin = <?php echo $cmin;?>;

        function validate() {
            var regname = document.forms["myform"]["regname"].value;
            var regno = document.forms["myform"]["regno"].value;
            var mobileno = document.forms["myform"]["mobileno"].value;
            var fatherno = document.forms["myform"]["fatherno"].value;
            var mark1 = document.forms["myform"]["mark1"].value;
            var mark2 = document.forms["myform"]["mark2"].value;
            var mark3 = document.forms["myform"]["mark3"].value;
            var mark4 = document.forms["myform"]["mark4"].value;
            var boarddetail = document.forms["myform"]["boarddetail"].value;
            var board = document.forms["myform"]["board"].value;
            var sub1 = document.forms["myform"]["sub1"].value;
            var sub2 = document.forms["myform"]["sub2"].value;
            var sub3 = document.forms["myform"]["sub3"].value;
            var sub4 = document.forms["myform"]["sub4"].value;
            var numberpattern = /[^0-9]/;
            var namepattern = /[^A-Z]$/i;

            if (namepattern.test(regname)) {
                callalert("Enter the Name in BLOCK LETTERS");
                callfocus("regname");
                return false;
            }
            if (/[^A-Z]$/i.test(boarddetail)) {
                callalert("Enter the Board detail");
                callfocus("boarddetail");
                return false;
            }
            if (numberpattern.test(regno)) {
                callalert("Enter the Register no.");
                callfocus("regno");
                return false;
            }
            if (numberpattern.test(mobileno)) {
                callalert("Enter the mobile number");
                callfocus("mobileno");
                return false;
            }
            if (numberpattern.test(fatherno)) {
                callalert("Enter the father contact number");
                callfocus("fatherno");
                return false;
            }
            if (numberpattern.test(mark1)) {
                callalert("Enter the mark in subject 1");
                callfocus("mark1");
                return false;
            }
            if (numberpattern.test(mark2)) {
                callalert("Enter the mark mark in subject 2");
                callfocus("mark2");
                return false;
            }
            if (numberpattern.test(mark3)) {
                callalert("Enter the mark mark in subject 3");
                callfocus("mark3");
                return false;
            }
            if (numberpattern.test(mark4)) {
                callalert("Enter the mark mark in subject 4");
                callfocus("mark4");
                return false;
            }
            if (board != "other") {
                if (board == "TNHSC") {
                    if ((mark1 > 0 && mark1 < tmin) || mark1 > tmax) {
                        callalert("Enter Mark between " + tmin + " - " + tmax);
                        callfocus("mark1");
                        return false;
                    }
                    if ((mark2 > 0 && mark2 < tmin) || mark2 > tmax) {
                        callalert("Enter Mark between " + tmin + " - " + tmax);
                        callfocus("mark2");
                        return false;
                    }
                    if ((mark3 > 0 && mark3 < tmin) || mark3 > tmax) {
                        callalert("Enter Mark between " + tmin + " - " + tmax);
                        callfocus("mark3");
                        return false;
                    }
                    if ((mark4 > 0 && mark4 < tmin) || mark4 > tmax) {
                        callalert("Enter Mark between " + tmin + " - " + tmax);
                        callfocus("mark4");
                        return false;
                    }
                }
                if (board != "TNHSC") {
                    if ((mark1 > 0 && mark1 < cmin) || mark1 > cmax) {
                        callalert("Enter Mark between " + cmin + " - " + cmax);
                        callfocus("mark1");
                        return false;
                    }
                    if ((mark2 > 0 && mark2 < cmin) || mark2 > cmax) {
                        callalert("Enter Mark between " + cmin + " - " + cmax);
                        callfocus("mark2");
                        return false;
                    }
                    if ((mark3 > 0 && mark3 < cmin) || mark3 > cmax) {
                        callalert("Enter Mark between " + cmin + " - " + cmax);
                        callfocus("mark3");
                        return false;
                    }
                    if ((mark4 > 0 && mark4 < cmin) || mark4 > cmax) {
                        callalert("Enter Mark between " + cmin + " - " + cmax);
                        callfocus("mark4");
                        return false;
                    }
                }
            }
            if (/[^A-Z]$/i.test(sub1)) {
                callalert("Enter the subject1");
                callfocus("sub1");
                return false;
            }
            if (/[^A-Z]$/i.test(sub2)) {
                callalert("Enter the subject2");
                callfocus("sub2");
                return false;
            }
            if (/[^A-Z]$/i.test(sub3)) {
                callalert("Enter the subject3");
                callfocus("sub3");
                return false;
            }
            if (/[^A-Z]$/i.test(sub4)) {
                callalert("Enter the subject4");
                callfocus("sub4");
                return false;
            }
            if(!confirm("Are you sure you want to submit")) {
                return false;
            }
        }

        function callalert(message) {
            swal(message);
        }

        function callfocus(element) {
            document.forms["myform"][element].focus();
            document.forms["myform"][element].value = "";
        }

        function groupSelection() {
            var group = document.forms["myform"]["group"].value;
            if (group == "group1") {
                document.forms["myform"]["sub1"].removeAttribute("required");
                document.forms["myform"]["sub2"].removeAttribute("required");
                document.forms["myform"]["sub3"].removeAttribute("required");
                document.forms["myform"]["sub4"].removeAttribute("required");
                document.forms['myform']['sub1'].hidden = true;
                document.forms['myform']['sub2'].hidden = true;
                document.forms['myform']['sub3'].hidden = true;
                document.forms['myform']['sub4'].hidden = true;
                document.forms["myform"]["subject1"].hidden = false;
                document.forms["myform"]["subject2"].hidden = false;
                document.forms["myform"]["subject3"].hidden = false;
                document.forms["myform"]["subject4"].hidden = false;
                document.forms["myform"]["subject1"].value = "Biology";
                document.forms["myform"]["subject2"].value = "Maths";
                document.forms["myform"]["subject3"].value = "Chemistry";
                document.forms["myform"]["subject4"].value = "Physics";
                document.forms["myform"]["subject1"].setAttribute("readonly", "");
                document.forms["myform"]["subject2"].setAttribute("readonly", "");
                document.forms["myform"]["subject3"].setAttribute("readonly", "");
                document.forms["myform"]["subject4"].setAttribute("readonly", "");
            }
            if (group == "group2") {
                document.forms["myform"]["sub1"].removeAttribute("required");
                document.forms["myform"]["sub2"].removeAttribute("required");
                document.forms["myform"]["sub3"].removeAttribute("required");
                document.forms["myform"]["sub4"].removeAttribute("required");
                document.forms['myform']['sub1'].hidden = true;
                document.forms['myform']['sub2'].hidden = true;
                document.forms['myform']['sub3'].hidden = true;
                document.forms['myform']['sub4'].hidden = true;
                document.forms["myform"]["subject1"].hidden = false;
                document.forms["myform"]["subject2"].hidden = false;
                document.forms["myform"]["subject3"].hidden = false;
                document.forms["myform"]["subject4"].hidden = false;
                document.forms["myform"]["subject1"].value = "Computer Science";
                document.forms["myform"]["subject2"].value = "Maths";
                document.forms["myform"]["subject3"].value = "Chemistry";
                document.forms["myform"]["subject4"].value = "Physics";
                document.forms["myform"]["subject1"].setAttribute("readonly", "");
                document.forms["myform"]["subject2"].setAttribute("readonly", "");
                document.forms["myform"]["subject3"].setAttribute("readonly", "");
                document.forms["myform"]["subject4"].setAttribute("readonly", "");
            }
            if (group == "group3") {
                document.forms["myform"]["sub1"].removeAttribute("required");
                document.forms["myform"]["sub2"].removeAttribute("required");
                document.forms["myform"]["sub3"].removeAttribute("required");
                document.forms["myform"]["sub4"].removeAttribute("required");
                document.forms['myform']['sub1'].hidden = true;
                document.forms['myform']['sub2'].hidden = true;
                document.forms['myform']['sub3'].hidden = true;
                document.forms['myform']['sub4'].hidden = true;
                document.forms["myform"]["subject1"].hidden = false;
                document.forms["myform"]["subject2"].hidden = false;
                document.forms["myform"]["subject3"].hidden = false;
                document.forms["myform"]["subject4"].hidden = false;
                document.forms["myform"]["subject1"].value = "Accountacy";
                document.forms["myform"]["subject2"].value = "Business studies";
                document.forms["myform"]["subject3"].value = "Economics";
                document.forms["myform"]["subject4"].value = "Commerce";
                document.forms["myform"]["subject1"].setAttribute("readonly", "");
                document.forms["myform"]["subject2"].setAttribute("readonly", "");
                document.forms["myform"]["subject3"].setAttribute("readonly", "");
                document.forms["myform"]["subject4"].setAttribute("readonly", "");
            }
            if (group == "other") {
                document.forms["myform"]["subject1"].hidden = true;
                document.forms['myform']['sub1'].hidden = false;
                document.forms['myform']['sub1'].style.borderBottom = "1px solid #333333";
                document.forms["myform"]["subject2"].hidden = true;
                document.forms['myform']['sub2'].hidden = false;
                document.forms['myform']['sub2'].style.borderBottom = "1px solid #333333";
                document.forms["myform"]["subject3"].hidden = true;
                document.forms['myform']['sub3'].hidden = false;
                document.forms['myform']['sub3'].style.borderBottom = "1px solid #333333";
                document.forms["myform"]["subject4"].hidden = true;
                document.forms['myform']['sub4'].hidden = false;
                document.forms['myform']['sub4'].style.borderBottom = "1px solid #333333";
                document.forms["myform"]["sub1"].setAttribute("required", "");
                document.forms["myform"]["sub2"].setAttribute("required", "");
            }
        }

        function setboarddetail() {
            if (document.forms["myform"]["board"].value == "other") {
                callfocus("boarddetail");
                document.forms["myform"]["boarddetail"].setAttribute("required", "");
            } else {
                document.forms["myform"]["boarddetail"].removeAttribute("required");
                document.forms["myform"]["boarddetail"].value = "";
            }
            if (document.forms["myform"]["board"].value != "other") {
                document.forms["myform"]["boarddetail"].removeAttribute("required");
                document.forms["myform"]["boarddetail"].value = "";
            }
        }

        function gettotal() {
            var mark1 = document.forms["myform"]["mark1"].value;
            var mark2 = document.forms["myform"]["mark2"].value;
            var mark3 = document.forms["myform"]["mark3"].value;
            var mark4 = document.forms["myform"]["mark4"].value;
            var numberpattern = /[^0-9]/;
            var total = 0;

            if (numberpattern.test(mark1)) {
                callalert("Enter the mark in subject 1");
                callfocus("mark1");
            }
            if (numberpattern.test(mark2)) {
                callalert("Enter the mark in subject 2");
                callfocus("mark2");
            }
            if (numberpattern.test(mark3)) {
                callalert("Enter the mark in subject 3");
                callfocus("mark3");
            }
            if (numberpattern.test(mark4)) {
                callalert("Enter the mark in subject 4");
                callfocus("mark4");
            }

            if (mark1 == "") {
                mark1 = 0;
            } else {
                mark1 = parseInt(mark1);
            }
            if (mark2 == "") {
                mark2 = 0;
            } else {
                mark2 = parseInt(mark2);
            }
            if (mark3 == "") {
                mark3 = 0;
            } else {
                mark3 = parseInt(mark3);
            }
            if (mark4 == "") {
                mark4 = 0;
            } else {
                mark4 = parseInt(mark4);
            }
            total = mark1 + mark2 + mark3 + mark4;
            if (isNaN(total)) {
                total = "";
            }
            document.forms["myform"]["total"].value = total;
            if (total == 0) {
                document.forms["myform"]["percentage"].value = "0%";
            }
        }

        function getpercentage() {
            var mark1 = document.forms["myform"]["mark1"].value;
            var mark2 = document.forms["myform"]["mark2"].value;
            var mark3 = document.forms["myform"]["mark3"].value;
            var mark4 = document.forms["myform"]["mark4"].value;
            var total = 0;
            var per = 0;
            var x = 0;
            var tper = 0;
            var cper = 0;
            var numberpattern = /[^0-9]/;

            if (numberpattern.test(mark1)) {
                callalert("Enter the mark in subject 1");
                callfocus("mark1");
            }
            if (numberpattern.test(mark2)) {
                callalert("Enter the mark in subject 2");
                callfocus("mark2");
            }
            if (numberpattern.test(mark3)) {
                callalert("Enter the mark in subject 3");
                callfocus("mark3");
            }
            if (numberpattern.test(mark4)) {
                callalert("Enter the mark in subject 4");
                callfocus("mark4");
            }
            if (mark1 == "" || mark1 == 0) {
                mark1 = 0;
            } else {
                mark1 = parseInt(mark1);
                x++;
            }
            if (mark2 == "" || mark2 == 0) {
                mark2 = 0;
            } else {
                mark2 = parseInt(mark2);
                x++;
            }
            if (mark3 == "" || mark3 == 0) {
                mark3 = 0;
            } else {
                mark3 = parseInt(mark3);
                x++;
            }
            if (mark4 == "" || mark4 == 0) {
                mark4 = 0;
            } else {
                mark4 = parseInt(mark4);
                x++;
            }
            total = mark1 + mark2 + mark3 + mark4;
            if (tmax == 200) {
                tper = 8;
            } else {
                tper = 4;
            }
            if (document.forms["myform"]["board"].value == "TNHSC") {
                per = total / tper;
            } else {
                per = total / x;
            }

            if (isNaN(per)) {
                per = "";
            }
            document.forms["myform"]["percentage"].value = per.toFixed(2) + "%";
        }

       



        function find() {
            var regno = document.forms["myform"]["regno"].value;
            dbparam = JSON.stringify(regno);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    myobj = JSON.parse(this.responseText);
                    if (myobj.name != "") {
                        setdate();
                        document.forms["myform"]["regno"].value = myobj.regno;
                        document.forms["myform"]["course"].value = myobj.course;
                        document.forms["myform"]["regname"].value = myobj.name;
                        document.forms["myform"]["dob"].value = myobj.dob;
                        document.forms["myform"]["disability"].value = myobj.disability;
                        document.forms["myform"]["mobileno"].value = myobj.mobileno;
                        document.forms["myform"]["fatherno"].value = myobj.fatherno;
                        document.forms["myform"]["community"].value = myobj.community;
                        if (myobj.board != "TNHSC" && myobj.board != "CBSE" && myobj.board != "ISC") {
                            document.forms["myform"]["board"].value = "other";
                            document.forms["myform"]["boarddetail"].value = myobj.board;
                        } else {
                            document.forms["myform"]["board"].value = myobj.board;
                        }
                        document.forms["myform"]["yearofpassing"].value = myobj.monthofpassing;
                        document.forms["myform"]["language"].value = myobj.language;
                        document.forms["myform"]["attempt"].value = myobj.passedattempt;
                        document.forms["myform"]["group"].value = myobj.XIIgroup;
                        if (myobj.XIIgroup == "other") {
                            document.forms["myform"]["subject1"].hidden = true;
                            document.forms["myform"]["subject2"].hidden = true;
                            document.forms["myform"]["subject3"].hidden = true;
                            document.forms["myform"]["subject4"].hidden = true;
                            document.forms['myform']['sub1'].hidden = false;
                            document.forms['myform']['sub2'].hidden = false;
                            document.forms['myform']['sub3'].hidden = false;
                            document.forms['myform']['sub4'].hidden = false;
                            document.forms['myform']['sub1'].style.borderBottom = "1px solid #333333";
                            document.forms['myform']['sub2'].style.borderBottom = "1px solid #333333";
                            document.forms['myform']['sub3'].style.borderBottom = "1px solid #333333";
                            document.forms['myform']['sub4'].style.borderBottom = "1px solid #333333";
                            document.forms["myform"]["sub1"].value = myobj.subject1;
                            document.forms["myform"]["sub2"].value = myobj.subject2;
                            document.forms["myform"]["sub3"].value = myobj.subject3;
                            document.forms["myform"]["sub4"].value = myobj.subject4;
                        } else {
                            document.forms["myform"]["subject1"].value = myobj.subject1;
                            document.forms["myform"]["subject2"].value = myobj.subject2;
                            document.forms["myform"]["subject3"].value = myobj.subject3;
                            document.forms["myform"]["subject4"].value = myobj.subject4;
                        }
                        document.forms["myform"]["mark1"].value = myobj.mark1;
                        document.forms["myform"]["mark2"].value = myobj.mark2;
                        document.forms["myform"]["mark3"].value = myobj.mark3;
                        document.forms["myform"]["mark4"].value = myobj.mark4;
                        document.forms["myform"]["total"].value = myobj.total;
                        document.forms["myform"]["percentage"].value = myobj.percentage;
                        if (myobj.courses.indexOf(",") !== -1) {
                            Swal.fire(
                                'Already applied for:',
                                myobj.courses,
                                'warning'
                            );
                        }
                    }
                }
            };
            xmlhttp.open("POST", "fetchrecord.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("x=" + dbparam);
        }
        $(document).ready(function() {
            $("input[name='regdate'],input[name='dob']").datepicker({
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
       if(!isset($_GET['signup'])){
           exit();
       }else{
                $signup=$_GET['signup'];
            if($signup=="success"){
                echo '<script>
                $("#success").fadeIn().html("Successfully submitted");
                setTimeout(function(){
                    $("#success").fadeOut("slow");
                }, 2000);
                document.forms["myform"]["regno"].focus();
              </script>';  
             }elseif(\strpos($signup,'sqlerror') !== false){
                 $sqlerrordetail=$_GET['sqlerrordetail'];
                 echo "<script>Swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Record already exists!',
                        footer: '<a href>Why do I have this issue?</a>'
                      })
                      </script>";      
             }elseif(\strpos($signup,'dberror') !== false){
                 $dberrordetail=$_GET['dberrordetail'];
                 echo "<script>Swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Unable to submit form ',
                        footer: '<a href>Why do I have this issue?</a>'
                      })
                      </script>";     
             }
        }
    
    ?>
</body>

</html>