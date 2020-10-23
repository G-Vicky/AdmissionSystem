<?php
    session_start();
    if(isset($_SESSION["user"])){
        session_unset();
        session_destroy();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        Login
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="/admission/admission/sweetalert2/sweetalert2.all.min.js"></script>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <h2 class="active"> Log In </h2>
            <form autocomplete="off" action="" method="post">
                <input type="text" id="login" class="fadeIn second" name="user" placeholder="Username" autofocus autocomplete="off">
                <input type="password" id="password" class="fadeIn third" name="pwd" placeholder="Password" autocomplete="off">
                <input type="submit" class="fadeIn fourth" value="Log In" name="login">
            </form>
        </div>
    </div>
    <?php
    if(isset($_POST["login"])){
        include("admission/database/dbconnection.php");
        $conn=new mysqli($servername,$username,$password,$db);
        if($conn->connect_error){
            echo $conn->connect_error;
            exit();
         }
        $user=$_POST["user"];
        $pwd=$_POST["pwd"];
        $sql="SELECT * FROM login WHERE uname = '$user' AND pwd = '$pwd'";
        $result=$conn->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $username=$row["uname"];
                    $password=$row["pwd"];
                        if(($user == $username) && ($pwd == $password)){
                            if($user == "admin"){
                                $_SESSION['user'] = "admin";
                                header("Location: admission/registration/registration.php");
                            }
                            elseif($user == "user"){
                                $_SESSION['user'] = "user";
                                header("Location: admission/registration/registration.php");
                            }elseif($user == "incharge"){
                                $_SESSION['user'] = "incharge";
                                header("Location: admission/registration/registration.php");
                            }elseif($user == "secretary"){
                                $_SESSION['user'] = "secretary";
                                header("Location: admission/registration/registration.php");
                            }elseif($user == "cvuser"){
                                $_SESSION['user'] = "cvuser";
                                header("Location: admission/registration/registration.php");
                            }
                        }
                }
            }else{
                echo "<script>Swal.fire(
                                'Failure',
                                'Check Username And Password',
                                'error'
                              );</script>";
            }
    }
    ?>
</body>

</html>