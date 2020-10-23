<?php
if(isset($_POST["export_excel"])){
    include("../database/dbconnection.php");
    $conn=new mysqli($servername,$username,$password,$db);
    if($conn->connect_error){
        echo "database connection error: ".$conn->connect_error;
        exit();
    }
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $output = "";
    
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
            
            $AC=($a1+$a2+$a3+$a4+$a5+$a6);
            $AS=($a8+$a9);
            $BC=($b1+$b2+$b3+$b4+$b5+$b6);
            $BS=($b8+$b9);
        
           $output .= '<table border="1" cellspacing="0px">
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
                            '. $a1.'
                        </td>
                        <td>
                            '. $a2.'
                        </td>
                        <td>
                            '. $a3.'
                        </td>
                        <td>
                            '. $a4.'
                        </td>
                        <td>
                            '. $a5.'
                        </td>
                        <td>
                            '. $a6.'
                        </td>
                        <td>
                            <strong>'.($a1+$a2+$a3+$a4+$a5+$a6).'</strong>
                        </td>
                        <td>
                            '. $a7.'
                        </td>
                        <td>
                            '. $a8.'
                        </td>
                        <td>
                            '. $a9.'
                        </td>
                        <td>
                            <strong>'.($a8+$a9).'</strong>
                        </td>
                        <td>
                            <strong>'. $a10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            ST
                        </th>
                        <td>
                            '. $b1.'
                        </td>
                        <td>
                            '. $b2.'
                        </td>
                        <td>
                            '. $b3.'
                        </td>
                        <td>
                            '. $b4.'
                        </td>
                        <td>
                            '. $b5.'
                        </td>
                        <td>
                            '. $b6.'
                        </td>
                        <td>
                            <strong>'.($b1+$b2+$b3+$b4+$b5+$b6).'</strong>
                        </td>
                        <td>
                            '. $b7.'
                        </td>
                        <td>
                            '. $b8.'
                        </td>
                        <td>
                            '. $b9.'
                        </td>
                        <td>
                            <strong>'.($b8+$b9).'</strong>
                        </td>
                        <td>
                            <strong>'. $b10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            SC(A)
                        </th>
                        <td>
                            '. $c1.'
                        </td>
                        <td>
                            '. $c2.'
                        </td>
                        <td>
                            '. $c3.'
                        </td>
                        <td>
                            '. $c4.'
                        </td>
                        <td>
                            '. $c5.'
                        </td>
                        <td>
                            '. $c6.'
                        </td>
                        <td>
                            <strong>'. $CC=($c1+$c2+$c3+$c4+$c5+$c6).'</strong>
                        </td>
                        <td>
                            '. $c7.'
                        </td>
                        <td>
                            '. $c8.'
                        </td>
                        <td>
                            '. $c9.'
                        </td>
                        <td>
                            <strong>'. $CS=($c8+$c9).'</strong>
                        </td>
                        <td>
                            <strong>'. $c10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            SC
                        </th>
                        <td>
                            '. $d1.'
                        </td>
                        <td>
                            '. $d2.'
                        </td>
                        <td>
                            '. $d3.'
                        </td>
                        <td>
                            '. $d4.'
                        </td>
                        <td>
                            '. $d5.'
                        </td>
                        <td>
                            '. $d6.'
                        </td>
                        <td>
                            <strong>'. $DC=($d1+$d2+$d3+$d4+$d5+$d6).'</strong>
                        </td>
                        <td>
                            '. $d7.'
                        </td>
                        <td>
                            '. $d8.'
                        </td>
                        <td>
                            '. $d9.'
                        </td>
                        <td>
                            <strong>'. $DS=($d8+$d9).'</strong>
                        </td>
                        <td>
                            <strong>'. $d10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            OC
                        </th>
                        <td>
                            '. $e1.'
                        </td>
                        <td>
                            '. $e2.'
                        </td>
                        <td>
                            '. $e3.'
                        </td>
                        <td>
                            '. $e4.'
                        </td>
                        <td>
                            '. $e5.'
                        </td>
                        <td>
                            '. $e6.'
                        </td>
                        <td>
                            <strong>'. $EC=($e1+$e2+$e3+$e4+$e5+$e6).'</strong>
                        </td>
                        <td>
                            '. $e7.'
                        </td>
                        <td>
                            '. $e8.'
                        </td>
                        <td>
                            '. $e9.'
                        </td>
                        <td>
                            <strong>'. $ES=($e8+$e9).'</strong>
                        </td>
                        <td>
                            <strong>'. $e10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            MBC/DNC
                        </th>
                        <td>
                            '. $f1.'
                        </td>
                        <td>
                            '. $f2.'
                        </td>
                        <td>
                            '. $f3.'
                        </td>
                        <td>
                            '. $f4.'
                        </td>
                        <td>
                            '. $f5.'
                        </td>
                        <td>
                            '. $f6.'
                        </td>
                        <td>
                            <strong>'. $FC=($f1+$f2+$f3+$f4+$f5+$f6).'</strong>
                        </td>
                        <td>
                            '. $f7.'
                        </td>
                        <td>
                            '. $f8.'
                        </td>
                        <td>
                            '. $f9.'
                        </td>
                        <td>
                            <strong>'. $FS=($f8+$f9).'</strong>
                        </td>
                        <td>
                            <strong>'. $f10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            BC(M)
                        </th>
                        <td>
                            '. $g1.'
                        </td>
                        <td>
                            '. $g2.'
                        </td>
                        <td>
                            '. $g3.'
                        </td>
                        <td>
                            '. $g4.'
                        </td>
                        <td>
                            '. $g5.'
                        </td>
                        <td>
                            '. $g6.'
                        </td>
                        <td>
                            <strong>'. $GC=($g1+$g2+$g3+$g4+$g5+$g6).'</strong>
                        </td>
                        <td>
                            '. $g7.'
                        </td>
                        <td>
                            '. $g8.'
                        </td>
                        <td>
                            '. $g9.'
                        </td>
                        <td>
                            <strong>'. $GS=($g8+$g9).'</strong>
                        </td>
                        <td>
                            <strong>'. $g10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Total-<br />Course Wise
                        </th>
                        <td>
                            <strong>'. ($a1+$b1+$c1+$d1+$e1+$f1+$g1).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a2+$b2+$c2+$d2+$e2+$f2+$g2).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a3+$b3+$c3+$d3+$e3+$f3+$g3).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a4+$b4+$c4+$d4+$e4+$f4+$g4).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a5+$b5+$c5+$d5+$e5+$f5+$g5).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a6+$b6+$c6+$d6+$e6+$f6+$g6).'</strong>
                        </td>
                        <td>
                            <strong>'. ($AC+$BC+$CC+$DC+$EC+$FC+$GC).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a7+$b7+$c7+$d7+$e7+$f7+$g7).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a8+$b8+$c8+$d8+$e8+$f8+$g8).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a9+$b9+$c9+$d9+$e9+$f9+$g9).'</strong>
                        </td>
                        <td>
                            <strong>'. ($AS+$BS+$CS+$DS+$ES+$FS+$GS).'</strong>
                        </td>
                        <td>
                            <strong>'. $total.'</strong>
                        </td>
                    </tr>
                </table>';
    
    
                //Community BC
            /*$sql = "SELECT * FROM feetable WHERE (feedate BETWEEN '$startdate' AND '$enddate') AND course = 'B.Com(GEN)' AND community = 'BC' AND feedate <> ''";
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
            

              $output .= '<div id="tb2">
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
                            '. $a1.'
                        </td>
                        <td>
                            '. $a2.'
                        </td>
                        <td>
                            '. $a3.'
                        </td>
                        <td>
                            '. $a4.'
                        </td>
                        <td>
                            '. $a5.'
                        </td>
                        <td>
                            '. $a6.'
                        </td>
                        <td>
                            <strong>'. $AC=($a1+$a2+$a3+$a4+$a5+$a6).'</strong>
                        </td>
                        <td>
                            '. $a7.'
                        </td>
                        <td>
                            '. $a8.'
                        </td>
                        <td>
                            '. $a9.'
                        </td>
                        <td>
                            <strong>'. $AS=($a8+$a9).'</strong>
                        </td>
                        <td>
                            <strong>'. $a10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            ST
                        </th>
                        <td>
                            '. $b1.'
                        </td>
                        <td>
                            '. $b2.'
                        </td>
                        <td>
                            '. $b3.'
                        </td>
                        <td>
                            '. $b4.'
                        </td>
                        <td>
                            '. $b5.'
                        </td>
                        <td>
                            '. $b6.'
                        </td>
                        <td>
                            <strong>'. $BC=($b1+$b2+$b3+$b4+$b5+$b6).'</strong>
                        </td>
                        <td>
                            '. $b7.'
                        </td>
                        <td>
                            '. $b8.'
                        </td>
                        <td>
                            '. $b9.'
                        </td>
                        <td>
                            <strong>'. $BS=($b8+$b9).'</strong>
                        </td>
                        <td>
                            <strong>'. $b10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            SC(A)
                        </th>
                        <td>
                            '. $c1.'
                        </td>
                        <td>
                            '. $c2.'
                        </td>
                        <td>
                            '. $c3.'
                        </td>
                        <td>
                            '. $c4.'
                        </td>
                        <td>
                            '. $c5.'
                        </td>
                        <td>
                            '. $c6.'
                        </td>
                        <td>
                            <strong>'. $CC=($c1+$c2+$c3+$c4+$c5+$c6).'</strong>
                        </td>
                        <td>
                            '. $c7.'
                        </td>
                        <td>
                            '. $c8.'
                        </td>
                        <td>
                            '. $c9.'
                        </td>
                        <td>
                            <strong>'. $CS=($c8+$c9).'</strong>
                        </td>
                        <td>
                            <strong>'. $c10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            SC
                        </th>
                        <td>
                            '. $d1.'
                        </td>
                        <td>
                            '. $d2.'
                        </td>
                        <td>
                            '. $d3.'
                        </td>
                        <td>
                            '. $d4.'
                        </td>
                        <td>
                            '. $d5.'
                        </td>
                        <td>
                            '. $d6.'
                        </td>
                        <td>
                            <strong>'. $DC=($d1+$d2+$d3+$d4+$d5+$d6).'</strong>
                        </td>
                        <td>
                            '. $d7.'
                        </td>
                        <td>
                            '. $d8.'
                        </td>
                        <td>
                            '. $d9.'
                        </td>
                        <td>
                            <strong>'. $DS=($d8+$d9).'</strong>
                        </td>
                        <td>
                            <strong>'. $d10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            OC
                        </th>
                        <td>
                            '. $e1.'
                        </td>
                        <td>
                            '. $e2.'
                        </td>
                        <td>
                            '. $e3.'
                        </td>
                        <td>
                            '. $e4.'
                        </td>
                        <td>
                            '. $e5.'
                        </td>
                        <td>
                            '. $e6.'
                        </td>
                        <td>
                            <strong>'. $EC=($e1+$e2+$e3+$e4+$e5+$e6).'</strong>
                        </td>
                        <td>
                            '. $e7.'
                        </td>
                        <td>
                            '. $e8.'
                        </td>
                        <td>
                            '. $e9.'
                        </td>
                        <td>
                            <strong>'. $ES=($e8+$e9).'</strong>
                        </td>
                        <td>
                            <strong>'. $e10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            MBC/DNC
                        </th>
                        <td>
                            '. $f1.'
                        </td>
                        <td>
                            '. $f2.'
                        </td>
                        <td>
                            '. $f3.'
                        </td>
                        <td>
                            '. $f4.'
                        </td>
                        <td>
                            '. $f5.'
                        </td>
                        <td>
                            '. $f6.'
                        </td>
                        <td>
                            <strong>'. $FC=($f1+$f2+$f3+$f4+$f5+$f6).'</strong>
                        </td>
                        <td>
                            '. $f7.'
                        </td>
                        <td>
                            '. $f8.'
                        </td>
                        <td>
                            '. $f9.'
                        </td>
                        <td>
                            <strong>'. $FS=($f8+$f9).'</strong>
                        </td>
                        <td>
                            <strong>'. $f10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            BC(M)
                        </th>
                        <td>
                            '. $g1.'
                        </td>
                        <td>
                            '. $g2.'
                        </td>
                        <td>
                            '. $g3.'
                        </td>
                        <td>
                            '. $g4.'
                        </td>
                        <td>
                            '. $g5.'
                        </td>
                        <td>
                            '. $g6.'
                        </td>
                        <td>
                            <strong>'. $GC=($g1+$g2+$g3+$g4+$g5+$g6).'</strong>
                        </td>
                        <td>
                            '. $g7.'
                        </td>
                        <td>
                            '. $g8.'
                        </td>
                        <td>
                            '. $g9.'
                        </td>
                        <td>
                            <strong>'. $GS=($g8+$g9).'</strong>
                        </td>
                        <td>
                            <strong>'. $g10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Total-<br />Course Wise
                        </th>
                        <td>
                            <strong>'. ($a1+$b1+$c1+$d1+$e1+$f1+$g1).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a2+$b2+$c2+$d2+$e2+$f2+$g2).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a3+$b3+$c3+$d3+$e3+$f3+$g3).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a4+$b4+$c4+$d4+$e4+$f4+$g4).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a5+$b5+$c5+$d5+$e5+$f5+$g5).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a6+$b6+$c6+$d6+$e6+$f6+$g6).'</strong>
                        </td>
                        <td>
                            <strong>'. ($AC+$BC+$CC+$DC+$EC+$FC+$GC).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a7+$b7+$c7+$d7+$e7+$f7+$g7).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a8+$b8+$c8+$d8+$e8+$f8+$g8).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a9+$b9+$c9+$d9+$e9+$f9+$g9).'</strong>
                        </td>
                        <td>
                            <strong>'. ($AS+$BS+$CS+$DS+$ES+$FS+$GS).'</strong>
                        </td>
                        <td>
                            <strong>'. $total.'</strong>
                        </td>
                    </tr>
                </table>
                </div>
            </div>';
            
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
            
        
              $output .= '<div class="row2">
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
                            '. $a1.'
                        </td>
                        <td>
                            '. $a2.'
                        </td>
                        <td>
                            '. $a3.'
                        </td>
                        <td>
                            '. $a4.'
                        </td>
                        <td>
                            '. $a5.'
                        </td>
                        <td>
                            '. $a6.'
                        </td>
                        <td>
                            <strong>'. $AC=($a1+$a2+$a3+$a4+$a5+$a6).'</strong>
                        </td>
                        <td>
                            '. $a7.'
                        </td>
                        <td>
                            '. $a8.'
                        </td>
                        <td>
                            '. $a9.'
                        </td>
                        <td>
                            <strong>'. $AS=($a8+$a9).'</strong>
                        </td>
                        <td>
                            <strong>'. $a10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            ST
                        </th>
                        <td>
                            '. $b1.'
                        </td>
                        <td>
                            '. $b2.'
                        </td>
                        <td>
                            '. $b3.'
                        </td>
                        <td>
                            '. $b4.'
                        </td>
                        <td>
                            '. $b5.'
                        </td>
                        <td>
                            '. $b6.'
                        </td>
                        <td>
                            <strong>'. $BC=($b1+$b2+$b3+$b4+$b5+$b6).'</strong>
                        </td>
                        <td>
                            '. $b7.'
                        </td>
                        <td>
                            '. $b8.'
                        </td>
                        <td>
                            '. $b9.'
                        </td>
                        <td>
                            <strong>'. $BS=($b8+$b9).'</strong>
                        </td>
                        <td>
                            <strong>'. $b10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            SC(A)
                        </th>
                        <td>
                            '. $c1.'
                        </td>
                        <td>
                            '. $c2.'
                        </td>
                        <td>
                            '. $c3.'
                        </td>
                        <td>
                            '. $c4.'
                        </td>
                        <td>
                            '. $c5.'
                        </td>
                        <td>
                            '. $c6.'
                        </td>
                        <td>
                            <strong>'. $CC=($c1+$c2+$c3+$c4+$c5+$c6).'</strong>
                        </td>
                        <td>
                            '. $c7.'
                        </td>
                        <td>
                            '. $c8.'
                        </td>
                        <td>
                            '. $c9.'
                        </td>
                        <td>
                            <strong>'. $CS=($c8+$c9).'</strong>
                        </td>
                        <td>
                            <strong>'. $c10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            SC
                        </th>
                        <td>
                            '. $d1.'
                        </td>
                        <td>
                            '. $d2.'
                        </td>
                        <td>
                            '. $d3.'
                        </td>
                        <td>
                            '. $d4.'
                        </td>
                        <td>
                            '. $d5.'
                        </td>
                        <td>
                            '. $d6.'
                        </td>
                        <td>
                            <strong>'. $DC=($d1+$d2+$d3+$d4+$d5+$d6).'</strong>
                        </td>
                        <td>
                            '. $d7.'
                        </td>
                        <td>
                            '. $d8.'
                        </td>
                        <td>
                            '. $d9.'
                        </td>
                        <td>
                            <strong>'. $DS=($d8+$d9).'</strong>
                        </td>
                        <td>
                            <strong>'. $d10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            OC
                        </th>
                        <td>
                            '. $e1.'
                        </td>
                        <td>
                            '. $e2.'
                        </td>
                        <td>
                            '. $e3.'
                        </td>
                        <td>
                            '. $e4.'
                        </td>
                        <td>
                            '. $e5.'
                        </td>
                        <td>
                            '. $e6.'
                        </td>
                        <td>
                            <strong>'. $EC=($e1+$e2+$e3+$e4+$e5+$e6).'</strong>
                        </td>
                        <td>
                            '. $e7.'
                        </td>
                        <td>
                            '. $e8.'
                        </td>
                        <td>
                            '. $e9.'
                        </td>
                        <td>
                            <strong>'. $ES=($e8+$e9).'</strong>
                        </td>
                        <td>
                            <strong>'. $e10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            MBC/DNC
                        </th>
                        <td>
                            '. $f1.'
                        </td>
                        <td>
                            '. $f2.'
                        </td>
                        <td>
                            '. $f3.'
                        </td>
                        <td>
                            '. $f4.'
                        </td>
                        <td>
                            '. $f5.'
                        </td>
                        <td>
                            '. $f6.'
                        </td>
                        <td>
                            <strong>'. $FC=($f1+$f2+$f3+$f4+$f5+$f6).'</strong>
                        </td>
                        <td>
                            '. $f7.'
                        </td>
                        <td>
                            '. $f8.'
                        </td>
                        <td>
                            '. $f9.'
                        </td>
                        <td>
                            <strong>'. $FS=($f8+$f9).'</strong>
                        </td>
                        <td>
                            <strong>'. $f10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            BC(M)
                        </th>
                        <td>
                            '. $g1.'
                        </td>
                        <td>
                            '. $g2.'
                        </td>
                        <td>
                            '. $g3.'
                        </td>
                        <td>
                            '. $g4.'
                        </td>
                        <td>
                            '. $g5.'
                        </td>
                        <td>
                            '. $g6.'
                        </td>
                        <td>
                            <strong>'. $GC=($g1+$g2+$g3+$g4+$g5+$g6).'</strong>
                        </td>
                        <td>
                            '. $g7.'
                        </td>
                        <td>
                            '. $g8.'
                        </td>
                        <td>
                            '. $g9.'
                        </td>
                        <td>
                            <strong>'. $GS=($g8+$g9).'</strong>
                        </td>
                        <td>
                            <strong>'. $g10.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Total-<br />Course Wise
                        </th>
                        <td>
                            <strong>'. ($a1+$b1+$c1+$d1+$e1+$f1+$g1).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a2+$b2+$c2+$d2+$e2+$f2+$g2).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a3+$b3+$c3+$d3+$e3+$f3+$g3).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a4+$b4+$c4+$d4+$e4+$f4+$g4).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a5+$b5+$c5+$d5+$e5+$f5+$g5).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a6+$b6+$c6+$d6+$e6+$f6+$g6).'</strong>
                        </td>
                        <td>
                            <strong>'. ($AC+$BC+$CC+$DC+$EC+$FC+$GC).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a7+$b7+$c7+$d7+$e7+$f7+$g7).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a8+$b8+$c8+$d8+$e8+$f8+$g8).'</strong>
                        </td>
                        <td>
                            <strong>'. ($a9+$b9+$c9+$d9+$e9+$f9+$g9).'</strong>
                        </td>
                        <td>
                            <strong>'. ($AS+$BS+$CS+$DS+$ES+$FS+$GS).'</strong>
                        </td>
                        <td>
                            <strong>'. $total.'</strong>
                        </td>
                    </tr>
                </table>
                </div>';
            
            
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
            
               $output .= '<div id="tb4">
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
                            '. $a1.'
                        </td>
                    </tr>
                    <tr>
                        <th>
                            AF
                        </th>
                        <td>
                            '. $b1.'
                        </td>
                    </tr>
                    <tr>
                        <th>
                            BM
                        </th>
                        <td>
                            '. $c1.'
                        </td>
                    </tr>
                    <tr>
                        <th>
                            B.Com(CS)
                        </th>
                        <td>
                            '. $d1.'
                        </td>
                    </tr>
                    <tr>
                        <th>
                            CA
                        </th>
                        <td>
                            '. $e1.'
                        </td>
                    </tr>
                    <tr>
                        <th>
                            ISM
                        </th>
                        <td>
                            '. $f1.'
                        </td>
                    </tr>
                    <tr>
                        <th>
                            BBA
                        </th>
                        <td>
                            '. $g1.'
                        </td>
                    </tr>
                    <tr>
                        <th>
                            B.Sc(CS)
                        </th>
                        <td>
                            '. $h1.'
                        </td>
                    </tr>
                    <tr>
                        <th>
                            BCA
                        </th>
                        <td>
                            '. $i1.'
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Total CV Done
                        </th>
                        <td>
                            <strong>'. $total.'</strong>
                        </td>
                    </tr>
                </table>';*/
    
    
    
        header("Content-Type: application/xls");
        header("Content-Disposition:attachment; filename=Consolidated.xls");
        echo $output;
    
}else{
    header("Location: dailyrep.php");
    exit();
}
?>