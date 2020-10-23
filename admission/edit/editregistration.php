<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: ../../index.php");
        exit();
    }
    if(isset($_POST['search'])){
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
        }else{
             header("Location: ../admin/page.php");
             exit();
         }
        $applno=$_POST['applno'];
        include("../database/dbconnection.php");        
        $conn=new mysqli($servername,$username,$password,$db);
        if($conn->connect_error){
          header("Location: editreg.php?signup=dberror&dberrordetail=$conn->connect_error");
          exit();
         }
        $sql="SELECT * FROM `registration` WHERE applno=$applno";
        $result=$conn->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){              
                     $regdate=$row["regdate"];
                     $regno=$row["regno"];
                     $course=$row["course"];
                     $applno=$row["applno"];
                     $name=$row["name"];
                     $dob=$row["dob"];
                     $disability=$row["disability"];
                     $mobileno=$row["mobileno"];
                     $fatherno=$row["fatherno"];
                     $community=$row["community"];
                     $board=$row["board"];
                     $yearofpassing=$row["monthofpassing"];
                     $language=$row["language"];
                     $attempt=$row["passedattempt"];
                     $group=$row["XIIgroup"];
                     $subject1=$row["subject1"];
                     $subject2=$row["subject2"];
                     $subject3=$row["subject3"];
                     $subject4=$row["subject4"];
                     $mark1=$row["mark1"];
                     $mark2=$row["mark2"];
                     $mark3=$row["mark3"];
                     $mark4=$row["mark4"];
                     $total=$row["total"];
                     $percentage=$row["percentage"];
                }
                $regdate=date("d-m-Y",strtotime($regdate));
            }else{            
                header("Location: editreg.php?signup=sqlerror&sqlerrordetail=$conn->error");
                exit();
            }
    }else{
        header("Location: editreg.php");
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
    <script src="../registration/regjs.js"></script>
    <meta charset='UTF-8' />
    <title>Edit Registration</title>
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
    <div class='container'>
        <form class='myform' autocomplete='off' onsubmit="return validate()" action='updatereg.php' method='post' name='myform'>
            <div class='box1'>
                <table class='containertable'>
                    <tr>
                        <td>
                            <label for='regdate'>Registration date:</label>
                            <div class='fields'>
                                <input type="text" value="<?php echo $regdate; ?>" name="regdate" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for='regno'>Register no:</label>
                            <div class='fields'>
                                <input type='text' name='regno' required value='<?php echo $regno;?>'>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> <label for='course'>Course:</label>
                            <div class='fields'>
                                <select name="course" required>
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
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for='applno'>Application no:</label>
                            <div class='fields'>
                                <input type='text' name='applno' required value='<?php echo $applno;?>' hidden>
                                <input type='text' name='applno1' required value='<?php echo $applno;?>'>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for='regname'>Name:(in<br /> BLOCK LETTERS)</label>
                            <div class='fields'>
                                <input type='text' name='regname' required value='<?php echo $name; ?>'>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for='dob'>DOB:</label>
                            <div class='fields'>
                                <input type="text" value="<?php echo $dob; ?>" name="dob" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for='disability'>Differently abled</label>
                            <div class='fields'>
                                <input type='radio' name='disability' value='yes' <?php if(isset($disability)&& $disability=="yes" )echo "checked" ; ?> required>Yes &ensp;
                                <input type='radio' name='disability' value='no' <?php if(isset($disability)&& $disability=="no" )echo "checked" ; ?>>No</div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for='mobileno'>Mobile no:</label>
                            <div class='fields'><input type='text' name='mobileno' required maxlength='10' value='<?php echo $mobileno;?>'></div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for='fatherno'>Father contact no:</label>
                            <div class='fields'><input type='text' name='fatherno' maxlength='10' value='<?php echo $fatherno;?>'></div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for='community'>Community:</label>
                            <div class='fields'>
                                <input type='radio' name='community' id='community' value='ST' <?php if(isset($community)&& $community=="ST" )echo 'checked' ;?>>ST&ensp;
                                <input type='radio' name='community' id='community' value='SC' <?php if(isset($community)&& $community=="SC" )echo 'checked' ;?>>SC&ensp;
                                <input type='radio' name='community' id='community' required value='SC(A)' <?php if(isset($community)&& $community=="SC(A)" )echo 'checked' ;?>>SC(A)&ensp;
                                <input type='radio' name='community' id='community' value='DNC' <?php if(isset($community)&& $community=="DNC" )echo 'checked' ;?>>DNC
                            </div>
                            <br>
                            <div class='fields'>
                                <input type='radio' name='community' id='community' value='MBC' <?php if(isset($community)&& $community=="MBC" )echo 'checked' ;?>>MBC&ensp;
                                <input type='radio' name='community' id='community' value='BC' <?php if(isset($community)&& $community=="BC" )echo 'checked' ;?>>BC&ensp;
                                <input type='radio' name='community' id='community' value='BC(M)' <?php if(isset($community)&& $community=="BC(M)" )echo 'checked' ;?>>BC(M)&ensp;
                                <input type='radio' name='community' id='community' value='OC' <?php if(isset($community)&& $community=="OC" )echo 'checked' ;?>>OC
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for='board'>Board:</label>
                            <div class='fields'>
                                <input type='radio' name='board' value='TNHSC' onclick='setboarddetail()' required <?php if(isset($board)&& $board=="TNHSC" )echo 'checked' ;?>>TNHSC &ensp;
                                <input type='radio' name='board' value='CBSE' onclick='setboarddetail()' <?php if(isset($board)&& $board=="CBSE" )echo 'checked' ;?>>CBSE &ensp;
                                <input type='radio' name='board' value='ISC' onclick='setboarddetail()' <?php if(isset($board)&& $board=="ISC" )echo 'checked' ;?>>ISC
                            </div>
                            <br>
                            <div class='fields'>
                                <input type='radio' name='board' value='other' onclick='setboarddetail()' <?php if(isset($board) && !($board=="TNHSC" ) && !($board=="CBSE" ) && !($board=="ISC" ))echo 'checked' ;?>>Other (Specify):
                                <input type='text' name='boarddetail' size='8' value='<?php if(isset($board) && !($board=="TNHSC") && !($board=="CBSE") && !($board=="ISC"))echo "$board";?>'>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for='yearofpassing'>Month &amp; Year of<br> Passing:</label>
                            <div class='fields'>
                                <input type='month' name='yearofpassing' value='<?php echo $yearofpassing;?>' required>
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
                                <input type="radio" name="language" value="Tamil" required <?php if(isset($language) && $language=="Tamil" )echo "checked" ;?>>Tamil&ensp;
                                <input type="radio" name="language" value="English" required <?php if(isset($language) && $language=="English" )echo "checked" ;?>>English&ensp;
                                <input type="radio" name="language" value="Sanskrit" required <?php if(isset($language) && $language=="Sanskrit" )echo "checked" ;?>>Sanskrit&ensp;&ensp;
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='attempt'>&ensp;&ensp;&ensp;&ensp;Passed in 1<sup>st</sup> attempt:</label>
                            <div class='fields'>
                                <input type='radio' name='attempt' value='yes' <?php if(isset($attempt)&& $attempt=="yes" )echo "checked" ;?>>Yes &ensp;
                                <input type='radio' name='attempt' value='no' <?php if(isset($attempt)&& $attempt=="no" )echo "checked" ;?> required>No&ensp;&ensp;
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='column2'>
                                <div class='group'>
                                    &ensp;&ensp;&ensp;<input type='radio' name='group' value='group1' required checked onclick='groupSelection()' <?php if(isset($group)&& $group=="group1" )echo "checked" ;?>>Group I&ensp;
                                    <input type='radio' name='group' value='group2' onclick='groupSelection()' <?php if(isset($group)&& $group=="group2" )echo "checked" ;?>>Group II
                                    &ensp;
                                    <input type='radio' name='group' value='group3' onclick='groupSelection()' <?php if(isset($group)&& $group=="group3" )echo "checked" ;?>>Group III&ensp;
                                    <input type='radio' name='group' value='other' onclick='groupSelection()' <?php if(isset($group)&& $group=="other" )echo "checked" ;?>>Other
                                </div>
                                <br />
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
                                                <input type='text' name='subject1' required value='<?php echo $subject1;?>'>
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
                                                <input type='text' name='mark1' size='8' maxlength='3' value='<?php echo $mark1;?>' onblur="gettotal(); getpercentage();">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <input type='text' name='subject2' readonly required value='<?php echo $subject2;?>'>
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
                                                <input type='text' name='mark2' size='8' maxlength='3' required value='<?php echo $mark2;?>' onblur="gettotal(); getpercentage();">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <input type='text' name='subject3' readonly required value='<?php echo $subject3;?>'>
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
                                                <input type='text' name='mark3' size='8' maxlength='3' value='<?php echo $mark3;?>' onblur="gettotal(); getpercentage();">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <input type='text' name='subject4' value='<?php echo $subject4;?>' required readonly>
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
                                                <input type='text' name='mark4' size='8' maxlength='3' required value='<?php echo $mark4; ?>' onblur="gettotal(); getpercentage();">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label for="total">Total:</label>
                                            </th>
                                            <td>
                                                <input type='text' name='total' size='8' value="<?php echo $total; ?>" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label for="percentage">Percentage:</label>
                                            </th>
                                            <td>
                                                <input type='text' name='percentage' size='8' value="<?php echo $percentage; ?>" readonly>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class='submitbtn'>
                <input type='submit' name='save' value='Save' class='submit'>
            </div>
        </form>
    </div>
    <script>
        var tmax = <?php echo $tmax;?>;
        var tmin = <?php echo $tmin;?>;
        var cmax = <?php echo $cmax;?>;
        var cmin = <?php echo $cmin;?>;

        function validate() {
            var regname = document.forms["myform"]["regname"].value;
            var regno = document.forms["myform"]["regno"].value;
            var applno = document.forms["myform"]["applno"].value;
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
            if (numberpattern.test(applno)) {
                callalert("Enter the Application no.");
                callfocus("applno");
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
                document.forms["myform"]["percentage"].removeAttribute("readonly");
            } else {
                document.forms["myform"]["boarddetail"].removeAttribute("required");
                document.forms["myform"]["boarddetail"].value = "";
            }
            if (document.forms["myform"]["board"].value != "other") {
                document.forms["myform"]["boarddetail"].removeAttribute("required");
                document.forms["myform"]["boarddetail"].value = "";
            }
        }

        function cal() {
            var x = 1;
            alert("hello")
            if (x) {
                gettotal();
                getpercentage();
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
        var group = "<?php echo $group;?>";
        if (group == "other") {
            document.forms["myform"]["sub1"].removeAttribute("required");
            document.forms["myform"]["sub2"].removeAttribute("required");
            document.forms["myform"]["sub3"].removeAttribute("required");
            document.forms["myform"]["sub4"].removeAttribute("required");
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
            document.forms["myform"]["sub1"].value = "<?php echo $subject1;?>";
            document.forms["myform"]["sub2"].value = "<?php echo $subject2;?>";
            document.forms["myform"]["sub3"].value = "<?php echo $subject3;?>";
            document.forms["myform"]["sub4"].value = "<?php echo $subject4;?>";
        }
    </script>
</body>

</html>