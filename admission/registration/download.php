
<?php
    if(!isset($_GET['applno'])){
        exit();
    }else {
        $applNo = $_GET['applno'];
        include("../database/dbconnection.php");
     $conn=new mysqli($servername,$username,$password,$db);
     if($conn->connect_error){
        echo "unable to connect to database".$conn->connect_error;
        exit();
     }
     $sql="SELECT * FROM `registration` WHERE applno = $applNo";
     $result=$conn->query($sql);
     if($result->num_rows>0){        
        while($row=$result->fetch_assoc()){
            
            $regDate = $row["regdate"];
            $regDate=date("d-m-Y",strtotime($regDate));
            $regNo = $row["regno"];
            $course = $row["course"];
            $name = $row["name"];
            $dob = $row["dob"];
            $community =$row["community"];
            $board =$row["board"];
            $percentage =$row["percentage"];
        }
    } else {
        echo "No data";
    }

    $path = 'doc.jpg';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

}

?>

    
    <script type="text/javascript" src="jspdf.min.js"></script>
    <link rel="stylesheet" href="../jquery/jquery-ui-1.12.1/jquery-ui.css" />
    <script type="text/javascript" src="../jquery/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
    <script type="text/javascript" src="../jquery/jquery-ui-1.12.1/jquery-ui.js"></script>

    
    <script>
         function download() {
             
            var doc = new jsPDF();
            var imgData = "<?php echo $base64; ?>"; 

            doc.addImage(imgData, 'jpeg', 0, 0, 210, 297);
            doc.setFontSize(14);

           var course = '<?php echo $course; ?>';             
           var applNo = '<?php echo $applNo; ?>';             
           var regno = '<?php echo $regNo; ?>';             
           var name = '<?php echo $name; ?>';             
           var dob = '<?php echo $dob; ?>';             
           var regDate = '<?php echo $regDate; ?>';             
           var community = '<?php echo $community; ?>';             
           var board = '<?php echo $board; ?>';             
           var percentage = '<?php echo $percentage; ?>';

            doc.text(27, 39, course);          
            doc.text(60, 59.5, applNo);            
            doc.text(135, 59.5, regno);            
            
            doc.setFontSize(12);
            doc.text(108, 84, name);
            doc.text(108, 100, dob);
            doc.text(108, 116, regDate);
            doc.text(108, 132, community);
            doc.text(108, 148, board);
            doc.text(108, 164, percentage);
            
            doc.save('doc.pdf');
            document.location.href="./registration.php?signup=success";
        }
        download();
    </script>