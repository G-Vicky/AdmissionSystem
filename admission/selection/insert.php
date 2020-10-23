<?php
    session_start();
    if(!isset($_SESSION['user']) || $_SESSION['user'] == "user" ){
        header("Location: ../../index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <link rel='stylesheet' type='text/css' href="insertstyle.css" />
    <script src="../sweetalert2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../jquery/jquery-ui-1.12.1/jquery-ui.css" />
    <script type="text/javascript" src="../jquery/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
    <script type="text/javascript" src="../jquery/jquery-ui-1.12.1/jquery-ui.js"></script>
    <meta charset='UTF-8' />
    <title>Selection</title>
</head>

<body onload="setdate()">
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
            document.forms["myform"]["selectiondate"].value = today;
        }
        $(document).ready(function(){
            $("input[name='selectiondate'],input[name='dob'],input[name='feedate'],input[name='cvdate']").datepicker({
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
        <?php
        if($_SESSION["user"] == "incharge"){
            echo '<ul class="mainnav">
            <li class="active"><a href="insert.php">Selection</a></li>
            <li><a href="../reports/consolidated.php">Consolidated</a></li>
            <li class="right"><a href="../logout/logout.php"><img src="../logout.png"></a></li>
        </ul>
        <br style="clear: both;">';
        }else{
            echo '<ul class="mainnav">
            <li><a href="../registration/registration.php">Registration</a></li>
            <li><a href="../edit/editreg.php">Edit</a></li>
            <li class="active"><a href="insert.php">Selection</a></li>
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
        <br style="clear: both;">';
        }
        ?>
    </div>

    <div class="container">
        <div class="marks" id="marks">
            <h2>Marks</h2>
            <table>
                <tr>
                    <th>
                        Subjects
                    </th>
                    <th>
                        Marks obtained
                    </th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="subject1" form="myform">
                    </td>
                    <td>
                        <input type="text" name="mark1" size="2" form="myform">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="subject2" form="myform">
                    </td>
                    <td>
                        <input type="text" name="mark2" size="2" form="myform">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="subject3" form="myform">
                    </td>
                    <td>
                        <input type="text" name="mark3" size="2" form="myform">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="subject4" form="myform">
                    </td>
                    <td>
                        <input type="text" name="mark4" size="2" form="myform">
                    </td>
                </tr>
                <tr>
                    <th>
                        Total:
                    </th>
                    <td>
                        <input type="text" name="total" size="2" form="myform">
                    </td>
                </tr>
            </table>
        </div>
        <form id="myform" name="myform" autocomplete="off" class="myform" method="post" action="insertrecord.php" onsubmit="return validate()">
            <div class="tablediv">
                <span id="span"></span>
                <table>
                    <tr>
                        <td>
                            <label for="regno">Application no:</label>
                            <div class="fields get">
                                <input type="text" name="applno" id="search" onblur="find()" autofocus required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="course">Course:</label>
                            <div class="fields">
                                <input type="text" name="course" required readonly>
                                <select name="course1" required hidden>
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
                    <tr>
                        <td>
                            <label for="name">Name:</label>
                            <div class="fields">
                                <input type="text" name="name" required readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="dob">DOB:</label>
                            <div class="fields">
                                <input type="text" name="dob" required readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="community">Community:</label>
                            <div class="fields">
                                <input type="text" name="community" required readonly>
                                <select name="community1" required hidden>
                                    <option value="OC">OC</option>
                                    <option value="BC(M)">BC(M)</option>
                                    <option value="BC">BC</option>
                                    <option value="MBC">MBC</option>
                                    <option value="DNC">DNC</option>
                                    <option value="SC(A)">SC(A)</option>
                                    <option value="SC">SC</option>
                                    <option value="ST">ST</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="board">Board:</label>
                            <div class="fields">
                                <input type="text" name="board" required readonly>
                                <select name="board1" required hidden>
                                    <option value="TNHSC">TNHSC</option>
                                    <option value="CBSE">CBSE</option>
                                    <option value="ISC">ISC</option>
                                    <option value="vicky">Others</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="cutoff">Cutoff:</label>
                            <div class="fields">
                                <input type="text" name="cutoff" size="4" class="rt" required readonly>
                                <button type="button" class="markbtn" name="mybtn" id="myBtn" disabled onclick="show()">View marks</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="language">Language:</label>
                            <div class="fields">
                                <input type="text" name="language" required readonly>
                                <select name="language1" required hidden>
                                    <option value="Tamil">Tamil</option>
                                    <option value="English">English</option>
                                    <option value="Sanskrit">Sanskrit</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="selectdate">Selection date:</label>
                            <div class="fields">
                                <input type="text" name="selectiondate" id="selectdate" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="chno">Challan no:</label>
                            <div class="fields">
                                <input type="text" name="chno" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="feedate">Fee date:</label>
                            <div class="fields get">
                                <input type="text" name="feedate">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="cvdate">CV date:</label>
                            <div class="fields get">
                                <input type="text" name="cvdate">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="palno">PAL no:</label>
                            <div class="fields get">
                                <input type="text" name="palno">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="remarks">Remarks:</label>
                            <div id="message"><span id="success"></span></div>
                            <div class="fields get">
                                <input type="text" name="remarks">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="submitbtn">
                <input type="submit" value="SELECT" name="submit">
            </div>
            <div class="cancel">
                <input type="button" value="CANCEL" onclick="resetform()" name="canel">
            </div>
        </form>
    </div>
    <script>
        function validate(){
            var rname=document.forms["myform"]["name"].value;
            if(rname == "" || rname == null){
                swal("Unable to Select!");
                return false;
            }
        }
        function show() {
            var displaystyle = document.getElementById("marks").style.getPropertyValue("display");
            if (displaystyle == "none" || displaystyle == "") {
                document.getElementById("marks").style.display = "block";
            } else {
                document.getElementById("marks").style.display = "none";
            }
        }

        function resetform() {
            document.forms["myform"].reset();
            document.getElementById("marks").style.display = "none";
        }
        function find() {
            var applno = document.forms["myform"]["applno"].value;
            if (applno != "") {
                dbparam = JSON.stringify(applno);
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        myobj = JSON.parse(this.responseText);
                        if (myobj.name != "") {
                            if (myobj.submit == "UPDATE") {
                                document.forms["myform"]["course1"].value = myobj.course;
                                document.forms["myform"]["community1"].value = myobj.community;
                                document.forms["myform"]["language1"].value = myobj.language;
                                if (myobj.board != "TNHSC" && myobj.board != "CBSE" && myobj.board != "ISC") {
                                    document.forms["myform"]["board1"].value = "vicky";
                                } else {
                                    document.forms["myform"]["board1"].value = myobj.board;
                                }
                                document.forms["myform"]["course"].hidden = true;
                                document.forms["myform"]["course1"].hidden = false;
                                document.forms["myform"]["community"].hidden = true;
                                document.forms["myform"]["community1"].hidden = false;
                                document.forms["myform"]["board"].hidden = true;
                                document.forms["myform"]["board1"].hidden = false;
                                document.forms["myform"]["language"].hidden = true;
                                document.forms["myform"]["language1"].hidden = false;
                                document.forms["myform"]["name"].removeAttribute("readonly");
                                document.forms["myform"]["dob"].removeAttribute("readonly");
                                document.getElementById('myBtn').disabled = true;
                            }else{
                                document.getElementById('myBtn').disabled = false;
                            }
                            document.forms["myform"]["course"].value = myobj.course;
                            document.forms["myform"]["name"].value = myobj.name;
                            document.forms["myform"]["dob"].value = myobj.dob;
                            document.forms["myform"]["community"].value = myobj.community;
                            document.forms["myform"]["board"].value = myobj.board;
                            document.forms["myform"]["cutoff"].value = myobj.percentage;
                            if (myobj.selectiondate != "") {
                                document.forms["myform"]["selectiondate"].value = myobj.selectiondate;
                            }
                            document.forms["myform"]["chno"].value = myobj.chno;
                            document.forms["myform"]["language"].value = myobj.language;
                            document.forms["myform"]["feedate"].value = myobj.feedate;
                            document.forms["myform"]["cvdate"].value = myobj.cvdate;
                            document.forms["myform"]["palno"].value = myobj.palno;
                            document.forms["myform"]["remarks"].value = myobj.remarks;
                            document.forms["myform"]["cutoff"].value = myobj.percentage;
                            document.forms["myform"]["subject1"].value = myobj.subject1;
                            document.forms["myform"]["subject2"].value = myobj.subject2;
                            document.forms["myform"]["subject3"].value = myobj.subject3;
                            document.forms["myform"]["subject4"].value = myobj.subject4;
                            document.forms["myform"]["mark1"].value = myobj.mark1;
                            document.forms["myform"]["mark2"].value = myobj.mark2;
                            document.forms["myform"]["mark3"].value = myobj.mark3;
                            document.forms["myform"]["mark4"].value = myobj.mark4;
                            document.forms["myform"]["total"].value = myobj.total;
                            document.forms["myform"]["submit"].value = myobj.submit;
                            if (myobj.submit == "SELECT") {
                                setdate();
                                document.forms["myform"]["course"].hidden = false;
                                document.forms["myform"]["course1"].hidden = true;
                                document.forms["myform"]["community"].hidden = false;
                                document.forms["myform"]["community1"].hidden = true;
                                document.forms["myform"]["board"].hidden = false;
                                document.forms["myform"]["board1"].hidden = true;
                                document.forms["myform"]["language"].hidden = false;
                                document.forms["myform"]["language1"].hidden = true;
                                document.forms["myform"]["name"].setAttribute("readonly", "");
                                document.forms["myform"]["dob"].setAttribute("readonly", "");
                            }
                            if (myobj.applied == "selected") {
                                Swal.fire(
                                    'Already Selected for',
                                    myobj.selectedcourse,
                                    'warning'
                                );
                                document.forms["myform"].reset();
                            }
                        } else {
                            swal("Record not found!");
                            document.getElementById("myform").reset();
                        }
                    }
                };
                xmlhttp.open("POST", "fetchrecord.php", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
                xmlhttp.send("x=" + dbparam);
            }
        }
    </script>
    <?php
       if(!isset($_GET['signup'])){
           exit();
       }else{
                $signup=$_GET['signup'];
            if($signup=="selected"){
                    echo '<script>
                $("#message").fadeIn();
                $("#success").html("Selected");
                setTimeout(function(){
                    $("#message").fadeOut("slow");
                }, 2000);
                document.forms["myform"]["applno"].focus();
              </script>';       
             }elseif($signup=="updated"){
                    echo '<script>
                $("#message").fadeIn();
                $("#success").html("Updated");
                setTimeout(function(){
                    $("#message").fadeOut("slow");
                }, 2000);
                document.forms["myform"]["applno"].focus();
              </script>';
            }elseif($signup=="selectsqlerror"){
                 $sqlerrordetail=$_GET['sqlerrordetail'];
                 echo "<script>Swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Form already selected',
                        footer: '<a href>Why do I have this issue?</a>'
                      })
                      </script>";      
             }elseif($signup=="updatesqlerror"){
                 $sqlerrordetail=$_GET['sqlerrordetail'];
                 echo "<script>Swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Unable to update',
                        footer: '<a href>Why do I have this issue?</a>'
                      })
                      </script>";      
             }elseif($signup=="dberror"){
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